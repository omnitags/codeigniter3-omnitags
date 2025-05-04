<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = "No";
$lang['action'] = "Action";
$lang['add'] = "Add";
$lang['print_report'] = "Print Report";
$lang['save_data'] = "Save";
$lang['update_data'] = "Save Changes";
$lang['change_data'] = "Make changes to";
$lang['close_dialog'] = "Close";

$lang['new_notifications'] = "new notifications";
$lang['show_all_notifications'] = "Show all notifications";
$lang['no_notifications_available'] = 'No notifications available';

$lang['home'] = "Home";
$lang['login'] = "Login";
$lang['signup'] = "Signup";
$lang['dashboard'] = "Dashboard";
$lang['logout'] = "Logout";
$lang['operational'] = "Operational";
$lang['back_to_home'] = "Back to Home";
$lang['create_account'] = "Create Account";
$lang['sign_in'] = "Sign In";
$lang['create_an_account'] = "Create an Account";
$lang['detail'] = "Detail";
$lang['statistics'] = "Statistics";
$lang['master_data'] = "Master Data";
$lang['data'] = "Data";
$lang['manage'] = "Manage";

$lang['already_have_account'] = "Already have account?";
$lang['dont_have_account'] = "Don't have account?";

$lang['explore'] = 'Explore';
$lang['address'] = 'Address';
$lang['follow'] = 'Follow';
$lang['order_now'] = 'Order Now';
$lang['reservations'] = 'Reservations';
$lang['history'] = 'History';

$lang['invalid'] = "Cannot perform action!";
$lang['no_access'] = "You don't have access to this page!";
$lang['page_not_found'] = "Page Not Found!";
$lang['welcome'] = "Welcome!";
$lang['select'] = "Select";
$lang['required_to_do'] = " required to do ";
$lang['and'] = " and ";

$lang['images_not_change_immediately'] = "Some images will not change immediately, cache needs to be cleared first.";
$lang['reupload_image_even_for_name_change'] = "* Even if you only want to change the name, you still need to re-upload the image as well.";

$lang['back_to_activity'] = 'Back to Activity';

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

    // List of messages
    $lang[$item['key'] . '_v1_msg'] = $item['value'];
    $lang[$item['key'] . '_v2_msg'] = $item['value'];
    $lang[$item['key'] . '_v3_msg'] = $item['value'];
    $lang[$item['key'] . '_v4_msg'] = $item['value'];
    $lang[$item['key'] . '_v5_msg'] = 'Send this evidence to ' . $item['value'] . ' for processing.';
    $lang[$item['key'] . '_v6_msg'] = $item['value'];
    $lang[$item['key'] . '_v7_msg'] = $item['value'];
    $lang[$item['key'] . '_v8_msg'] = $item['value'] . ' is unavailable.';
}