<?php

$router->get('/admin/paymentView', [
    'as'   => 'adminPaymentView',
    'uses' => 'Controller@adminPaymentViewPage',
    'module'=>"payment_module",
    'path'=>"adminPaymentView",
    'icon'=>"payment",
    'order'=>"5.2",
    'name'=>'payment_module',
    "head_name"=> "request_module",
    "head_icon"=>"star_border",
    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);
