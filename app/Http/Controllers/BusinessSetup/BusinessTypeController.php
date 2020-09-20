<?php

namespace App\Http\Controllers\BusinessSetup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BusinessType;
use Illuminate\Support\Facades\Validator;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $businessType = BusinessType::withCount('businessBranch')->get();
        return view('business-setup.business-type.index', compact('businessType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), ['businessType' => 'Required|unique:business_types,name|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $businessType = new BusinessType();
        $businessType->name = $request->businessType ;
        $businessType->save();
        return redirect()->back()->with("success",__('general.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), ['businessType' => 'Required|unique:business_types,name,'.$id.'|max:255']);
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $businessType = BusinessType::find($id);
        $businessType->name = $request->businessType ;
        $businessType->save();
        return redirect()->back()->with("success",__('general.successEdite'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $businessType = BusinessType::find($id);
        if ($businessType) {
            $businessType->delete();
        }
        return redirect()->back()->with("success",__('general.successDeleted'));
    }
}
