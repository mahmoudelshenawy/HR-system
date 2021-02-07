<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeGeneralData extends Model
{
    //

    public  function manager()
    {
        return $this->hasOne('\App\EmployeeGeneralData', 'manager_id');
    }
    public  function guarantor()
    {
        return $this->hasOne('\App\Guarantor', 'id');
    }
    public  function user()
    {
        return $this->hasOne('\App\User', 'employee_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\BusinessBranch', 'employee_id');
    }

    public function movement()
    {
        return $this->hasMany('App\EmployeeMovement', 'employee_id');
    }

    public function employee_attendance_rules()
    {
        return $this->hasMany('App\EmployeeAttendanceRule', 'employee_id');
    }

    public function allowances()
    {
        return $this->hasMany(\App\EmployeeAllowance::class);
    }
    public function deduction()
    {
        return $this->hasMany(\App\EmployeeDeduction::class);
    }
}
