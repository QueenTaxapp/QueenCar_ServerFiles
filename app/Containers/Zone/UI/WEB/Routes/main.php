<?php

$router->any('admin/heatMapView', [
    'as'   => 'heatMapView',
    'uses' => 'Controller@heatMapView',
    'module'=>"heat_module",
    'path'=>"heatMapView",
    'icon'=>"touch_app",
    'order'=>"7.2",
    'name'=>'heat_module',
    'head_name'=>'map_view',
    'head_icon'=>'place',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->any('admin/zone/view', [
    'as'   => 'zoneView',
    'uses' => 'Controller@zoneView',
    'module'=>"zone_module",
    'path'=>"zoneView",
    'icon'=>"public",
    'order'=>"7.1",
    'name'=>'zone_module',
    'head_name'=>'map_view',
    'head_icon'=>'place',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('admin/zone/add', [
    'as'   => 'zoneAdd',
    'uses' => 'Controller@zoneAdd',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('admin/zone/save', [
    'as'   => 'zoneSave',
    'uses' => 'Controller@zoneSave',
    'module'=>"zone_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/zone/currencyEdit/{id}', [
    'as'   => 'zoneCurrencyEdit',
    'uses' => 'Controller@zoneCurrencyEdit',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('admin/zone/currencyUpdate/{id}', [
    'as'   => 'zoneCurrencyUpdate',
    'uses' => 'Controller@zoneCurrencyUpdate',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/zone/delete/{id}', [
    'as'   => 'zoneDelete',
    'uses' => 'Controller@zoneDelete',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/zone/statusToggle/{id}', [
    'as'   => 'zoneStatusToggle',
    'uses' => 'Controller@zoneStatusToggle',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/zone/typeView/{id}', [
    'as'   => 'zoneTypeView',
    'uses' => 'Controller@zoneTypeView',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->get('admin/zone/typeAdd/{id}', [
    'as'   => 'zoneTypeAdd',
    'uses' => 'Controller@zoneTypeAdd',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('admin/zone/typeSave/{id}', [
    'as'   => 'zoneTypeSave',
    'uses' => 'Controller@zoneTypeSave',
    'module'=>"zone_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('admin/zone/typeEdit/{id}', [
    'as'   => 'zoneTypeEdit',
    'uses' => 'Controller@zoneTypeEdit',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('admin/zone/typeUpdate/{id}', [
    'as'   => 'zoneTypeUpdate',
    'uses' => 'Controller@zoneTypeUpdate',
    'module'=>"zone_module",
    'privilege'=>FALSE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->get('admin/zone/typeStatusToggle/{id}', [
    'as'   => 'zoneTypeStatusToggle',
    'uses' => 'Controller@zoneTypeStatusToggle',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);



$router->get('admin/zone/surge/{id}', [
    'as'   => 'zoneSurge',
    'uses' => 'Controller@zoneSurgeEdit',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->post('admin/zone/surgeUpdate/{id}', [
    'as'   => 'zoneSurgeUpdate',
    'uses' => 'Controller@zoneSurgeUpdate',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);



$router->get('admin/zone/mapView/{id}', [
    'as'   => 'zoneMapView',
    'uses' => 'Controller@zoneMapView',
    'module'=>"zone_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

