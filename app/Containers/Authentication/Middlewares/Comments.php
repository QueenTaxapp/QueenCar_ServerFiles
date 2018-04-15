<?php

namespace App\Containers\Authentication\Middlewares;


use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;




/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Comments extends Middleware
{
    public function handle(Request $request, Closure $next)
    {

        $test = $request->files->all();
        
        foreach($test as $key=>$value)
        {
            $extension =  $request->file($key)->getClientOriginalExtension();
            
            $error_message = trans('localization::errors.the_file_should_be_in_particular_format("jpg,png,jpeg")');
         

            if($extension != 'jpeg' && $extension != 'jpg' && $extension != 'png' && $extension != 'pdf')
            {
                
                return Redirect::back()->withErrors($error_message);
 
            }
        }


        if(!session::has('applicationName'))
        {
            $path = asset('config.json');
            $specificAdmin = @get_headers($path);

            if($specificAdmin[0] == 'HTTP/1.1 200 OK')
            {
                $file = file_get_contents($path);

                $fileValue = json_decode($file);

        

                foreach($fileValue as $key => $value)
                {
                    foreach($value as $ke=> $val)
                    {
                        if($val->title == 'application_name')
                        {
                            $applicationName = $val->value;
                            session::put('applicationName',$applicationName); 
                        }
                    }
                }
            
             }
        }


        $data =  $request->all();
        
       // $connection = mysqli_connect("localhost", "root", "", "tabandgo");

        
       /* foreach($data as $key => $value)
        {

            if($key != 'editor')
            {
                if(is_array($value))
                {

                    $tempArray = array();
  
                    foreach($value as $keys =>$tempArray1)
                    {
                            $val = htmlspecialchars($tempArray1);
                            $val = mysqli_real_escape_string($connection,$val);

                            $tempArray[$keys] =$val;
                    }
                    $request->merge(array($key => $tempArray));

                }
                else
                {
                    $val = htmlspecialchars($value);
                    $val = mysqli_real_escape_string($connection,$value);
                    //$val = DB::connection()->getPdo()->quote($value);
                   // $val = DB::connection()->getPdo($value);
                    $request->merge(array($key => $val));
                }

            }

        }*/

        return $next($request);
        

    }

}