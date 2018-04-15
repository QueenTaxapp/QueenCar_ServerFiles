<?php


    $router->get('/application/clear', function(){
        \Illuminate\Support\Facades\Cache::forget('types');
    });



