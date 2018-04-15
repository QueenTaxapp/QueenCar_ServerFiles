<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiHeroSocialLoginTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $social_id = $request->social_unique_id;
        $hero = HeroModel::where('social_unique_id', $social_id)->first();

        if (!$hero) {

            throw(new CommonException())->setValue(603,trans('localization::errors.603'));
            //$res = array('success'=>"False",'error'=>"social_id not Found",'message'=>"Login Failed");

        } else {
            $randomNumber = time();
            $randomNumber .= rand();
            $hashed_token = $hero->token;

            if (Hash::check($randomNumber, $hashed_token))
            {
                $hero = HeroModel::where('social_unique_id', $social_id)->update(
                    [
                        'device_token' => $request->device_token,
                        'login_by' => $request->login_by,
                        'login_method' => $request->login_method,
                        'token_expiry' => date("Y-m-d h:i:s", strtotime("+2 day")),

                    ]);
            }
            else
            {
                $randomNumber = Hash::make($randomNumber);

                $hero = HeroModel::where('social_unique_id', $social_id)->update(
                    [
                        'token' => $randomNumber,
                        'token_expiry' => date("Y-m-d h:i:s", strtotime("+2 day")),
                        'device_token' => $request->device_token,
                        'login_by' => $request->login_by,
                        'login_method' => $request->login_method,
                    ]);


            }
         $response = array('success'=>"True",'message'=>"Login Success");
            $heroes=HeroModel::Where('social_unique_id', $request->social_unique_id)->first();
        }

        return $heroes;

    }

}