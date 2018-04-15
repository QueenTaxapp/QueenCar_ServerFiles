<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */

class ReteriveTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string
     *
     * @return  array
     */
    public function run($tableNameSpace,$array,$where='created_at != 0')
    {
        

        $value = $tableNameSpace::select($array)
                         ->whereRaw($where)
                         ->first();

        
        return $value;
    }

}


