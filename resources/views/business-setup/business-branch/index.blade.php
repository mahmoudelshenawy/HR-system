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
                        <h3 class="page-title">{{__('business-setup.branches')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('business-setup.branches')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('create_branch')}}" class="btn add-btn"><i class="fa fa-plus"></i>
                            {{__('business-setup.addBusinessBranch')}}</a>
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
                        <label class="focus-label">{{__('business-setup.branches')}}</label>
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
                                <th>{{__('business-setup.branch')}}</th>
                                <th>{{__('business-setup.branch_manager')}}</th>
                                <th>{{__('employee.employees')}}</th>
                                <th>{{__('business-setup.branch_phone')}}</th>
                                <th>{{__('business-setup.branch_email')}}</th>
                                <th>{{__('business-setup.branch_address')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branch as $branch)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{url('business-setup/business-branch/'.$branch->id)}}" class="avatar">
                                                @if($branch->logo)
                                                <img alt="" src="{{asset('uploads/files/branches'.$branch->name.'/images/'.$branch->logo)}}">@else
                                                <img alt="" src="{{asset('img/ArSoftware..gif')}}">
                                                @endif
                                            </a>
                                            <a href="{{url('business-setup/business-branch/'.$branch->id)}}" >{{$branch->name}}<span>{{$branch->businessType->name}}</span></a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            @if($branch->manager_id)
                                                <a href="{{DB::table('employee_general_data')->where('id',$branch->manager_id)->value('id')}}" class="avatar" data-toggle="tooltip" title="" data-original-title="{{$branch->manager_id}}">
                                                    <img alt="" src="{{asset('uploads/files/employees/code/'.DB::table('employee_general_data')->where('id',$branch->manager_id)->value('code').'/'.DB::table('employee_general_data')->where('id',$branch->manager_id)->value('employee_img') ) }}">
                                                </a>
                                            @endif
                                            <a>
                                                <span> {{DB::table('employee_general_data')->where('id',$branch->manager_id)->value('employee_name')}}</span>
                                            </a>
                                        </h2>
                                    </td>
                                    <td>
                                        <ul class="team-members text-nowrap">
                                            @foreach(App\EmployeeGeneralData::where('branch_id',$branch->id)->take(3)->get() as $employee)
                                                <li>
                                                    <a href="#" title="{{$employee->employee_name}}" data-toggle="tooltip"><img alt="" src="{{($employee->employee_img ? asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img): asset('img/user.jpg')) }}"></a>
                                                </li>
                                            @endforeach
                                            <li class="dropdown avatar-dropdown">
                                                @if((App\EmployeeGeneralData::where('branch_id',$branch->id)->count() - 3) > 0 )
                                                    <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        {{'+'.(App\EmployeeGeneralData::where('branch_id',$branch->id)->count() - 3) }}
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <div class="avatar-group">
                                                                @foreach(App\EmployeeGeneralData::where('branch_id',$branch->id)->skip(3)->take(9)->get() as $employee)
                                                                    <a class="avatar avatar-xs" href="#">
                                                                        <img alt="" src="{{($employee->employee_img ? asset('uploads/files/employees/code/'.$employee->code.'/'.$employee->employee_img): asset('img/user.jpg')) }}">
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <div class="avatar-pagination">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{url('business-setup/business-branch/'.$branch->id)}}" >
                                                                            <span aria-hidden="true">{{__('general.more')}}</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                @else
                                                @endif
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="tel:{{$branch->phone}}" class="text-secondary">{{$branch->phone}}</a>
                                    </td>
                                    <td>
                                        <a href="mailto:{{$branch->email}}}" class="text-info">{{$branch->email}}</a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="https://www.google.com/maps/place/:{{$branch->address}}" class="text-purple">  {{$branch->address}}</a>
                                    </td>
                                    <td class="text-right">

                                    </td>
                                </tr>
                                @include('business-setup.business-branch.delete')
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
