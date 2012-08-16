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