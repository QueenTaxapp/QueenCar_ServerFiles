<?php


$router->any('/admin/currency/view', [
    'as'   => 'adminCurrencyView',
    'uses'       => 'Controller@adminCurrencyView',
    'module'=>"currency_module",
    'path'=>"adminCurrencyView",
    'icon'=>"add_shopping_cart",
    'order'=>"24",
    'name'=>'currency_module',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/currency/add', [
    'as'   => 'adminCurrencyAdd',
    'uses'       => 'Controller@adminCurrencyAdd',
    'module'=>"currency_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/currency/addSave', [
    'as'   => 'adminCurrencyAddSave',
    'uses'       => 'Controller@adminCurrencyAddSave',
    'module'=>"currency_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);


$router->any('/admin/currency/edit/{id}', [
    'as'   => 'adminCurrencyEdit',
    'uses'       => 'Controller@adminCurrencyEdit',
    'module'=>"currency_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/currency/update/{id}', [
    'as'   => 'adminCurrencyUpdate',
    'uses'  => 'Controller@adminCurrencyUpdate',
    'module'=>"currency_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);


$router->any('/admin/currency/delete/{id}', [
    'as'   => 'adminCurrencyDelete',
    'uses'       => 'Controller@adminCurrencyDelete',
    'module'=>"currency_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

$router->any('/admin/currency/toggle/{id}', [
    'as'   => 'adminCurrencyToggle',
    'uses'       => 'Controller@adminCurrencyToggle',
    'module'=>"currency_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web'
    ]
]);

