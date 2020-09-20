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
                        <h3 class="page-title">{{__('business-setup.deleted_types')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.deleted_types')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_business_type"><i class="fa fa-plus"></i>
                            {{__('business-setup.addBusinessType')}}
                        </a>
                        <div class="view-icons">
                            <a href="{{url('business-setup/business-type')}}" class="list-view btn btn-link"><i class="fa fa-reply-all"></i></a>
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
                        <label class="focus-label">{{__('business-setup.deleted_types')}}</label>
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
                        <table class="table table-danger custom-table datatable table-radius table-active">
                            <thead>
                            <tr>
                                <th>{{trans('business-setup.code')}}</th>
                                <th>{{__('business-setup.Business Type')}}</th>
                                <th>{{__('general.delete_date')}}</th>
                                <th class="text-right no-sort">{{__('general.restore')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($businessType as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                    <td class="text-danger">{{$type->deleted_at}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-custom" href="{{url('business-setup/business-type/restore/'.$type->id)}}"  ><i class="fa fa-reply text-secondary" title="{{__('general.restore')}}"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->
@endsection
