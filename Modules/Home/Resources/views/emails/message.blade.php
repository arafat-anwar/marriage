@extends('emails.index')
@section('content')
<p>
	<center></center>
	<table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
       <tbody>
          <tr>
             <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
                  <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                   <tbody>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Name
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $contact->first_name.' '.$contact->last_name }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Email Address
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $contact->email }}</strong>
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
                              <strong>{{ $contact->phone }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Subject
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $contact->subject }}</strong>
                           </span>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" width="23%">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                               Reason for contacting us
                            </span>
                        </td>
                        <td valign="middle" width="4%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              :
                           </span>
                        </td>
                        <td valign="middle" width="73%" style="padding: 3px">
                           <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                              <strong>{{ $contact->message }}</strong>
                           </span>
                        </td>
                      </tr>
                     </tbody>
                  </table>
             </td>
          </tr>
        </tbody>
    </table>
</p>
@endsection