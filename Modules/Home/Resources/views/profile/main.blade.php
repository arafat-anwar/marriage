@extends('home::layouts.index')
@section('content')
<section class="py-5 bg-white">
    <div class="container">
        <div class="row d-flex align-items-start">
            <div class="col-md-3 mb-4 pt-4 sticky-top c-scrollbar-light position-relative z-1 shadow-none" style="border: 1px solid #eee;">
                <div class="rounded overflow-hidden">
                    <div class="text-center mb-3">
                        @if(!empty(auth()->user()->image) && file_exists(public_path('user-images/'.auth()->user()->image)))
                          <img src="{{ url('public/user-images/'.auth()->user()->image) }}" style="width: 75%;border-radius: 3% !important;">
                        @else
                          <img src="{{ url('public/'.(auth()->user()->gender == 0 ? 'female' : 'male').'.jpg') }}" style="width: 75%;border-radius: 3% !important;">
                        @endif
                    </div>
                    <h4 class="h5 fw-600 text-center">{{ auth()->user()->name }}</h4>
                    <div class="sidemnenu mb-0 mt-3">
                        <ul class="aiz-side-nav-list metismenu" data-toggle="aiz-side-menu">
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('profile') }}" class="aiz-side-nav-link" aria-expanded="true">
                                    <i class="las la-home aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a style="cursor: pointer;" data-toggle="modal" data-target="#updatePassword" class="aiz-side-nav-link">
                                    <i class="las la-key aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Change Password</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('profile/0/edit') }}" class="aiz-side-nav-link">
                                    <i class="las la-user aiz-side-nav-icon"></i>
                                    <span class="aiz-side-nav-text">Update Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @php
                        $package = \Modules\Home\Entities\Payment::where('user_id', auth()->user()->id)->whereIn('type', [0, 2])->orderBy('id', 'desc')->first();
                    @endphp
                    @if(isset($package->id))
                    <div>
                        <div class="card mb-0">
                            <div class="card-header">
                                <h2 class="fs-16 mb-0">Current package</h2>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <img class="mw-100 mx-auto mb-4" src="https://milansathi.com/public/uploads/all/9K3LcQCzoUkefpFlEsTT9OvgGGPA6jZ3wSkCTMQk.png" height="130">
                                    <h5 class="mb-3 h5 fw-600">Basic</h5>
                                </div>
                                <h6 class="mb-3">
                                    Expiry date:
                                    {{ date('Y-m-d', strtotime($package->created_at.' +90 days')) }}
                                </h6>
                            </div>
                        </div>
                    </div> 
                    @endif 
                    <div>
                        <a href="javascript:void(0);" class="btn btn-block btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="las la-sign-out-alt"></i>
                            <span>Logout</span>
                            <form id="logout-form" action="{{ route('profile.destroy', 0) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 overflow-hidden">
                @yield('profile-content')
            </div>
        </div>
    </div>
</section>

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
