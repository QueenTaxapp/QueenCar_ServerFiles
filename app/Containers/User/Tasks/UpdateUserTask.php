<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;
use App\Containers\User\Models\UserTableModel;
use Hash;
use App\Containers\Admin\Tasks\Message;
use Request;
use App\Containers\User\UI\WEB\Requests\ValidateRequest;
use App\Ship\Parents\Actions\Action;
use App\Containers\User\Tasks\ValidateEmailTask;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $user = new UserTableModel();
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
                $profile_pic=asset("assets/img/uploads")."/".$fileName;
                $user->where('id','=',$request->id)
                ->update(['profile_pic' => $profile_pic]);
        }
        $user->where('id','=',$request->id)
          ->update(['firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'address' => $request->adr,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    ]);

                    
        if(!$user)
        {

        }

        $result = array('success'=>'true','message'=>trans('localization::errors.user_modification_successfully'));
        return $result;
    }

}