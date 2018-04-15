<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\DriversModel;
use App\Containers\Admin\Tasks\Message;
use App\Containers\Company\Models\CompanyModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Admin\Webtasks\SessionKeyTask;

use \Cache;

class CompanyLoginEmailValidationTask
{
    use CallableTrait;

    public function run($emailAddress,$password,$remember = null)
    {
        $tableNameSpace = 'App\Containers\Company\Models\CompanyModel';

        $companyDetails = $tableNameSpace::select('*')->where('email',$emailAddress)->first();
//
       // echo "<pre>";print_r($adminDetails);die();

        if(count($companyDetails) == 0 )
        {
            throw new ValidationException((new Message()),redirect()->to('company/login')
                 ->withErrors([trans('localization::errors.username or password invalid')], 'default'));
        }

        if (Hash::check($password,$companyDetails->password))
        {
            $id = $companyDetails->id;
            Cache::forget('companyCacheMemory'.$id);
            $ipAddress = $_SERVER['SERVER_ADDR'];

            $sessionKey  = $this->call(SessionKeyTask::class);
            $key = rand(111,999);
            $key .= $id;
            $array = array('key'=> $key,'hash'=>$sessionKey);

            if($remember != null )//$request->remember == 'remember')
            {

                CompanyModel::where('id', '=', $id)->update(['remember_token' => $sessionKey]);

            }
            else
            {
                Cache::put('cacheMemory'.$id,$array, 60);
            }


            Session::put('companySessionMemory',$array);
            Session::put('token',$key);
            Session::put('company_email',$emailAddress);
            Session::put('company_id',$companyDetails->id);
            Session::put('company_name',$companyDetails->company_name);
            Session::put('company_owner_name',$companyDetails->name);
            Session::put('company_status',$companyDetails->status);
            Session::put('company_registration_code',$companyDetails->registration_code);
            Session::put('company_profile_pic',$companyDetails->profile_pic);
            //echo "<pre>";print_r(Session::all());die();


            CompanyModel::where('id',$id)
                            ->update(['login_attempt' => 0,'last_login_ip_address'=> $ipAddress]);

            $array = array('success'=>true,'adminDetails'=>$companyDetails);

            return $array;


        }
        else
        {
            $array = array('success'=>false,'adminDetails'=>$companyDetails);

            return $array;
        }

    }
}