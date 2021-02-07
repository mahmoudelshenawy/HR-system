<!-- Delete business branch Modal -->
<div class="modal custom-modal fade" id="delete_movement{{$id}}" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>{{__('employee.delete_movement')}}</h3>
                    <p>{{__('general.daleteWarning')}}</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <form method="post" action="{{url('employees/movement/'.$id)}}">
                                @csrf()
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit"  class="btn btn-primary btn-lg continue-btn" value="{{__('general.deleteConfirm')}}">
                            </form>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('general.cancel')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete business branch Modal -->
