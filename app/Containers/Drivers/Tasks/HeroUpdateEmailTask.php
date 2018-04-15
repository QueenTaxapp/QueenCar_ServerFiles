<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroUpdateEmailTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $email=$request->email;
        $old= HeroModel::where('id','=',$id)->first();
        if ( ! $old)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/hero/edit/'.$id)
                ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }
        else
            {
                $oldemail=$old->email;

                if($oldemail == $email)
                {
                    $count=0;
                }
                else
                {
                    $use = HeroModel::where('email','=',$email)->first();

                    $count=count($use);

                    if($count>0){
                        throw new ValidationException((new Message()),redirect()->to('admin/hero/edit/'.$id)
                            ->withErrors([trans('localization::errors.email_already_exits')], 'default'));
                    }

                }

            }

    return $count;

    }

}