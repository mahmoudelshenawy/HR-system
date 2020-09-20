<!-- Add business branch Modal -->
<div id="edit_loan{{$loan->id}}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_loan')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/loans/'.$loan->id)}}" >
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label data-toggle="tooltip" title="{{__('employee.cant_edit_code')}}" class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                                <select class="select " name="employee_id" >
                                    @foreach($employees as $employee)
                                        @if($loan->employee_id  == $employee->id)
                                            <option selected value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                            @break
                                        @else
                                            <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="focus-label">{{trans('employee.loan_date')}}</label>
                                <div class="cal-icon">
                                    <input type="text" name="loan_date"  class=" form-control floating datetimepicker" value="{{$loan->loan_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.loan_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="loan_amount" class="form-control" value="{{$loan->loan_amount}}">
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.installment_amount')}}<span class="text-danger">*</span></label>
                                <input type="number" name="installment_amount" class="form-control" value="{{$loan->installment_amount}}">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" >
                                <label class="focus-label">{{__('employee.installment_month')}}</label>
                                <div class="form-group form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker_monthly"  name="installment_month" value="{{$loan->installment_month}}">
                                    </div>
                                    <label class="focus-label">{{__('employee.installment_month')}}</label>
                                </div>
                            </div>
                        </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" >{{__('general.submit')}}</button>
                    </div>
                     </div>

            </form>
        </div>
    </div>
</div>
<!-- /Add business branch Modal -->
