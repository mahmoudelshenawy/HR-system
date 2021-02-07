<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use App\EmployeeAllowance;
use App\EmployeeDeduction;
use App\FixedAllowance;
use App\FixedDeduction;

class EmployeeFinancialStatus implements FromArray
{

    public function array(): array
    {
        $employees = DB::table('employee_general_data')->where('statue', 'active')->get()->toArray();

        $financial_array[] = [
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
        ];
        $allowances_names = FixedAllowance::all('name');
        $deductions_names = FixedDeduction::all('name');
        if (count($allowances_names) > 0) {
            foreach ($allowances_names as $allowance) {
                array_push($financial_array[0], $allowance->name);
            }
        }
        if (count($deductions_names) > 0) {
            foreach ($deductions_names as $deduction) {
                array_push($financial_array[0], $deduction->name);
            }
        }
        foreach ($employees as $employee) {
            $financial_array[] = [
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
            ];

            $employee_allowance = EmployeeAllowance::where('employee_id', $employee->id)->get();
            if (count($employee_allowance) > 0) {
                foreach ($employee_allowance as $allowance) {
                    foreach ($financial_array as $index => &$finance) {
                        if ($index > 0) {
                            if ($finance["الكود"] == $allowance->employee->code) {
                                $finance[$allowance->fixed_allowance->name] = $allowance->allowance_amount;
                            }
                        }
                    }
                }
            }

            $employee_deduction = EmployeeDeduction::where('employee_id', $employee->id)->get();
            if (count($employee_deduction) > 0) {
                foreach ($employee_deduction as $deduction) {
                    foreach ($financial_array as $index => &$finance) {
                        if ($index > 0) {
                            if ($finance["الكود"] == $deduction->employee->code) {
                                $finance[$deduction->fixed_deduction->name] = $deduction->deduction_amount;
                            }
                        }
                    }
                }
            }
        }
        return $financial_array;
    }
}
