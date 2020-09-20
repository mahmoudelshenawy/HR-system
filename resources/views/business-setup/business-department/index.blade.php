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
                        <h3 class="page-title">{{__('business-setup.Departments')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.Departments')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_administration_department"><i class="fa fa-plus"></i>
                            {{__('business-setup.addDepartment')}}</a>
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
                        <label class="focus-label">{{__('business-setup.Departments')}}</label>
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
                        <table class="table table-striped custom-table datatable table-border">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('business-setup.Administration Department')}}</th>
                                <th class="text-nowrap">{{__('business-setup.administration')}}</th>
                                <th class="text-nowrap">{{__('business-setup.branch')}}</th>
                                <th class="text-nowrap"></th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->id}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>
                                    <a href="{{url('business-setup/business-administration/')}}" class="btn btn-outline-secondary">
                                        <span>{{$department->administration->name}}</span>
                                    </a>
                                    <td>

                                    <a href="{{url('business-setup/business-branch/'.$administration->find($department->administration->id)->businessBranch->id)}}">
                                        <span style="color: #a71d2a">{{$administration->find($department->administration->id)->businessBranch->name}}</span>
                                    </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn add-btn" style="min-width: 70px">
                                            {{ __('nav.Job'). " : ".DB::table('business_jobs')->where('business_department_id',$department->id)->count()}}
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_department{{$department->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department{{$department->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('business-setup.business-department.edit')
                                @include('business-setup.business-department.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        @include('business-setup.business-department.add')
    </div>
    <!-- /Page Wrapper -->
@endsection

