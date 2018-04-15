<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Company\Models\CompanyModel;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Models\AdminTypesModel;
use App\Containers\Types\Models\Types;



class ReportDownloadTask
{
    /**
     * @param      $heading array
     * @param      $values  object
     * @param      $key     array
     * @param      $title     string
     * @return  document
     */
    public function run($heading,$values,$key,$title=null)
    {

        // echo "<pre>";print_r($values);die();
        $i = 0 ;
        if($title == null)
        {
            $title = 'report';
        }

        if(in_array('role',$key))
        {
            $adminTypes = AdminTypesModel::select('*')->get();
            $roles = array();
            foreach($adminTypes as $value)
            {
                $roles[$value->id] = $value->types;
            }

        }

        if(in_array('type',$key))
        {
            $adminTypes = Types::select('id','name')->get();
            $types = array();
            foreach($adminTypes as $value)
            {
                $types[$value->id] = $value->name;
            }
        }

        if(in_array('company_id',$key))
        {
            $company = CompanyModel::select('id','company_name')->get();

            $companies = array();

            foreach($company as $value)
            {
                $companies[$value->id] = $value->company_name;
            }
            // print_r($companies);die();
        }


        $siArray = array(trans('localization::lang_view.si_no'));
        $heading = array_merge($siArray,$heading);

        header('Content-Type: text/csv; charset=utf-8');

        header('Content-Disposition: attachment; filename= '.$title.'.csv');

        $handle = fopen('php://output', 'w');

        fputcsv($handle,$heading);

        //0.echo "<pre>";  print_r($values);

        if(count($values) != 0)
        {
            foreach ($values as $admin)
            {


                $i = $i+1;

                //$array[] = $i;
                $array = array();
                $array[0]= $i;



                foreach($key as $value)
                {

                    if($value == 'status')
                    {
                        if($admin->$value == 1)
                        {
                            $array[]= trans('localization::lang_view.active');
                        }
                        else
                        {
                            $array[]= trans('localization::lang_view.in_active');
                        }
                    }
                    elseif ($value == 'compliant_status')
                    {
                        if($admin->$value == 1)
                        {
                            $array[]= trans('localization::lang_view.new');
                        }
                        else if($admin->$value == 2)
                        {
                            $array[]= trans('localization::lang_view.taken');
                        }
                        else if($admin->$value == 3)
                        {
                            $array[]= trans('localization::lang_view.solved');
                        }
                    }
                    else if($value == 'is_active')
                    {
                        if($admin->$value == 1)
                        {
                            $array[]= trans('localization::lang_view.active');
                        }
                        else
                        {
                            $array[]= trans('localization::lang_view.in_active');
                        }
                    }
                    else if($value == 'is_approve')
                    {
                        if($admin->$value == 1)
                        {
                            $array[]= trans('localization::lang_view.active');
                        }
                        else
                        {
                            $array[]= trans('localization::lang_view.in_active');
                        }
                    }
                    else if($value == 'role')
                    {
                        if($admin->$value == 0)
                        {
                            $array[]= trans('localization::lang_view.super_admin');
                        }
                        elseif ($admin->$value == 100000)
                        {
                            $array[]= trans('localization::lang_view.dispatcher');
                        }
                        elseif ($admin->$value == 99999)
                        {
                            $array[]= trans('localization::lang_view.admin');
                        }
                        else
                        {
                            $array[]= $roles[$admin->$value];
                        }

                    }
                    else if($value == 'type')
                    {
                        $array[]= $types[$admin->$value];
                    }
                    else if($value == 'block')
                    {
                        if($admin->$value == 0)
                        {
                            $array[]= trans('localization::lang_view.block');
                        }
                        else
                        {
                            $array[]= trans('localization::lang_view.unblock');
                        }
                    }
                    else if($value == 'trip_status')
                    {
                        if($admin->is_completed == 1 && $admin->is_cancelled == 0)
                        {
                            $array[]= trans('localization::lang_view.completed');
                        }
                        elseif($admin->is_completed == 0 && $admin->is_cancelled == 1)
                        {
                            $array[]= trans('localization::lang_view.cancelled');
                        }
                        else{
                            $array[]= "-";
                        }
                    }
                    else if($value == 'payment_status')
                    {
                        if($admin->payment_status == 1)
                        {
                            $array[]= trans('localization::lang_view.paid');
                        }
                        else
                        {
                            $array[]= trans('localization::lang_view.not_paid');
                        }
                    }
                    else if($value == 'payment_method')
                    {
                        if($admin->$value == 0)
                        {
                            $array[]= trans('localization::lang_view.card');
                        }
                        elseif($admin->$value == 1)
                        {
                            $array[]= trans('localization::lang_view.cash');
                        }
                        elseif($admin->$value == 2)
                        {
                            $array[]= trans('localization::lang_view.wallet');
                        }
                        elseif($admin->$value == 3)
                        {
                            $array[]= trans('localization::lang_view.wallet/cash');
                        }
                        else{
                            $array[]= "-";
                        }
                    }
                    else if($value == 'company_id')
                    {
                        //$array[] = $admin->company_id;
                        if($admin->$value == '0'){
                            $array[] = trans('localization::lang_view.individual');
                        }elseif($admin->$value != null){
                            $array[]= $companies[$admin->company_id];
                        }else{
                            $array[]= "-";
                        }

                    }
                    else if($value == 'paid_bill_cash')
                    {
                        //$array[] = $admin->company_id;
                        if($admin->payment_method == 1){
                            $array[] = $admin->driver_amount;
                        }else{
                            $array[]= "-";
                        }

                    }
                    else if($value == 'paid_bill_card')
                    {
                        //$array[] = $admin->company_id;
                        if($admin->payment_method == 0){
                            $array[] = $admin->driver_amount;
                        }else{
                            $array[]= "-";
                        }

                    }
                    else if($value == 'transfer_id')
                    {
                        //$array[] = $admin->company_id;
                        if($admin->$value == 2) {
                            $array[] = trans('localization::lang_view.settled');
                        }else{
                            $array[]= trans('localization::lang_view.unsettled');
                        }

                    }
                    else
                    {
                        $array[]= $admin->$value?:"-";
                    }


                }



                fputcsv($handle,$array);


            }


            //  fclose($handle);
        }
        else
        {
            $array[] = trans('localization::lang_view.no_result_found');
            fputcsv($handle,$array);

            //   fclose($handle);
        }

        $headers = array('Content-Type' => 'text/csv');

        die();
    }

}