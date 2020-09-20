


<div id="attendence_list" class="tab-pane fade show active" role="dialog">

<div class="container container-fluid col-10 offset-md-1">
    <a data-target="#branch_attendence_rule" data-toggle="modal" class="edit-icon ml-3" href="#"><i class="fa fa-calendar"></i></a>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-radius">
                    <thead>
                    <tr>
                        <th>{{trans('general.day')}}</th>
                        <th>{{trans('employee.check_in')}}</th>
                        <th>{{trans('employee.check_out')}}</th>
                    </tr>
                    </thead>
<tbody>
    @foreach ($branch_attendence_rules as $rule)
        <tr>
            <td>{{$rule->day}}</td>
            <td class="text-success">{{$rule->check_in}}</td>
            <td class="text-danger">{{$rule->check_out}}</td>
        </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>


<div id="employees" class="tab-pane fade show" role="dialog">

<div class="container container-fluid col-10 offset-md-1">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-6">

        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" id="mySearchText">
                <label class="focus-label">{{__('business-setup.branches')}}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table nowrap" id="myTable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>{{trans('employee.code')}}</th>
                        <th>{{trans('business-setup.administration')}}</th>
                        <th>{{trans('employee.manager_name')}}</th>
                        <th>{{trans('employee.guarantor')}}</th>
                        <th>{{trans('employee.hiring_date')}}</th>
                        <th>{{trans('employee.country')}}</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($branch_employees as $employee)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{url('employees/'.$employee->id)}}" class="avatar"><img alt="" src="{{asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img)}}"></a>
                                    <a href="{{url('employees/'.$employee->id)}}">  {{$employee->employee_name}}<span style="color: #ff9b44">{{ DB::table('business_jobs')->where('id',$employee->job_id)->value('name') .":". trans('no job')}}  </span>
                                        <span style="color: #721c24">{{( $employee->phone_1 ? $employee->phone_1:trans('no phone'))}}</span>
                                    </a>
                                </h2>
                            </td>
                            <td>{{$employee->code}}</td>
                            <td>
                                {{ DB::table('business_administrations')->where('business_branche_id',$employee->branch_id)->value('name')}}
                            </td>
                            <td>@if ($employee->manager_id) {{DB::table('employee_general_data')->where('id','=',$employee->manager_id)->value('employee_name') }}@endif </td>
                            <td>@if($employee->guarantor_id) {{DB::table('guarantors')->where('id','=',$employee->guarantor_id)->value('name')}} @endif</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a>@if($employee->hiring_date) {{$employee->hiring_date}} @endif </a>
                                    <a><span>@if($employee->contract_ending_date) {{$employee->contract_ending_date}} @endif</span></a>

                                </h2>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle border-secondary" data-toggle="dropdown" aria-expanded="false">@if($employee->country_id) {{DB::table('countries')->where('id','=',$employee->country_id)->value('name')}}
                                        <img src="https://www.countryflags.io/AD/shiny/16.png">@endif
                                    </a>
                                    <div class="dropdown-menu border-success">
                                        <a class="dropdown-item" href="#"> <span><i class="fa fa-dot-circle-o text-danger"></i>@if($employee->national_id_number)  {{trans('employee.national_id')}}</span>  {{ $employee->national_id_number}} @endif</a>
                                        <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-warning"></i>@if($employee->residency_number) {{trans('employee.residence_number')}}</span>  {{ $employee->residency_number}} @endif</a>
                                        <a class="dropdown-item" href="#"><span><i class="fa fa-dot-circle-o text-info"></i>@if($employee->passport_number) {{trans('employee.passport_number')}}</span>  {{ $employee->residency_number}} @endif</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{url('employees/edit/'.$employee->id)}}" ><i class="fa fa-pencil m-r-5"></i> {{trans('general.edit')}}</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-pencil m-r-5"></i> {{trans('general.delete')}}</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@section('js')

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons:[
                    {
                        extend: 'excel',
                        text: "{{__('employee.export')}}",
                        className: 'my-btn btn-warning btn ',
                    },
                    {
                        extend: 'colvis',
                        text: "{{__('general.column_visibility')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-secondary btn ',
                    },

                ],
            });
            oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#mySearchText').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })

            $(".my-btn").removeClass( "dt-button" ).addClass( "btn-lg");
            $('.dt-buttons').insertBefore('div.filter-row');

        } );
    </script>
@endsection
