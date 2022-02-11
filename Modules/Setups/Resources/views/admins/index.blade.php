@extends('layouts.index')

@section('content')
<script src="{{url('public/lte')}}/plugins/jquery/jquery.min.js"></script>

<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>User & Members</strong>
            
            @if(isOptionPermitted('setups/admins','create'))
        	   <a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Admin','{{ url('setups/admins/create') }}')"><i class=" fa fa-plus"></i>&nbsp;New Admin</a>
            @endif
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="role_id"><strong>Role</strong></label>
                    <select class="form-control select2bs4" name="role_id" id="role_id">
                        @if(isset($roles[0]))
                        @foreach ($roles as $key => $role)
                            <option value="{{$role->id}}" {{$role_id==$role->id ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label for="gender"><strong>Gender</strong></label>
                    <select class="form-control select2bs4" name="gender" id="gender">
                        <option value="-1">All Gender</option>
                        @if(isset(genders()[0]))
                        @foreach (genders() as $key => $g)
                            <option value="{{$key}}" {{$gender == $key ? 'selected' : ''}}>{{$g}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label><strong>&nbsp;</strong></label>
                    <button type="button" class="btn btn-md btn-primary btn-block" onclick="search()"><i class="fa fa-search"></i>&nbsp;Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">User & Members</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Actions</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>User Role</th>
                    <th>Sex</th>
                    
                    <th>Age</th>
                    <th>Marital Status</th>
                    <th>Ethic Origin</th>
                    <th>Height</th>
                    <th>Body Type</th>
                    <th>Religion</th>
                    <th>Where Live</th>
                    
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($admins[0]))
            @foreach($admins as $key => $admin)
                <tr id="tr-{{ $admin->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td class="text-center" style="width: 5%">
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group">
                                    @if($admin->status=="1")
                                        <a class="btn btn-sm btn-success"><i class="fa fa-check text-white"></i></a>
                                    @else
                                        <a class="btn btn-sm btn-danger"><i class="fa fa-ban text-white"></i></a>
                                    @endif

                                    @if($admin->id != auth()->user()->id)
                                        @if(isOptionPermitted('setups/admins','edit'))
                                            <a class="btn btn-sm btn-info" onclick="Show('Edit Admin','{{ url('setups/admins/'.$admin->id.'/edit') }}')"><i class="fa fa-edit text-white"></i></a>
                                        @endif

                                        @if(isOptionPermitted('setups/admins','delete'))
                                            <a class="btn btn-sm btn-danger" onclick="Delete('{{ $admin->id }}','{{ url('setups/admins') }}')"><i class="fa fa-trash text-white"></i></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        @if(!empty($admin->image) && file_exists(public_path('user-images/'.$admin->image)))
                            <img src="{{url('public/user-images')}}/{{$admin->image}}" class="img img-fluid" style="max-height: 50px">
                        @else
                            <img src="{{url('public')}}/male.jpg"  class="img img-fluid" style="max-height: 50px">
                        @endif
                    </td>
                    <td>
                        {{$admin->name}}
                    </td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->phone}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->role ? $admin->role->name : ''}}</td>
                    <td>{{genders()[$admin->gender]}}</td>
                    
                    <td>{{$admin->profile ? $admin->profile->age  : ''}}</td>
                    <td>{{$admin->profile ? (isset(maritalStatus()[$admin->profile->marital_status]) ? maritalStatus()[$admin->profile->marital_status] : '')  : ''}}</td>
                    <td>{{$admin->profile ? (isset(ethnicOrigins()[$admin->profile->ethnic_origin]) ? ethnicOrigins()[$admin->profile->ethnic_origin] : '')  : ''}}</td>
                    <td>{{$admin->profile ? (isset(heights()[$admin->profile->height]) ? heights()[$admin->profile->height] : '')  : ''}}</td>
                    <td>{{$admin->profile ? (isset(bodyTypes()[$admin->profile->body_type]) ? bodyTypes()[$admin->profile->body_type] : '')  : ''}}</td>
                    <td>{{$admin->profile ? (isset(religions()[$admin->profile->religion]) ? religions()[$admin->profile->religion] : '')  : ''}}</td>
                    <td>{{$admin->profile ? (isset(regions()[$admin->profile->region]) ? regions()[$admin->profile->region] : '')  : ''}}</td>
                    
                    <td class="text-center">
                        {{ date('D M j, y g:i a',strtotime($admin->created_at)) }}
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function search() {
        var role_id = $('#role_id').val();
        var gender = $('#gender').val();

        window.open("{{ url('setups/admins') }}/"+role_id+"&"+gender,"_parent");
    }
</script>
@endsection