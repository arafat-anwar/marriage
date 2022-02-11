@extends('emails.index')
@section('content')
<p>
	<table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
       <tbody>
          <tr>
             <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
               <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                <tbody>
                   <tr>
                     <td align="left" valign="middle" width="100%">
                        <span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">
                           <h1>Congratulations, {{ auth()->user()->name }}!!</h1>
                           <h3>You are now registered for the exciting journey of finding your prefect match.</h3>
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