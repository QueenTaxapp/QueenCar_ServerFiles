<?php

namespace App\Containers\User\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ValidateEmailTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string
     *
     * @return  array
     */
    public function run(Request $request)
    {
        if($oldEmailAddress == $newEmailAddress)
        {
            return $request;
        }
        else
        {
            $admin = UserTableModel::where('email', '=', $newEmailAddress)->first();

            if(count($admin) == 0)
            {
                return $request;
            }
            else
            {
                throw new ValidationException((new Message()),redirect()->to('edituser/'.$request->id)
                    ->withErrors([trans('localization::errors.email_already_exits')], 'default'));
            }

        }
    }

}
