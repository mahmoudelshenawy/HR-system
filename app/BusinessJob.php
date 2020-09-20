<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessJob extends Model
{
    //

    public function department(){
        return $this->belongsTo('App\BusinessDepartment','business_department_id');
    }
}
