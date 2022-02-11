<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Profile;
use \Modules\Home\Entities\Match;

class Search extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('authuser');
        $this->middleware('user');
        $this->middleware('paiduser');
        $this->middleware('renew');
    }

    public function index()
    {
        $data = [
            'systemInformation' => systemInformation(),
        ];
        return view('home::search.index', $data);
    }

    public function store(Request $request)
    {
        $match = User::whereIn('role_id', [3])
            ->where('id', '!=', auth()->user()->id)
            ->whereNotIn('id', auth()->user()->myMatches->pluck('matched_with')->toArray())
            ->whereNotIn('id', auth()->user()->matches->pluck('user_id')->toArray())
            ->where('gender', $request->gender)
            ->when(isset($request->age[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('age', $request->age);
                });
            })
            ->when(isset($request->marital_status[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('marital_status', $request->marital_status);
                });
            })
            ->when(isset($request->ethnic_origin[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('ethnic_origin', $request->ethnic_origin);
                });
            })
            ->when(isset($request->height[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('height', $request->height);
                });
            })
            ->when(isset($request->body_type[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('body_type', $request->body_type);
                });
            })
            ->when(isset($request->religion[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('religion', $request->religion);
                });
            })
            ->when(isset($request->region[0]), function($query) use($request){
                return $query->whereHas('profile', function($query) use($request){
                    return $query->whereIn('region', $request->region);
                });
            })->take(1)->first();

        if(isset($match->id)){
            session()->put('pending-match', $match->id);
            return redirect('pay-match-fee');
        }

        whoops("Sorry, no match found. Please modify your search criteria and try again. You can also check back later as new people join regularly.");
        return redirect('search');
    }
}
