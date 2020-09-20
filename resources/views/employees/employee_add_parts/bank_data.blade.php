

<div id="bank_data" class="tab-pane fade" >
    <div class="col-8 offset-1" style="padding-top: 30px">
        <div class="none-border" style="background-color: transparent">
            <div class="row ">
                <div class="form-group col-6 ">
                    <label class="text-muted">{{trans('employee.bank_name')}}</label>
                    <select name="employee_bank_id" class="select2-dropdown js-example-matcher-start form-control" >
                        <option disabled value selected>{{trans('employee.select')}}</option>
                        @foreach(DB::table('bank_data')->get() as $bank)
                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label class="text-muted">{{trans('employee.bank_account_number')}}</label>
                    <input type="text" name="employee_account_number" class="form-control">
                </div>
                <div class="form-group col-6">
                </div>
                <div class="form-group col-6">
                    <label class="text-muted">{{trans('employee.bank_account_name')}}</label>
                    <input type="text" name="employee_bank_account_name" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>


