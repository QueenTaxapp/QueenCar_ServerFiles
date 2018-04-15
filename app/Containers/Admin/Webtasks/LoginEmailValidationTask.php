<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\DriversModel;
use App\Containers\Common\ApiHelper;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Admin\Webtasks\SessionKeyTask;
use \Cache;
use App\Containers\Admin\Webtasks\Message;

class LoginEmailValidationTask
{
    use CallableTrait;

    public function run($emailAddress,$password,$remember = null)
    {

        $tableNameSpace = 'App\Containers\Admin\Models\AdminModel';

        $adminDetails = $tableNameSpace::select('id','admin_key','admin_reference','firstname','lastname','is_active','role','profile_pic','password','language')->where('email',$emailAddress)->first();



        if(count($adminDetails) == 0 )
        {
            throw new ValidationException((new Message()),redirect()->to('admin/login')
                 ->withErrors([trans('localization::errors.username or password invalid')], 'default'));
        }

        if (Hash::check($password,$adminDetails->password))
        {
            $id = $adminDetails->id;
            Cache::forget('cacheMemory'.$id);
            $ipAddress = $_SERVER['SERVER_ADDR'];

            $sessionKey  = $this->call(SessionKeyTask::class);
            $key = rand(111,999);
            $key .= $id;
            $array = array('key'=> $key,'hash'=>$sessionKey);

            if($remember != null )//$request->remember == 'remember')
            {

                AdminModel::where('id', '=', $id)->update(['remember_token' => $sessionKey]);

            }
            else
            {
                Cache::put('cacheMemory'.$id,$array, 60);
            }
            ApiHelper::set_language($adminDetails->id , $lang = $adminDetails->language);

            session::put('sessionMemory',$array);
            session::put('token',$key);
            session::put('emailAddress',$emailAddress);
            session::put('id',$adminDetails->id);
            session::put('name',$adminDetails->firstname.' '.$adminDetails->lastname);
            session::put('isActive',$adminDetails->is_active);
            session::put('role',$adminDetails->role);
            session::put('profilePicture',$adminDetails->profile_pic);
            session::put('admin_key',$adminDetails->admin_key);
            session::put('admin_reference',$adminDetails->admin_reference);



            if($adminDetails->role == 0)
            {
                session::put('reterive_key',0);
                $reterive_key = 0;
            }
            else
            {

                if($adminDetails->role == 99999)
                {
                    session::put('reterive_key',$adminDetails->admin_key);
                    $reterive_key = $adminDetails->admin_key;
                }
                else
                {
                    session::put('reterive_key',$adminDetails->admin_reference);
                    $reterive_key = $adminDetails->admin_reference;
                }

            }


            $tempAdminDetails = array('admin_key'=>$adminDetails->admin_key,
                'admin_reference'=>$adminDetails->admin_reference,
                'role'=>$adminDetails->role,
                'isActive'=>$adminDetails->is_active,
                'reterive_key'=>$reterive_key);

            Cache::forever('adminDetails'.$id, $tempAdminDetails);

            $tableNameSpace = 'App\Containers\Admin\Models\AdminDetailsModel';

            $tableNameSpace::where('id',$adminDetails->id)
                            ->update(['login_attempt' => 0,'last_login_ip_address'=> $ipAddress]);

            $array = array('success'=>True,'adminDetails'=>$adminDetails);

            return $array;


        }
        else
        {
            $array = array('success'=>false,'adminDetails'=>$adminDetails);
            return $array;
        }

    }
}