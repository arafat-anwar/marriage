@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-primary text-white" style="cursor: pointer;">
        <h4 class="mb-0">
        	<strong>System Information</strong>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('system-information.store') }}" method="post" id="create-form" enctype="multipart/form-data">
        @csrf
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-12">
                    <h5 class="bg-info text-center p-2"><strong>Site Information</strong></h5>
                  </div>
                  <div class="col-12">
                      <div class="form-group row">
                        <div class="col-6">
                          <label for="name"><strong>Name :</strong></label>
                          <input type="text" class="form-control" name="name" value="{{$information->name}}" id="name">
                        </div>
                        <div class="col-6">
                          <label for="email"><strong>Email :</strong></label>
                          <input type="text" class="form-control" name="email" value="{{$information->email}}" id="email">
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <div class="col-6">
                          <label for="phone"><strong>Phone :</strong></label>
                          <input type="text" class="form-control" name="phone" value="{{$information->phone}}" id="phone">
                        </div>
                        <div class="col-6">
                          <label for="mobile"><strong>Mobile :</strong></label>
                          <input type="text" class="form-control" name="mobile" value="{{$information->mobile}}" id="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address"><strong>Address :</strong></label>
                        <input type="text" class="form-control" name="address" value="{{$information->address}}" id="phone">
                      </div> --}}
                  </div>
                  {{-- <div class="col-6">
                    <div class="form-group">
                      <label for="facebook"><strong>Facebook :</strong></label>
                      <input type="text" class="form-control" name="facebook" value="{{$information->facebook}}" id="facebook">
                    </div>
                    <div class="form-group">
                      <label for="twitter"><strong>Twitter :</strong></label>
                      <input type="text" class="form-control" name="twitter" value="{{$information->twitter}}" id="twitter">
                    </div>
                    <div class="form-group">
                      <label for="instagram"><strong>Instagram :</strong></label>
                      <input type="text" class="form-control" name="instagram" value="{{$information->instagram}}" id="instagram">
                    </div>
                    <div class="form-group">
                      <label for="youtube"><strong>Youtube :</strong></label>
                      <input type="text" class="form-control" name="youtube" value="{{$information->youtube}}" id="youtube">
                    </div>
                  </div> --}}
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-12">
                    <h5 class="bg-info text-center p-2"><strong>Logo and Icon</strong></h5>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="logo"><strong>Current Logo :</strong></label>
                        <br>
                        <img src="{{ url('public/system-images/logos/'.$information->logo) }}" class="img img-fluid p-3" style="height: 123px;background: #1A0D1F">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="logo_file"><strong>New Logo :</strong></label>
                        <input type="file" class="form-control" name="logo_file" id="logo_file">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-md-12">
                         <label for="icon"><strong>Current Icon :</strong></label>
                         <br>
                         <img src="{{ url('public/system-images/icons/'.$information->icon) }}" class="img img-fluid p-3" style="height: 100px;background: #1A0D1F;">
                      </div>
                      <div class="col-md-12">
                        <label for="icon_file"><strong>New Icon :</strong></label>
                        <input type="file" class="form-control" name="icon_file" id="icon_file">
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="form-group row">
                  <div class="col-6">
                    <label for="skype"><strong>Skype :</strong></label>
                    <input type="text" class="form-control" name="skype" value="{{$information->skype}}" id="skype">
                  </div>
                  <div class="col-6">
                    <label for="linked_in"><strong>Linked In :</strong></label>
                    <input type="text" class="form-control" name="linked_in" value="{{$information->linked_in}}" id="linked_in">
                  </div>
                </div> --}}
              </div>
            </div>
            {{-- <div class="row">
              <div class="col-12">
                @include('layouts.seo.form', ['seo' => $information->seo])
              </div>
            </div> --}}
            <div class="row">
              <div class="col-12">
                <h5 class="bg-info text-center p-2"><strong>Contents</strong></h5>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="how_it_works"><strong>How it Works:</strong></label>
                  <textarea class="form-control note" name="how_it_works" id="how_it_works">{{$information->how_it_works}}</textarea>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="desc"><strong>Description:</strong></label>
                  <textarea class="form-control note" name="desc" id="desc">{{$information->description}}</textarea>
                </div>
              </div>
              <div class="col-md-12 mb-2">
                <div class="form-group">
                  <label for="about"><strong>About Us:</strong></label>
                  <textarea class="form-control note" name="about" id="about">{{$information->about}}</textarea>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="contact"><strong>Contact:</strong></label>
                  <textarea class="form-control note" name="contact" id="contact">{{$information->contact}}</textarea>
                </div>
              </div>
              <div class="col-md-6 mb-2">
                <div class="form-group">
                  <label for="terms"><strong>Terms and Conditions:</strong></label>
                  <textarea class="form-control note" name="terms" id="terms">{{$information->terms}}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-2">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i>&nbsp; Update System Information</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection