<?php
// $routes->group("dashboardabc", ["namespace" => "\Modules\AdminDashboard\Controllers", 'filter' => 'adminrolefilter'], function ($routes) {
//    $routes->get("/", "DashboardController::index");
// });

$routes->group("admin-dashboard", ["namespace" => "\Modules\AdminDashboard\Controllers"], function ($routes) {
   // $routes->get("events-list", "EventsListController::index");
   // $routes->get("event-add", "EventInfoController::add_info"); // function view form add event
   // $routes->add("add", "EventInfoController::save_info"); // function save the event
   // $routes->get("event-info/(:num)", "EventInfoController::/$1");
   // $routes->get("event-editinfo/(:num)", "EventInfoController::index_detail/$1");   // function view info for edit
   // $routes->add("edit/(:num)", "EventInfoController::edit_info/$1"); // function edit
   $routes->get('/', 'Home_c::index');
   // $routes->get('/home', 'Home_c::index');

   $routes->get('banner', 'Banner_c::banner');
   $routes->get('create', 'Banner_c::create');
   $routes->post('banner-store', 'Banner_c::bannerStore');
   $routes->get('banner/edit/(:num)', 'Banner_c::bannerEdit/$1');
   $routes->post('banner/update/(:num)', 'Banner_c::bannerUpdate/$1');
   $routes->get('banner/delete/(:num)', 'Banner_c::bannerDelete/$1');

   $routes->get('banner-item/(:num)', 'Banner_Item_c::index/$1');
   $routes->get('banner-item/create', 'Banner_Item_c::create');
   $routes->post('banner-item-store', 'Banner_Item_c::bannerItemStore');




});