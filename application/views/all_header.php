<?php
$date_info = array();
$year = date('Y');
$date_info[2012]['TERM_1ST_START'] = mktime(0, 0, 0, 9, 3, 2012);
$date_info[2013]['WINTER_VACATION_START'] = mktime(0, 0, 0, 28, 1, 2013);
$date_info[2013]['TERM_2ND_START'] = mktime(0, 0, 0, 2, 25, 2013);
$date_info[2013]['SUMMER_VACATION_START'] = mktime(0, 0, 0, 7, 1, 2013);
$date_info[2013]['TERM_1ST_START'] = mktime(0, 0, 0, 9, 3, 2013);

$dayOfYear = date("z") + 1;
$w = ceil($dayOfYear / 7);
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
        if ((mktime(0, 0, 0, 1, 1, $year+1) - $timeOfNow) < 2592000) {
            $flag = 12;
            $d2 = ceil((mktime(0, 0, 0, 1, 1, $year+1) - $timeOfNow) / 86400);
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
    $week = "开学第{$w}周";
} else if ($flag == 11) {
    $week = "开学第{$w}周，假期还有{$d2}天";
} else if ($flag == 12) {
    $week = "开学第{$w}周，新年还有{$d2}天";
} else if ($flag == 2) {
    $week = "今年第{$w}周，开学还有{$d}天";
} else {
    $week = "今年第{$w}周，ERROR";
}
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

        <script type="text/javascript">
            $(document).ready(function() {
                        
                $('#search_selects').hover(function(){
                    $(this).children('dd').css("display", "block");
                }, function(){
                    $(this).children('dd').css("display", "none");
                })
                $('.search-select').hover(function(){
                    $(this).addClass('cur-select');
                }, function(){
                    $(this).removeClass('cur-select');
                })
                $('.search-select').click(function(){
                    $('.cur').removeClass('cur');
                    switch($(this).attr('id')){
                        case 'select_google':
                            $('#search_selects>dt>a').attr('id', 'select_google');
                            $('#search_selects>dt>a').html('Google');
                            $(this).addClass('cur');
                            $('#keyword').attr('name', 'q')
                            $('#search-form').attr('action', 'http://www.google.com.hk/search')
                            break;
                        case 'select_baidu':
                            $('#search_selects>dt>a').attr('id', 'select_baidu');
                            $('#search_selects>dt>a').html('百度');
                            $(this).addClass('cur');
                            $('#keyword').attr('name', 'wd')
                            $('#search-form').attr('action', 'http://www.baidu.com/s')
                            break;
                        case 'select_bing':
                            $('#search_selects>dt>a').attr('id', 'select_bing');
                            $('#search_selects>dt>a').html('必应');
                            $(this).addClass('cur');
                            $('#keyword').attr('name', 'q')
                            $('#search-form').attr('action', 'http://cn.bing.com/search')
                            break;
                        case 'select_lan':
                            $('#search_selects>dt>a').attr('id', 'select_lan');
                            $('#search_selects>dt>a').html('校内');
                            $(this).addClass('cur');
                            $('#keyword').attr('name', 'wd')
                            $('#search-form').attr('action', 'http://www.baidu.com/s')
                            break;
                        case 'select_ip':
                            $('#search_selects>dt>a').attr('id', 'select_ip');
                            $('#search_selects>dt>a').html('查询IP');
                            $(this).addClass('cur');
                            $('#keyword').attr('name', 'ip')
                            $('#search-form').attr('action', 'http://star.bit.edu.cn/ipsearch/ip.php')
                            break;
                    }
                    $('#search_selects').children('dd').css("display", "none"); 
                })
                $('.keywords').focus();
            });
        </script>
    </head>
    <body>
        <!--[if ie 6]><script src="<?php echo base_url(); ?>js/letskillie6.zh_CN.pack.js" type=text/javascript></script><![endif]-->
        <div id="top">
            <div id="nav">
                <p id="dateinfo"><?php echo date("Y年m月d日"); ?></p>
                <p id="weeks"><?php echo $week; ?></p>
                <p id="welcomeinfo">欢迎来到<?php echo $this->config->item('nav_name'); ?></p>
            </div>
        </div>
        <div id="header">
            <a id="logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="BlackHole导航">
            </a>
            <div id="searchbox">
                <form method="get" name="search" action="http://www.baidu.com/s" id="search-form">
                    <input id="keyword" class="keywords" type="text" name="wd" value="" placeholder="搜索" autocomplete="off" />
                    <input id="keyword_bnt" type="submit" value="提交" />
                </form>
                <dl id="search_selects" class="d_list">
                    <dt>
                    <a id="select_baidu">百度</a>
                    </dt>
                    <dd style="display: none;">
                        <a id="select_google" class="search-select">Google</a>
                        <a id="select_baidu" class="search-select cur">百度</a>                    
                        <a id="select_bing" class="search-select">必应</a>                   
                        <a id="select_lan" class="search-select">校内</a>
                        <a id="select_ip" class="search-select">查询IP</a>
                    </dd>
                </dl>
            </div>
        </div>

        <div id="wrap">
