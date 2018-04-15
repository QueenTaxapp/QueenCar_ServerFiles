<?php

use Illuminate\Support\Facades\URL;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;



$id = Session::get('id');
$role = Session::get('role');
$userIcon = Session::get('profilePicture')?:asset('assets/material_icon/avatar/avatar-7.png');//die();
$areaName = ApiHelper::get_header_area_name();

$reteriveKeyFromSession = ApiHelper::reterive_key();

    if(Session::has('sideBar'))
    {
        $sideBar =  Session::get('sideBar', 1);

    }
    else
    {
        $sideBar = 0;
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo App\Containers\Common\GetConfigs::getConfigs('application_name');?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="icon" href="<?php echo App\Containers\Common\GetConfigs::getConfigs('logo');?>" type="image/x-icon">

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{asset('assets/material_css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/custom.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/flag-icon.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/dropify.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/sweetalert.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/demo.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/morris.css')}}" type="text/css" rel="stylesheet">

{{-- <link href="{{asset('assets/material_css/xcharts.min.css')}}" type="text/css" rel="stylesheet">--}}


<!--<link rel="stylesheet" type="text/css" href="<?php //echo asset('drag/css/multi-select.css'); ?>">-->

    <style>
        section
        {
            margin-top: 10px;
        }

        .status-red
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #d81b60;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-green
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #5cb860;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-green
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #5cb860;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-driver
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #183a7e;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-user
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #fbb143;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-new
        {

            font-size: 15px;
            color: white;
            width :25px;
            background-color: #d81b60;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-taken
        {

            font-size: 15px;
            color: white;
            width :25px;
            background-color: #33b5e5;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-solved
        {
          font-size: 15px;
            color: white;
            width :25px;
            background-color: #9c0;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */

        }

        .status-card
        {

            font-size: 15px;
            color: white;
            width :25px;
            background-color: #27b7eb;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-cash
        {

            font-size: 15px;
            color: white;
            width :25px;
            background-color: #ff9d00;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-wallet-cash
        {

            font-size: 15px;
            color: white;
            width :25px;
            background-color:#f63093;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-wallet
        {

            font-size: 16px;
            color: white;
            width :25px;

            background-color: #972ed0;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }

        .edit-button
        {
            position: fixed;
            top: 20px;
            z-index: 99999;
            right:50px;
        }

        .back-button
        {
            font-size:15px;
        }
        sup
        {
            color:red;
            font-size: 12px;
            left: 2px;
        }
        .no-result
        {
            color:red;
        }



        #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:500px;position: absolute;}
        #country-list li{padding: 10px; background: #ffffff; border-bottom: #f7f7f7 1px solid;color:#14b4fc}
        #country-list li:hover{background:#f7f7f7;cursor: pointer;border: #f7f7f7 1px solid;}
        #country-list-driver-name{float:left;list-style:none;margin-top:-3px;padding:0;width:500px;position: absolute;}
        #country-list-driver-name li{padding: 10px; background: #ffffff; border-bottom: #f7f7f7 1px solid;color:#14b4fc}
        #country-list-driver-name li:hover{background:#f7f7f7;cursor: pointer;border: #f7f7f7 1px solid;}

        .save-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('save-btn');?> !important;
        }
        .add-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('add-btn');?> !important;
        }
        .search-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('search-btn');?> !important;
        }
        .download-btn{
            background-color:<?php echo Configs_Class::helper()->buttonColor('download-btn');?> !important;
        }
        .user-state-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('user-state-btn');?> !important;
        }
        .revert-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('revert-btn');?> !important;
        }
        .wallet-spent-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('wallet-spent-btn');?> !important;
        }
        .zone-add-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('zone-add-btn');?> !important;
        }
        .zone-delete-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('zone-delete-btn');?> !important;
        }
        .zone-delete-all-btn
        {
            background-color:<?php echo Configs_Class::helper()->buttonColor('zone-delete-all-btn');?> !important;
        }

        body.layout-semi-dark #main #left-sidebar-nav .brand-sidebar{

            background: linear-gradient(45deg, <?php echo Configs_Class::helper()->buttonColor('sidebar_header_start');?> 0%, <?php echo Configs_Class::helper()->buttonColor('sidebar_header_start');?> 100%) !important;
        }

        body.layout-semi-dark #main .side-nav{

            background: linear-gradient(45deg, <?php echo Configs_Class::helper()->buttonColor('sidebar_menu_start');?> 50%, <?php echo Configs_Class::helper()->buttonColor('sidebar_menu_end');?> 100%) !important;
        }

        .sidebar_list{

            background: <?php echo Configs_Class::helper()->buttonColor('sidebar_list_color');?> !important;

        }

        body.layout-semi-dark #main .side-nav .collapsible-body > ul:not(.collapsible) > li.active, body.layout-semi-dark #main .side-nav.fixed .collapsible-body > ul:not(.collapsible) > li.active{

            background: <?php echo Configs_Class::helper()->buttonColor('sidebar_active_list_color');?> !important;

        }
        /* loader  */

        #custom_loader{
            border-bottom: 4px solid;
            margin-top: 26px;
            padding-top: -4px;
            position: absolute;
            margin-top: 0px;
            top: 50%;
            left: 32%;
            width:487px;
            height: 56px;
        }
        .car {
            width:26%;
            position: absolute;
            -webkit-animation: mymove 5s infinite;
            animation: mymove 3s infinite;
            z-index: 5;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes mymove {
            from {left: 0px;}
            to {left: 487px;}
        }

        /* Standard syntax */
        @keyframes mymove {
            from {left: 0px;}
            to {left: 380px;}
        }

        .signal {
            width: 7%;
            position :absolute;
            left:385px;
            top: -18px;
            /* -webkit-animation: mymoveleft 5s infinite;
             animation: mymoveleft 5s infinite; */
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes mymoveleft {
            from {right: 0px;}
            to {right: 200px;}
        }

        /* Standard syntax */
        @keyframes mymoveleft {
            from {left: 200px;}
            to {left: 0px;}
        }

    </style>
</head>

<div id="custom_loader">
    <img class="car" src="http://pngimg.com/uploads/taxi/taxi_PNG61.png">

    <img class="signal" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb9K2GyQXhUzOjLp1KeEmynowutx8hm_buT_EJe6JKqmyBOnSv">
</div>

<body class="layout-semi-dark" >
<!-- Start Page Loading -->


<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
<header id="header" class="page-topbar" style="display:none;" >
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">

        <div class="row" >
          <div class="col s12 m12 l12">


            <?php
                if(Session::get('role') == 0)
                {
            ?>
                <div class="col s6 m6 l7">
                  <span style="float: right;color:black">{{ trans('localization::lang_view.change_area')}}</span>
              </div>

              <div class="col s6 m3 l3" style="color: #039be5;padding: 0px 1px 0px 30px;">
                  <select class="select" id="referenceKey" name="filter_type" onchange="reference_key_changed();" >
                      <option value="0"  >{{ trans('localization::lang_view.super_admin')}}</option>

                      <?php

                          foreach($areaName as $key => $value )
                          {
                      ?>
                            <option value="{{ $key }}" <?php if($reteriveKeyFromSession == $key ){echo "selected";}?> > {{ $value }}</option>
                    <?php
                          }

                      ?>
                  </select>

              </div>

            <?php
                }
            ?>





            <div class="col s2 m2 l2"  style="float: right;">

            <div class="nav-wrapper">
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                          <span class="avatar-status avatar-online">
                            <img src="<?=$userIcon;?>" alt="avatar">
                          </span>
                        </a>

                        <ul id="profile-dropdown" class="dropdown-content">
                            <li>
                                <a href="{{ URL::Route('adminEditProfile',$id)}}" class="grey-text text-darken-1">
                                    <i class="material-icons">face</i>
                                      {{trans('localization::title.profile')}}
                               </a>
                            </li>

                            <li>
                                <a href="{{ URL::Route('adminLockscreenPage',$id)}}" class="grey-text text-darken-1">
                                    <i class="material-icons">lock_outline</i>
                                    {{trans('localization::title.lock')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::Route('logouta',$id)}}" class="sweet-logout">
                                    <i class="material-icons">keyboard_tab</i>
                                    {{trans('localization::title.logout')}}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>



            </div>
          </div>
        </div>



        </nav>
    </div>
</header>


<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->

<div id="main" style="display:none;" >
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside style="width:0px;" id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a href="" class="brand-logo darken-1">
                        <img src="<?php echo App\Containers\Common\GetConfigs::getConfigs('logo');?>" alt="">
                        <span class="logo-text hide-on-med-and-down"><?php echo App\Containers\Common\GetConfigs::getConfigs('application_name');?></span>
                    </a>
                    <a href="#" class="navbar-toggler" >
                        <i  class="material-icons">radio_button_checked</i>
                    </a>

                </h1>
            </div>
            <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y sidebar_list" style="transform: translateX(0%);">
                <li class="no-padding">
                    <ul class="collapsible " data-collapsible="accordion">
                        <li class="bold <?php if($page=="dashboard_module"){echo "active";}else{echo "";}?>" >
                            <a href="{{URL::Route('dashboard')}}" class="waves-effect waves-cyan">
                                <i class="material-icons">dashboard</i>
                                <span class="nav-text">{{trans('localization::title.dashboard_module')}}</span>
                            </a>
                        </li>
                    <?php


                        if($role == 0) // if super admin show all
                        {
                          $type = array();
                        }
                        else
                        {

                          // if has specific admin privileges
                          if(file_exists(public_path('/privileges/admins/admin'.$id.".json")))
                          {
                            $type = json_decode(file_get_contents(public_path('/privileges/admins/admin'.$id.".json")),true)['module'];
                              if(count($type) == 0) // if specific admin privileges empty go to overall admin privileges
                              {
                                goto checktype;
                              }

                          }
                          else // if has overall admin privileges
                          {
                              checktype:

                              if(file_exists(public_path('/privileges/type'.$role.".json")))
                              {
                                $type = json_decode(file_get_contents(public_path('/privileges/type'.$role.".json")),true)['module'];
                              }
                          }
                        }

                        //echo "<pre>";print_r($type);die(); style="display:none;"


                        // next layout details
                        if(file_exists(public_path('/privileges/layout.json')))// hasget layout
                        {
                          $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
                        }
                        else //create empty layout
                        {
                          $obj = App\Containers\Admin\fileExists\fileExists::fileCreate();
                          $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
                        }
                        $array=array();


                        foreach($layout as  $key=>$value) // sort value based create array
                        {

                            if (!in_array($key, $type))
                            {
                              $array[$value['sort']]=[$key=>$value];
                            }
                        }

                        ksort($array); // arrange in assending order
                        $keys = array_keys($array); // only keys
                        $i = -1;

                        $testDummyArray = array();
                        $tempArray = array();

                        $selectedModule = 0;
                        foreach($keys as $key => $value)
                        {
                          if(array_key_exists($page,$array[$value]))
                          {
                              $selectedModule = (int)$value;
                          }

                          if($key == 0)
                          {
                            $tempArray[] = $value;
                          }
                          else
                          {
                            if(is_int($value))
                            {

                              $testDummyArray[] = $tempArray;
                              $tempArray = array();
                              $tempArray[] = $value;
                            }
                            else
                            {
                              $tempArray[] = $value;
                            }
                          }
                          $size = count($keys);
                          if( $key == ($size-1))
                          {
                            $testDummyArray[] = $tempArray;
                          }
                        }


                        $keys = $testDummyArray;

                        $tempTypes = array_flip($type);


                        // foreach ($keys as $associativeArray )
                        // {
                        //   foreach($associativeArray as  $key => $newValue)
                        //   {

                        //     $currentModuleName = array_keys($array[$newValue]);
                        //     $currentModuleName = $currentModuleName[0];

                        //     echo "$currentModuleName";
                        //     echo "<br>";
                        //     $path = $array[$newValue][$currentModuleName]['path'];
                        //     $r = URL::Route($path);
                        //     echo $r ;
                        //     echo "<br>";
                        //     echo "<br>";
                        //     $name = $array[$newValue][$currentModuleName]['name'];


                        //   }
                        // }


                        foreach ($keys as $associativeArray )
                        {

                          foreach($associativeArray as  $key => $newValue)
                          {

                            $currentModuleName = array_keys($array[$newValue]);
                            $currentModuleName = $currentModuleName[0];

                            $subCurrentModule = $currentModuleName;
                            if(Session::get('role') != 0)
                            {
                              if($currentModuleName == 'settings_module')
                              {
                                //break;
                              }
                            }
                            else
                            {
                              goto SuperAdmin;
                            }

                            //echo "$currentModuleName";
                            if(!array_key_exists($currentModuleName,$tempTypes))
                            {
                              SuperAdmin:
                            $moduleTitle = $array[$newValue][$currentModuleName]['name'];
                            $moduleIcon = $array[$newValue][$currentModuleName]['icon'];


                            $size = count($associativeArray);

                              if( $size == 1)
                              {
                                goto singleModule;
                              }

                              if($key == 0)
                              {
                                goto singlePlusModule;
                              }

                              if($key == ($size - 1))
                              {
                                goto singlePlusModuleFinish;
                              }
                              else
                              {
                                goto singleModule;
                              }

                              $SingleModule = 'singleModule';
                              if($SingleModule != 'singleModule')
                              {
                               singleModule:

                               $path = $array[$newValue][$currentModuleName]['path'];
       ?>


                                 <li class="bold <?php if($page == $currentModuleName){echo "active";}else{echo "";}?>" >
                                   <a href="{{URL::Route($path)}}" class="waves-effect waves-cyan " >
                                       <i class="material-icons"><?=$moduleIcon?></i>
                                         <span class="nav-text">{{trans('localization::title.'.$moduleTitle)}}</span>
                                   </a>
                                 </li>
       <?php
                               }
                                  $SinglePlusModule ='singlePlusModule';
                               if($SinglePlusModule != 'singlePlusModule')
                               {
                                 singlePlusModule:

                                 //head name
                                 $currentModuleName = array_keys($array[$newValue]);
                                 $currentModuleName = $currentModuleName[0];
                                 $path = $array[$newValue][$currentModuleName]['path'];

                                  if(array_key_exists('head_name',$array[$newValue][$currentModuleName]))
                                  {
                                     $head_name = $array[$newValue][$currentModuleName]['head_name'];
                                  }
                                  else
                                  {
                                     $head_name = $array[$newValue][$currentModuleName]['name'];
                                  }

                                 //head icon
                                 if(array_key_exists('head_icon',$array[$newValue][$currentModuleName]))
                                 {
                                   $head_icon = $array[$newValue][$currentModuleName]['head_icon'];
                                 }
                                 else
                                 {
                                   $head_icon = $array[$newValue][$currentModuleName]['icon'];
                                 }

                                 //

       ?>
                                 <li class="bold">
                                   <a class="collapsible-header waves-effect waves-cyan <?php if($newValue == $selectedModule){echo "active";}else{echo "";}?>">
                                       <i class="material-icons">{{$head_icon}}</i>
                                       <span class="nav-text">{{trans('localization::title.'.$head_name)}}</span>
                                   </a>
                                   <div class="collapsible-body">
                                       <ul class="sidebar_list">
                                           <li class="bold <?php if($page == $currentModuleName){echo "active";}else{echo "";}?>" >
                                               <a href="{{URL::Route( $path)}}">
                                                   <i class="material-icons">{{$moduleIcon}}</i>
                                                   <span class = "">{{trans('localization::title.'.$moduleTitle)}}</span>
                                               </a>
                                           </li>
<?php
                               }

                               $singlePlusModuleFinish = 'singlePlusModuleFinish';
                               if($singlePlusModuleFinish != 'singlePlusModuleFinish')
                               {
                                 singlePlusModuleFinish:
                                 $currentModuleName = array_keys($array[$newValue]);
                                 $currentModuleName = $currentModuleName[0];
                                 $defaultIcon = $array[$newValue][$currentModuleName]['icon'];
                                 $defaultName = $array[$newValue][$currentModuleName]['name'];
                                 $path = $array[$newValue][$currentModuleName]['path'];



       ?>
                                           <li class="bold <?php if($page == $currentModuleName){echo "active";}else{echo "";}?>" >

                                               <a href="{{URL::Route($path)}}">
                                                   <i class="material-icons">{{$moduleIcon}}</i>
                                                     <span class = "">{{trans('localization::title.'.$moduleTitle)}}</span>
                                               </a>
                                           </li>
                                      </ul>
                                  </div>
<?php
                               }
                               }
//
                          }


                        }
?>

                        <br><br><br><br>
                    </ul>
                </li>
            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 588px; right: 3px;">
                <div class="ps-scrollbar-y" style="top: 0px; height: 293px;"></div>
            </div>

            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">menu</i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->

    <?php


    ?>
    @yield('content')

    <!-- Floating Action Button -->
    {{--WHERE 1
            <div class="fixed-action-btn " style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow">
                    <i class="material-icons">add</i>
                </a>
                <ul>
                    <li>
                        <a href="css-helpers.html" class="btn-floating blue">
                            <i class="material-icons">help_outline</i>
                        </a>
                    </li>
                    <li>
                        <a href="cards-extended.html" class="btn-floating green">
                            <i class="material-icons">widgets</i>
                        </a>
                    </li>
                    <li>
                        <a href="app-calendar.html" class="btn-floating amber">
                            <i class="material-icons">today</i>
                        </a>
                    </li>
                    <li>
                        <a href="app-email.html" class="btn-floating red">
                            <i class="material-icons">mail_outline</i>
                        </a>
                    </li>
                </ul>
            </div>
    --}}

    <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a id="menu" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow helper ">
                <i class="material-icons">help_outline</i>
            </a>
        </div>

    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<save-my-eyes-dialog-popup class="save_my_eyes_dialog_popup"></save-my-eyes-dialog-popup><div class="hiddendiv common"></div><div class="drag-target" data-sidenav="slide-out" style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div><div class="drag-target" data-sidenav="chat-out" style="right: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

</div>
<br><br><br>
</body>

<!-- Compiled and minified JavaScript -->


<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->


<script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('assets/material_js/materialize.min.js')}}"></script>
<!--prism-->
<script type="text/javascript" src="{{asset('assets/material_js/prism.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('assets/material_js/perfect-scrollbar.min.js')}}"></script>
<!-- chartjs -->
<script type="text/javascript" src="{{asset('assets/material_js/chart.min.js')}}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('assets/material_js/plugins.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/form-file-uploads.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/form-elements.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('assets/material_js/custom-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/dashboard-ecommerce.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/extra-components-sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/morris.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/charts-morris.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/raphael-min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/xcharts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/charts-xcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/d3.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/charts-chartjs.js')}}"></script>

{{--   Form Password Validation   --}}
<script>

    $(document).ready(function(){
        $('#custom_loader').hide();
        $('#header').show();
        $('#main').show();
    });


    var img=document.getElementById('myimg');
    var func=function(){
        alert('error');
    };
    if(img.complete){
        func.call(img);
    }
    else{
        img.onload=func;
    }
</script>

<script>






    function Validate() {


        var password = document.getElementById("password").value;

        var confirmPassword = document.getElementById("confirm_password").value;

        if (password != confirmPassword)
        {

            Materialize.toast("{{trans('localization::errors.password_did_not_matched')}}", 4000);
            //demo.showNotification('top','center','danger','warning', 'Passwords did not match');

            /* alert("Passwords do not match.");*/
            return false;
        }
        return true;
    }

</script>

{{--   Image Displaying in form  --}}
<script>

    $(document).ready(function(){
        // Basic

        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });
        var drEventimg = $('.dropify').dropify();

        drEventimg.on('dropify.error.imageFormat', function(event, element){
            alert('Image format error message!');
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
    });

</script>

{{--   Sweet Alerts   --}}
<script>
    var button;



    $('.sweet-done').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_done_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.cancel')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-logout').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.logout')}}",
                    cancelButtonText: "{{ trans('localization::errors.stay_in')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });
    $('.sweet-active').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_active_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-inactive').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_inactive_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-approve').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_approve_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-decline').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_decline_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

    $('.sweet-delete').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_delete_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

    $('.sweet-revert').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_revert_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

    $('.sweet-zone-active').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "{{ trans('localization::errors.this_will_affect_the_zone_types')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_active_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-zone-inactive').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "{{ trans('localization::errors.this_will_affect_the_zone_types')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_inactive_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });


</script>

{{--   Helper Displaying   --}}
<script>
    function help($data,tap){
        $('.helper').attr('id',$data);
        $('#'+tap).tapTarget('open');

    }

    $( function() {
        $( "#draggable" ).draggable();
    } );
</script>



<?php
if(isset($request))
{



if($request->session()->has('errors'))
{

?>
<script>

    Materialize.toast('<?php echo $request->session()->get("errors")->all()[0];?>', 4000);
    console.log('1');
</script>
<?php
}

if($request->session()->has('success'))
{

?>
<?php $error = $request->session()->get('success')["message"]; ?>
<script>
    Materialize.toast('<?php echo $request->session()->get("success")["message"]?>', 4000);
    console.log('3');
</script>
<?php
}


if($request->session()->has('prompt_alert'))
{

?>
<?php $error = $request->session()->get('prompt_alert')["message"];

?>
<script>

    var errorMessage = "<?php  echo $error ?>";
    swal({
                title: errorMessage,
                text: "<?php echo trans('localization::lang_view.please_pay_through_cash')?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ trans('localization::lang_view.pay_through_cash')}}",
                cancelButtonText: "{{ trans('localization::lang_view.cancel')}}",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(){

                        <?php
                        $requestId = $request->session()->get('prompt_alert')['requestId'];

                        $promptPath = public_path("admin/driver/income/paid/money/cash/$requestId");

                        $promptPath = explode("/opt/lampp/htdocs",$promptPath);
                        $promptPath = $promptPath[1];
                        ?>

                var link = "<?php  echo $promptPath ?>";


                window.location.href = link;


            });

</script>
<?php
}

}?>

<script>
    function runMyFunction()
    {
        <?php

        Session::put('sideBar', 1);
        ?>
    }

    function reference_key_changed()
    {
      var referenceKey = document.getElementById('referenceKey').value;

      var link = "<?php echo URL::to('/admin/key/change/')?>";

      var finalLink = link+'/'+referenceKey;

      window.location = finalLink;
    }


</script>




</html>
