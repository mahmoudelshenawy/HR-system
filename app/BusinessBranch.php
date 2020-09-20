<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessBranch extends Model
{
    //
    protected $table = 'business_branches';

    public function businessType(){
        return $this->belongsTo('App\BusinessType','business_type_id');
    }

    public function administration(){
        return $this->hasMany('App\BusinessAdministration','business_branche_id');
    }
    public function employees(){
        return $this->hasMany('App\EmployeeGeneralData','employee_id');
    }

    public function branch_attendance_rules(){
        return $this->hasMany('App\BranchAttendanceRules','branch_id');
    }

}
