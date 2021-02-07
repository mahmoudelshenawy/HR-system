<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use App\EmployeeAllowance;
use App\EmployeeDeduction;
use App\FixedAllowance;
use App\FixedDeduction;
use App\Advance;
use App\Allowance;
use App\Commission;
use App\OverTime;
use App\AbsenceDelayPenalty;
use App\NetSalary;

class PaymentSalaryReport implements FromArray
{

    public function array(): array
    {
        $month = date('m');
        $employees = DB::table('employee_general_data')->where('statue', 'active')->where('basic_salary', '!=', NULL)->get()->toArray();
        $over_time_salary = OverTime::where('month', '=', $month)->get();
        $allowance_salary = Allowance::where('month', $month)->get();
        $advanceSalary = Advance::where('month', $month)->get();
        $commissionSalary = Commission::where('month', $month)->get();
        $absenceDelayPenalty = AbsenceDelayPenalty::where('month', $month)->get();
        $payment_salary_array[] = [
            'الكود',
            'رقم الهوية',
            'الاسم بالعربي',
            'الاسم انجليزي',
            'اسم الشهره',
            'الفرع',
            'الاداره',
            'القسم',
            'الوظيفة',
            'الجنسية',
            'المرتب الأساسي',
            'المرتب المتغير',
            'التأمين الثابت',
            'التأمين المتغير',
            'الوقت الإضافي',
            "العلاوة الشهرية",
            'السلف',
            "العمولة",
            "جزاء التأخير",
            "جزاء الغياب",
        ];
        $allowances_names = FixedAllowance::all('name');
        $deductions_names = FixedDeduction::all('name');
        if (count($allowances_names) > 0) {
            foreach ($allowances_names as $allowance) {
                array_push($payment_salary_array[0], $allowance->name);
            }
        }
        if (count($deductions_names) > 0) {
            foreach ($deductions_names as $deduction) {
                array_push($payment_salary_array[0], $deduction->name);
            }
        }

        array_push($payment_salary_array[0], 'الاجمالى');

        foreach ($employees as $employee) {

            $netSalary = new NetSalary();
            // fixed salaries

            $netSalary->employee_id = $employee->id;
            $netSalary->net_salary = $employee->basic_salary;
            $netSalary->net_salary += $employee->variable_pay;
            $netSalary->net_salary += $employee->insurance_basic;
            $netSalary->net_salary += $employee->insurance_variable;

            if (count($over_time_salary) > 0) {
                foreach ($over_time_salary as $over) {
                    if ($over->employee_id == $employee->id) {
                        $netSalary->overtime = $over->over_time_amount;
                        $netSalary->net_salary = $over->over_time_amount;
                    }
                }
            }
            if (count($allowance_salary) > 0) {
                foreach ($allowance_salary as $allow) {
                    if ($allow->employee_id == $employee->id) {
                        $netSalary->allowance = $allow->allowance_amount;

                        $netSalary->net_salary += $allow->allowance_amount;
                    }
                }
            }
            if (count($advanceSalary) > 0) {
                foreach ($advanceSalary as $advance) {
                    if ($advance->employee_id == $employee->id) {
                        $netSalary->advance = $advance->advance_amount;
                        $netSalary->net_salary += $advance->advance_amount;
                    }
                }
            }
            if (count($commissionSalary) > 0) {
                foreach ($commissionSalary as $commission) {
                    if ($commission->employee_id == $employee->id) {
                        $netSalary->commission = $commission->commission_amount;

                        $netSalary->net_salary += $commission->commission_amount;
                    }
                }
            }
            if (count($absenceDelayPenalty) > 0) {
                foreach ($absenceDelayPenalty as $penalty) {
                    if ($penalty->employee_id == $employee->id) {
                        $netSalary->delay_penalty = $penalty->delay_subtract;
                        $netSalary->absence_penalty = $penalty->absence_subtract;

                        $netSalary->net_salary = $netSalary->net_salary - ($penalty->delay_subtract + $penalty->absence_subtract);
                    }
                }
            }
            $employee_allowance = EmployeeAllowance::where('employee_id', $employee->id)->get();
            if (count($employee_allowance) > 0) {
                foreach ($employee_allowance as $allowance) {
                    foreach ($payment_salary_array as $index => &$finance) {
                        if ($index > 0) {
                            if ($finance["الكود"] == $allowance->employee->code) {
                                $finance[$allowance->fixed_allowance->name] = $allowance->allowance_amount;
                                $netSalary->net_salary += $allowance->allowance_amount;
                            }
                        }
                    }
                }
            } else if (count($employee_allowance) == 0 && count($allowances_names) > 0) {
                foreach ($payment_salary_array as $index => &$finance) {
                    if ($index > 0) {
                        foreach ($allowances_names as $allow) {
                            $finance[$allow->name] = 0;
                        }
                    }
                }
            }

            $employee_deduction = EmployeeDeduction::where('employee_id', $employee->id)->get();
            if (count($employee_deduction) > 0) {
                foreach ($employee_deduction as $deduction) {
                    foreach ($payment_salary_array as $index => &$finance) {
                        if ($index > 0) {
                            if ($finance["الكود"] == $deduction->employee->code) {
                                $finance[$deduction->fixed_deduction->name] = $deduction->deduction_amount;
                                $netSalary->net_salary -= $deduction->deduction_amount;
                            }
                        }
                    }
                }
            } else if (count($employee_deduction) == 0 && count($deductions_names) > 0) {
                foreach ($payment_salary_array as $index => &$finance) {
                    if ($index > 0) {
                        foreach ($deductions_names as $deduct) {
                            $finance[$deduct->name] = 0;
                        }
                    }
                }
            }
            // continue
            $payment_salary_array[] = [
                'الكود' => $employee->code,
                'رقم الهوية' =>  $employee->national_id_number,
                'الاسم بالعربي' => $employee->employee_name,
                'الاسم انجليزي' => $employee->employee_name_en,
                'اسم الشهره' => $employee->employee_short_name,
                'الفرع' => DB::table('business_branches')->find($employee->branch_id)->name,
                'الاداره' => DB::table('business_administrations')->where('id', DB::table('business_departments')->where('id', DB::table('business_jobs')->where('id', $employee->job_id)->value('business_department_id'))->value('business_administration_id'))->value('name'),
                'القسم' => DB::table('business_departments')->where('id', DB::table('business_jobs')->where('id', $employee->job_id)->value('business_department_id'))->value('name'),
                'الوظيفة' => DB::table('business_jobs')->where('id', $employee->job_id)->value('name'),
                'الجنسية' => DB::table('countries')->where('id', $employee->country_id)->value('name'),
                'المرتب الأساسي' => $employee->basic_salary,
                'المرتب المتغير' => $employee->variable_pay,
                'التأمين الثابت' => $employee->insurance_basic,
                'التأمين المتغير' => $employee->insurance_variable,
                'الوقت الإضافي' => $netSalary->overtime,
                "العلاوة الشهرية" => $netSalary->allowance,
                'السلف' => $netSalary->advance,
                "العمولة" => $netSalary->commission,
                "جزاء التأخير" =>  $netSalary->delay_penalty,
                "جزاء الغياب" => $netSalary->absence_penalty,
                // 'الأجمالى' => $netSalary->net_salary
            ];

            foreach ($payment_salary_array as $index => &$finance) {
                if ($index > 0) {
                    if ($finance['الكود'] == $employee->code) {
                        $finance['الاجمالى'] = $netSalary->net_salary;
                    }
                }
            }
            // dd($payment_salary_array);
            $netSalary->delete();
            // dd($netSalary);
            // continue;
        }
        // dd($payment_salary_array[3]);
        return $payment_salary_array;
    }
}
