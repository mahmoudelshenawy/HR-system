<?php

function dropCheck_in($col , $day){
    foreach ($col as $key => $item) {
       if($item->day == $day){
          return $item->check_in;
       }
       continue;
}
};

function dropCheck_out($col , $day){
    foreach ($col as $key => $item) {
       if($item->day == $day){
          return $item->check_out;
       }
       continue;
}
};

function isExisted($col , $day){
    foreach ($col as $key => $item) {
       if($item->day == $day){
           return true;
       }
       continue;
    };
// $isIn = $col->map(function($item){
//     if($item->day == $day){
//         return true;
//     }
// });
// return $isIn;
}
?>

<div id="branch_attendence_rule" class="modal custom-modal fade" role="dialog" aria-modal="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('business-setup.branch_days_time')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <?php   $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']; ?>
            <div class="modal-body">
                <form>
                    <ul class="list-group col-12"  >

                        @foreach($days as $day)
                            <li class="list-group-item " style="background-color: transparent;border-bottom:1px solid gray" >
                                <div class="row ">
                                    <div class="col-3">
                                        <label >{{trans('general.'.$day)}}</label>

                                    <input type="checkbox" id="{{$day}}" class="check" name="days[{{$day}}]" {{isExisted($branch_attendence_rules , $day) == 'true' ? 'checked' : ''}}>
                                        <label for="{{$day}}" class="checktoggle">checkbox</label>

                                    </div>

                                <div id="check_time_{{$day}}"  class="col-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">{{trans('employee.check_in')}}</label>
                                            <input type="time" class="form-control text-success" name="check_in_{{$day}}" value="{{dropCheck_in($branch_attendence_rules , $day)}}"/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">{{trans('employee.check_out')}}</label>
                                                <input type="time" class="form-control text-danger" name="check_out_{{$day}}"  value="{{dropCheck_out($branch_attendence_rules , $day)}}"/>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>

                        @endforeach
               </ul >
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
@parent
@foreach($days as $day)
<script>
     function myFunction_{{$day}}() {
        var x = document.getElementById("check_time_{{$day}}");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    })
</script>
@endforeach

@endsection
