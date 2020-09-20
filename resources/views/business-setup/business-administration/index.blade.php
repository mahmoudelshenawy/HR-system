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
                        <h3 class="page-title">{{__('business-setup.administrations')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.administration')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_business_administration"><i class="fa fa-plus"></i>
                            {{__('business-setup.addBusinessAdministration')}}</a>
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
                        <label class="focus-label">{{__('business-setup.administrations')}}</label>
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
                                <th>{{trans('business-setup.code')}}</th>
                                <th>{{__('business-setup.administration')}}</th>
                                <th class="text-nowrap">{{__('business-setup.branch')}}</th>
                                <th class="text-nowrap"></th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($administrations as $administration)
                                <tr>
                                    <td>{{$administration->id}}</td>
                                    <td>{{$administration->name}}</td>
                                    <td>
                                    <a href="{{url('business-setup/business-branch/'.$administration->businessBranch->id)}}">
                                        <span>{{$administration->businessBranch->name}}</span>
                                    </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn add-btn" style="min-width: 70px">
                                            {{__('business-setup.Departments') ." : "}}
                                        {{DB::table('business_departments')->where('business_administration_id',$administration->id)->count()}}

                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_business_admininstration{{$administration->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_business_admininstration{{$administration->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('business-setup.business-administration.edit')
                                @include('business-setup.business-administration.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

       @include('business-setup.business-administration.add')



    </div>
    <!-- /Page Wrapper -->
@endsection

