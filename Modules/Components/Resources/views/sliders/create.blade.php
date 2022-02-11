<form action="{{ route('sliders.store') }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="title"><strong>Title:</strong></label>
    <input type="text" class="form-control" name="title" id="title">
  </div>
  <div class="form-group">
    <label for="desc"><strong>Description:</strong></label>
    <textarea name="desc" class="textarea"></textarea>
  </div>
  <div class="form-group">
    <label for="file"><strong>Slider:</strong></label>
    <input type="file" name="file" id="file" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Save Slider</button>
</form>
<script type="text/javascript">
  $('.textarea').summernote();
</script>