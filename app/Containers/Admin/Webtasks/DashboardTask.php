<?php

namespace App\Containers\Admin\Webtasks;

use Apiato\Core\Traits\CallableTrait;
use App\Ship\Parents\Tasks\Task;

/**
 * Class DashboardTask
 * @package App\Containers\Admin\Webtasks
 */
class DashboardTask
{

    use CallableTrait;

    public function run($array)
    {

        $result = array();
        foreach ($array as $key => $value)
        {


            $result[$key] = $this->call($value,[]);


        }


        return $result;
    }

}