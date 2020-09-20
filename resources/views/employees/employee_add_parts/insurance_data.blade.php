<div id="insurance_data" class="tab-pane fade">
    <!----------------------------------------------------------------------------------- block 1 --------------------------------------------------->
<div class="row col-10 offset-1" style="padding-top: 50px">

        <div class="col-md-6" >
            <div class="h3 card-title with-switch">
                <h4 class="text-muted">
                    {{trans('employee.insurance_statue')}}
                </h4>
                <div class="onoffswitch">
                    <input type="checkbox"  name="employee_medical_insurance_statue" class="onoffswitch-checkbox" id="switch_sick"  onchange="myFunction3()">
                    <label class="onoffswitch-label" for="switch_sick">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
            <div class="card none-border" id="leave_sick" style="background-color: transparent">
                <div class="">
                    <div class="leave-item" id="insurance" style="display: none">
                        <div class="leave-row">
                            <div class="leave-left">
                                <div class="input-box ">
                                    <div class="form-group col-10 offset-1" >
                                        <label><small class="text-muted">{{trans('employee.medical_insurance_provider')}}</small> </label>
                                        <select name="medical_insurance_id" class="select2-dropdown js-example-matcher-start form-control" >
                                            <option disabled value selected>{{trans('employee.select')}}</option>
                                            @foreach(DB::table('medical_insurances')->get() as $medical)
                                                <option value="{{$medical->id}}">{{$medical->name}}</option>
                                            @endforeach
                                        </select>
                                    </div><br>
                                    <div class="form-group  col-10 offset-1">
                                        <label><small class="text-muted">{{trans('employee.medical_insurance_type')}}</small> </label>
                                        <input type="text" class="form-control" name="medical_insurance_type"  >
                                    </div><br>
                                    <div class="form-group  col-10 offset-1">
                                        <label><small class="text-muted"> {{trans('employee.medical_insurance_number')}} </small></label>
                                        <input type="text" name="medical_insurance_number" class="form-control">
                                    </div><br>
                                    <div class="form-group  col-10 offset-1">
                                        <label class="focus-label"><small class="text-muted">{{trans('employee.medical_insurance_start_data')}}</small></label>
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" name="medical_insurance_start_data"  class="form-control floating datetimepicker" >
                                            </div>
                                            <label class="focus-label">{{trans('employee.medical_insurance_start_data')}}</label>
                                        </div>
                                    </div><br>
                                    <div class="form-group  col-10 offset-1">
                                        <label class="focus-label"><small class="text-muted">{{trans('employee.medical_insurance_end_data')}}</small></label>
                                        <div class="form-group form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" name="medical_insurance_end_data"  class="form-control floating datetimepicker" >
                                            </div>
                                            <label class="focus-label">{{trans('employee.medical_insurance_end_data')}}</label>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Sick Leave -->
        </div>



         <div class="col-md-6">
         <div class="h3 card-title with-switch">
             <h4 class="text-muted">
                 {{trans('employee.employee_social_insurance_statue')}}
             </h4>
             <div class="onoffswitch">
                 <input type="checkbox" name="employee_social_insurance_statue"  class="onoffswitch-checkbox" id="social_insurance_statue"  onchange="myFunction4()">
                 <label class="onoffswitch-label" for="social_insurance_statue">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                 </label>
             </div>
         </div>
         <div class="card none-border" style="background-color: transparent">
             <div class=""  id="social_insurance_details" style="display: none">
                <div>
                    <div class="form-group col-10 offset-1" >
                        <label><small class="text-muted"> {{trans('employee.employee_social_insurance_number')}} </small></label>
                        <input type="text"  name="employee_social_insurance_number" class="form-control social_insurance_details">
                    </div>
                    <div class=" form-group col-10 offset-1">
                        <label ><small class="text-muted">{{__('employee.socialinsurance_join_date')}}</small> </label>
                        <div class=" form-focus focuse" >
                            <div class="cal-icon">
                                <input type="text" name="socialinsurance_join_date"  class=" form-control floating datetimepicker" >
                            </div>
                            <label class="focus-label">{{__('employee.socialinsurance_join_date')}}</label>
                        </div>
                    </div>
                    <div class=" form-group col-10 offset-1">
                        <label ><small class="text-muted">{{__('employee.medical_insurance_end_data')}}</small> </label>
                        <div class=" form-focus focuse" >
                            <div class="cal-icon">
                                <input type="text" name="socialinsurance_end_date"  class=" form-control floating datetimepicker" >
                            </div>
                            <label class="focus-label">{{__('employee.medical_insurance_end_data')}}</label>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>


</div>




</div>
<script>

    function myFunction3() {
        var y = document.getElementById('insurance')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
    function myFunction4() {
        var y = document.getElementById('social_insurance_details')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
</script>



