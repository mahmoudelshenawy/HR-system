<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeGeneralData extends Model
{
    //

    public  function manager(){
        return $this->hasOne('\App\EmployeeGeneralData','manager_id');
    }
     public  function guarantor(){
            return $this->hasOne('\App\Guarantor','id');
    }
    public  function user(){
            return $this->hasOne('\App\User','employee_id');
    }

    public function branch (){
        return $this->belongsTo('App\BusinessBranch','employee_id');
    }


}
