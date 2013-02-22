<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// 站点信息
$config['nav_name'] = "网协<strong>BlackHole</strong>导航"; //用于top栏
$config['nav_title'] = "BlackHole导航"; //用于网页标题
$config['jquery'] = 'jquery-1.7.2.min';

// 最高管理员用户名密码
$config['nav_root_username'] = "bitnp";
$config['nav_root_password'] = 'blackhole';

// 抓取信息设置 单位：s
$config['bit_ttl'] = 600; //bit主页缓存时间
$config['jwc_ttl'] = 600; //jwc

// 周期任务设置 单位：min
$config['index_cache_ttl'] = 0; // 主页缓存时间
$config['check_apply'] = 30; // 检查申请时间
// 10080 min = 7 days
$config['clean_data_ttl'] = 10080; // 清理垃圾
$config['common_url_ttl'] = 10080; // 生成热门链接
$config['count_heat_ttl'] = 10080; // 统计链接热度


?>
