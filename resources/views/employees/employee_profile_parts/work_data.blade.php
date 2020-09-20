<!-- job data Tab -->
<div class="tab-pane fade" id="emp_work_data">
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">{{trans('employee.work_data')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#work_data_edit"><i class="fa fa-pencil"></i></a></h3>
                    <ul class="personal-info">
                        <li>
                            <div class="title">{{trans('employee.contract_type')}}</div>
                            <div class="text" style="display: inline-block">{{($employee->contract_types_id)?  DB::table('contract_types')->where('id',$employee->contract_types_id)->value('name') : ''}} </div>
                        </li>

                        <li>
                            <div class="title">{{trans('employee.job')}}</div>
                            <div  class="text" style="display: inline-block">{{($employee->job_id) ?  DB::table('business_jobs')->where('id',$employee->job_id)->value('name'): ''}}
                            </div>
                        </li>
                        <li>
                            <div class="title">{{trans('employee.residency_job')}}</div>
                            <div class="text" style="display: inline-block">{{($employee->residency_job) ?  $employee->residency_job : ''}}</div>
                        </li>

                        <li>
                            <div class="title">{{trans('employee.basic_salary')}}</div>
                            <div class="text" style="display: inline-block">{{($employee->basic_salary)? $employee->basic_salary: '$'}} </div>
                        </li>
                        <li>
                            <div class="title small " style="display: inline-block">{{trans('employee.variable_pay')}}</div>
                            <div class="text small" style="display: inline-block">{{($employee->variable_pay)? $employee->variable_pay : ''}} </div>
                        </li>
                        <li>
                            <div class="title">{{trans('employee.manager_name')}}</div>
                            <div class="text">
                                <div class="avatar-box">
                                    <div class="avatar avatar-xs">
                                        <img src="{{( isset($employee->id))? asset('uploads/files/employees/code/'. DB::table('employee_general_data')->where('id',$employee->manager_id)->value('code')).'/'. DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_img'): ''}}" alt="">
                                    </div>
                                </div>
                                <a class="text-info" href="{{( isset($employee->id)) ? url('employees/'.$employee->manager_id): '#'}}" >
                                    {{( isset($employee->id)) ? DB::table('employee_general_data')->where('id',$employee->manager_id)->value('employee_name') : ''}}
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="title">{{trans('employee.hiring_date')}}</div>
                            <div class="text text-success" style="display: inline-block">{{($employee->hiring_date) ? $employee->hiring_date : ''}}</div>
                        </li>
                        @if($employee->contract_starting_date)
                            <li>
                                <div class="title">{{trans('employee.contract_starting_date')}}</div>
                                <div class="text" style="display: inline-block">{{($employee->contract_starting_date)?  $employee->contract_starting_date  : ''}} </div>
                            </li>
                        @endif
                        @if($employee->contract_ending_date)
                            <li>
                                <div class="title">{{trans('employee.contract_ending_date')}}</div>
                                <div class="text text-danger" style="display: inline-block"> {{($employee->contract_ending_date)? $employee->contract_ending_date  : ''}} </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">{{trans('employee.work_role')}} <a href="#" class="edit-icon" data-toggle="modal" data-target="#work_data_2_edit"><i class="fa fa-pencil"></i></a></h3>
                    <ul class="list-group notification-list">
                        <li class="list-group-item">
                            {{trans('employee.attendable')}}
                            @if( $employee->attendable == 1)
                                <div class="status-toggle">
                                    <input type="checkbox" disabled id="staff_module" class="check" checked>
                                    <label for="staff_module"  class="checktoggle">checkbox</label>
                                </div>
                            @else
                                <div class="status-toggle">
                                    <input type="checkbox" disabled id="staff_module" class="check">
                                    <label for="staff_module" class="checktoggle">checkbox</label>
                                </div>
                            @endif
                        </li>
                        <li class="list-group-item">
                            {{trans('employee.annual_vacation')}}
                            @if($employee->annual_vacation)
                                @if( $employee->annual_vacation == 1)
                                    <div class="status-toggle">
                                        <input type="checkbox" disabled id="staff_module" class="check" checked>
                                        <label for="staff_module" disabled="" class="checktoggle">checkbox</label>
                                    </div>
                                    <span  class="small text-muted ">{{__('employee.annual_vacation_days_per_year')}}</span>
                                    <span  class="btn btn-sm btn-custom">{{$employee->annual_vacation_days_per_year}}</span>
                                @endif
                            @else
                                <div class="status-toggle">
                                    <input type="checkbox" disabled id="staff_module" class="check">
                                    <label for="staff_module" class="checktoggle">checkbox</label>
                                </div>
                            @endif
                        </li>
                        <li class="list-group-item">
                            {{trans('employee.end_service_reward')}}
                            @if($employee->end_service_reward)
                                @if( $employee->end_service_reward == 1)
                                    <span  class="small text-muted ">{{__('employee.annual_vacation_days_per_year')}}</span>
                                    <span class="btn btn-sm btn-custom">{{$employee->end_service_reward_days_per_year}}</span>
                                    <div class="status-toggle">
                                        <input type="checkbox" disabled id="staff_module" class="check" checked>
                                        <label for="staff_module" disabled="" class="checktoggle">checkbox</label>
                                    </div>
                                @endif
                            @else
                                <div class="status-toggle">
                                    <input type="checkbox" disabled id="staff_module" class="check">
                                    <label for="staff_module" class="checktoggle">checkbox</label>
                                </div>
                            @endif
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Projects Tab -->
