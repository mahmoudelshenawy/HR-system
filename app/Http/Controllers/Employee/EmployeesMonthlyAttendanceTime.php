<?php

namespace App\Http\Controllers\Employee;

use App\BusinessBranch;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeesMonthlyAttendanceTime extends Controller
{
    public function index(){


        return view('employees.employees_monthly_attendance_time.index');
    }
}
