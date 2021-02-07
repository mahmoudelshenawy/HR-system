<div id="add_allowance_excel" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('salary.allowance')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<div class="modal-body">
    <form action="{{ url('salary/allowance/import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <?php $months = ['January' , 'February' , 'March' , 'April' , 'May' , 'June' , 'July' , 'August' , 'September' , 'October' , 'November', 'December']; ?>
                    <div class="form-group">
                        <label class="col-form-label">{{__('salary.month')}}<span class="text-danger">*</span></label>
                        <select class="js-example-matcher-start" name="month">
                            @foreach($months as $month)
                                <option value="{{$month}}">{{ trans('general.' . $month) }}</option>
                            @endforeach
                        </select>
                    </div>
                
            </div>
     <div class="col-6 d-flex align-items-center justify-content-center ">
    <label class="btn btn-info btn-lg">
        {{ trans('general.upload_excel') }} <input type="file" name="file" hidden>
    </label>
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
