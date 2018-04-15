<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use App\Ship\Parents\Exceptions\Exception;

use Illuminate\Validation\ValidationException;

use App\Containers\Admin\Webtasks\Message;


class IsActiveTask
{
    public function run($number,$ifEqualToNumber,$routeName,$message)
    {
        if($number == $ifEqualToNumber)
        {
            throw new ValidationException((new Message()),redirect()->to($routeName)
                ->withErrors([trans('localization::errors.'.$message)], 'default'));

        }

    }
}


