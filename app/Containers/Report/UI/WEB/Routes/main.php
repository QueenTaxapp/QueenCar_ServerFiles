<?php

$router->any('/admin/report/view', [
    'as'   => 'adminReportView',
    'uses' => 'Controller@adminReportViewPage',
    'module'=>"report_module",
    'path'=>"adminReportView",
    'icon'=>"assignment",
    'order'=>"10",
    'name'=>'report_module',
    'head_icon'=>'assignment',
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->any('/admin/report/download', [
    'as'   => 'adminReportDownload',
    'uses' => 'Controller@adminReportDownload',
    'module'=>"report_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('/admin/driver/rating/report/download', [
    'as'   => 'driverRatingReportDownload',
    'uses' => 'Controller@driverRatingReportDownload',
    'module'=>"report_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);

$router->any('/admin/ledger/report/download', [
    'as'   => 'ledgerReportDownload',
    'uses' => 'Controller@ledgerReportDownload',
    'module'=>"report_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);


$router->any('/admin/user/names/ajax', [
    'as'   => 'userNamesAjax',
    'uses' => 'Controller@userNamesAjax',
    'module'=>"report_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);
$router->any('/admin/driver/names/ajax', [
    'as'   => 'driverNamesAjax',
    'uses' => 'Controller@driverNamesAjax',
    'module'=>"report_module",
    'privilege'=>TRUE,
    'middleware' => [
        'auth.web',
        'accessCheck.web',
    ]
]);