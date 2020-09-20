<?php

namespace App\Http\Controllers\BusinessSetup;

use App\BusinessType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoftDeletesContrroller extends Controller
{
    //
    public function business_type(){
        $businessType = BusinessType::onlyTrashed()->get();
        return view('business-setup.business-type.index_deleted', compact('businessType'));
    }
    public function business_type_restore($id){
        $type = BusinessType::withTrashed()->find($id);
        $type->restore();
        return redirect('business-setup/business-type')->with("success",__('general.successDeleted'));
    }
}
