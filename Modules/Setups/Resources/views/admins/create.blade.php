<form action="{{ route('admins.store') }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
  <div class="form-group row">
    <div class="col-md-6">
      <label for="name"><strong>Name :</strong></label>
      <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="col-md-6">
      <label for="username"><strong>Username :</strong></label>
      <input type="text" class="form-control" name="username" id="username">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="password"><strong>Password :</strong></label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="col-md-6">
      <label for="password_confirmation"><strong>Confirm Password :</strong></label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="email"><strong>Email :</strong></label>
      <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="col-md-6">
      <label for="phone"><strong>Phone :</strong></label>
      <input type="text" class="form-control" name="phone" id="phone">
    </div>
  </div>
  <div class="form-group">
      <label for="gender"><strong>Gender :</strong></label>
      <br>
      @if(is_array(genders()))
      @foreach (genders() as $key => $gender)
        <div class="icheck-primary d-inline">
          <input type="radio" id="gender-radio-{{$key}}" name="gender" value="{{$key}}" {{ (($key == 0) ? 'checked' : '') }}>
          <label for="gender-radio-{{$key}}" class="text-primary">
            {{$gender}}&nbsp;&nbsp;
          </label>
        </div>
      @endforeach
      @endif
  </div>
  <div class="form-group">
      <label for="role_id"><strong>Role :</strong></label>
      <br>
      @if(isset($roles[0]))
      @foreach ($roles as $key => $role)
        <div class="icheck-success d-inline">
          <input type="radio" id="status-radio-{{$role->id}}" name="role_id" value="{{$role->id}}" {{ (($key == 0) ? 'checked' : '') }}>
          <label for="status-radio-{{$role->id}}" class="text-success">
            {{$role->name}}&nbsp;&nbsp;
          </label>
        </div>
      @endforeach
      @endif
  </div>
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Save Admin</button>
</form>
<script type="text/javascript">
  $('.textarea').summernote();
</script>