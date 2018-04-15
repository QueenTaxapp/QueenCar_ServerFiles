<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;
use App\Containers\User\Models\UserTableModel;
use Hash;
use App\Containers\Admin\Tasks\Message;
use Request;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SaveUserTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $result='';
        $user = new UserTableModel();
        $user->firstname  = $request->firstName;
        $user->lastname  = $request->lastName;
        $user->address = $request->adr;
        $user->username  = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password   = Hash::make($request->pass);
        $user->is_active  = 1;
        $user->timezone  = $request->time_zone;
        if ($request->hasFile('avatar'))
        {
                $file = array('profile_pic' =>  $request->file('avatar'));
                $destinationPath = public_path()."/assets/img/uploads";
                $extension =  $request->file('avatar')->getClientOriginalExtension();
                $fileName=time();
                $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                if(!$request->file('avatar')->move($destinationPath,$fileName))
                {
                    throw new ValidationException((new Message()),redirect()->to('createuser')
                        ->withErrors([trans('localization::errors.failed upload')], 'default'));

                }
                $user->profile_pic=asset("assets/img/uploads")."/".$fileName;
        }
            $user->save();
            if ( ! $user->save())
            {
                throw new ValidationException((new Message()),redirect()->to('createuser')
                    ->withErrors([trans('localization::errors.details_could_not_saved_in')].$user, 'default'));

            }
            else
            {
                $result = array('success'=>'true','message'=>trans('localization::errors.user_registered_successfully'));
            }
        return $result;
    }

}
