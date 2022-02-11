<form action="{{ route('admins.update',$admin->id) }}" method="post" id="create-form" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="form-group">
    <label for="name"><strong>Name :</strong></label>
    <input type="text" class="form-control" name="name" id="name" value="{{$admin->name}}">
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="email"><strong>Email :</strong></label>
      <input type="text" class="form-control" name="email" id="email" value="{{$admin->email}}">
    </div>
    <div class="col-md-6">
      <label for="phone"><strong>Phone :</strong></label>
      <input type="text" class="form-control" name="phone" id="phone" value="{{$admin->phone}}">
    </div>
  </div>
  <div class="form-group">
      <label for="gender"><strong>Gender :</strong></label>
      <br>
      @if(is_array(genders()))
      @foreach (genders() as $key => $gender)
        <div class="icheck-primary d-inline">
          <input type="radio" id="gender-radio-{{$key}}" name="gender" value="{{$key}}" {{ (($key == $admin->gender) ? 'checked' : '') }}>
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
          <input type="radio" id="status-radio-{{$role->id}}" name="role_id" value="{{$role->id}}" {{ ($role->id == $admin->role_id ? 'checked' : '') }}>
          <label for="status-radio-{{$role->id}}" class="text-success">
            {{$role->name}}&nbsp;&nbsp;
          </label>
        </div>
      @endforeach
      @endif
  </div>
  @include('layouts.status', ['status' => $admin->status])
  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Update Admin</button>
</form>
<script type="text/javascript">
  $('.textarea').summernote();
</script>