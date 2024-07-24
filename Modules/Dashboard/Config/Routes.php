<?php

$routes->group("front", ["namespace" => "\Modules\Dashboard\Controllers", 'filter' => 'loginfilter'], function ($routes) {
   
   // $routes->get('/', 'Dashboard_c::index', ['filter' => 'loginfilter']);
   $routes->get('/', 'Dashboard_c::index');   
});

$routes->group("login", ["namespace" => "\Modules\Dashboard\Controllers"], function ($routes) {
   
    $routes->get('/', 'Login_c::index');
 //    $routes->get('/home', 'Dashboard_c::index');
    $routes->post('loginauth', 'Login_c::auth_login'); 
    $routes->get('logout', 'Login_c::logout');  
 });
