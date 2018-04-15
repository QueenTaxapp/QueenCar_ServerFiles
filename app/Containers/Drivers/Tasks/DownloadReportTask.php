<?php

namespace App\Containers\Drivers\Tasks;

//use Illuminate\Http\Request;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
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
    public function run($request,$heroes)
    {

        if ($request->submit && $request->submit == 'Download_Report') {

            header('Content-Type: text/csv; charset=utf-8');

            header('Content-Disposition: attachment; filename=Report_Heroes.csv');

            $handle = fopen('php://output', 'w');

            fputcsv($handle, array('id','name','email' ,'type' ,'approve' ,'status' ));

            foreach ($heroes as $hero) {

                $heroEmail = explode('@',$hero->email);

                $type= "";

                $approve="";

                $active="";

                if($hero->type==1){
                    $type= "Police";
                }elseif($hero->type==2){
                    $type= "Ambulance";
                }elseif($hero->type==3){
                    $type= "Fireman";
                }

                if($hero->is_approve==1){
                    $approve= "Approved";
                }elseif($hero->is_active==0){
                    $approve= "Declined";
                }

                if($hero->is_active==1){
                    $active= "Active";
                }elseif($hero->is_active==0){
                    $active= "Inactive";
                }

                fputcsv($handle, array(

                    $hero->id,

                    $hero->firstname . " " . $hero->lastname,

                    "xxxx@".end($heroEmail),

                    $type,

                    $approve,

                    $active

                ));
            }


            fclose($handle);


            $headers = array(
                'Content-Type' => 'text/csv',
            );

            die();

        }else{

            return $heroes;

        }


    }

}