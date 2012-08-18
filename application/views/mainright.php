<div id="pageright">

    <div id="special" class="block">
        <div class="title">
            <p>特别推荐</p>
        </div>
        <div id="specialcontent">
            <div id="slider">
                <ul id="sliderContent">

                    <?php foreach ($specials as $special): ?>
                        <li class="sliderImage">
                            <a href="<?php echo $special['url'] ?>" target="_blank">
                                <img src="<?php echo $special['image'] ?>" />
                            </a>
                            <span class="bottom">
                                <strong><?php echo $special['name'] ?></strong><br />
                                <?php echo $special['description'] ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                    <div class="clear sliderImage"></div>
                </ul>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#slider').s3Slider({
                        timeOut: 4000
                    });
                });
            </script>
        </div>


    </div>

    <div id="news" class="block">
        <dl id="newscontent">
            <dt class="news-titlebar">
            <span class="news-class-title">教务处公告</span>
            <span class="news-class-more">
                <a href="">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
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
                </ul>
            </dd>
            <dt class="news-titlebar">
            <span class="news-class-title">学校新闻</span>
            <span class="news-class-more">
                <a href="">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
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
                </ul>
            </dd>
            <dt class="news-titlebar">
            <span class="news-class-title">公告&通知</span>
            <span class="news-class-more">
                <a href="">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
                    <li class="newsitem">
                        <a href="http://www.bit.edu.cn/ggfw/tzgg17/78068.htm" title="中教大厅：良乡校区职工住宅沙盘展介" target="_blank">中教大厅：良乡校区职工住宅沙盘展介</a>
                    </li>
                    <li class="newsitem">
                        <a href="http://www.bit.edu.cn/ggfw/tzgg17/78210.htm" title="关于组织申报2012年度“教育部-中国移动科研基金”项目的通知" target="_blank">关于组织申报2012年度“教育部-中国移动科研基金”项目的通知</a>
                    </li>
                    <li class="newsitem">
                        <a href="http://www.bit.edu.cn/ggfw/tzgg17/78185.htm" title="中教大厅：良乡校区职工住宅沙盘展介" target="_blank">关于做好全国教育科学“十二五”规划2012年度课题组织申报工作的通知</a>
                    </li>
                    <li class="newsitem">
                        <a href="http://www.bit.edu.cn/ggfw/tzgg17/78161.htm" title="中教大厅：良乡校区职工住宅沙盘展介" target="_blank">“创新与成长”——北理工第二届校友论坛专题</a>
                    </li>
                    <li class="newsitem">
                        <a href="http://www.bit.edu.cn/ggfw/tzgg17/78163.htm" title="中教大厅：良乡校区职工住宅沙盘展介" target="_blank">物理学院“博约学术论坛”系列报告第24期 </a>
                    </li>
                </ul>
            </dd>
        </dl>

    </div>
</div>