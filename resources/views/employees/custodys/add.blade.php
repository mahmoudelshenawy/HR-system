<!-- Add business branch Modal -->
<div id="add_custady" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('employee.add_custady')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{url('employees/custodys')}}" >
            <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.select_employee')}}<span class="text-danger">*</span></label>
                                <select class="select" name="employee_id" >
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.name')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" >
                            </div>
                        </div>
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_number')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="custady_number" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_type')}}<span class="text-danger">*</span></label>
                                <select class="select" name="custady_type_id" >
                                    @foreach($custadys_types as $custadys_type)
                                            <option value="{{$custadys_type->id}}">{{$custadys_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class=" form-focus focused">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custady_received_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custady_received_date')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class=" form-focus focused ">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker"  name="custady_expiry_date" >
                                    </div>
                                    <label class="focus-label">{{__('employee.custady_expiry_date')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('employee.custady_data')}}<span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="custady_data">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="h3 card-title with-switch">
                                {{__('employee.statue')}}
                                <div class="onoffswitch">
                                    <input type="checkbox" name="statue" class="onoffswitch-checkbox" id="active_statue"  checked>
                                    <label class="onoffswitch-label" for="active_statue">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
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

<script>

    function myFunction() {
        var y = document.getElementById('insurance')
        if ( y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }
</script>
