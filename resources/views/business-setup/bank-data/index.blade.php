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
                        <h3 class="page-title">{{__('business-setup.bank_data')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.bank-data')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_bank"><i class="fa fa-plus"></i>
                            {{__('business-setup.add_bank')}}</a>
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
                        <label class="focus-label">{{__('business-setup.bank-data')}}</label>
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
                                <th>{{__('business-setup.bank_code')}}</th>
                                <th>{{__('business-setup.bank_name')}}</th>
                                <th>{{__('business-setup.bank_phone')}}</th>
                                <th>{{__('business-setup.bank_address')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banks as $bank)
                                <tr>
                                    <td>{{$bank->code}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->phone}}</td>
                                    <td>{{$bank->address}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_bank{{$bank->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_bank{{$bank->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('business-setup.bank-data.edit')
                                @include('business-setup.bank-data.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        @include('business-setup.bank-data.add')

    </div>
    <!-- /Page Wrapper -->
@endsection
