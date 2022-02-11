<?php

namespace Modules\Dashboard\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \Modules\Peoples\Entities\Employee;

use \Modules\Device\Entities\Device;
use \Modules\Device\Entities\Checkinout;

use \Modules\Attendance\Entities\RemoteAttendance;

class APIController extends Controller
{
    public function checkInOutStatus(Request $request)
    {
        $fingerprint = Checkinout::with(['device'])
                        ->where(['employee_id' => $request->employee_id,'date' => date('Y-m-d')])
                        ->orderBy('time','desc')
                        ->first();
        $fingerprint_time = false;
        $fingerprint_type = false;
        if(isset($fingerprint->id)){
            $fingerprint_time = $fingerprint->time;
            $fingerprint_type = $fingerprint->device->attendance_type;
        }

        $remote = RemoteAttendance::with(['device'])
                        ->where(['employee_id' => $request->employee_id,'date' => date('Y-m-d')])
                        ->orderBy('time','desc')
                        ->first();
        $remote_time = false;
        $remote_type = false;
        if(isset($remote->id)){
            $remote_time = $remote->time;
            $remote_type = $remote->device->attendance_type;
        }

        $checked_in = false;
        $checked_out = false;

        if($fingerprint_time && !$remote_time){
            $checked_in = $fingerprint_type==1 ? true : false ;
            $checked_out = $fingerprint_type==0 ? true : false ;
        }

        if(!$fingerprint_time && $remote_time){
            $checked_in = $remote_type==1 ? true : false ;
            $checked_out = $remote_type==0 ? true : false ;
        }

        if($fingerprint_time && $remote_time){
            if(new \DateTime($fingerprint_time) > new \DateTime($remote_time)){
                $checked_in = $fingerprint_type==1 ? true : false ;
                $checked_out = $fingerprint_type==0 ? true : false ;
            }else{
                $checked_in = $remote_type==1 ? true : false ;
                $checked_out = $remote_type==0 ? true : false ;
            }
        }

        $innitial_stage = (!$checked_in && !$checked_out) ? true : false;

        return response()->json([
            'innitial_stage' => $innitial_stage,
            'checked_in' => $checked_in,
            'checked_out' => $checked_out,
        ]);
    }

    public function checkInOut(Request $request)
    {
        $device = Device::where(['attendance_type' => $request->attendance_type,'device_type' => 0])->first();
        if(isset($device->id)){
            $check = RemoteAttendance::create([
                'employee_id' => $request->employee_id,
                'device_id' => $device->id,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
            ]);

            if($check){
                return response()->json([
                    'success' => true,
                    'message' => 'Checked '.($request->attendance_type==1 ? 'In' : 'Out').' successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No Remote Attendance Device has found!'
        ]);
    }

    public function databaseBackup()
    {
        
    }
}
