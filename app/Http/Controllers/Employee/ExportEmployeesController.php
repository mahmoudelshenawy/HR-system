<?php

namespace App\Http\Controllers\Employee;

use App\Exports\EmployeesExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use  niklasravnsborg\LaravelPdf\Pdf;

class ExportEmployeesController extends Controller
{
    //
    function excel()
    {
        return Excel::download(new EmployeesExport(),'employees.xlsx');
    }

    function pdf(){

    }
}
