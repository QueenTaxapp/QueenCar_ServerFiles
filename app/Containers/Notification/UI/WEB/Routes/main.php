<?php

$router->get('/admin/notification', [
    'as'   => 'adminNotification',
    'uses' => 'Controller@adminNotification',
//    'module'=>"notification_module",
//    'path'=>"adminNotification",
//    'icon'=>"notifications",
//    'order'=>"17",
//    'privilege'=>TRUE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);



$router->post('/admin/notificationSend', [
    'as'   => 'adminNotificationSend',
    'uses' => 'Controller@adminNotificationSend',
    'module'=>"notification_module",
    'privilege'=>FALSE,
    'middleware' => [
         'auth.web',
         'accessCheck.web',
    ]
]);


