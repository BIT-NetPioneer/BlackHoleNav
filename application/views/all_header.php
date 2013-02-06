<?php
// 定义时间点，按照年份
$date_info = array();

$date_info[2012]['TERM_1ST_START'] = mktime(0, 0, 0, 9, 3, 2012);
$date_info[2013]['WINTER_VACATION_START'] = mktime(0, 0, 0, 1, 28, 2013);
$date_info[2013]['TERM_2ND_START'] = mktime(0, 0, 0, 2, 25, 2013);
$date_info[2013]['SUMMER_VACATION_START'] = mktime(0, 0, 0, 7, 1, 2013);
$date_info[2013]['TERM_1ST_START'] = mktime(0, 0, 0, 9, 3, 2013);

$year = date('Y');
$dayOfYear = date("z") + 1;
$w = ceil($dayOfYear / 7);
$yw = $w;
$d = 0;
$d2 = 0;
$timeOfNow = mktime();
$flag = 1;

try {
    if ($timeOfNow >= $date_info[$year]['TERM_1ST_START']) {
// in 1st term 1ST year
        $flag = 1;
        $d = ceil(($timeOfNow - $date_info[$year]['TERM_1ST_START']) / 86400);
        $w = ceil($d / 7);

        // NEW YEAR
        if ((mktime(0, 0, 0, 1, 1, $year + 1) - $timeOfNow) < 2592000) {
            $flag = 12;
            $d2 = ceil((mktime(0, 0, 0, 1, 1, $year + 1) - $timeOfNow) / 86400);
        }
    } else if ($timeOfNow < $date_info[$year]['WINTER_VACATION_START']) {
// in 1st term 2ND year
        $flag = 1;
        $d = ceil(($timeOfNow - $date_info[$year - 1]['TERM_1ST_START']) / 86400);
        $w = ceil($d / 7);

        // WINTER VACATION
        if (($date_info[$year]['WINTER_VACATION_START'] - $timeOfNow) < 2592000) {
            $flag = 11;
            $d2 = ceil(($date_info[$year]['WINTER_VACATION_START'] - $timeOfNow) / 86400);
        }
    } else if ($timeOfNow < $date_info[$year]['TERM_2ND_START']) {
// in WINTER
        $flag = 2;
        $d = ceil(($date_info[$year]['TERM_2ND_START'] - $timeOfNow) / 86400);
    } else if ($timeOfNow < $date_info[$year]['SUMMER_VACATION_START']) {
// in 2nd term
        $flag = 1;
        $d = ceil(($timeOfNow - $date_info[$year - 1]['TERM_2ND_START']) / 86400);
        $w = ceil($d / 7);

        // SUMMER VACATION
        if (($date_info[$year]['SUMMER_VACATION_START'] - $timeOfNow) < 2592000) {
            $flag = 11;
            $d2 = ceil(($date_info[$year]['SUMMER_VACATION_START'] - $timeOfNow) / 86400);
        }
    } else {
// in SUMMER
        $flag = 2;
        $d = ceil(($date_info[$year]['TERM_1ST_START'] - $timeOfNow) / 86400);
    }
} catch (Exception $e) {
    $flag = 0;
}

$week = "";

if ($flag == 1) {
    $week = '开学第 <span class="date-num">' . "{$w}</span> 周";
} else if ($flag == 11) {
    $week = '开学第 <span class="date-num">' . "{$w}</span> 周，假期还有{$d2}天";
} else if ($flag == 12) {
    $week = '开学第 <span class="date-num">' . "{$w}</span> 周，新年还有{$d2}天";
} else if ($flag == 2) {
    $week = '开学还有 <span class="date-num">' . "{$d}</span> 天";
} else {
    $week = "ERROR";
}

$datestr = date("Y年m月d日") . " 今年第{$yw}周";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $this->config->item('nav_title'); ?></title>
        <?php if (is_array($csses)): ?>
            <?php foreach ($csses as $css): ?>
                <link href="<?php echo base_url("css/$css.css"); ?>" type="text/css" rel="stylesheet" />
            <?php endforeach; ?>
        <?php else: ?>
            <link href="<?php echo base_url("css/$csses.css"); ?>" type="text/css" rel="stylesheet" />
        <?php endif; ?>
        <!--[if !IE]><!-->
        <link href="<?php echo base_url("css/css3.css"); ?>" type="text/css" rel="stylesheet" />
        <!--<![endif]-->
        <!--[if gte IE 9]>
            <link href="<?php echo base_url("css/css3.css"); ?>" type="text/css" rel="stylesheet" />
        <![endif]-->

        <?php if (is_array($jses)): ?>
            <?php foreach ($jses as $js): ?>
                <script src="<?php echo base_url("js/$js.js"); ?>" type="text/javascript"></script>
            <?php endforeach; ?>
        <?php else: ?>
            <script src="<?php echo base_url("js/$jses.js"); ?>" type="text/javascript"></script>
        <?php endif; ?>

        <script src="<?php echo base_url("js/searchbox.js"); ?>" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.d_list').hover(function(){
                    $(this).children('dd').css("display", "block");
                }, function(){
                    $(this).children('dd').css("display", "none");
                })
                $('.search-select').hover(function(){
                    $(this).addClass('cur-select');
                }, function(){
                    $(this).removeClass('cur-select');
                })

                $('.keywords').focus();
                
                BaiduSuggestion.bind('keyword');
            });
        </script>
    </head>
    <body>
        <!--[if ie 6]><script src="<?php echo base_url(); ?>js/letskillie6.zh_CN.pack.js" type=text/javascript></script><![endif]-->
        <div id="top">
            <div id="nav">
                <p id="dateinfo"><?php echo $datestr; ?></p>
                <p id="weeks"><?php echo $week; ?></p>
                <p id="welcomeinfo">欢迎来到<?php echo $this->config->item('nav_name'); ?></p>
            </div>
        </div>
        <div id="header">
            <a id="logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="BlackHole导航">
            </a>
            <div id="searchbox">
                <ol id="search-title-option">
                    <li id="search-option-page" class="search-option-item search-option-item-select">网页</li>
                    <li id="search-option-pic" class="search-option-item">图片</li>
                    <li id="search-option-music" class="search-option-item">音乐</li>
                    <li id="search-option-video" class="search-option-item">视频</li>
                    <li id="search-option-map" class="search-option-item">地图</li>
                    <li id="search-option-ip" class="search-option-item">查IP</li>
                </ol>
                <form method="get" name="search" action="http://www.baidu.com/s" id="search-form">
                    <input id="keyword" class="keywords" type="text" name="wd" value="" placeholder="搜索" autocomplete="off" />
                    <input id="keyword_bnt" type="submit" value="提交" />
                    <input type=hidden name=ie value="UTF-8">
                    <input type="hidden" value="utf8" name="oe"/>
                </form>
                <dl id="search_selects-page" class="d_list cur-option">
                    <dt>
                    <a id="select_page_cur" class="select_option_cur">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_google_page" class="search-select">Google</a>
                        <a id="select_baidu_page" class="search-select cur">百度</a>
                        <a id="select_bing_page" class="search-select">必应</a>                   
                        <a id="select_lan_page" class="search-select">校内</a>
                    </dd>
                </dl>
                <dl id="search_selects-pic" class="d_list">
                    <dt>
                    <a id="select_pic_cur" class="select_option_cur">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <!--<a id="select_google_pic" class="search-select">Google</a>-->
                        <a id="select_baidu_pic" class="search-select cur">百度</a>
                        <a id="select_bing_pic" class="search-select">必应</a>                   
                    </dd>
                </dl>
                <dl id="search_selects-music" class="d_list">
                    <dt>
                    <a id="select_music_cur" class="select_option_cur">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_baidu_music" class="search-select cur">百度</a>
                        <a id="select_bing_music" class="search-select">QQ</a>                   
                        <a id="select_zhaoyue_music" class="search-select">找乐</a>
                    </dd>
                </dl>
                <dl id="search_selects-video" class="d_list">
                    <dt>
                    <a id="select_video_cur" class="select_option_cur">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_baidu_video" class="search-select cur">百度</a>
                        <a id="select_youku_video" class="search-select">优酷</a>                   
                        <!--<a id="select_tudou_video" class="search-select">土豆</a>-->
                    </dd>
                </dl>
                <dl id="search_selects-map" class="d_list">
                    <dt>
                    <a id="select_map_cur" class="select_option_cur">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_google_map" class="search-select">Google</a>
                        <a id="select_baidu_map" class="search-select cur">百度</a>
                        <a id="select_bing_map" class="search-select">必应</a>                   
                    </dd>
                </dl>
                <dl id="search_selects-ip" class="d_list">
                    <dt>
                    <a id="select_ip_cur" class="select_option_cur">校内IP</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_lan_ip" class="search-select cur">校内IP</a>
                        <a id="select_ip138_ip" class="search-select">ip138</a>
                    </dd>
                </dl>
            </div>
        </div>
        <script charset="gbk" src="<?php echo base_url('js/opensug.js');?>"></script>
        <div id="wrap">
