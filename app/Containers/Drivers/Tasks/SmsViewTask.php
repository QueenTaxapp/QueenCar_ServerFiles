<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Config;
use App\Containers\Drivers\Models\SmsModel;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SmsViewTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run()
    {
        $page=Config::get('app.paginate');

        $data=SmsModel::select('911_Sms.*')->paginate($page);

        if ( ! $data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/view')
                ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        return $data;
    }

}