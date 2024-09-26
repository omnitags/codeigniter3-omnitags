<?php
defined('BASEPATH') or exit('No direct script access allowed');


$jsonData1 = file_get_contents(site_url('assets/json/app.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    // List of titles
    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already in English
    $lang[$item['key'] . '_v2_title'] = "List of " . $item['value']; // "Daftar" -> "List of"
    $lang[$item['key'] . '_v3_title'] = $item['value'] . " Data"; // "Data" remains "Data"
    $lang[$item['key'] . '_v4_title'] = $item['value'] . " Report"; // "Laporan" -> "Report"
    $lang[$item['key'] . '_v5_title'] = $item['value'] . " Data"; // "Data" remains "Data"
    $lang[$item['key'] . '_v6_title'] = $item['value'] . " Profile"; // "Profil" -> "Profile"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . " Successful!"; // "Berhasil!" -> "Successful!"
    $lang[$item['key'] . '_v8_title'] = "Details of " . $item['value']; // "Detail" -> "Details of"
    $lang[$item['key'] . '_v9_title'] = $item['value'] . ' Archive';
    $lang[$item['key'] . '_v10_title'] = 'Details of ' . $item['value'] . ' Archive';
    $lang[$item['key'] . '_v11_title'] = 'History of ' . $item['value'];
}