<?php
// $routes->group("dashboardabc", ["namespace" => "\Modules\AdminDashboard\Controllers", 'filter' => 'adminrolefilter'], function ($routes) {
//    $routes->get("/", "DashboardController::index");
// });

$routes->group("admin-dashboard", ["namespace" => "\Modules\AdminDashboard\Controllers"], function ($routes) {
   $routes->get('/', 'Home_c::index');
   $routes->get('/home', 'Home_c::index');
   $routes->get('signout', 'Home_c::logout');

   $routes->get('news_list', 'Pengumuman_c::index');
   $routes->get('news_form', 'Pengumuman_c::view_form');
   $routes->post('news_add', 'Pengumuman_c::save_news');

   $routes->get('banner', 'Banner_c::banner');
   $routes->get('create', 'Banner_c::create');
   $routes->post('banner-store', 'Banner_c::bannerStore');
   $routes->get('banner/edit/(:num)', 'Banner_c::bannerEdit/$1');
   $routes->post('banner/update/(:num)', 'Banner_c::bannerUpdate/$1');
   $routes->get('banner/delete/(:num)', 'Banner_c::bannerDelete/$1');

   
   $routes->get('banner-item/(:num)', 'Banner_Item_c::index/$1');
   $routes->get('banner-item/create/(:num)', 'Banner_Item_c::create/$1');
   $routes->post('banner-item-store', 'Banner_Item_c::bannerItemStore');
   $routes->get('banner-item/edit/(:num)', 'Banner_Item_c::bannerItemEdit/$1');
   $routes->post('banner-item/update/(:num)', 'Banner_Item_c::bannerItemUpdate/$1');
   $routes->get('banner-item/delete/(:num)', 'Banner_Item_c::bannerItemDelete/$1');


   $routes->get('sso', 'SSO_c::index');
   $routes->get('sso/create', 'SSO_c::create');
   $routes->post('sso-store', 'SSO_c::ssoStore');
   $routes->get('sso/edit/(:num)', 'SSO_c::ssoEdit/$1');
   $routes->post('sso/update/(:num)', 'SSO_c::ssoUpdate/$1');
   $routes->get('sso/delete/(:num)', 'SSO_c::ssoDelete/$1');
   $routes->get('sso/login/(:num)', 'SSO_c::ssoLogin/$1');
   $routes->get('sso/attribute/(:num)', 'SSO_c::ssoAttribute/$1');
   $routes->post('sso/update-attribute/(:num)', 'SSO_c::ssoUpdateAttribute/$1');



   $routes->get('menu', 'Menu_c::index');
   $routes->post('menu-store', 'Menu_c::menuStore');




});