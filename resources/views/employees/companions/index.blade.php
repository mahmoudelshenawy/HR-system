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
                        <h3 class="page-title">{{__('employee.companions')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.companions')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_companion"><i class="fa fa-plus"></i>
                            {{__('employee.add_companion')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-12 col-md-9">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">{{__('nav.companions')}}</label>
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
                        <table class="table table-striped custom-table mb-0 datatable dataTable no-footer">
                            <thead>
                            <tr>
                                <th>{{__('employee.name')}}</th>
                                <th>{{__('employee.birth_date')}}</th>
                                <th>{{__('employee.employee_companion')}}</th>
                                <th>{{__('employee.relative_relation')}}</th>
                                <th>{{__('employee.national_id')}}</th>
                                <th>{{__('employee.residence_number')}}</th>
                                <th></th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companions as $companion)
                                <tr>

                                    <td><a href="#" data-toggle="modal" class="" data-target="#view_companion{{$companion->id}}">{{__($companion->name)}}</a>  </td>
                                    <td>{{__($companion->birth_date)}}</td>
                                    <td>{{__(DB::table('employee_general_data')->where('id',$companion->employee_id)->value('employee_name'))}}</td>
                                    <td>{{$companion->relative_relation}}</td>
                                    <td>{{$companion->national_id}}</td>
                                    <td>{{$companion->residance_number}}</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                @if($companion->statue == 1)
                                                <i class="fa fa-dot-circle-o text-success"></i>{{__('employee.active')}}
                                                @else
                                                    <i class="fa fa-dot-circle-o text-danger"></i>{{__('employee.inactive')}}
                                                @endif
                                            </a>
                                        </div>

                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_companion{{$companion->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_companion{{$companion->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                             @include('employees.companions.edit')
                             @include('employees.companions.delete')
                             @include('employees.companions.view')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        @include('employees.companions.add')

    </div>
    <!-- /Page Wrapper -->
@endsection
