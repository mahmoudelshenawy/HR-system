@extends('layouts.app')


@section('content')

    <div class="page-wrapper" style="min-height: 625px; padding-top: 0px">
        <!-- Page Content -->
        <div class="content container-fluid">
        <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('user.users')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">{{__('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('user.users')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        {{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i>
                            {{__('user.add')}}</a> --}}
                        <a href="{{url('users/create')}}" class="btn add-btn"><i class="fa fa-plus"></i>{{__('user.add')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-8 offset-2">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" id="mySearchText">
                        <label class="focus-label">{{__('user.users')}}</label>
                    </div>
                </div>

            </div>
            <!-- /Search Filter -->
            @include('layouts.partials.flash-messages')
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped display  " id="myTable">
                            <thead>
                            <tr>
                                <th>{{__('user.user_name')}}</th>
                                <th>{{__('user.email')}}</th>
                                <th>{{__('user.employee')}}</th>
                                <th>{{__('user.role')}}</th>
                                <th class="text-right no-sort">{{__('general.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{DB::table('employee_general_data')->where('id',$user->employee_id)->value('employee_name')}}</td>
                                    @foreach ($user->roles as $role)
                                        <td>{{$role->name }}</td>
                                    @endforeach
                                    <td class="text-right">
                                        @if(auth()->user()->hasPermission('users-delete'))

                                    <a class="btn btn-sm btn-outline-primary" href="{{url('users/' . $user->id . '/edit')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @else
                                        <a class="btn btn-sm btn-outline-danger disabled" disabled href="#">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        @endif
                                        @if(auth()->user()->hasPermission('users-delete'))
                                            <a class="btn btn-sm btn-outline-danger"  href="#" data-toggle="modal"  data-target="#delete_user{{$user->id}}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @else
                                        <a class="btn btn-sm btn-outline-danger" disabled href="#" >
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        @endif
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
        @include('users.delete')
    </div>
@endsection




@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({

                searchPanes:{
                    cascadePanes: true,
                    viewTotal: true,
                    controls: false,
                    emptyMessage: "<i><b> {{trans('general.none')}} </b></i>",

                },
                dom: "Bfrtip",

                buttons:[
                    {
                        extend: 'excel',
                        text: "{{__('general.export')}}",
                        className: 'my-btn btn-secondary btn-lg '
                    },
                    {
                        extend: 'colvis',
                        text: "{{__('general.column_visibility')}}",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        },
                        className: 'my-btn btn-secondary btn-lg ',
                    },
                ],
            });
            oTable = $('#myTable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
            $('#mySearchText').keyup(function(){
                oTable.search($(this).val()).draw() ;
            })

            $(".my-btn").removeClass( "dt-button" ).addClass( "btn");
            $('.dt-buttons').insertBefore('div.filter-row').addClass( "btn-group");

        } );
    </script>
@endsection
