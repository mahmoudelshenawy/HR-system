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
                        <h3 class="page-title">{{__('business-setup.Business Type')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.Business Type')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_business_type"><i class="fa fa-plus"></i>
                            {{__('business-setup.addBusinessType')}}
                        </a>
                        <div class="view-icons">
                            @if(count(App\BusinessType::onlyTrashed()->get()) > 0)
                            <a href="{{url('business-setup/business-type/deleted-types')}}" class="list-view btn btn-link"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
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
                        <label class="focus-label">{{__('business-setup.Business Type')}}</label>
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
                        <table class="table table-striped custom-table datatable table-radius table-activeab">
                            <thead>
                            <tr>
                                <th>{{trans('business-setup.code')}}</th>
                                <th>{{__('business-setup.Business Type')}}</th>
                                <th class="text-nowrap">{{__('business-setup.business_branch_count')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($businessType as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                    <td><a href="#" class="btn btn-secondary" style="min-width: 70px">{{$type->business_branch_count}}</a></td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-outline-primary" href="#" data-toggle="modal"  data-target="#edit_business_type{{$type->id}}"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-sm btn-outline-danger {{($type->business_branch_count > 0 ? 'disabled':'')}}"
                                           title="{{($type->business_branch_count > 0 ? trans('general.cant_delete'):trans('general.delete'))}}" href="#" data-toggle="modal" data-target="#delete_business_type{{$type->id}}"><i class="fa fa-trash-o" ></i> </a>
                                    </td>
                                </tr>
                            @include('business-setup.business-type.edit')
                            @include('business-setup.business-type.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

       @include('business-setup.business-type.add')





    </div>
    <!-- /Page Wrapper -->
@endsection
