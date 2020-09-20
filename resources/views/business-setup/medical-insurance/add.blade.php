<!-- Add business branch Modal -->
<div id="add_medical_insurance" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.add_medical_insurance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('business-setup/medical-insurance-data')}}" >
                    @csrf()
                    <div class="row">

                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.medical_insurance_code')}} <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="code" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.medical_insurance_name')}}<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.medical_insurance_phone')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="tel" name="phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('business-setup.medical_insurance_address')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="address">
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
<!-- /Add business branch Modal -->

