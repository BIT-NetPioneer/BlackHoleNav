<?php
$dayOfYear = $d = date("z") + 1;
$w = ceil($dayOfYear / 7);
$d = 244 - $dayOfYear;
$week = "今年第{$w}周，据开学还有{$d}天";
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