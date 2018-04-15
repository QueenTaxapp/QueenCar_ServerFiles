<?php

namespace App\Containers\Types\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;


class ApiSetTypeCache extends Task
{

    /**
     * Set Format data in cache
     *
     * @param Object $type
     *
     * @return  array
     */
    public function run($type)
    {
        $makeArray = [];
        $makeArray['id']=$type->id;
        $makeArray['name']=$type->name;
        $makeArray['icon']=$type->icon;
        return $makeArray;
    }
}
