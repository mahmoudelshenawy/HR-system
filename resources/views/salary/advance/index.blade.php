@push('scripts')
<script>
    function getAdvanceData(id){
        $.ajax({
url:`advance/${id}`,
dataType:'json',
type:'get',
success:function(data){
    console.log(data.data)
    if(data.data.id === id){
    $(`#employee_id_${id}`).val(data.data.employee_id)
    $(`#month_${id}`).val(data.data.month)
    $(`#advance_amount_${id}`).val(data.data.advance_amount)
    }
},
error(response){
  
}
});
    }
  
function handleAdvanceSubmit(id){
    var employee_id =  $(`#employee_id_${id}`).val()
    var month = $(`#month_${id}`).val()
    var advance_amount = $(`#advance_amount_${id}`).val()
   

   $.ajax({
url:`advance/${id}`,
dataType:'json',
type:'PUT',
data:{_token : '{{csrf_token()}}' , employee_id , month , advance_amount },
beforeSend: function(){
    
},
success:function(data){
   
    // location.reload(true);
},
error(response){
console.log(response)
}
});
  } 
</script>
@endpush
@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{trans('nav.advance')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{trans('/home')}}">{{trans('nav.Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('nav.advance')}}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_advance"><i class="fa fa-plus"></i>
                            {{__('time_management.add')}}</a>
                            <a href="#" class="btn add-btn" style="display: block ; margin-left : 10px" data-toggle="modal" data-target="#add_advance_excel"><i class="fa fa-plus"></i>
                                {{__('time_management.upload_excel')}}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card-body card">
                <div class="col-md-12 ">
                    <div class="table-responsive ">
                        {!!  $dataTable->table(['class'=>' dataTable table-radius table-nowrap table'],true) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@include('salary.advance.add')
@include('salary.advance.add_excel')
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}

    
@endpush
