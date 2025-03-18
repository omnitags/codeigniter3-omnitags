<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'WebController';
$route['404_override'] = 'WebController/no_page';
$route['translate_uri_dashes'] = FALSE;

$route['^(.*)/home$'] = 'WebController';
$route['home'] = 'WebController';
$route['login'] = 'Tabel_c2Controller/login';
$route['signup'] = 'Tabel_c2Controller/signup';
$route['no_level'] = 'WebController/no_level';
$route['overloaded'] = 'WebController/overloaded';
$route['invalid'] = 'WebController/invalid';
$route['dashboard'] = 'WebController/dashboard';
$route['dashboard/home'] = 'WebController/dashboard';

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/app.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];

foreach ($myData2 as $item2) {
    $route['assets/img/' . $item2['value'] . '/(:any)'] = 'OmnitagsController/serve_image/' . $item2['key'] . '/$1';

    $prefix = $item2['key'] . 'Controller';
    $cachedControllers = [];

    // Define routes for different functionality groups

    // View routes
    $viewRoutes = [
        'index' => 'index',
        'daftar' => 'daftar',
        'admin' => 'admin',
        'archive' => 'archive',
        'laporan' => 'laporan',
        'konfirmasi' => 'konfirmasi',
        'profil' => 'profil',
    ];
    
    // Common function routes
    $commonFunctionRoutes = [
        'tambah' => 'tambah',
        'update' => 'update',
        'filter' => 'filter',
        'filter_user' => 'filter_user',
    ];
    
    $uncommonFunctionRoutes = [
        'aktifkan' => 'aktifkan',
        'nonaktifkan' => 'nonaktifkan',
        'detail' => 'detail',
        'detail_archive' => 'detail_archive',
        'lihat' => 'lihat',
        'soft_delete' => 'soft_delete',
        'restore' => 'restore',
        'history' => 'history',
        'push' => 'push',
        'delete' => 'delete',
        'print' => 'print',
        'sync_theme' => 'sync_theme',
        'approve' => 'approve',
        'reject' => 'reject',
    ];

    // Unique function routes
    $uniqueFunctionRoutes = [
        'login' => 'login',
        'signup' => 'signup',
        'logout' => 'logout',
        'update_profil' => 'update_profil',
        'update_pass' => 'update_password',
        'daftar_history' => 'daftar_history',
        'update_id_theme' => 'update_id_theme',
        'update_favicon' => 'update_favicon',
        'update_logo' => 'update_logo',
        'update_foto' => 'update_foto',
        'update_status' => 'update_status',
        'ceklogin' => 'ceklogin',
        'importExcel' => 'importExcel',
        'cari' => 'cari',
        'book' => 'book',
    ];

    // Assign routes for each group
    // Check if any view routes don't exist

    foreach ($viewRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        $route[$routeKey1] = $controller1;
    }

    foreach ($commonFunctionRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        $route[$routeKey1] = $controller1;
    }

    foreach ($uncommonFunctionRoutes as $key => $value) {
        $routeKey1 = $item2['value'] . '/([a-zA-Z0-9\-]+)' . '/' . $key;
        $controller1 = $prefix . '/' . $value . '/$1';

        $route[$routeKey1] = $controller1;
    }

    foreach ($uniqueFunctionRoutes as $key => $value) {
        $routeKey1 =  $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;
        
        $route[$routeKey1] = $controller1;
    }

    $routeKey = $item2['value'];
    $controller = $prefix;
    $route[$routeKey] = $controller;

    $routeId = $item2['value'] . '/([a-zA-Z0-9\-]+)';
    $controller = $prefix . '/detail/$1';
    $route[$routeId] = $controller;
}
