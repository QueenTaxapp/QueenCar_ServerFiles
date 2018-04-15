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


class FileDecodeAction extends Action
{
    public function run($fullPath)
    {
        $has = @get_headers($fullPath);

        if($has[0] == 'HTTP/1.1 200 OK')
        {
            $ValueOnFile =  file_get_contents($fullPath); 

            $ValueOnFile = json_decode($ValueOnFile, TRUE);

            return  $ValueOnFile;                                             
        }
        else
        {
            //die('hai');
            return Null;
        }
    }
}  