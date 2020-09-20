<!-----------------------part one-------------------->
<div id="work_data_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.work_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label data-toggle="tooltip" >{{__('employee.contract_type')}}</label>
                                        <select class="js-example-matcher-start form-control" name="contract_types_id" >
                                        <option   value="" >{{__('employee.select')}}</option>
                                        @foreach(DB::table('contract_types')->get() as $contract_type)
                                            @if($contract_type->id == $employee->contract_types_id)
                                                <option  selected  value="{{$contract_type->id}}" >{{$contract_type->name}}</option>
                                                @continue
                                            @endif
                                            <option value="{{$contract_type->id}}" >{{$contract_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-form-label" data-toggle="tooltip" title="{{trans('employee.job_should_in_branch')}}">{{trans('employee.select_job')}}</label>
                                    <select class="js-example-matcher-start  form-control" name="job_id">
                                        <option value="{{$employee->job_id}}" selected >{{DB::table('business_jobs')->where('id',$employee->job_id )->value('name')}}</option>
                                        @foreach($department as $department)
                                            <optgroup label="{{$department->name . ' : '.DB::table('business_administrations')->where('id',$department->business_administration_id )->value('name')}}">
                                                @foreach(DB::table('business_jobs')->where('business_department_id',$department->id)->get() as $job)
                                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('employee.basic_salary')}}<small class="text-purple">{{ " ".trans('employee.per_month')}}</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text badge-success">$</span>
                                        </div>
                                        <input type="number" class="form-control" name="basic_salary"  value="{{$employee->basic_salary}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('employee.variable_pay')}}<small class="text-purple">{{trans('employee.per_month')}}</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text badge-danger" >$</span>
                                        </div>
                                        <input type="number" class="form-control" name="variable_pay" value="{{$employee->variable_pay}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('employee.residency_job')}}</label>
                                    <input type="text"  name="residency_job" class="form-control" value="{{$employee->residency_job}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label"> {{trans('employee.manager_name')}} </label>
                                    <select class="js-example-matcher-start"  name="manager_id"  >
                                        @if($employee->manager_id)
                                            <option selected  value="{{$employee->manager_id}}"> {{DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_name')}} </option>
                                        @else
                                            <option   value=""> {{__('employee.no_manager')}}</option>
                                        @endif
                                        @foreach(DB::table('employee_general_data')->where('statue' , 'active')->get() as $manager)
                                            <option value="{{$manager->id}}"> {{$manager->employee_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="hiring_date" value="{{$employee->hiring_date}}" class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.hiring_date')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="contract_starting_date" value="{{ $employee->contract_starting_date}}" class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.contract_starting_date')}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-group form-focus focused">
                                        <div class="cal-icon">
                                            <input type="text" name="contract_ending_date" value="{{$employee->contract_ending_date}}" class="form-control floating datetimepicker" >
                                        </div>
                                        <label class="focus-label">{{trans('employee.contract_ending_date')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                </div>

            </div>
        </div>
    </div>
</div>




<!-----------------------part tow attendace and vaction and reward -------------------->
<div id="work_data_2_edit" class="modal custom-modal fade show" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.work_role')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="title"> {{__('employee.attendable')}}</label>
                                <a href="javascript:void(0)">
                                    <span class="role-action col-3" style="display: inline-block">
                                          <div class="status-toggle">
                                            <input type="checkbox" id="attendable"  @if($employee->attendable == 1)
                                            checked="checked"
                                                   @else

                                                   @endif
                                                   name="attendable" class="check" >
                                            <label for="attendable" class="checktoggle">checkbox</label>
                                          </div>
                                    </span>
                                </a>
                            </div>

                            <!_________________have annual vacation______________>
                            <div class="col-12">
                                <label>{{__('employee.annual_vacation')}}</label>
                                <a href="javascript:void(0)";>
                                    <span class="role-action col-3" style="display: inline-block">
                                        <div class="status-toggle">
                                             <input type="checkbox" id="annual_vacation" class="check" name="annual_vacation"
                                                    @if($employee->annual_vacation ==1)
                                                    checked
                                                    @else

                                                    @endif
                                                    onchange="myFunction()" >
                                            <label for="annual_vacation" class="checktoggle">checkbox</label>
                                        </div>
                                    </span>
                                </a>
                            </div>
                            <div class="col-12" style="padding: 7px">
                                <div class="form-group col-10 " id="annual_vacation_days"
                                     @if($employee->annual_vacation == 1 )
                                     style='display: block' @else style='display: none' @endif >
                                    <label>{{trans('employee.annual_vacation_days_per_year')}}</label>
                                    <input type="number" max="360" name="annual_vacation_days_per_year" class="form-control" value="{{$employee->annual_vacation_days_per_year }}">
                                </div>
                            </div>
                            <!______________________end have annual vacation______________________>

                            <!_________________service rewarde______________>
                            <div class="col-12">
                                <label>{{__('employee.end_service_reward')}}</label>
                                <a href="javascript:void(0)";>
                                    <span class="role-action col-3" style="display: inline-block">
                                        <div class="status-toggle">
                                             <input type="checkbox" id="end_service_reward" class="check" name="end_service_reward"
                                                    {{($employee->end_service_reward == 1)? 'checked' : ''}}  onchange="myFunction2()"  >
                                            <label for="end_service_reward" class="checktoggle">checkbox</label>
                                        </div>
                                    </span>
                                </a>
                            </div>
                            <div class="col-12" style="padding: 7px"  >
                                <div class="form-group col-10"  id="end_service_reward_days"
                                     @if($employee->end_service_reward == 1 && $employee->end_service_reward_days_per_year !=null)
                                     style='display: block' @else style='display: none' @endif>
                                    <label>{{trans('employee.annual_vacation_days_per_year')}}</label>
                                    <input type="number" max="360" name="end_service_reward_days_per_year" class="form-control" value="{{$employee->end_service_reward_days_per_year}}">
                                </div>
                            </div>
                            <!______________________end service reward______________________>
                        </div>
                    </div>
                </div>

                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">{{__('general.submit')}}</button>
                </div>

            </div>
        </div>
    </div>

    <script>

        function myFunction() {
            var x = document.getElementById("annual_vacation_days");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }function myFunction2() {
            var x = document.getElementById("end_service_reward_days");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }



    </script>

</div>
