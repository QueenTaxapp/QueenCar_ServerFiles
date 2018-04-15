<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\UserTableModel;


/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserDownloadReportTask extends Task
{
    /**
     * @param   object
     *
     * @return  object
     */
    public function run($result)
    { 

            header('Content-Type: text/csv; charset=utf-8');

            header('Content-Disposition: attachment; filename=Report_User.csv');
 
            $handle = fopen('php://output', 'w');

            fputcsv($handle, array('s.no','id','Name', 'UserName','Email address','phone number','status'));

            $result1 = $result->first();
 
            $i = 1 ;

            foreach ($result as $admin) 
            {

                    $status = 'inactive';

                    if($admin->is_active == 1)
                    {
                        $status = 'active'; 
                    }


                        fputcsv($handle, array(
                           
                        $i,
                        $admin->id,
                        $admin->firstname." ".$admin->lastname,
                        $admin->username,
                        $admin->email,
                        $admin->phone_number, 
                        $status,     

                    //"xxxx@".end($walkerEmail),

                 ));
                 $i++;
            }
            
           
            fclose($handle);
            
            
            $headers = array(
                            'Content-Type' => 'text/csv',
            );
            
            die();
    }

}
