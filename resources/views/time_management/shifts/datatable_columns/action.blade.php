<a class=" btn-sm btn-outline-info" href="#" data-toggle="modal" data-target="#edit_shift{{$id}}"><i class="fa fa-edit " ></i> </a>
<a class=" btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#delete_shift{{$id}}"><i class="fa fa-trash " ></i> </a>

@include('time_management.shifts.edit')
@include('time_management.shifts.delete')
<script>
    $(".js-example-matcher-start").select2({
        width: '100%',
        minHeight:'100%',
        lineHeight:'44px',
    });
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'en'
    });
</script>
