@extends('emails.index')
@section('content')
<h3>Hello <i>{{ auth()->user()->profile->first_name }}</i>, </h3>
<p style="font-size: 14px;">
	We have found a match for you! Follow below information to find {{ $match->gender == 0 ? 'her' : 'him' }}!
</p>
<p>
	<center></center>
	<table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
       <tbody>
          <tr>
             <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
                  <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                   <tbody>
                      <tr>
                        <td align="center" valign="middle" width="100%" colspan="3">
                         	<span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                         	    <img src="{{ adminImage($match) }}" style="max-height: 240px;margin-bottom: 25px;">
                            </span>
                        </td>
                      </tr>
                     </tbody>
                  </table>

                  <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                   <tbody>
                      <tr>
                        <td align="center" valign="middle" width="100%" colspan="3" style="background: #085373;color:white;">
                           <span style="margin:0;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:10px">
                              <h2>Basic Information</h2>
                           </span>
                        </td>
                      </tr>

                      <tr>
                        <td align="left" valign="middle" width="23%" style="padding: 10px 3px 3px 3px;">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Name
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 10px 3px 3px 3px;">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 10px 3px 3px 3px;">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $match->name }}</strong>
                           </span>
                        </td>
                      </tr>
                      
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Sex
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ genders()[$match->gender] }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Phone
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $match->profile->phone }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Email
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $match->email }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Age
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $match->profile->age }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Marital Status
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(maritalStatus()[$match->profile->marital_status]) ? maritalStatus()[$match->profile->marital_status] : '' }}</strong>
                           </span>
                        </td>
                      </tr>


                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Ethnic Origin
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(ethnicOrigins()[$match->profile->ethnic_origin]) ? ethnicOrigins()[$match->profile->ethnic_origin] : '' }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              Height
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(heights()[$match->profile->height]) ? heights()[$match->profile->height] : '' }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              Body Type
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(bodyTypes()[$match->profile->body_type]) ? bodyTypes()[$match->profile->body_type] : '' }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              Religion
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(religions()[$match->profile->religion]) ? religions()[$match->profile->religion] : '' }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              Region
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ isset(regions()[$match->profile->region]) ? regions()[$match->profile->region] : '' }}</strong>
                           </span>
                        </td>
                      </tr>

                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Introduction
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $match->profile->introduction }}</strong>
                           </span>
                        </td>
                      </tr>
                     </tbody>
                  </table>

                  @php
                     $elements = [
                       'physical_attributes',
                       'hobbies_interests',
                       'attitude_earnings',
                       'spiritual_family_values',
                       'lifestyle',
                     ];
                  @endphp
                {{--
                  @foreach($elements as $element)
                     <table border="0" cellspacing="0" cellpadding="0" style="margin-top: 25px; font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                      <tbody>
                        <tr>
                           <td align="center" valign="middle" width="100%" colspan="3" style="background: #085373;color:white;">
                              <span style="margin:0;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:10px">
                                 <h2>{{ ucwords(str_replace('-', ' ', str_replace('_', ' ', $element))) }}</h2>
                              </span>
                           </td>
                         </tr>
                         @php
                           $values = $match->profile ? json_decode($match->profile->$element, true) : [];
                           $count = 0;
                         @endphp
                         @if(is_array($values) && count($values) > 0)
                         @foreach($values as $key => $value)
                         @php $count++; @endphp
                           <tr>
                              <td align="left" valign="middle" width="23%" @if($count == 1) style="padding: 10px 3px 3px 3px;" @else style="padding: 3px;" @endif>
                                 <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                                     {{ ucwords(str_replace('-', ' ', str_replace('_', ' ', $key))) }}
                                  </span>
                              </td>
                              <td valign="middle" width="4%" @if($count == 1) style="padding: 10px 3px 3px 3px;" @else style="padding: 3px;" @endif>
                                 <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                                    :
                                 </span>
                              </td>
                              <td valign="middle" width="73%" @if($count == 1) style="padding: 10px 3px 3px 3px;" @else style="padding: 3px;" @endif>
                                 <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                                    <strong>{{ $value }}</strong>
                                 </span>
                              </td>
                            </tr>
                         @endforeach
                         @endif
                      </tbody>
                   </table>
                  @endforeach
                --}}

                  
             </td>
          </tr>
        </tbody>
    </table>
</p>
@endsection