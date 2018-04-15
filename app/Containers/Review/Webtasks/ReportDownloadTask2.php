<?php

namespace App\Containers\Review\Webtasks;

use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Models\AdminTypesModel;

class ReportDownloadTask2 
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

            $i = 0 ;
            if($title == null)
            {
                $title = 'report';
            }

            if(in_array('role',$key))
            {
               $adminTypes = AdminTypesModel::select()->get();
               $roles = array();
               foreach($adminTypes as $value)
               {
                    $roles[$value->id] = $value->types;
     

               }
            }
            // echo "<pre>";
            // print_r($roles);
            // die();
            $siArray = array(trans('localization::lang_view.si_no'));
            $heading = array_merge($siArray,$heading);

            header('Content-Type: text/csv; charset=utf-8');

            header('Content-Disposition: attachment; filename= '.$title.'.csv');
 
            $handle = fopen('php://output', 'w');

            fputcsv($handle,$heading);



            if(count($values) != 0)
            { 
                foreach ($values as $admin) 
                {

                    $array = array();
    
                    $i = $i+1; 
    
                    $array[] = $i;
    
    
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
                        else if($value == 'role')
                        {
                            if($admin->$value == 0)
                            {
                                $array[]= trans('localization::lang_view.super_admin');
                            }
                            else
                            {
                                $array[]= $roles[$admin->$value];
                            }
                            
                        }                        
                        else
                        {
                            $array[]= $admin->$value;  
                        }                       
                        
                    }


                     fputcsv($handle,$array);   
                              
                }
               fclose($handle);   
            }
            else 
            {
                // fputcsv($handle,'no result found');
                   
                   fclose($handle);
            } 
            
                $headers = array(
                            'Content-Type' => 'text/csv',
                                );
            
                die();      
    }

}