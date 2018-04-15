<?php

/*  core route */

/**    * /core/module - to view create user Page  **/
    $router->get('/core/module', [
        'as'   => 'createuser',
        'uses' => 'Controller@viewmodule',
    ]);



