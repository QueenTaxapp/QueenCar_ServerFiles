<?php

namespace App\Containers\User\Actions;


use App\Ship\Parents\Actions\Action;
use App\Containers\User\Models\UserTableModel;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApproveDeclineUserAction extends Action
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $user = new UserTableModel();
        $activeStatus = $user->select('is_active')->where('id','=',$id)->first();
        

        if($activeStatus->is_active == 0)
        {
                $user->where('id','=',$id)
                ->update(['is_active' => 1]); 
                $message = trans('localization::errors.user_active_successfully');
                $result = array('success'=>'true','message'=>$message);      
        }
        else if($activeStatus->is_active == 1)
        {
                $user->where('id','=',$id)
                ->update(['is_active' => 0]);
  
                $message = trans('localization::errors.user_inactive_successfully');
                $result = array('success'=>'true','message'=>$message);    
        }

        return $result;
    }

}