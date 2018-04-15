@extends('layout::Layout')
@section('content')



<?php

//   function getaddress($lat,$lng)
//   {
//      $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
//      $json = @file_get_contents($url);
//      $data=json_decode($json);
//      $status = $data->status;
//      if($status=="OK")
//      {
//        return $data->results[0]->formatted_address;
//      }
//      else
//      {
//        return false;
//      }
//   }

//   $lat= 11.0283374; //latitude
//   $lng= 76.9605128; //longitude
//   $address= getaddress($lat,$lng);

//   print_r($address);
//   die();

//     $s= serialize(
//         array(
//              '{{getConfigs('.'app_name'.')}}'=>array('name'=>'name of the app','required'=>'true'),
//              '{{$value->date}}'=>array('name'=>'current_date','required'=>'true'),
//              '{{$value->name}}'=>array('name'=>'combination of firstname and lastname','required'=>'false'),
//             )
//                  );
//   print_r($s);
//   die();
    

   //die();
  //$values=$value;
//   echo "<pre>";

    
?>
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    .pagination li.active {
        width: 30px;
    }

</style>
<section id="content">
    <!--start container-->
    <div class="container">
        <!--card stats start-->

        <div class="row">

            <div class="col s12 m12 l12">

                <div id="bordered-table">
                <h4 class="header">{{ trans('localization::lang_view.email_settings')}}</h4>


                    <div class="row">
                        <div class="col s12 m12 l12">

                        <table class="bordered">
                            <thead class="text-black">
                            <tr>
                                <th>{{ trans('localization::lang_view.s.no')}}</th>
                                <th>{{ trans('localization::lang_view.email_title')}}</th>
                                <th >{{ trans('localization::lang_view.status')}}</th>
                                <th >{{ trans('localization::lang_view.edit')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=0;
                            $no=1;
                            $count = count($value);

                            if($count == 0)
                            {
                            ?>
                            <tr>
                                <td colspan="7" style="text-align:center;">
                                    {{ trans('localization::lang_view.no_result_found')}}
                                </td>

                            </tr>
                            <?php
                            }
                            $s_no=1;
                            foreach($value as $key=>$val)
                            {
                            $i= $i+1;

                            ?>
                            <tr>
                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                <td>{{ trans('localization::lang_view.'.$val->title)}}</td>
                                <td>
                                    <?php
                                    if($val->status == '1')
                                    {
                                    ?>
                                    <span class="status-green"> {{ trans('localization::lang_view.active')}} </span>
                                                       
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <span class="status-red"> {{ trans('localization::lang_view.inactive')}} </span>
                                                         
                                    <?php
                                    }
                                   
                                                 
                                ?>
                                </td>


                                <td>
                                    
                                    <div class="container">
                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$val->id;?>" style="">
                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                            <i class="material-icons right">arrow_drop_down</i>
                                        </a>
                                        <ul id="dropdown<?=$val->id;?>" class="dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                            <li>
                                                <a data-activates="dropdown1" class="grey-text text-darken-2" href="{{ URL::Route('editemail',$val->id)}}">{{ trans('localization::lang_view.edit')}}</a>
                                            </li>
                                            <?php
                                            if($val->status  == 0)
                                            {
                                            ?>
                                                <li>
                                                    <a class="sweet-active grey-text text-darken-2" href="{{ URL::Route('tooglestatus',$val->id) }}">{{ trans('localization::lang_view.active')}}</a>

                                                </li>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                                <li>
                                                    <a class="sweet-inactive grey-text text-darken-2" href="{{ URL::Route('tooglestatus',$val->id) }}">{{ trans('localization::lang_view.inactive')}}</a>

                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                 </td>                                                   
                            </tr>

                            <?php
                           $s_no++;
                            }
                                                
                            ?>
                                            

                            </tbody>
                        </table><br><br><br><br>
                            <div align="left" id="paglink">
                                <?php
                                echo $value->appends(array('id'=>1))->links();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection