<?php

namespace App\Containers\Admin\Webtasks;

use App\Ship\Parents\Tasks\Task;

use Illuminate\Support\Facades\Hash;


/**
 * Class SessionKeyTask
 * @package App\Containers\Admin\Tasks
 */
class SessionKeyTask extends Task
{

    /**
     * used to generate session key
     * @return int|string
     */
    public function run()
    {
            $randomNumber = time();
            $randomNumber .= rand();

            $randomNumber = Hash::make($randomNumber);

            return $randomNumber;
    }
}