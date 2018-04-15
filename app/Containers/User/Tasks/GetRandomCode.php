<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use phpDocumentor\Reflection\Types\Integer;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetRandomCode extends Task
{
    /**
     * Get Random Code
     *
     * @param Integer $length
     *
     * @return  String
     */
    public function run($length=5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
