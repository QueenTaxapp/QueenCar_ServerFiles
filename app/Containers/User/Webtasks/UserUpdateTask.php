<?php

namespace App\Containers\User\Webtasks;

use App\Containers\User\Models\Country;
use App\Containers\User\Models\UserDetail;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserUpdateTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run($request)
    {

        //get country


        $newUser = UserTableModel::where('id',$request->id)->first();
        $newUser->firstname             = $request->firstName;
        $newUser->lastname              = $request->lastName;
        $newUser->email                 = $request->email;
        $newUser->gender                = $request->gender;
        $newUser->address               = $request->address;
        $newUser->city                  = $request->city;
        $newUser->state                 = $request->state;

        // $newUser->country               = $country;

        $newUser->phone_number          = $request->phone_number;
        $newUser->save();

        if(!$newUser->save())
        {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));
        }

        return $newUser;
    }

}
