<?php


$router->group(['prefix' => '/user'], function() use ($router){
    $router->post('/create', [
        'uses' => 'UserController@store',
        'as' => 'user-store'
    ]);

    $router->post('/login', [
        'uses' => 'UserController@login',
        'as' => 'user-login'
    ]);

    $router->get('/me', [
        'middleware' => ['auth'],
        'uses' => 'UserController@show',
        'as' => 'user-auth'
    ]);
});
    
