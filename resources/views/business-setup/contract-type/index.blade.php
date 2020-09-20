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
                        <h3 class="page-title">{{__('business-setup.Contract Type')}}</h3>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_contract_type"><i class="fa fa-plus"></i>
                            {{__('business-setup.addContractType')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-6">

                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">{{__('business-setup.Contract Type')}}</label>
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
                        <table class="table table-striped custom-table datatable table-radius">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('business-setup.Contract Type')}}</th>
                                <th class="text-nowrap">{{__('business-setup.Arabic Contract Type')}}</th>
                                <th class="text-nowrap">{{__('business-setup.Statue')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contractType as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                    <td>
                                    @if(!$type->arabic_name)
                                     <a data-target="#edit_contract_type{{$type->id}}" data-toggle="modal" class="btn btn-warning" href="#"><i class="fa fa-pencil "></i></a>
                                    @else
                                    {{$type->arabic_name}}
                                    @endif
                                    </td>
                                    <td>
                                    @if($type->statue == 1)
                                       <span class="badge bg-inverse-info">{{__('general.statue Active')}}</span>
                                    @else
                                        <span class="badge bg-inverse-danger">{{__('general.statue Inactive')}}</span>
                                    @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action" {{$type->id <= 4 ? 'hidden': ''}}>
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#edit_contract_type{{$type->id}}"><i class="fa fa-pencil m-r-5"></i> {{__('general.edit')}}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_contract_type{{$type->id}}"><i class="fa fa-trash-o m-r-5"></i> {{__('general.delete')}}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('business-setup.contract-type.edit')
                                @include('business-setup.contract-type.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

       @include('business-setup.contract-type.add')





    </div>
    <!-- /Page Wrapper -->
@endsection
