<?php

namespace Modules\EventManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\EventManagement\Entities\EventType;
use Modules\EventManagement\Entities\Event;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return $this->show('0&'.date('Y'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data = [
            'eventTypes' => EventType::where('status',1)->orderBy('name','asc')->get(),
        ];

        return view('eventmanagement::events.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_type_id' => 'required',
            'title' => 'required',
            'from' => 'required',
        ]);

        $event = new Event();
        $event->fill($request->all());
        $event = whoCreateThis($event);
        $event->save();

        return is_save($event,'Event Has been Added.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($data)
    {
        $event_type_id = isset(explode('&',$data)[0]) ? explode('&',$data)[0] : 0;
        $year = isset(explode('&',$data)[1]) ? explode('&',$data)[1] : date('Y');

        $data = [
            'event_type_id' => $event_type_id,
            'year' => $year,
            'eventTypes' => EventType::where('status',1)->orderBy('name','asc')->get(),
            'events' => Event::when($event_type_id>0,function($query) use($event_type_id){
                                return $query->where('event_type_id',$event_type_id);
                            })
                            ->whereRaw('substr(`from`,1,4) = '.$year)
                            ->get(),
        ];
        return view('eventmanagement::events.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'eventTypes' => EventType::where('status',1)->orderBy('name','asc')->get(),
            'event' => Event::findOrFail($id)
        ];

        return view('eventmanagement::events.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_type_id' => 'required',
            'title' => 'required',
            'from' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->fill($request->all());
        $event = whoUpdateThis($event);
        $event->save();

        return is_save($event,'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        if($event){
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]);
    }
}
