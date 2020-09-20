@extends('layouts.app')

@section('content')
    <div class="page-wrapper " style="background-image: url({{asset('uploads/files/'.$branch->name.'/images/'.$branch->main_photo)}})">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img alt="" src="{{asset('uploads/files/'.$branch->name.'/images/'.$branch->logo)}}"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{$branch->name}}</h3>
                                                <h6 class="text-muted">{{$branch->businessType->name}}</h6>
                                                <small class="text-muted"></small>
                                                <div class="staff-id">{{$branch->contact_person}}</div>
                                                <div class="small doj text-muted">{{__('general.created at')}}: {{$branch->created_at}}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="#">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">{{__('business-setup.branch_phone')}}:</div>
                                                    <div class="text"><a href="">{{$branch->phone?? 'no'}}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">{{__('business-setup.branch_email')}}:</div>
                                                    <div class="text"><a href="">{{$branch->email}}</a></div>
                                                </li>

                                                <li>
                                                    <div class="title">{{__('business-setup.branch_address')}}:</div>
                                                    <div class="text">{{$branch->adress}}55</div>
                                                </li>
                                                <li>
                                                    <div class="title">{{__('business-setup.Branch Latitude')}}:</div>
                                                    <div class="text">{{$branch->latitude}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">{{__('business-setup.Branch Longitude')}}:</div>
                                                    <div class="text ">{{  $branch->longitude }}</div>
                                                </li>

                                                <li>
                                                    <div class="title">{{__('business-setup.Branch Contact Person')}}:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div class="avatar avatar-xs">
                                                                <img src="img/profiles/avatar-16.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <a href="profile">
                                                            Jeffery Lalor
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
@endsection
