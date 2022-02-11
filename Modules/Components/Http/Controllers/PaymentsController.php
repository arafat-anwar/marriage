<?php

namespace Modules\Components\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Home\Entities\Payment;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }
    
    public function index()
    {
        $from = request()->has('from') ? request()->from : date('Y-m-d', strtotime('-30 days'));
        $to = request()->has('to') ? request()->to : date('Y-m-d');
        $type = request()->has('type') ? request()->type : -1;
        $data = [
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'payments' => Payment::where(\DB::raw('substr(`created_at`, 1, 10)'), '>=', $from)->where(\DB::raw('substr(`created_at`, 1, 10)'), '<=', $to)
            ->when($type >= 0, function($query) use($type) {
                return $query->where('type', $type);
            })
            ->get(),
        ];
        return view('components::payments.index', $data);
    }
    
      /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id)->delete();
        if($payment){
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
