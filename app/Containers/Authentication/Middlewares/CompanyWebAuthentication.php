<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Tasks\Message;
use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Redirect;
use App\Containers\Admin\Models\AdminModel;
use \Cache;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Containers\Company\Models\CompanyModel;
use App\Containers\Company\Webtasks\IsActiveTask;
use Illuminate\Support\Facades\Log;

class CompanyWebAuthentication extends Middleware
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
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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


        Log::info( Session::get('companySessionMemory'));

        if(!Session::has('companySessionMemory'))
        {
            Log::info('not has session memory');
                $array = array('success'=>'false','message'=>trans("localization::errors.please login to continue"));

                $request->session()->flash('success', $array);

                return redirect()->route('companyLoginPage');

        }
        

       
        $id = substr($request->session()->get('companySessionMemory')["key"], 3);


        if(!Session::has('company_status') || !Session::has('company_remember_token'))
        {

            $companyValue = CompanyModel::select('id','remember_token','status')->where('id',$id)->first();
           
            Session::put('company_status',$companyValue->status);
            Session::put('company_remember_token',$companyValue->remember_token);

        }

        $CompanyStatus = Session::get('company_status');
        $companyRememberToken = Session::get('company_remember_token');

        $obj = new IsActiveTask();

        $obj->run($CompanyStatus,1,'company/login','you are inactive');

        if( Cache::has('companyCacheMemory'.$id) )
        {
            if( Cache::get('companyCacheMemory'.$id)["key"] != $request->session()->get('companySessionMemory')["key"] && Cache::get('companyCacheMemory'.$id)["hash"]!= $request->session()->get('companySessionMemory')["hash"] )
            {
                
                goto nex;
            }
        }
        else
        {
            nex:

            if($companyRememberToken != $request->session()->get('companySessionMemory')["hash"])
            {
                $array = array('success'=>'false','message'=>trans("localization::errors.please login to continue"));

                $request->session()->flash('success', $array);
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



                Log::info('fails2');
                Session::put('company_link', $actual_link);

                return redirect()->route('companyLoginPage');
            }

        }

        return $next($request);
    }
}
