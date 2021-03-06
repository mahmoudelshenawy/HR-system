<!-- edit business type Modal -->
<div id="edit_business_type{{$type->id}}" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editBusinessType')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/business-type/'.$type->id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label">{{__('business-setup.Business Type')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <input class="form-control" type="text" name="businessType"  value="{{$type->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /edit business type Modal -->
