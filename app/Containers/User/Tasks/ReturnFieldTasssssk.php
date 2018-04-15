<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ReturnFieldTaskaaaa extends Task
{
    /**
     * used to generate OTP with expire time of 15 minutes 
     * 
     * @return  array 
     */
    public function run($id,$fieldName,$tableName)
    {
        die('test111');
    }
    //     if($id == null)
    //     {
    //        echo "a";
    //     }
          
        
        
    //     if($id != '0')
    //     {
    //         $table = $tableName::select($fieldName)->where('id','=',$id)->get();
    //     }
    //     else
    //     {
    //         $table = $tableName::select($fieldName)->get();
    //     }               
        

    //     if($fieldName != '*')
    //     {
    //         return $table->$fieldName;
    //     }
    //     else
    //     {
    //         return $table;
    //     }
        

    // }

}
