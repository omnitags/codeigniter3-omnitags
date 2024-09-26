<?php
defined('BASEPATH') or exit('No direct script access allowed');


$jsonData1 = file_get_contents(site_url('assets/json/app.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    // List of placeholders
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = "Input " . $item['value'];
    $lang[$item['key'] . '_old'] = "Old " . $item['value'];
    $lang[$item['key'] . '_new'] = "New " . $item['value'];
    $lang[$item['key'] . '_confirm'] = "Confirm " . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];
    $lang[$item['key'] . '_select'] = "Select " . $item['value'];
    $lang[$item['key'] . '_past'] = 'Past ' . $item['value'];

    $lang[$item['key'] . '_flash1_msg_1'] = $item['value'] . ' successfully saved!';
    $lang[$item['key'] . '_flash1_msg_2'] = $item['value'] . ' failed to save!';
    $lang[$item['key'] . '_flash1_msg_3'] = $item['value'] . ' successfully updated!';
    $lang[$item['key'] . '_flash1_msg_4'] = $item['value'] . ' failed to update!';
    $lang[$item['key'] . '_flash1_msg_5'] = $item['value'] . ' successfully deleted!';
    $lang[$item['key'] . '_flash1_msg_6'] = $item['value'] . ' failed to delete!';

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

    // List of messages
    $lang[$item['key'] . '_v1_msg'] = $item['value'];
    $lang[$item['key'] . '_v2_msg'] = $item['value'];
    $lang[$item['key'] . '_v3_msg'] = $item['value'];
    $lang[$item['key'] . '_v4_msg'] = $item['value'];
    $lang[$item['key'] . '_v5_msg'] = 'Send this evidence to ' . $item['value'] . ' for processing.';
    $lang[$item['key'] . '_v6_msg'] = $item['value'];
    $lang[$item['key'] . '_v7_msg'] = $item['value'];
    $lang[$item['key'] . '_v8_msg'] = $item['value'] . ' is unavailable.';
    $lang[$item['key'] . '_v9_msg'] = $item['value'];
    $lang[$item['key'] . '_v10_msg'] = $item['value'];
    $lang[$item['key'] . '_v11_msg'] = $item['value'];
}