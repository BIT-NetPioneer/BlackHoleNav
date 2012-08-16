<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="<?php echo base_url() . 'js/html5.js'; ?>"></script> 
        <script src="<?php echo base_url() . 'js/jquery-1.7.2.min.js'; ?>"></script> 
        <script src="<?php echo base_url() . 'js/jquery-ui-1.8.22.custom.min.js'; ?>"></script> 
        <link href="<?php echo base_url() . 'css/reset.css'; ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'css/css.css'; ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'css/jquery-ui-1.8.22.custom.css'; ?>" type="text/css" rel="stylesheet" />
        <title><?php echo $title; ?></title>

        <script>
            $('.urls>ul>li:even').addClass("urlclass-even");
        </script>
    </head>
    <body>
        <nav>
            <p id="dateinfo"><?php echo $date_info; ?></p>
            <p id="weeks">教学周第<?php echo $week; ?>周</p>
            <p id="welcomeinfo">欢迎来到XX导航</p>
        </nav>
        <header>
            <img width="185" heigth="80" src="<?php echo base_url() . 'img/logo.png'; ?>" alt="XX导航">
            <div id="searchbox">
                Nothing
            </div>
        </header>

        <div style="width: 960px; margin: 0 auto;">
            <div id="pageleft">
                <div id="common">
                    <div class="title">
                        <p>常用网站</p>
                    </div>
                    <div class="commonurls">
                        <p>
                            <span class="urlspan"><a href="http://www.baidu.com">百度</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度1231</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度34211</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度3</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度33</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度2</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度222</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度</a></span>
                            <span class="urlspan"><a href="http://www.baidu.com">百度</a></span>
                        </p>
                    </div>
                </div>

                <div id="urllist">
                    <div class="title">
                        <p>校内导航</p>
                    </div>
                    <div class="urls">
                        <ul>
                            <li class="urlclass">
                                <span class="urlspantitle">分类1</span>
                                <span class="urlspan2"><a href="http://www.baidu.com" onmousedown="$(this).attr('href','ceshi')">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度1231</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度34211</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度3</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度33</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度2</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度222</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度2</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度222</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <div class="clear"> </div>
                                <hr/>
                            </li>
                            <li class="urlclass">
                                <span class="urlspantitle">分类2</span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度2</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度222</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <span class="urlspan2"><a href="http://www.baidu.com">百度</a></span>
                                <div class="clear"> </div>
                                <hr/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="pageright">
                <script>
                    $(function(){
                        $('#tabselect1').mouseover(function(){
                            //$('#tabs-1').removeClass('specialitem-active');
                            $('#tabs-2').removeClass('specialitem-active');
                            $('#tabs-3').removeClass('specialitem-active');
                            $('#tabs-1').addClass('specialitem-active');
                            $('#tabselect1').removeClass('specialcontentselectitem-active');
                            $('#tabselect2').removeClass('specialcontentselectitem-active');
                            $('#tabselect3').removeClass('specialcontentselectitem-active');
                            $('#tabselect1').addClass('specialcontentselectitem-active');
                        });
                        $('#tabselect2').mouseover(function(){
                            $('#tabs-1').removeClass('specialitem-active');
                            //$('#tabs-2').removeClass('specialitem-active');
                            $('#tabs-3').removeClass('specialitem-active');
                            $('#tabs-2').addClass('specialitem-active');
                            $('#tabselect1').removeClass('specialcontentselectitem-active');
                            //$('#tabselect2').removeClass('specialcontentselectitem-active');
                            $('#tabselect3').removeClass('specialcontentselectitem-active');
                            $('#tabselect2').addClass('specialcontentselectitem-active');
                        });
                        $('#tabselect3').mouseover(function(){
                            $('#tabs-1').removeClass('specialitem-active');
                            $('#tabs-2').removeClass('specialitem-active');
                            //$('#tabs-3').removeClass('specialitem-active');
                            $('#tabs-3').addClass('specialitem-active');
                            $('#tabselect1').removeClass('specialcontentselectitem-active');
                            $('#tabselect2').removeClass('specialcontentselectitem-active');
                            //$('#tabselect3').removeClass('specialcontentselectitem-active');
                            $('#tabselect3').addClass('specialcontentselectitem-active');
                        });
                    })
                </script>
                <div id="special">
                    <div class="title">
                        <p>特别推荐</p>
                    </div>
                    <div id="specialcontent">
                        <div id="tabs">
                            <ul class="specialselect">
                                <li class="specialcontentselectitem specialcontentselectitem-active" id="tabselect1">
                                    <a href="#tabs-1" onclick="return false;" >1</a>
                                </li>
                                <li class="specialcontentselectitem" id="tabselect2">
                                    <a href="#tabs-2" onclick="return false;" >2</a>
                                </li>
                                <li class="specialcontentselectitem" id="tabselect3">
                                    <a href="#tabs-3" onclick="return false;" >3</a>
                                </li>
                            </ul>
                            <div id="tabs-1" class="specialitem specialitem-active" >
                                <a href="http://www.3dmgame.com/">
                                    <img src="<?php echo base_url() . 'upload/special/1.jpg'; ?>" width="256" height="144" />
                                    <p class="pictitle">《电车之狼R》校内PT下载</p>
                                </a>
                                <p class="picdes">《电车之狼R》校内PT下载！10MB/s哦亲！</p>
                            </div>
                            <div id="tabs-2" class="specialitem">
                                <a href="http://www.baidu.com/">
                                    <img src="<?php echo base_url() . 'upload/special/2.jpg'; ?>" width="256" height="144" />
                                    <p class="pictitle">《欲望之血》校内下载</p>
                                </a>
                                <p class="picdes">3D枪战动作游戏，并且包括了大量的休闲小游戏入内，也是曾经非常知名的游戏。</p>
                            </div>
                            <div id="tabs-3" class="specialitem">
                                <a href="http://www.qq.com/">
                                    <img src="<?php echo base_url() . 'upload/special/3.jpg'; ?>" width="256" height="144" />
                                    <p class="pictitle">《工口医3D》自由下载</p>
                                </a>
                                <p class="picdes">2008年F社作品，《工口医3D》XX医生！</p>
                            </div>
                        </div>
                    </div>


                </div>

                <div id="news">
                    <div class="title">
                        <p>新闻</p>
                    </div>
                    <div id="newscontent">
                        <ul>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2866" title="2012年本科生秋季售书时间安排(新)" target="_blank">2012年本科生秋季售书时间安排(新)</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2864" title="关于对李某考试作弊的通报" target="_blank">关于对李某考试作弊的通报</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2863" title="关于2012年暑假期间教务管理系统关闭的通知" target="_blank">关于2012年暑假期间教务管理系统关闭的通知</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2862" title="2012-2013学年第一学期各专业接收学生情况表" target="_blank">2012-2013学年第一学期各专业接收学生情况表</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2861" title="关于对王某、?p某、闻某、马某及吕某五人考试作弊的通报" target="_blank">关于对王某、?p某、闻某、马某及吕某五人考试作弊的通报</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2853" title="2012-2013学年小学期安排（7月2日更新）" target="_blank">2012-2013学年小学期安排（7月2日更新）</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2860" title="关于2012&mdash;2013学年第一学期转专业安排的通知" target="_blank">关于2012&mdash;2013学年第一学期转专业安排的通知</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2859" title="关于对第七届T－more优秀教师奖（课堂教学类）评选结果的公示" target="_blank">关于对第七届T－more优秀教师奖（课堂教学类）评选结果的公示</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://jwc.bit.edu.cn/plus/view.php?aid=2858" title="2012年度北京理工大学校级创新项目结题总结会顺利举行" target="_blank">2012年度北京理工大学校级创新项目结题总结会顺利举行</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/77913.htm" title="QS亚洲大学排名公布，北理工位居亚洲100强" target="_blank">QS亚洲大学排名公布，北理工位居亚洲100强</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78108.htm" title="北理工能源与环境政策研究中心发布《中国能源报告（2012..." target="_blank">北理工能源与环境政策研究中心发布《中国能源报告（2012...</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78107.htm" title="北理工学子夺得第五届全国大学生信息安全大赛多个奖项" target="_blank">北理工学子夺得第五届全国大学生信息安全大赛多个奖项</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78098.htm" title="北理工学子在第三届“飞向未来”亚洲区太空探索竞赛中喜获佳..." target="_blank">北理工学子在第三届“飞向未来”亚洲区太空探索竞赛中喜获佳...</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78089.htm" title="郭大成书记胡海岩校长关心良乡校区汛期安全工作" target="_blank">郭大成书记胡海岩校长关心良乡校区汛期安全工作</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78097.htm" title="探远古奇迹 访祁连冰川&mdash;&mdash;北理工生命学院“航天生态、信仰..." target="_blank">探远古奇迹 访祁连冰川&mdash;&mdash;北理工生命学院“航天生态、信仰...</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/xwtt/78087.htm" title="王大珩先生逝世一周年纪念大会在我校隆重召开" target="_blank">王大珩先生逝世一周年纪念大会在我校隆重召开</a>
                            </li>
                            <li class="newsitem">
                                <a href="http://www.bit.edu.cn/xww/spxw/77771.htm" title="【视频】《流年碎影》&mdash;&mdash;北理工毕业季专题电视片选播" target="_blank">【视频】《流年碎影》&mdash;&mdash;北理工毕业季专题电视片选播</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>



            <div class="clear"></div>
        </div>
    </body>
</html>

