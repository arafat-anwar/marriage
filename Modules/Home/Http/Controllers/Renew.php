<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Profile;

class Renew extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('authuser');
        $this->middleware('user');
        $this->middleware('paiduser');
    }

    public function index()
    {
        $data = [
            'systemInformation' => systemInformation(),
        ];
        return view('home::renew.index', $data);
    }
}
