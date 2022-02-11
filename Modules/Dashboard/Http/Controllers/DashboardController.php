<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \Modules\EventManagement\Entities\Holiday;
use \Modules\EventManagement\Entities\Event;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }

    public function events()
    {
        $dateRange = dateRange(date('Y-m-d',strtotime(request()->start)),date('Y-m-d',strtotime(request()->end)));

        $holidays = Holiday::whereIn('date',$dateRange)->where('status',1)->get();
        $events = Event::where('status',1)
                    ->where(function($query) use($dateRange){
                        return $query->whereIn('from',$dateRange)
                                     ->orWhereIn('to',$dateRange);
                    })
                    ->get();
        $data = [];
        if(isset($holidays[0])){
            foreach($holidays as $key => $holiday){
                array_push($data,array(
                    'id'   => 'holiday-'.$holiday->id,
                    'title'   => $holiday->name,
                    'start'   => $holiday->date,
                    'end'   => $holiday->date,
                ));
            }
        }

        if(isset($events[0])){
            foreach($events as $key => $event){
                array_push($data,array(
                    'id'   => 'event-'.$event->id,
                    'title'   => $event->title,
                    'start'   => $event->from,
                    'end'   => $event->to,
                ));
            }
        }

        return json_encode($data);
    }

    public function event()
    {
        $data = [
            'id' => explode('-', request()->event)[1]
        ];

        return view('dashboard::'.explode('-', request()->event)[0],$data);
    }
    
    public function index()
    {
        return view('dashboard::index');
    }
}
