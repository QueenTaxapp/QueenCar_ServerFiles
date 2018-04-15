<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Tasks\Task;


/**
 * Class GetData
 * @package App\Containers\Email\Tasks
 */
class GetData 
{
    /**
     * used to GetData on the table
     * @param string $id
     * @param string $fieldName
     * @param string $tableName
     * @return  object|array
     */
    public function run($id=null,$fieldName,$tableName)
    {

        if($id ==  null)
        {
            $no = GetConfigs::getConfigs('paginate');
            $table = $tableName::select($fieldName)->paginate($no);
            /*echo "<pre>";
            print_r($table);die();*/
            return $table;


        }
        else
        {
            
            $table = $tableName::select($fieldName)->where('id','=',$id)->first();
            
            return $table;
        }   
        
        

    }

}
