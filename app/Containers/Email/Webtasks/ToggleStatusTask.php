<?php

namespace App\Containers\Email\Webtasks;

use App\Ship\Parents\Tasks\Task;




/**
 * Class ToggleStatusTask
 * @package App\Containers\Email\Tasks
 */
class ToggleStatusTask 
{

    /**
     * to toggle email settings
     * @param $id
     * @param $columnName
     * @param $tableName
     */
    public function run($id, $columnName, $tableName)
    {
        $status =  $tableName::select($columnName)->where('id', '=', $id)->get()[0]->status;
       
        $status = $status ==  1 ? $status = 0 : $status = 1;

        $tableName::where('id', '=', $id)->update(array( $columnName=> $status));  
        
    }
}
