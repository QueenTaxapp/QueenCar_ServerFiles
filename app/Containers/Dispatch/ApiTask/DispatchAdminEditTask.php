<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Admin\Models\AdminDetailsModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Webtasks\ApiInsertImageTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DispatchAdminEditTask
{

    public function run($data, $custom_parameter)
    {

        $admin = AdminModel::select('id')
                            ->where('emergency_number',$data['request']->emergency_number)
                            ->where('id','!=',$data['request']->id)
                            ->get();

        if(count($admin) != 0)
        {
            throw (new CommonException())->setValue(736,trans("localization::errors.736"));

        }

        $admin = AdminModel::select('id','password')
                            ->where('id','!=',$data['request']->id)
                             ->first();

        $password = $admin->password;


            if($data['request']->has('old_password'))
            {
                if (!Hash::check($data['request']->old_password, $password))
                {
                    throw (new CommonException())->setValue(737,trans("localization::errors.737"));

                }

                $newPassword  = Hash::make($data['request']->new_password);


            }
            else
            {

                $newPassword = $password;
            }


                if ($data['request']->hasFile('profile_pic'))
                {

                    $destinationPath = public_path() . "/assets/img/uploads";
                    $extension = $data['request']->profile_pic->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111, 99999) . '.' . $extension; // renaming image
                }
                else
                {
                    $fileName = $data['request']->profile_pic;
                }


                $adminArray = array(
                    'firstname'=>$data['request']->firstname,
                    'lastname'=>$data['request']->lastname,
                    'password'=>$newPassword,
                    'emergency_number' => $data['request']->emergency_number,
                    'profile_pic'=> $fileName
                            );


                AdminModel::where('id',$data['request']->id)
                            ->update($adminArray);

                $adminDetailsArray = array(
                    'address'=>$data['request']->address,
                    'country'=>$data['request']->country,
                    'postalcode'=>$data['request']->postal_code

                );

                AdminDetailsModel::where('admin_id',$data['request']->id)
                    ->update($adminDetailsArray);


                $overall = array();

                foreach ($adminArray as $key=>$value)
                {
                    if($key != 'password')
                    {
                        $overall[$key] = $value;
                    }

                }

                foreach ($adminDetailsArray as $key=>$value)
                {
                    $overall[$key] = $value;
                }







        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "admin_edited_successfully";

        $response->key = 'admin';


        $tempArray = $overall;



        $response->dispatcher =$tempArray;



        $data['response']= $response;


        return $data;

    }
}