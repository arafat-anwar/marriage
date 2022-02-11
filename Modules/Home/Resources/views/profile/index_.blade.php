@extends('home::layouts.index')
@section('content')
<style type="text/css">
    .table td{
        border-top: none !important;
        padding: 8px 5px 8px 0px  !important;
    }
    hr{
        margin-top: 3px !important;
    margin-bottom: 3px !important;
    }
</style>
<div class="py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-4 mx-auto">
                <div class="card card-info mt-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        @if(!empty($user->image) && file_exists(public_path('user-images/'.$user->image)))
                                          <img src="{{ url('public/user-images/'.$user->image) }}" style="max-width: 90%;">
                                        @else
                                          <img src="{{ url('public/'.($user->gender == 0 ? 'female' : 'male').'.jpg') }}" style="max-width: 90%;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h2 class="mb-3"><strong>{{ $user->name }}</strong></h2>
                                <hr>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%">User Name</td>
                                            <td>
                                                <strong>{{ $user->username }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Email Address</td>
                                            <td>
                                                <strong>{{ $user->email }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Gender</td>
                                            <td>
                                                <strong>{{ genders()[$user->gender] }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Member Since</td>
                                            <td>
                                                <strong>{{ date('F j, Y g:i a', strtotime($user->created_at)) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Membership Remaining</td>
                                            <td>
                                                <strong>160 days</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Total Search</td>
                                            <td>
                                                <strong>10</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Total Match</td>
                                            <td>
                                                <strong>10</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Total Profile View</td>
                                            <td>
                                                <strong>10</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a class="btn btn-xs btn-info text-white" style="cursor: pointer;" data-toggle="modal" data-target="#updateProfile"><i class="fa fa-edit"></i>&nbsp;Update Profile</a>
                                                <a  style="cursor: pointer;" data-toggle="modal" data-target="#updatePassword" class="btn btn-xs btn-success text-white">Change Password</a>
                                                <a href="{{ url('signout') }}" class="btn btn-xs btn-danger">Sign Out</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="updateProfile">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Profile Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-label" for="relation">Profile for</label>
                        <select class="form-control select2bs4" name="relation" id="relation" required>
                            @foreach(relations() as $key => $relation)
                                <option value="{{ $key }}" {{ $user->relation == $key ? 'selected' : '' }}>{{ $relation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-label" for="gender">Gender</label>
                        <select class="form-control select2bs4" name="gender" id="gender" required>
                            @foreach(genders() as $key => $gender)
                                <option value="{{ $key }}" {{ $user->gender == $key ? 'selected' : '' }}>{{ $gender }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
             <div class="col-md-6 mb-4">
                <label for="name"><strong>Full Name :</strong></label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name', $user->name)}}">
             </div>
             <div class="col-md-6 mb-4">
                <label for="username"><strong>User Name :</strong></label>
                <input type="text" name="username" id="username" class="form-control" value="{{old('username', $user->username)}}">
             </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email address</label>
                <input type="email" class="form-control " name="email" id="email" placeholder="Email address" required value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label for="file"><strong>Image :</strong></label>
                <input type="file" class="form-control" name="file" id="file" accept="image/.mp4,.jpeg,.jpg,.png">
            </div>
          
            <button class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Update Profile</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="updatePassword">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            
            <div class="form-group">
                <label for="current_password"><strong>Current Password :</strong></label>
                <input type="password" name="current_password" id="current_password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password"><strong>New Password :</strong></label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation"><strong>Confirm Password :</strong></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
          
            <button class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Update Password</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
