@extends('home::profile.main')
@section('profile-content')
<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Basic Information</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="first_name">First Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="first_name" value="{{ $user->profile ? $user->profile->first_name : '' }}" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name">Last Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="last_name" value="{{ $user->profile ? $user->profile->last_name : '' }}" class="form-control" placeholder="Last Name" required >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="first_name">Phone Number
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="phone" value="{{ $user->profile ? $user->profile->phone : '' }}" class="form-control" placeholder="Phone" required>
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Phone" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="gender">Sex
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="gender">
                        @foreach(genders() as $key => $gender)
                            <option value="{{ $key }}" {{ $user->gender == $key ? 'selected' : '' }}>{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date_of_birth">Age
                        <span class="text-danger">*</span>
                    </label>
                    <select name="age" id="age" class="form-control aiz-selectpicker">
                        @for($i=18;$i<=70;$i++)
                        <option {{ $user->profile->age == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="relation">Profile for
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="relation">
                        @foreach(relations() as $key => $relation)
                            <option value="{{ $key }}" {{ $user->relation == $key ? 'selected' : '' }}>{{ $relation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="first_name">Marital Status
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="marital_status">
                        @foreach(maritalStatus() as $key => $status)
                            <option value="{{ $key }}" {{ $user->profile && $user->profile->marital_status == $key ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="ethnic_origin">Ethnic Origin
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="ethnic_origin">
                        @foreach(ethnicOrigins() as $key => $ethnic_origin)
                            <option value="{{ $key }}" {{ $user->profile && $user->profile->ethnic_origin == $key ? 'selected' : '' }}>{{ $ethnic_origin }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="height">Height 
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="height">
                        @foreach(heights() as $key => $height)
                            <option value="{{ $key }}" {{ $user->profile && $user->profile->height == $key ? 'selected' : '' }}>{{ $height }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="body_type">Body type 
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="body_type">
                        @foreach(bodyTypes() as $key => $body_type)
                            <option value="{{ $key }}" {{ $user->profile && $user->profile->body_type == $key ? 'selected' : '' }}>{{ $body_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="religion">Religion  
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control aiz-selectpicker" name="religion">
                        @foreach(religions() as $key => $religion)
                            <option value="{{ $key }}" {{ $user->profile && $user->profile->religion == $key ? 'selected' : '' }}>{{ $religion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="region">Where do you live 
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="region">
                    @foreach(regions() as $key => $region)
                        <option value="{{ $key }}" {{ $user->profile && $user->profile->region == $key ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="introduction">Introduction</label>
                <textarea type="text" name="introduction" id="introduction" class="form-control" rows="4" placeholder="Introduction" >{{ $user->profile ? $user->profile->introduction : '' }}</textarea>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="photo">Photo</label>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>

    {{--@php
        $physicalAttributes = $user->profile ? json_decode($user->profile->physical_attributes, true) : [];
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Physical Attributes</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="weight">Weight (In Kg)</label>
                    <input type="number" name="physical_attributes[weight]" value="{{ isset($physicalAttributes['weight']) ? $physicalAttributes['weight'] : '' }}" step="any" placeholder="Weight" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="blood_group">Blood Group</label>
                    <input type="text" name="physical_attributes[blood_group]" value="{{ isset($physicalAttributes['blood_group']) ? $physicalAttributes['blood_group'] : '' }}" placeholder="Blood Group" class="form-control" >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="eye_color">Eye color</label>
                    <input type="text" name="physical_attributes[eye_color]" value="{{ isset($physicalAttributes['eye_color']) ? $physicalAttributes['eye_color'] : '' }}" class="form-control" placeholder="Eye color" >
                </div>
                <div class="col-md-6">
                    <label for="hair_color">Hair Color</label>
                    <input type="text" name="physical_attributes[hair_color]" value="{{ isset($physicalAttributes['hair_color']) ? $physicalAttributes['hair_color'] : '' }}" placeholder="Hair Color" class="form-control" >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="complexion">Complexion</label>
                    <input type="text" name="physical_attributes[complexion]" value="{{ isset($physicalAttributes['complexion']) ? $physicalAttributes['complexion'] : '' }}" class="form-control" placeholder="Complexion" >
                </div>
                <div class="col-md-6">
                    <label for="body_art">Body Art</label>
                    <input type="text" name="physical_attributes[body_art]" value="{{ isset($physicalAttributes['body_art']) ? $physicalAttributes['body_art'] : '' }}" placeholder="Body Art" class="form-control" >
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="disability">Disability</label>
                    <input type="text" name="physical_attributes[disability]" value="{{ isset($physicalAttributes['disability']) ? $physicalAttributes['disability'] : '' }}" class="form-control" placeholder="Disability">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>

    @php
        $hobbiesInterests = $user->profile ? json_decode($user->profile->hobbies_interests, true) : [];
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Hobbies &amp; Interest</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="hobbies">Hobbies</label>
                    <input type="text" name="hobbies_interests[hobbies]" value="{{ isset($hobbiesInterests['hobbies']) ? $hobbiesInterests['hobbies'] : '' }}" class="form-control" placeholder="Hobbies">
                </div>
                <div class="col-md-6">
                    <label for="interests">Interests</label>
                    <input type="text" name="hobbies_interests[interests]" value="{{ isset($hobbiesInterests['interests']) ? $hobbiesInterests['interests'] : '' }}" placeholder="Interests" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="music">Music</label>
                    <input type="text" name="hobbies_interests[music]" value="{{ isset($hobbiesInterests['music']) ? $hobbiesInterests['music'] : '' }}" class="form-control" placeholder="Music">
                </div>
                <div class="col-md-6">
                    <label for="books">Books</label>
                    <input type="text" name="hobbies_interests[books]" value="{{ isset($hobbiesInterests['books']) ? $hobbiesInterests['books'] : '' }}" placeholder="Books" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="movies">Movies</label>
                    <input type="text" name="hobbies_interests[movies]" value="{{ isset($hobbiesInterests['movies']) ? $hobbiesInterests['movies'] : '' }}" class="form-control" placeholder="Movies">
                </div>
                <div class="col-md-6">
                    <label for="tv_shows">TV Shows</label>
                    <input type="text" name="hobbies_interests[tv_shows]" value="{{ isset($hobbiesInterests['tv_shows']) ? $hobbiesInterests['tv_shows'] : '' }}" placeholder="TV Shows" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="sports">Sports</label>
                    <input type="text" name="hobbies_interests[sports]" value="{{ isset($hobbiesInterests['sports']) ? $hobbiesInterests['sports'] : '' }}" class="form-control" placeholder="Sports">
                </div>
                <div class="col-md-6">
                    <label for="fitness_activities">Fitness Activitiess</label>
                    <input type="text" name="hobbies_interests[fitness_activities]" value="{{ isset($hobbiesInterests['fitness_activities']) ? $hobbiesInterests['fitness_activities'] : '' }}" placeholder="Fitness Activities" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="cuisines">Cuisines</label>
                    <input type="text" name="hobbies_interests[cuisines]" value="{{ isset($hobbiesInterests['cuisines']) ? $hobbiesInterests['cuisines'] : '' }}" class="form-control" placeholder="Cuisines">
                </div>
                <div class="col-md-6">
                    <label for="dress_styles">Dress Styles</label>
                    <input type="text" name="hobbies_interests[dress_styles]" value="{{ isset($hobbiesInterests['dress_styles']) ? $hobbiesInterests['dress_styles'] : '' }}" placeholder="Dress Styles" class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>

    @php
        $attitudeEarnings = $user->profile ? json_decode($user->profile->attitude_earnings, true) : [];
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Attitude &amp; Earnings</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="affection">Monthly Income</label>
                    <select class="form-control aiz-selectpicker" name="attitude_earnings[affection]" tabindex="-98">
                        @foreach(monthlyIncome() as $key => $income)
                            <option {{ isset($attitudeEarnings['affection']) && $attitudeEarnings['affection'] == $income ? 'selected' : '' }}>{{ $income }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="humor">Humor</label>
                    <select class="form-control aiz-selectpicker" name="attitude_earnings[humor]" tabindex="-98">
                        @foreach(humors() as $key => $humor)
                            <option {{ isset($attitudeEarnings['humor']) && $attitudeEarnings['humor'] == $humor ? 'selected' : '' }}>{{ $humor }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="political_views">Political Views</label>
                    <select class="form-control aiz-selectpicker" name="attitude_earnings[political_views]" tabindex="-98">
                        @foreach(politicalViews() as $key => $pv)
                            <option {{ isset($attitudeEarnings['political_views']) && $attitudeEarnings['political_views'] == $pv ? 'selected' : '' }}>{{ $pv }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="religious_service">Religious Service</label>
                    <select class="form-control aiz-selectpicker" name="attitude_earnings[religious_service]">
                        @foreach(religiousService() as $key => $rs)
                            <option {{ isset($attitudeEarnings['religious_service']) && $attitudeEarnings['religious_service'] == $rs ? 'selected' : '' }}>{{ $rs }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>

    @php
        $spiritualFamilyValues = $user->profile ? json_decode($user->profile->spiritual_family_values, true) : [];
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Spiritual &amp; Family Value</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="community_value">Community</label>
                    <select class="form-control aiz-selectpicker" name="spiritual_family_values[community_value]"  >
                        @foreach(communityValues() as $key => $value)
                            <option {{ isset($spiritualFamilyValues['community_value']) && $spiritualFamilyValues['community_value'] == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="ethnicity">Nationality</label>
                    <input type="text" name="spiritual_family_values[ethnicity]" value="{{ isset($spiritualFamilyValues['ethnicity']) ? $spiritualFamilyValues['ethnicity'] : '' }}" class="form-control" placeholder="Nationality">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="personal_value">Personal Value</label>
                    <select class="form-control aiz-selectpicker" name="spiritual_family_values[personal_value]" >
                        @foreach(personalValues() as $key => $value)
                            <option {{ isset($spiritualFamilyValues['personal_value']) && $spiritualFamilyValues['personal_value'] == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="family_value">Family Value</label>
                    <select class="form-control aiz-selectpicker" name="spiritual_family_values[family_value]">
                        <option value="">Select One</option>
                        @foreach(familyValues() as $key => $value)
                            <option {{ isset($spiritualFamilyValues['family_value']) && $spiritualFamilyValues['family_value'] == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>

    @php
        $lifestyle = $user->profile ? json_decode($user->profile->lifestyle, true) : [];
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Lifestyle</h5>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="diet">Diet</label>
                    <select class="form-control aiz-selectpicker" name="lifestyle[diet]" >
                        <option {{ isset($lifestyle['diet']) && $lifestyle['diet'] == "Yes" ? 'selected' : '' }}>Yes</option>
                        <option {{ isset($lifestyle['diet']) && $lifestyle['diet'] == "No" ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="drink">Drink</label>
                    <select class="form-control aiz-selectpicker" name="lifestyle[drink]">
                        <option {{ isset($lifestyle['drink']) && $lifestyle['drink'] == "Yes" ? 'selected' : '' }}>Yes</option>
                        <option {{ isset($lifestyle['drink']) && $lifestyle['drink'] == "No" ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="smoke">Smoke</label>
                    <select name="lifestyle[smoke]" id="smoke" class="form-control aiz-selectpicker">
                        <option {{ isset($lifestyle['smoke']) && $lifestyle['smoke'] == "Yes" ? 'selected' : '' }}>Yes</option>
                        <option {{ isset($lifestyle['smoke']) && $lifestyle['smoke'] == "No" ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="living_with">Living With</label>
                    <input type="text" name="lifestyle[living_with]" value="{{ isset($lifestyle['living_with']) ? $lifestyle['living_with'] : '' }}" placeholder="Living With" class="form-control" >
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </div>--}}
</form>
@endsection
