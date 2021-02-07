<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OverTime;
use App\DataTables\OverTimesDataTable;
use App\EmployeeGeneralData;
use App\Imports\OverTimesImport;
use App\Exports\TestExport;
use App\Exports\EmployeeFinancialStatus;
use App\Exports\PaymentSalaryReport;
use Maatwebsite\Excel\Facades\Excel;


class OverTimes extends Controller
{

    public function index(OverTimesDataTable $datatable)
    {
        return $datatable->render("salary.over_time.index");
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'over_time_amount' => 'required|numeric',
        ]);

        $over_time = new OverTime();
        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $over_time->employee_id = $request->employee_id;
        $over_time->code = $employee->code;
        $over_time->month = $request->month;
        $over_time->over_time_amount = $request->over_time_amount;

        $over_time->save();
        return  redirect()->back()->with('success', 'success');
    }

    public function show($id)
    {
        $over_time = OverTime::findOrFail($id);
        return response()->json(['data' => $over_time]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'month' => 'required',
            'over_time_amount' => 'required|numeric',
        ]);

        $over_time = OverTime::findOrFail($id);

        $employee = EmployeeGeneralData::findOrFail($request->employee_id);
        $over_time->employee_id = $request->employee_id;
        $over_time->code = $employee->code;
        $over_time->month = $request->month;
        $over_time->over_time_amount = $request->over_time_amount;

        $over_time->update();
        return  redirect()->back()->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $over_time = OverTime::findOrFail($id);
        $over_time->delete();
        return  redirect()->back()->with('success', 'success');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $extensions = array("xls", "xlsx", "xlm", "xla", "xlc", "xlt", "xlw");

        $result = array($request->file('file')->getClientOriginalExtension());

        if (!in_array($result[0], $extensions)) {
            session()->flash('error', __('extention of file not correct'));
            return back();
        }
        try {
            Excel::import(new OverTimesImport($request->month), $request->file('file'));
            return  redirect()->back()->with('success', 'success');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new EmployeeFinancialStatus(), 'financialStatus.xlsx');

        return  redirect()->back()->with('success', 'success');
    }
    public function payment_status()
    {
        return Excel::download(new PaymentSalaryReport(), 'paymentStatusReport.xlsx');

        return  redirect()->back()->with('success', 'success');
    }
}
