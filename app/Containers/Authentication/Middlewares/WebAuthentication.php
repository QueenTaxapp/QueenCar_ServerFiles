<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\ApiHelper;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Redirect;
use App\Containers\Admin\Models\AdminModel;
use \Cache;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class WebAuthentication extends Middleware
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

        if(Session::has('lang'))
        {

            $lang = Session::get('lang');

        }
        else
        {

            $lang = App::setLocale(null,null);
        }

        App::setLocale($lang);


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

        if(!$request->session()->has('sessionMemory'))
        {
                $array = array('success'=>'false','message'=>trans("localization::errors.please login to continue"));

                $request->session()->flash('success', $array);
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                Session::put('link', $actual_link);


                return redirect()->route('adminLoginPage');
        }

        $id = substr($request->session()->get('sessionMemory')["key"], 3);


        if(Cache::has('linkId'.$id))
        {

           // $url = Cache::get('linkId'.$id);
            Cache::forget('linkId'.$id);
            //$url = "Location: $url";
            //header($url);
            //die();

        }

        // set language



//        if(!session::has('isActive') || !session::has('isBlock'))
//        {
            $adminmodel = AdminModel::join('Admin_details', 'Admin.id', '=', 'Admin_details.id')
                        ->where('Admin.id', '=', $id)
                        ->where('Admin_details.id', '=',$id)
                        ->first();



            $isActive = $adminmodel->is_active;
            $isBlock = $adminmodel->block;
            $rememberToken = $adminmodel->remember_token;
            $role = $adminmodel->role;
            $adminReferenceId = $adminmodel->admin_key;

            session::put('isActive',$isActive);
            session::put('isBlock',$isBlock);
            session::put('rememberToken',$rememberToken);
            Session::put('adminRole',$role);
            Session::put('adminReferenceId',$adminReferenceId);


        if(!Session::get('areaName'))
        {


            ApiHelper::putAreaName();

            //ApiHelper::putAreaName();
//            $areaNameGet = AdminModel::select('area_name','admin_key')
//                ->where('role','99999')
//                ->get();

//            if(count($areaNameGet) == 0)
//            {
//                $areaname = array();
//            }
//            else
//            {
//                foreach ($areaNameGet as $value)
//                {
//                    $areaname[$value->admin_key] = $value->area_name;
//                }
//            }
//
//
//            Session::put('areaName',$areaname);
        }
//      ;  }
//        else
//        {
//            $isActive = session::get('isActive');
//            $isBlock =  session::get('isBlock');
//            $rememberToken = session::get('rememberToken');
//        }


        if($role == '100000')
        {



            $response= array('success'=>"TRUE",'message'=>trans('localization::lang_view.please_sigin_on_dispatcher_login'));
            $request->session()->flash('dispatcher_login',$response);

            return Redirect::to("/admin/login");
        }


        if(Cache::has('lockscreen'.$id))
        {

           return redirect()->route('adminLockscreenPage',$id);
        }

        if($isActive == 0)
        {
           throw new ValidationException((new Message()),redirect()->to('admin/login')
               ->withErrors([trans('localization::errors.you are inactive')], 'default'));
        }

        if($isBlock == 0)
        {
           throw new ValidationException((new Message()),redirect()->to('adminLoginPage')
               ->withErrors([trans('localization::errors.you are blocked')], 'default'));
        }

        if(Cache::has('cacheMemory'.$id))
        {


            if( Cache::get('cacheMemory'.$id)["key"] != $request->session()->get('sessionMemory')["key"] && Cache::get('cacheMemory'.$id)["hash"]!= $request->session()->get('sessionMemory')["hash"] )
            {


                $array = array('success'=>'false','message'=>trans("localization::errors.please login to continue"));

                $request->session()->flash('success', $array);

                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                Cache::put('linkId'.$id,$actual_link, 60);

                return redirect()->route('adminLoginPage');

            }

        }
        else
        {

             if($rememberToken != $request->session()->get('sessionMemory')["hash"])
            {


                $array = array('success'=>'false','message'=>trans("localization::errors.please login to continue"));

                $request->session()->flash('success', $array);
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                Cache::put('linkId'.$id,$actual_link, 60);

                return redirect()->route('adminLoginPage');
            }


        }

        if (Cache::has('lock'.$id))
        {
            Cache::forget('lock'.$id);
            //$url = Session::get('url') ;
            //$object = new LockScreenValidationAction();
            // $object->headerLInk($request,$url);
        }



        return $next($request);
    }
}
