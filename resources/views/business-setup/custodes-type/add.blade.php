<!-- Add business type Modal -->
<div id="add_custadytype" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.add_custady_type')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form method="post" action="{{url('business-setup/custodys-type')}}" id="businesstype">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="col-form-label">{{__('business-setup.add_custady_type')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <input class="form-control" type="text" name="custadyType" >
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
<!-- /Add business type Modal -->

