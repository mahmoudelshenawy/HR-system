<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeFinancialStatus;

class EmployeeFinancialStatusController extends Controller
{

    public function index()
    {
        $financial_status = EmployeeFinancialStatus::all();
        dd($financial_status);
        return view('employees.employees_financial_status.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
