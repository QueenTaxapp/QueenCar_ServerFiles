<?php

$router->get('/admin/settings', [
  'as'   => 'adminSettings',
  'uses' => 'Controller@adminSettingsPage',
  'module'=>"settings_module",
  'path'=>"adminSettings",
  'icon'=>"settings",
  'order'=>"36",
  'name'=> 'settings_module',
  'privilege'=>TRUE,
  'middleware' => [
       'auth.web',
      'accessCheck.web',
  ]
]);


$router->post('/admin/settingsSave', [
    'as'   => 'admin/settingsSave',
    'uses' => 'Controller@adminSettingsSave',
    'module'=>"settings_module",
    'privilege'=>FALSE,
    'middleware' => [
         'auth.web',
        'accessCheck.web',
    ]
]);
