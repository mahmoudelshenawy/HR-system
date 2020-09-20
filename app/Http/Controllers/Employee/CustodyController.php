<?php

namespace App\Http\Controllers\Employee;

use App\CustodyType;
use App\EmployeeCustody;
use App\EmployeeGeneralData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustodyController extends Controller
{
    private function rules ($id){
        return $rules =  [
            'employee_id'=>'Required',
            'name' => 'Required|max:50|unique:companions,name,'.$id,
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $custadys = EmployeeCustody::get();
        $employees = EmployeeGeneralData::get();
        $custadys_types = CustodyType::get();
        return view('employees.custodys.index',compact(['custadys','employees','custadys_types']));
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

        $custady = new EmployeeCustody();
        $validator = Validator::make($request->all(),$this->rules($custady->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custady->employee_id = $request->employee_id ;
        $custady->custady_type_id = $request->custady_type_id ;
        $custady->name = $request->name ;
        $custady->custady_number = $request->custady_number ;
        $custady->custady_data = $request->custady_data ;
        $custady->custady_received_date = $request->custady_received_date ;
        $custady->custady_expiry_date = $request->custady_expiry_date ;

        if ($request->has('statue')){
            if ($request->statue == 'on' || $request->statue == 1){
                $custady->statue = 1;
            }else{
                $custady->statue = 0;
            }
        }
        $custady->save();
        return redirect()->back()->with('success',__('general.success'));
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

        $custady =  EmployeeCustody::find($id);
        $validator = Validator::make($request->all(),$this->rules($custady->id));
        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $custady->employee_id = $request->employee_id ;
        $custady->custady_type_id = $request->custady_type_id ;
        $custady->name = $request->name ;
        $custady->custady_number = $request->custady_number ;
        $custady->custady_data = $request->custady_data ;
        $custady->custady_received_date = $request->custady_received_date ;
        $custady->custady_expiry_date = $request->custady_expiry_date ;

        if ($request->has('statue')){
            if ($request->statue == 'on' || $request->statue == 1){
                $custady->statue = 1;
            }else{
                $custady->statue = 0;
            }
        }
        $custady->save();
        return redirect()->back()->with('success',__('general.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
