<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDepartment extends Model
{
    //
    public function administration(){
        return $this->belongsTo('App\BusinessAdministration','business_administration_id');
    }


}
