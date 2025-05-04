<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = '编号';
$lang['action'] = "操作";
$lang['add'] = "添加";
$lang['print_report'] = "打印报告";
$lang['save_data'] = "保存";
$lang['update_data'] = "保存更改";
$lang['change_data'] = "修改至";
$lang['close_dialog'] = "关闭";

$lang['new_notifications'] = "新通知";
$lang['show_all_notifications'] = "显示所有通知";
$lang['no_notifications_available'] = "没有可用通知";

$lang['home'] = "主页";
$lang['login'] = "登录";
$lang['signup'] = "注册";
$lang['dashboard'] = "仪表板";
$lang['logout'] = "注销";
$lang['operational'] = "运营";
$lang['back_to_home'] = "返回首页";
$lang['create_account'] = "创建账户";
$lang['sign_in'] = "登录";
$lang['create_an_account'] = "创建账户";
$lang['detail'] = "详情";
$lang['statistics'] = "统计";
$lang['master_data'] = "主数据";
$lang['data'] = "数据";
$lang['manage'] = "管理";

$lang['dont_have_account'] = "没有账户吗？";
$lang['already_have_account'] = "已经有账户了吗？";

$lang['explore'] = '探索';
$lang['address'] = '地';
$lang['follow'] = '跟随';
$lang['order_now'] = '立即订购';
$lang['reservations'] = '预订';
$lang['history'] = '历史';

$lang['invalid'] = "无法执行操作!";
$lang['no_access'] = "您没有权限访问此页面！";
$lang['page_not_found'] = "页面不存在！";
$lang['welcome'] = "欢迎！";
$lang['select'] = "选择";
$lang['required_to_do'] = " 需要执行 ";
$lang['and'] = "和";

$lang['images_not_change_immediately'] = "有些图片不会立即更改，需要先清除缓存。";
$lang['reupload_image_even_for_name_change'] = "* 即使只想更改名称，也必须重新上传图片。";

$lang['back_to_activity'] = '返回活动';

$jsonData1 = file_get_contents(site_url('assets/json/app_zh.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    // List of placeholders
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = '输入' . $item['value'];
    $lang[$item['key'] . '_old'] = '旧' . $item['value'];
    $lang[$item['key'] . '_new'] = '新' . $item['value'];
    $lang[$item['key'] . '_confirm'] = '确认' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];
    $lang[$item['key'] . '_select'] = "选择" . $item['value'];
    $lang[$item['key'] . '_past'] = '过去的 ' . $item['value'];

    // List of titles
    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already translated
    $lang[$item['key'] . '_v2_title'] = '列表' . $item['value']; // "Daftar" -> "列表"
    $lang[$item['key'] . '_v3_title'] = '数据' . $item['value']; // "Data" -> "数据"
    $lang[$item['key'] . '_v4_title'] = '报告' . $item['value']; // "Laporan" -> "报告"
    $lang[$item['key'] . '_v5_title'] = '数据' . $item['value']; // "Data" -> "数据"
    $lang[$item['key'] . '_v6_title'] = '个人资料' . $item['value']; // "Profil" -> "个人资料"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . '成功!'; // "Berhasil" -> "成功"
    $lang[$item['key'] . '_v8_title'] = '详情' . $item['value']; // "Detail" -> "详情"
    
    // List of messages
    $lang[$item['key'] . '_v1_msg'] = $item['value'];
    $lang[$item['key'] . '_v2_msg'] = $item['value'];
    $lang[$item['key'] . '_v3_msg'] = $item['value'];
    $lang[$item['key'] . '_v4_msg'] = $item['value'];
    $lang[$item['key'] . '_v5_msg'] = '将此证据发送给' . $item['value'] .'以便处理。';
    $lang[$item['key'] . '_v6_msg'] = $item['value'];
    $lang[$item['key'] . '_v7_msg'] = $item['value'];
    $lang[$item['key'] . '_v8_msg'] = $item['value'] . '不可用。';
    
    // Flash messages
    $lang[$item['key'] . '_flash1_msg_1'] = $item['value'] . ' 保存成功！';
    $lang[$item['key'] . '_flash1_msg_2'] = $item['value'] . ' 保存失败！';
    $lang[$item['key'] . '_flash1_msg_3'] = $item['value'] . ' 更新成功！';
    $lang[$item['key'] . '_flash1_msg_4'] = $item['value'] . ' 更新失败！';
    $lang[$item['key'] . '_flash1_msg_5'] = $item['value'] . ' 删除成功！';
    $lang[$item['key'] . '_flash1_msg_6'] = $item['value'] . ' 删除失败！';
}

