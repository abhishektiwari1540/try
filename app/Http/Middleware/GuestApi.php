<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure,App;

class GuestApi 
{
    public function handle($request, Closure $next){
        if(!empty($request->header('Accept-Language'))){
            App::setLocale(Login() != null && Login()->current_lang != null ?  Login()->current_lang : $request->header('Accept-Language'));
        }else{
            App::setLocale("en");
        }
        return $next($request);
    }
}
