@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{trans('employee.profile')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('employee.profile')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

           @include('employees.employee_profile_parts.personal_data')

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">{{trans('employee.personal_data')}}</a></li>
                            <li class="nav-item"><a href="#emp_work_data" data-toggle="tab" class="nav-link">{{trans('employee.work_data')}}</a></li>
                            <li class="nav-item"><a href="#emp_insurance" data-toggle="tab" class="nav-link">{{trans('employee.insurance_data')}} <small class="text-danger"></small></a></li>
                            <li class="nav-item"><a href="#bank_data" data-toggle="tab" class="nav-link">{{trans('employee.banking_data')}}<small class="text-danger"></small></a></li>

                        </ul>
                    </div>
                </div>
            </div>
@include('layouts.partials.flash-messages')
            <div class="tab-content">
                <!-------employee_files_data----->
             @include('employees.employee_profile_parts.employee_files_data')
                <!-- end employee_files_data -->

                <!-------work_data----->
              @include('employees.employee_profile_parts.work_data')
               <!-- end work_data -->

                <!-- insurance_data -->
                @include('employees.employee_profile_parts.insurance_data')
                <!-- end insurance_data -->

             <!-- bank_data -->
                @include('employees.employee_profile_parts.bank_data')
                <!-- end bank_data -->

            </div>



        </div>
    </div>
        <!-- /Page Content -->
    <form action="{{url('employees/update/'.$employee->id)}}" method="Post"  enctype="multipart/form-data">
        <input type="hidden" name="branch_id" value="{{$employee->branch_id}}">
        <input type="hidden" name="employee_code" value="{{$employee->code}}">
        <input name="_method" type="hidden" value="PUT">
        @csrf
           @include('employees.employee_profile_edit_parts.edit_personal_data')
           @include('employees.employee_profile_edit_parts.edit_employee_files_data')
           @include('employees.employee_profile_edit_parts.edit_work_data')
           @include('employees.employee_profile_edit_parts.edit_insurance_data')
           @include('employees.employee_profile_edit_parts.edit_bank_data')
    </form>
@endsection

