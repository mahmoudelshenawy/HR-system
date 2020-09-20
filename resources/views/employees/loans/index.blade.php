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
                        <h3 class="page-title">{{__('employee.loans')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.loans')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_loan"><i class="fa fa-plus"></i>
                            {{__('employee.add_loan')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-12 col-md-9">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">{{__('employee.loans')}}</label>
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
                                <th>{{__('employee.loan_date')}}</th>
                                <th>{{__('employee.loan_amount')}}</th>
                                <th>{{__('employee.installment_month')}}</th>
                                <th>{{__('employee.installment_amount')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                <tr>
                                    <td>{{__(DB::table('employee_general_data')->where('id',$loan->employee_id)->value('employee_name'))}}</td>
                                    <td>{{$loan->loan_date}}</td>
                                    <td>{{$loan->loan_amount}}</td>
                                    <td>{{$loan->installment_month}}</td>
                                    <td>{{$loan->installment_amount}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_loan{{$loan->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_companion{{$loan->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('employees.loans.edit')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        @include('employees.loans.add')

    </div>
    <!-- /Page Wrapper -->
@endsection
