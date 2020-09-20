<!-- Add  guarantor Modal -->
<div id="edit_guarantor{{$guarantor->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.editGuarantor')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form method="post" action="{{url('business-setup/guarantor/'.$guarantor->id)}}" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Code')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorCode"  value="{{$guarantor->code}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="guarantorName"  value="{{$guarantor->name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Phone')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="number" name="guarantorPhone" value="{{$guarantor->phone}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Address')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="guarantorAddress" value="{{$guarantor->address}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.Guarantor Image')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="file" name="guarantorImage" value="{{$guarantor->img}}">
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
<!-- /Add   Modal -->

