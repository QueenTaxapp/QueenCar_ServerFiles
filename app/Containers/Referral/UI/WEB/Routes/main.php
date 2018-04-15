<?php

$router->get('/admin/referralView', [
    'as'   => 'adminReferralView',
    'uses' => 'Controller@adminReferralViewPage',
    'module'=>"referral_module",
    'path'=>"adminReferralView",
    'icon'=>"supervisor_account",
    'order'=>"9.1",
    'name'=>'referral_module',
    'head_name'=>'money_back_offers',
    'head_icon'=>'add_shopping_cart',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
