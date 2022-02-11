<form action="{{ route('holidays.store') }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="holiday_type_id"><strong>Holiday Type :</strong></label>
    <select name="holiday_type_id" class="form-control select2bs4">
      @if(isset($holidayTypes[0]))
      @foreach ($holidayTypes as $key => $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
      @endif
    </select>
  </div>
  <div class="form-group">
    <label for="name"><strong>Name :</strong></label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="date"><strong>Date :</strong></label>
    <input type="text" class="form-control datepicker" name="date" id="date">
  </div>
  <div class="form-group">
    <label for="desc"><strong>Description :</strong></label>
    <textarea name="desc" class="textarea"></textarea>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Save Holiday</button>
</form>
<script type="text/javascript">
  CKEDITOR.replaceAll( 'textarea' );
  
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

  $('.datepicker').datetimepicker({
    format: 'YYYY-MM-DD'
  });
</script>