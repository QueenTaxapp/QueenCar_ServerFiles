<?php

namespace App\Ship\Middlewares\Http;

use App;
use App\Ship\Exceptions\MissingJSONHeaderException;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Config;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;

/**
 * Class ResponseHeadersMiddleware
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ResponseHeadersMiddleware extends Middleware
{

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return  mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Validate every request to the API has accept HEADER = application/json
        // and make sure to always return Content-Type HEADER = application/json

        $contentType = 'application/json';

        $acceptHeader = $request->header('accept');

        $contentLanguage = $request->header('Content-Language');

        if (strpos($acceptHeader, $contentType) === false)
        {
            throw new MissingJSONHeaderException();
        }

        if($request->header('Content-Language') == null)
        {

            $request->headers->set('Content-Language','en');


        }


        else if(!array_key_exists($request->header('Content-Language'),config('app.locales')))
        {
             $request->headers->set('Content-Language','en');
        }






        $response = $next($request);






        return $response;
    }

}
