<?php


$router->any('/admin/promo/view', [
    'as'   => 'adminPromoView',
    'uses'       => 'Controller@adminPromoView',
    'module'=>"promo_module",
    'path'=>"adminPromoView",
    'icon'=>"add_shopping_cart",
    'order'=>"9",
    'name'=>'promo_module',
    'head_name'=>'money_back_offers',
    'head_icon'=>'add_shopping_cart',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/promo/add', [
    'as'   => 'adminPromoAdd',
    'uses'       => 'Controller@adminPromoAdd',
    'module'=>"promo_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/promo/addSave', [
    'as'   => 'adminPromoAddSave',
    'uses'       => 'Controller@adminPromoAddSave',
    'module'=>"promo_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);


$router->any('/admin/promo/edit/{id}', [
    'as'   => 'adminPromoEdit',
    'uses'       => 'Controller@adminPromoEdit',
    'module'=>"promo_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/promo/update/{id}', [
    'as'   => 'adminPromoUpdate',
    'uses'  => 'Controller@adminPromoUpdate',
    'module'=>"promo_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);



$router->any('/admin/promo/delete/{id}', [
    'as'   => 'adminPromoDelete',
    'uses'       => 'Controller@adminPromoDelete',
    'module'=>"promo_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/promo/active/{id}', [
    'as'   => 'adminPromoActive',
    'uses'       => 'Controller@adminPromoActive',
    'module'=>"promo_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

