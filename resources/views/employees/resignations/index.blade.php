@extends('layouts.app')

@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

        @include('layouts.partials.flash-messages')
        <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('employee.resignations')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.resignations')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_resignation"><i class="fa fa-plus"></i>
                            {{__('employee.new_resignation')}}</a>
                        <div class="view-icons">
                            @if(count(App\Resignation::onlyTrashed()->get()) > 0)
                                <a href="" class="list-view btn btn-link" data-toggle="modal" data-target="#canceled_resignation"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating search-input" id="mySearchText">
                        <label class="focus-label">{{__('employee.resignations')}}</label>
                    </div>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table  no-footer" id="myTable">
                            <thead>
                            <tr>
                                <th>{{__('employee.name')}}</th>
                                <th>{{__('employee.resignation_date')}}</th>
                                <th>{{__('employee.resignation_reason')}}</th>
                                <th>{{__('employee.statue')}}</th>
                                <th>{{__('employee.resignation_approved_by')}}</th>
                                <th>{{__('general.cancel_resignation')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($resignations as $resignation)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('id'))}}" class="avatar"><img alt="" src="{{ asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('employee_img'))}}"></a>
                                            <a href="{{url('employees/'.DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('id'))}}">  {{DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('employee_name')}}<span style="color: #ff9b44"></span>
                                                <span style="color: #721c24">{{( DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('phone_1')? DB::table('employee_general_data')->where('id',$resignation->employee_id)->value('phone_1'):'')}}</span>
                                            </a>
                                        </h2>
                                    </td>
                                    <td>{{$resignation->date}}</td>
                                    <td>{{$resignation->reason}}</td>
                                    <td>
                                        <div class="dropdown action-label">
                                        @if($resignation->statue == 'approved')
                                            <a href="" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> {{trans('employee.resignation_approved')}} </a>
                                        @elseif($resignation->satue == 'waiting')
                                            <a href="" class="btn btn-white btn-sm btn-rounded " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-warning"></i> {{trans('employee.resignation_waiting')}} </a>
                                        @else
                                            <a href="" class="btn btn-white btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> {{trans('employee.resignation_not_approved')}} </a>
                                        @endif
                                        </div>
                                    </td>
                                    <td >
                                       <span class="badge-danger">
                                           {{$user = Db::table('users')->where('id',$resignation->created_by)->value('name')}}
                                       </span>
                                    </td>
                                    <td>
                                        <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#delete_resignation{{$resignation->id}}"><i class="fa fa-remove text-danger text-lg-center"></i></a>
                                    </td>
                                </tr>
                                @include('employees.resignations.cancel')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        @include('employees.resignations.add')
        @include('employees.resignations.canceled_resignations')
    </div>
    <!-- /Page Wrapper -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({

                searchPanes:{
                    cascadePanes: true,
                    viewTotal: true,
                    controls: true,
                    emptyMessage: "<i><b> {{trans('general.none')}} </b></i>",

                },
                dom: 'Bfrtip',
                language:{
                    searchPanes:{
                        count: '{total} {{trans('general.employee_found')}}',
                        countFiltered: '{shown} / {total}',
                        clearMessage: "{{trans('general.clear_search')}}",
                        collapse: {0: "{{trans('general.advanced_search')}}", _: 'Search Options (%d)'}
                    },
                },
                buttons:[
                    {
                        extend: 'excel',
                        text: "{{__('general.export')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-success btn',
                    },{
                        extend: 'pdf',
                        text: "{{__('general.pdf')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-success btn',
                    },{
                        extend: 'print',
                        text: "{{__('general.print')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-danger btn',
                    },
                    {
                        extend: 'colvis',
                        text: "{{__('general.column_visibility')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-dark   btn ',
                    },

                ],
            });
            oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#mySearchText').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })
            $(".my-btn").removeClass( "dt-button" ).addClass( "btn");
            $('.dt-buttons').insertBefore('div.filter-row').addClass( "btn-group btn-group-lg");
        } );
    </script>
@endsection()
