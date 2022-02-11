<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CheckCountry
{
    public function handle($request, Closure $next)
    {
        // if (!Session::has('current-language')){
        //     $ip = request()->ip();
        //     $country_code = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip))->geoplugin_countryCode;
        //     if($country_code == "BD"){
        //         Session::put('current-language','bn');
        //     }else{
        //         Session::put('current-language','en');
        //     }
        // }

        Session::put('current-language','en');
        
        return $next($request);
    }
}