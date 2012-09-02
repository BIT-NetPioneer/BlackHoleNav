<?php
$dayOfYear = $d = date("z") + 1;
$w = ceil($dayOfYear / 7);
$d = 244 - $dayOfYear;
$week = "今年第{$w}周，开学还有{$d}天";
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
        	<link href="<?php echo base_url("css/dynamic.css")?>" type="text/css" rel="stylesheet" />
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
        <script src="<?php echo base_url("js/main.js")?>" type="text/javascript"></script>
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
            <div id="search">
	            <div id="search_btn">
	                <li class="btn1">谷歌</li>
	                <li class="btn2">百度</li>
	                <li class="btn1">校内</li>
	                <li class="btn1">找乐</li>
	                <li class="btn1">查IP</li>
	            </div>
	            <div class="clear"></div>
	            <div id="search_contents">
	                <div style="display: none;">
	                    <form target="_blank" method="get" action="https://www.google.com.hk/search" id="searchform">
	                        <input id="s_google" type="text" name="q" class="input_search" autocomplete="off" />
	                        <button type="submit">Goggle搜索</button>
	                    </form>
	                </div>
	                <div>
	                    <form action="http://www.baidu.com/baidu" target="_blank">
	                        <input name="tn" type="hidden" value="baidu" />
	                        <input id="s_baidu" type="text" name="word" class="input_search" autocomplete="off" />
	                        <button type="submit">百度一下</button>
	                    </form>
	                </div>
	                <div style="display: none;">
	                    <form target="_blank" method="get" action="#">
	                        <!--个别搜索所需-->
	                        <input type="hidden" name="act" value="ftp"/>
	                        <!--个别搜索所需-->
	                        <input type="text" name="keyword" class="input_search" />
	                        <button hidefocus="ture" type="submit">校园网搜索</button>
	                    </form>
	                </div>
	                <div style="display: none;">
	                    <form target="_blank" method="get" action="http://mp3.baidu.com/m">
	                        <!--个别搜索所需-->
	                        <input type="hidden" value="baidu" name="tn"/>
	                        <input type="hidden" value="ms" name="f"/>
	                        <input type="hidden" value="10" name="rn"/>
	                        <input type="hidden" value="134217728" name="ct"/>
	                        <input type="hidden" value="-1" name="lm"/>
	                        <input type=hidden name=ie value="UTF-8">
	                        <!--个别搜索所需-->
	                        <input type="text" name="word" class="input_search" />
	                        <button type="submit">找音乐</button>
	                    </form>
	                </div>
	                <div style="display: none;">
	                    <form target="_blank" method="get" action="http://star.bit.edu.cn/ipsearch/ip.php">
	                        <input type="text" name="ip" class="input_search" />
	                        <button type="submit">IP查询</button>
	                    </form>
	                </div>
	                <div id="listbox"> </div>
	            </div>
	        </div>
        </div>

        <div id="wrap">
