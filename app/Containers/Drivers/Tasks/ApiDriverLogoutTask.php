<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Parents\Tasks\Task;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiDriverLogoutTask extends Task
{
    /**
     * @param      object $request
     * @param      object $class
     *
     */
    public function run($request,$class)
    {
        $class::where('id',$request->id)->update(['token' => 0,'token_expiry' => '1900-12-12 00:00:00','is_active'=> 0]);
        return ;
    }

}