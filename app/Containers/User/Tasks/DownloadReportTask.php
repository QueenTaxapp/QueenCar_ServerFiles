<?php

namespace App\Containers\Admin\Tasks;

//use Illuminate\Http\Request;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DownloadReportTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request,$admins)
    {

        if ($request->submit && $request->submit == 'Download_Report') {

            header('Content-Type: text/csv; charset=utf-8');

            header('Content-Disposition: attachment; filename=Report_Admins.csv');

            $handle = fopen('php://output', 'w');

            fputcsv($handle, array('id','name', 'email'));

            foreach ($admins as $admin) {

                $walkerEmail = explode('@',$admin->email);

                fputcsv($handle, array(

                    $admin->admin_id,

                    $admin->firstname . " " . $admin->lastname,

                    "xxxx@".end($walkerEmail),

                ));
            }


            fclose($handle);


            $headers = array(
                'Content-Type' => 'text/csv',
            );

            die();

        }else{

            return $admins;

        }


    }

}