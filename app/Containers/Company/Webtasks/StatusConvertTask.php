<?php

namespace App\Containers\Company\Webtasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\UserTableModel;


class StatusConvertTask 
{
    /**
     * @param   object
     *
     * @return  object
     */
    public function run($values)
    { 
         $result = array();


        foreach($values as $key=>$value)
        {
            $array =  (array) $value;

            if($value->status == 1)
            {
                $array += array('status_detail' => 'inactive');
            }
            else
            {
                $array += array('status_detail' => 'active'); 
                        
            }
                $array=  (object) $array;
                $result[] = $array; 

        }
        die();
        return  $result;
    }
}