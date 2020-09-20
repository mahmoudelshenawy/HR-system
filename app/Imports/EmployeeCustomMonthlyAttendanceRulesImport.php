<?php

namespace App\Imports;

use App\EmployeeCustomMonthlyAttendanceRules;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeCustomMonthlyAttendanceRulesImport implements ToModel
{

    public function model(array $row)
    {
        for ($i=1 ;$i <= date("t");$i++){
            return new EmployeeCustomMonthlyAttendanceRules([

            ]);
        }

    }
}
