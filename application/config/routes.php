<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Redirect to English version if language is not specified
$route['default_controller'] = 'welcome/default_language';
$languages = 'en|fr|id|zh';
$route['404_override'] = 'welcome/no_page';
$route['translate_uri_dashes'] = FALSE;

// Language routes
$route['^(?!' . $languages . ')(.*)/home$'] = 'welcome/default_language';
$route['(' . $languages . ')/home'] = 'welcome';
$route['(' . $languages . ')/login'] = 'c_tabel_c2/login';
$route['(' . $languages . ')/signup'] = 'c_tabel_c2/signup';
$route['(' . $languages . ')/no_level'] = 'welcome/no_level';
$route['en/overloaded'] = 'welcome/overloaded';
$route['(' . $languages . ')/invalid'] = 'welcome/invalid';
$route['(' . $languages . ')/dashboard'] = 'welcome/dashboard';
$route['(' . $languages . ')/dashboard/home'] = 'welcome/dashboard';
$route['(' . $languages . ')/welcome/set_language'] = 'welcome/set_language';
$route['(' . $languages . ')'] = 'welcome';

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/app.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];

foreach ($myData2 as $item2) {
    $route['assets/img/' . $item2['value'] . '/(:any)'] = 'Omnitags/serve_image/' . $item2['key'] . '/$1';

    $prefix = 'c_' . $item2['key'];
    $cachedControllers = [];

    $routeKey = '(' . $languages . ')/' . $item2['value'];
    $controller = $prefix;
    $route[$routeKey] = $controller;


    $routeId = '(' . $languages . ')/' . $item2['value'] . '/(:num)';
    $controller = $prefix . '/detail/$2';
    $route[$routeId] = $controller;


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
        'update_id_tema' => 'update_id_tema',
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
        $routeKey1 = '(' . $languages . ')/' . $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        $route[$routeKey1] = $controller1;
    }

    foreach ($commonFunctionRoutes as $key => $value) {
        $routeKey1 = '(' . $languages . ')/' . $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;

        $route[$routeKey1] = $controller1;
    }

    foreach ($uncommonFunctionRoutes as $key => $value) {
        $routeKey1 = '(' . $languages . ')/' . $item2['value'] . '/(:num)' . '/' . $key;
        $controller1 = $prefix . '/' . $value . '/$2';

        $route[$routeKey1] = $controller1;
    }

    foreach ($uniqueFunctionRoutes as $key => $value) {
        $routeKey1 = '(' . $languages . ')/' .  $item2['value'] . '/' . $key;
        $controller1 = $prefix . '/' . $value;
        
        $route[$routeKey1] = $controller1;
    }
}
