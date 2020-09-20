<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchAttendanceRules extends Model
{
    //

    protected $fillable = [
        'day','check_in','check_out'
    ];

    public function branch(){
        return $this->belongsTo('App\BusinessBranch','branch_id');
    }
}
