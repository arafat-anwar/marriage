<?php

namespace Modules\EventManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\EventManagement\Entities\HolidayType;
use Modules\EventManagement\Entities\Holiday;

class HolidaysController extends Controller
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
            'holidayTypes' => HolidayType::where('status',1)->orderBy('name','asc')->get(),
        ];

        return view('eventmanagement::holidays.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'holiday_type_id' => 'required',
            'name' => 'required',
            'date' => 'required',
        ]);

        $holiday=new Holiday();
        $holiday->fill($request->all());
        $holiday = whoCreateThis($holiday);
        $holiday->save();

        return is_save($holiday,'Holiday Has been Added.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($data)
    {
        $holiday_type_id = isset(explode('&',$data)[0]) ? explode('&',$data)[0] : 0;
        $year = isset(explode('&',$data)[1]) ? explode('&',$data)[1] : date('Y');

        $data = [
            'holiday_type_id' => $holiday_type_id,
            'year' => $year,
            'holidayTypes' => HolidayType::where('status',1)->orderBy('name','asc')->get(),
            'holidays' => Holiday::when($holiday_type_id>0,function($query) use($holiday_type_id){
                                return $query->where('holiday_type_id',$holiday_type_id);
                            })
                            ->whereRaw('substr(date,1,4) = '.$year)
                            ->get(),
        ];
        return view('eventmanagement::holidays.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'holidayTypes' => HolidayType::where('status',1)->orderBy('name','asc')->get(),
            'holiday' => Holiday::findOrFail($id)
        ];

        return view('eventmanagement::holidays.edit',$data);
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
            'holiday_type_id' => 'required',
            'name' => 'required',
            'date' => 'required',
        ]);

        $holiday=Holiday::findOrFail($id);
        $holiday->fill($request->all());
        $holiday = whoUpdateThis($holiday);
        $holiday->save();

        return is_save($holiday,'Holiday has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $holiday=Holiday::find($id)->delete();
        if($holiday){
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
