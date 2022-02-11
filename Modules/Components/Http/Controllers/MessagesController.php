<?php

namespace Modules\Components\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Home\Entities\Message;

class MessagesController extends Controller
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
        $data = [
            'from' => $from,
            'to' => $to,
            'messages' => Message::where(\DB::raw('substr(`created_at`, 1, 10)'), '>=', $from)->where(\DB::raw('substr(`created_at`, 1, 10)'), '<=', $to)->get(),
        ];
        return view('components::messages.index', $data);
    }
    
    public function destroy($id)
    {
        $task = Message::find($id);
        $task->delete();
        return is_save($task,'Message has been deleted');
    }
}
