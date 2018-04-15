<?php
namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\DriversModel;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Apiato\Core\Traits\CallableTrait;
use App\Containers\Admin\Webtasks\SessionKeyTask;
use \Cache;

class BlockTask
{
    use CallableTrait;

    public function run($block,$report)
    {
        if($report == true)
        {
            $block[0]::where('id',$block[2])
                    ->update(['login_attempt'=>0]); 
      
        }
        else
        {
            if($block[1] <=5)
            {
                $block[0]::where('id',$block[2])
                    ->update(['login_attempt'=>$block[1]+1]);
                return true;
            }
            else
            {
                $block[0]::where('id',$block[2])
                    ->update(['block'=>0,'login_attempt'=>0]); 
                
                return false;      

            }
        }


    }
}