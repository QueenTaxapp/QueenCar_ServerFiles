<?php

namespace App\Containers\Authentication\Middlewares;


use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App;


/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ContentLanguage extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
     
        if($request->header('Content-Language'))
        {
            $locale = $request->header('Content-Language');
            App::setLocale($locale);
        }     

        return $next($request);
    }

}