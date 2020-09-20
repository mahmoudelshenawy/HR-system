<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class BusinessType extends Model
{
    use Notifiable,SoftDeletes;
    //
    protected $softDelete = true;

    public function businessBranch(){
      return  $this->hasMany('App\BusinessBranch','business_type_id');
    }
}
