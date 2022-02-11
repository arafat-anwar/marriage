<form action="{{ route('event-types.update',$type->id) }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="name"><strong>Name :</strong></label>
    <input type="text" class="form-control" name="name" id="name" value="{{$type->name}}">
  </div>
  <div class="form-group">
    <label for="desc"><strong>Description :</strong></label>
    <textarea name="desc" class="textarea">{{$type->desc}}</textarea>
  </div>

  @include('layouts.status', ['status' => $type->status])
  
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update Event Type</button>
</form>
<script type="text/javascript">
  CKEDITOR.replaceAll( 'textarea' );
</script>