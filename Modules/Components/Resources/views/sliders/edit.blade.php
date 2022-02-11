<form action="{{ route('sliders.update', $slider->id) }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="title"><strong>Title:</strong></label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}">
  </div>
  <div class="form-group">
    <label for="desc"><strong>Description:</strong></label>
    <textarea name="desc" class="textarea">{{ $slider->desc }}</textarea>
  </div>

  <div class="form-group">
    <label for="file"><strong>Slider:</strong></label>
    <input type="file" name="file" id="file" class="form-control">
  </div>

  @include('layouts.status', ['status' => $slider->status])

  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update Slider</button>
</form>
<script type="text/javascript">
  $('.textarea').summernote();
</script>