@extends('layouts.index')

@section('content')
<script src="{{url('public/lte')}}/plugins/jquery/jquery.min.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card card-success">
				<div class="card-header">
					<h5 class="mb-0"><strong>My Profile Information</strong></h5>
				</div>
				<div class="card-body">
					<form action="{{ route('my-profile.store') }}" method="post" id="profile-form" enctype="multipart/form-data">
					@csrf
						<div class="form-group row">
							<div class="col-6 mb-3">
								<label for="name"><strong>Name</strong></label>
								<input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="form-control">
							</div>
							<div class="col-6 mb-3">
								<label for="username"><strong>Username</strong></label>
								<input type="text" name="username" id="username" value="{{ auth()->user()->username }}" class="form-control">
							</div>
							<div class="col-6 mb-3">
								<label for="phone"><strong>Phone number</strong></label>
								<input type="text" name="phone" id="phone" value="{{ auth()->user()->phone }}" class="form-control">
							</div>
							<div class="col-6 mb-3">
								<label for="email"><strong>Email Address</strong></label>
								<input type="email" name="email" id="email" value="{{ auth()->user()->email }}" class="form-control">
							</div>
						</div>
						<div class="form-group mb-4">
						  <label for="gender"><strong>Gender:</strong></label>
						  <br>
						  @foreach(genders() as $key => $gender)
						  <div class="icheck-primary d-inline">
						    <input type="radio" id="gender-radio-{{ $key }}" name="gender" value="{{ $key }}" {{ ((auth()->user()->gender == $key) ? 'checked' : '') }}>
						    <label for="gender-radio-{{ $key }}" class="text-primary">
						      {{ $gender }}&nbsp;&nbsp;
						    </label>
						  </div>
						  @endforeach
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Update Profile Information</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card card-primary">
				<div class="card-header">
					<h5 class="mb-0"><strong>My Image</strong></h5>
				</div>
				<div class="card-body">
					<form action="{{ route('my-image.store') }}" method="post" id="image-form" enctype="multipart/form-data">
					@csrf
						<div class="form-group mb-4" id="image_div">
							<div class="input-group">
							  <div class="custom-file">
							    <input type="file" class="custom-file-input" id="image" name="file">
							    <label class="custom-file-label" for="image">Choose file</label>
							  </div>
							</div>
						</div>
						<div class="form-group" id="preview_div" style="display: none">
							<img id="preview" src="" class="img img-fluid" />
						</div>
						<div class="form-group row">
							<div class="col-6">
								<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-upload"></i>&nbsp;Upload Photo</button>
							</div>
							<div class="col-6">
								<a class="btn btn-danger text-white btn-block" id="remove_button" style="display: none;cursor: pointer;" onclick="removeImage()"><i class="fa fa-times"></i>&nbsp;Remove</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card card-info">
				<div class="card-header">
					<h5 style="margin-bottom: 0px !important"><strong>Preferences</strong></h5>
				</div>
				<div class="card-body">
					<form action="{{ route('my-preferences.store') }}" method="post">
					  @csrf
					    <div class="form-group">
						  <label for="sound"><strong>Notification Sound :</strong></label>
						  <br>
						  <div class="icheck-primary d-inline">
						    <input type="radio" id="sound-radio-1" name="sound" value="1" {{ ((auth()->user()->sound == 1) ? 'checked' : '') }}>
						    <label for="sound-radio-1" class="text-primary">
						      On&nbsp;&nbsp;
						    </label>
						  </div>
						  <div class="icheck-danger d-inline">
						    <input type="radio" id="sound-radio-0" name="sound" value="0" {{ ((auth()->user()->sound == 0) ? 'checked' : '') }}>
						    <label for="sound-radio-0" class="text-danger">
						      Off&nbsp;&nbsp;
						    </label>
						  </div>
						</div>
					    <button class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Update Preferences</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#image").change(function() {
		  previewImage(this);
		});
	});

	function previewImage(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#preview').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]);

	    $('#preview_div').show();
	    $('#remove_button').show();
	    $('#image_div').hide();
	  }
	}

	function removeImage(){
		$('#preview').attr('src','#');
		$('#preview_div').hide();
		$('#remove_button').hide();
	    $('#image_div').show();
	    $('#image-form')[0].reset();
	}
</script>
@endsection