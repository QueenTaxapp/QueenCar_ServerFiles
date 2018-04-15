@extends('layout::Layout')
@section('content')

    <?php $settings=$result;
//    //echo "<pre>";print_r($settings);die();
//
//            foreach ($settings['general'] as $key => $value)
//                {
//                    if($value['title'] == 'time_zone')
//                    {
//
//                        foreach ($value['option_value'] as $k =>$v)
//                            {
//                                echo "'".$k."',";
//
//                            }
//                    }
//
//                }
//
//                die();
    ?>

    <style>
        .card-content{
            line-height: 1;
            margin-top: -20px;

        }
        .card-title{
            margin: 5px 0 0 10px;
        }
        .setting-title{
            padding: 3px;
            margin: 10px 0 0 20px;
        }
    </style>
    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">

                <div class="col s12">

                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs tab-demo z-depth-1">

                                <?php $tab=1; foreach($settings as $name => $items){  /*echo"<pre>";print_r($items[0]['icon']);die(); */ ?>

                                <li class="tab"><a class="active" href="#test<?=$tab;?>"><?=trans('localization::lang_view.'.$name);?></a></li>

                                <?php $tab++; } ?>

                                <li class="indicator" style="right: 806px; left: 0px;"></li>
                            </ul>

                        </div>
                        <div class="col s12">
                            <?php $settings_count=count($settings);
                            // for($i=1;$i<=$settings_count;$i++){
                            $i=1;
                            foreach($settings as $name => $items)
                            {

                            ?>
                            <div id="test<?=$i;?>" class="offset-s2 col s8 <?php if($i==1){echo "active"; }?>" style="">

                                <form action="{{URL::Route('admin/settingsSave')}}" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row"><div class="col-md-12">

                                            <?php
                                            $items_count=1;
                                            $temp="";
                                            $item_twillo=0;
                                            $item_twillo_check=0;
                                            foreach($items as $item_list => $item_value)
                                            { //print_r($item_value);die();
                                            ?>

                                            <input type="hidden" name="type" value="<?= $name;?>">
                                            <?php if(array_key_exists("group_name",$item_value)){
                                            if(empty($temp))
                                            {
                                            $temp = $item_value['group_name'];
                                            echo '<div class="col-md-12"><div class="card">';
                                            ?>
                                            <h4 class="group-title card-title" data-background-color="rose" >
                                                <?=trans('localization::lang_view.'.$temp);?>
                                            </h4>
                                            <?php  }
                                            elseif(!empty($temp) && $temp!=$item_value['group_name'])
                                            {
                                            $item_twillo=0;
                                            $temp = $item_value['group_name'];
                                            echo '<div class="col-md-12"><div class="card">';
                                            ?>
                                            <h4 class="group-title card-title" data-background-color="rose"> <?=trans('localization::lang_view.'.$temp);?></h4>
                                            <?php }else{
                                                $item_twillo_check++;
                                            }
                                            ?>

                                            <?php $item_twillo++;
                                            if(array_key_exists("group_count",$item_value)){
                                                $group_count=$item_value['group_count'];
                                            }
                                            }
                                            else{
                                            $item_twillo=0;
                                            ?>
                                            <div class="col-md-12"><div style="overflow: visible" class="card">
                                                    <h6 class="setting-title">
                                                        <?=trans('localization::lang_view.'.$item_value['title']);?>
                                                    </h6>
                                                    <?php } ?>


                                                    <div  class="card-content <?php if(array_key_exists("group_name",$item_value)){
                                                        echo "col-md-offset-1";}else{ echo "col-md-12";
                                                    }?>">
                                                        {{--  card content start   --}}
                                                        <?php /*print_r(count($item_value['option_value']));*/?>

                                                        <?php if(array_key_exists("group_name",$item_value)){ ?>
                                                        <h6 class="card-header setting-title"> <?=trans('localization::lang_view.'.$item_value['title']);?></h6>
                                                        <?php } ?>

                                                        <?php
                                                        /*select box*/    if($item_value['field']=="select")
                                                        {    ?>

                                                        <select style="overflow: visible" class="text-box" name="<?=$item_value['title'];?>">
                                                            <?php
                                                            foreach($item_value['option_value'] as $option_name => $option_value){
                                                            //print_r($item_value['option_value']);die();
                                                            if($item_value['value']==$option_value)
                                                            {
                                                                $sel="selected";
                                                            }else{
                                                                $sel="";
                                                            } ?>
                                                            <option style="text-align: left;" value="<?=$option_value;?>" <?=$sel?> ><?php echo trans('localization::lang_view.'.$option_name); ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <?php  }

                                                        /*text box*/       elseif($item_value['field']=="text")
                                                        {
                                                        ?>
                                                        <input class="input-field form-control" type='text' name="<?=$item_value['title'];?>" value='<?=$item_value['value']?>' >

                                                        <?php
                                                        }

                                                        /*image file*/       elseif($item_value['field']=="file")
                                                        {
                                                        ?>

                                                        {{--<input id="input-file-now" class="dropify" data-default-file="" type="file">--}}


                                                        <input name="<?=$item_value['title'];?>" id="input-file-to-destroy" data-default-file="<?=$item_value['value']?>" class="dropify" data-allowed-file-extensions="jpg jpeg" data-show-errors="true"  data-max-height="2000" type="file">



                                                        <?php
                                                        }

                                                        /*checkbox box*/     elseif($item_value['field']=="checkbox")
                                                        {
                                                        ?>
                                                        <div class="togglebutton">
                                                            <label>
                                                                <input name="<?=$item_value['title'];?>" type="checkbox" <?php if($item_value['value']==1){echo "checked";}?> value="1" >
                                                            </label>
                                                        </div>

                                                        <?php
                                                        }

                                                        /*radio box */     elseif($item_value['field']=="radio")
                                                        { ?>
                                                        <?php
                                                        foreach($item_value['option_value'] as $option_name => $option_value){
                                                        if($item_value['value']==$option_value){
                                                            $sel="checked";
                                                        }else{
                                                            $sel="";
                                                        } ?>

                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="<?=$item_value['title'];?>" value="<?=$option_value;?>" <?=$sel?> ><span class="circle"></span><span class="check"></span> <?=trans('localization::lang_view.'.$option_name);?>
                                                            </label>
                                                        </div>
                                                        <?php }
                                                        }

                                                        /*text area  */         if($item_value['field']=="textarea")
                                                        {
                                                        ?>
                                                        <textarea rows="4" style="width:100%;resize: none;" class="input" name="<?=$item_value['title'];?>" ><?=$item_value['value'];?> </textarea>
                                                        <?php } ?>


                                                        {{--  card content end   --}}
                                                    </div>

                                                    <?php /*if(array_key_exists("group_name",$item_value) && (!empty($temp) && $temp == $item_value['group_name']) ){
                                            echo $item_twillo;
                                          if($item_twillo==($item_twillo_check+1)){ echo "</div>";}
                                        }else{ echo "</div>";}*/?>

                                                    <?php if(!array_key_exists("group_name",$item_value)){
                                                        echo "</div></div>";
                                                    }
                                                    else{
                                                        //echo $item_twillo;
                                                        if($item_twillo==$group_count){
                                                            echo "</div></div>";
                                                        }
                                                    }?>

                                                    <?php $items_count++;
                                                    }?>
                                                    <br><br>
                                                    <button type="submit" class="btn save-btn cyan waves-effect waves-light right" onclick="return DocumentValidate('{{$name}}')" >{{ trans('localization::lang_view.save_settings')}}<i class="material-icons right">send</i></button>
                                                    <div class="clearfix"></div>
                                                    <br><br><br><br>
                                                </div>
                                            </div>
                                </form>
                            </div>

                            <?php $i++; } ?>

                        </div>

                    </div>

                </div>


            </div>


            <!--end container-->
        </div>
    </section>

    <script>


        function DocumentValidatea(settingType )
        {
            //alert(settingType);

            if(settingType == 'notification')
            {

                var send_sms = $('[name=send_sms]').val();


                var send_email = $('[name=send_email]').val();


                if ( (send_sms != '0') && (send_sms != '1') )
                {
                    var message = "<?php echo trans('localization::errors.invalid_send_sms_option_selected')?>";
                    Materialize.toast(message, 4000);
                    return false;
                }

                if ( (send_email != '0') && (send_email != '1') )
                {
                    var message = "<?php echo trans('localization::errors.invalid_send_email_option_selected')?>";

                    Materialize.toast(message, 4000);
                    return false;
                }




            }
            else if(settingType == 'trip_settings')
            {
                //1
                var assign_method = $('[name=assign_method]').val();

                if ( (assign_method != '0') && (assign_method != '1') )
                {
                    var message = "<?php echo trans('localization::errors.invalid_assign_method_option_selected')?>";

                    Materialize.toast(message, 4000);

                    return false;
                }

                //2
                var driver_time_out = $('[name=driver_time_out]').val();

                if (!driver_time_out.match(/^\d+$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_no_of_second_for_driver_time_out')?>";

                    Materialize.toast(message, 4000);
                    return false;
                }
                //3
                var service_tax = $('[name=service_tax]').val();

                if (!service_tax.match(/^[+-]?\d+(\.\d+)?$/))
                {
                    var message = "<?php echo trans('localization::errors.service_tax_field_is_in_invalid_format')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //4
                var wallet_min_amount_for_trip = $('[name=wallet_min_amount_for_trip]').val();

                if (!wallet_min_amount_for_trip.match(/^[+-]?\d+(\.\d+)?$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_amount_for_wallet_min_amount_for_trip')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //5
                var wallet_min_amount_to_add = $('[name=wallet_min_amount_to_add]').val();

                if (!wallet_min_amount_to_add.match(/^[+-]?\d+(\.\d+)?$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_amount_for_wallet_min_amount_to_add')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //6
                var wallet_min_amount_to_balance = $('[name=wallet_min_amount_to_balance]').val();

                if (!wallet_min_amount_to_balance.match(/^[+-]?\d+(\.\d+)?$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_amount_for_wallet_min_amount_to_balance')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //7
                var service_fee = $('[name=service_fee]').val();

                if (!service_fee.match(/^\d+$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_percentage_for_service_fee')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }


                //8
                var auto_transfer = $('[name=auto_transfer]').val();

                if ( (auto_transfer != '0') && (auto_transfer != '1') )
                {
                    var message = "<?php echo trans('localization::errors.invalid_auto_transfer_option_selected')?>";

                    Materialize.toast(message, 4000);

                    return false;
                }

            }
            else if( settingType == 'general')
            {


                //2
                var paginate = $('[name=paginate]').val();

                if (!paginate.match(/^\d+$/))
                {
                    var message = "<?php echo trans('localization::errors.paginate_should_be_numeric')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //3
                var latitude = $('[name=latitude]').val();

                var lat = isFinite(latitude) && Math.abs(latitude) <= 90;



                if( !lat)
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_latitude')?>";

                    Materialize.toast(message, 4000);
                    return false;
                }

                //4
                var longitude = $('[name=longitude]').val();

                var lng = isFinite(longitude) && Math.abs(longitude) <= 90;

                if(!lng )
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_longitude')?>";

                    Materialize.toast(message, 4000);
                    return false;
                }

                //5

                var  head_office_number =  $('[name=head_office_number]').val();

                if (!head_office_number.match(/^\+?\d+$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_contact_number')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }

                //7
                var dispatch_create_request = $('[name=dispatch_create_request]').val();

                if ( (dispatch_create_request != '0') && (dispatch_create_request != '1') )
                {
                    var message = "<?php echo trans('localization::errors.invalid_dispatch_create_request_option_selected')?>";

                    Materialize.toast(message, 4000);

                    return false;
                }

                //8

                var Time_zone_list = ['Asia/Kolkata','America/New_York','America/Chicago',
                    'America/Denver','America/Dominica','America/Phoenix','America/Los_Angeles',
                    'America/Anchorage','America/Adak','Pacific/Honolulu','America/Araguaina',
                    'America/Bahia','America/Belem','America/Boa_Vista','America/Campo_Grande',
                    'America/Cuiaba','America/Eirunepe','America/Fortaleza','America/Maceio',
                    'America/Manaus','America/Noronha','America/Porto_Velho','America/Recife',
                    'America/Rio_Branco','America/Santarem','America/Sao_Paulo','America/Tijuana',
                    'America/Mazatlan','America/Mexico_City','America/Cancun','Canada/Atlantic',
                    'Canada/Central','Canada/Eastern','Canada/Mountain','Canada/Newfoundland',
                    'Canada/Pacific','Canada/Yukon','Asia/Dubai'];

                var time_zone = $('[name=time_zone]').val();



                var time_zone_result =   Time_zone_list.indexOf(time_zone) ;

                if(time_zone_result <= -1)
                {
                    var message = "<?php echo trans('localization::errors.invalid_time_zone')?>";

                    Materialize.toast(message, 4000);

                    return false;
                }

            }
            else
            {
                var twillo_number = $('[name=twillo_number]').val();



                if (!twillo_number.match(/^\+?\d+$/))
                {
                    var message = "<?php echo trans('localization::errors.enter_valid_twillio_number')?>";

                    Materialize.toast(message, 4000);
                    return false;

                }
            }
        }

     </script>

@endsection