<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessAdministration extends Model
{
    //
    public function businessBranch(){
        return $this->belongsTo('App\BusinessBranch','business_branche_id');
    }

    public function department(){
        return $this->hasMany('App\BusinessDepartment','business_administration_id');
    }

}
