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
                        <h3 class="page-title">{{__('nav.custodys')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.custodys')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_custady"><i class="fa fa-plus"></i>
                            {{__('employee.add_custady')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">

                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">{{__('nav.custodys')}}</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> {{__('general.search')}} </a>

                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>{{__('employee.custady_name')}}</th>
                                <th>{{__('employee.custady_number')}}</th>
                                <th>{{__('employee.custady_type')}}</th>
                                <th>{{__('employee.employee_name')}}</th>
                                <th>{{__('employee.custady_received_date')}}</th>
                                <th>{{__('employee.custady_expiry_date')}}</th>
                                <th>{{__('employee.statue')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($custadys as $custady)
                                <tr>
                                    <th>{{$custady->name}}</th>
                                    <th>{{$custady->custady_number}}</th>
                                    <th>{{DB::table('custody_types')->where('id',$custady->custady_type_id)->value('name')}}</th>
                                    <th>{{DB::table('employee_general_data')->where('id',$custady->employee_id)->value('employee_name')}}</th>
                                    <th>{{$custady->custady_received_date}}</th>
                                    <th>{{$custady->custady_expiry_date}}</th>
                                    <th>{{$custady->statue}}</th>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_custady{{$custady->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_custady{{$custady->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                         <!---    @include('employees.custodys.edit')
                             @include('employees.custodys.delete')-->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        @include('employees.custodys.add')

    </div>
    <!-- /Page Wrapper -->
@endsection
