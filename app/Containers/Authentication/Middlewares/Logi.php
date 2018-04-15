<?php

namespace App\Containers\Authentication\Middlewares;


use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Logi extends Middleware
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    


    /**
     * WebAuthentication constructor.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    // public function __construct(Guard $auth)
    // {
        
    //     // $this->auth = $auth;

    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

       
        // echo "test";
        // echo "<pre>";
        // print_r($request->all());

        $request = Logi::htmlSpecialChars($request->all());

        $request =  $request;

        // echo "<pre>";
        // print_r($request);
        //die();
        //print_r($request);
        // echo "<brs>";
        // echo $request->email;
        // echo json_encode($request);
         
        // if (Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        // {
        //         // return Redirect::intended('dashboard');
        // }

         return $next($request);
    }


        /*
        // used to convert all tags in to string 
        @param array $input 
        @return array
        */
        public static function htmlSpecialChars($input)
        {

            
            $output = array();

            
            foreach($input as $key=>$value)
            {

            //     echo "<pre>";
            //    print_r($key);
            //    echo "<pre>";
            //    print_r($value);
                if(!is_int($value ))
                {
                    $key = htmlspecialchars($key);
                    $value = htmlspecialchars($value);
                    $temp = array($key=>$value);
                    $output = $output + $temp;
                }
                else
                {
                    $temp = array($key=>$value);
                    $output = $output + $temp;                   
                }

            }

            print_r($output );
           
            return $output;
        }

        /*
        // used to convert all escape string in to ordinary string 
        @param array $input 
        @return array
        */
        public static function MysqlEscapeString($input)
        {
            $connection = mysqli_connect("localhost", "root", "", "json");
            $output = array();
            foreach($input as $key=>$value)
            {
                if(!is_int($value ))
                {
                $key = mysqli_real_escape_string($connection,$key);
                $value = mysqli_real_escape_string($connection,$value);
                $temp = array($key=>$value);
                $output = $output + $temp;
                }
                else
                {
                $temp = array($key=>$value);
                $output = $output + $temp;                   
                }

            }
            return $output;          
        }    
}
