
<div id="canceled_resignation" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.canceled_resignation')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-danger datatable table-nowrap">
                                    <thead>
                                    <tr>
                                        <th>{{trans('employee.name')}}</th>
                                        <th>{{__('employee.resignation_date')}}</th>
                                        <th>{{__('employee.resignation_reason')}}</th>
                                        <th>{{__('employee.resignation_approved_by')}}</th>
                                        <th>{{__('general.canceled_at')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($canceled_resignations as $canceled_resignation)
                                    <tr>
                                        <td>{{__(DB::table('employee_general_data')->where('id',$canceled_resignation->employee_id)->value('employee_name'))}}</td>
                                        <td>{{$canceled_resignation->date}}</td>
                                        <td>{{$canceled_resignation->reason}}</td>
                                        <td>
                                       <span class="badge-danger">
                                           {{$user = Db::table('users')->where('id',$canceled_resignation->created_by)->value('name')}}
                                       </span>
                                        </td>
                                        <td>{{$canceled_resignation->deleted_at}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
