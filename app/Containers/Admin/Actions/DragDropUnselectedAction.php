<?php

namespace App\Containers\Admin\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Tasks\CheckEmailTask;
use App\Ship\Parents\Requests\Request;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\DB;

use App\Containers\Admin\Tasks\CheckPasswordTask;

use App\Containers\Admin\Models\AdminDetailsModel;

use App\Containers\Admin\Models\AdminModel;

use App\Containers\Admin\Tasks\SessionKeyTask;

use \Cache;

use Illuminate\Validation\ValidationException;

use App\Containers\Admin\Tasks\Message;


class DragDropUnselectedAction extends Action
{
    public function run($selected,$all)
    {
         
        $newArray = array();

        if(!empty($selected))
        {
            foreach($all as $value)
            {
                // if (!in_array($value['name'], $selected)) 
                if (!array_key_exists($value['name'],$selected)) 
                {
                    $newArray[] = $value['name'];
                }
    
            }

            return $newArray;
        }
        else
        {
           
            foreach($all as $value)
            {

                $newArray[] = $value['name'];
                
    
            }
            return $newArray;
        }  
    }
}  