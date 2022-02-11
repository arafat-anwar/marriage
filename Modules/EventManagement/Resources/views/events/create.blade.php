<form action="{{ route('events.store') }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="event_type_id"><strong>Event Type :</strong></label>
    <select name="event_type_id" class="form-control select2bs4">
      @if(isset($eventTypes[0]))
      @foreach ($eventTypes as $key => $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
      @endif
    </select>
  </div>
  <div class="form-group">
    <label for="title"><strong>Title :</strong></label>
    <input type="text" class="form-control" name="title" id="title">
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="from"><strong>From :</strong></label>
      <input type="text" class="form-control datepicker" name="from" id="from">
    </div>
    <div class="col-md-6">
      <label for="to"><strong>To :</strong></label>
      <input type="text" class="form-control datepicker" name="to" id="to">
    </div>
  </div>
  <div class="form-group">
    <label for="desc"><strong>Description :</strong></label>
    <textarea name="desc" class="textarea"></textarea>
  </div>
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Save Event</button>
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