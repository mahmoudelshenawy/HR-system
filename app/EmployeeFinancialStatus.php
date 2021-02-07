<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFinancialStatus extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(\App\EmployeeGeneralData::class, 'employee_id');
    }

    public function allowances()
    {
        return $this->hasMany(\App\EmployeeAllowance::class, 'allowance_id');
    }

    public function deductions()
    {
        return $this->hasMany(\App\EmployeeDeduction::class, 'deduction_id');
    }
}
