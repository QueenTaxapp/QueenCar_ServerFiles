<?php

namespace App\Containers\Layout\UI\WEB\Controllers;

use App\Containers\Admin\fileExists\fileExists;
use App\Containers\Admin\Models\AdminDetailsModel;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminTypesModel;
use App\Containers\Admin\UI\WEB\Requests\AdminPrivilegeNameEditRequest;
use App\Containers\Admin\Webtasks\AdminAddSaveTask;
use App\Containers\Admin\Webtasks\AdminUpdateTask;
use App\Containers\Admin\Webtasks\AdminViewTask;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Admin\Webtasks\SearchTask;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use \Cache;
use Illuminate\Validation\ValidationException;




/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

    /**
     * adminLogin
     * @param  object $request
     * @return view  admin::AdminLoginBlade
     */

    public function layoutPage(Request $request)
    {

        return view('layout::Layout');

    }

    public function lockscreenValidationa(Request $request)
    {
        $id = Session::get('id');

        Cache::forget('lockscreen'.$id);

        Session::forget('sessionMemory');
        
        $emailCheckNameSpace = 'App\Containers\Admin\Webtasks\LoginEmailValidationTask';
        $adminDetails = $this->call($emailCheckNameSpace, [$request['emailAddress'],$request['password'],$request['rememberMe']]);
 
        if($adminDetails['success'] == 1)
        {
            $id = $adminDetails['adminDetails']->id;

            $reteriveTaskNameSpace = 'App\Containers\Admin\Webtasks\ReteriveTask';

            $selectArray = array('block','login_attempt');

            $where = 'admin_id = '.$id;

            $AdminDetailsNameSpace = 'App\Containers\Admin\Models\AdminDetailsModel';

            $adminDetail = $this->call($reteriveTaskNameSpace, [$AdminDetailsNameSpace,$selectArray,$where]);

            if($adminDetail->block == 0)
            {

                throw new ValidationException((new Message()),redirect()->to('admin/login')
                ->withErrors([trans('localization::errors.you are blocked')], 'default'));
            } 
            
            Cache::put('lock'.$id,$adminDetail, 60);
            return redirect()->route('dashboard',$id);  
        }
        else
        {
            throw new ValidationException((new Message()),redirect()->to('admin/lockscreen/'.Session::get('id'))
                ->withErrors([trans('localization::errors.username or password invalid')], 'default'));

        }

    }

    public function logouta(Request $request)
    {
        //echo "<pre>";print_r(Session::all());die();

        $id = Session::get('id');

        Cache::put('lock'.$id,$id, 60);
        Session::forget('id');
        Session::forget('sessionMemory');
        Session::forget('emailAddress');
        Session::forget('name');
        Session::forget('isActive');
        Session::forget('role');
        Session::forget('profilePicture');
        Session::forget('isBlock');
        Session::forget('rememberToken');
        Session::put('logout','logout');
        return redirect()->route('adminLoginPage');
    }

}