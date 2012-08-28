<div id="pageright">

    <div id="special" class="block">
        <div class="title">
            <p>特别推荐</p>
        </div>
        <div id="specialcontent">
            <div id="slider">
                <ul id="sliderContent">
                    <?php if (!isset($specials)) : ?>
                        <?php foreach ($specials as &$special): ?>
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
                    <?php else: ?>
                        <li class="sliderImage">
                            <a href="http://www.bitnp.net" target="_blank">
                                <img src="<?php echo base_url('img/bitnp.jpg'); ?>" />
                            </a>
                        </li>
                    <?php endif; ?>
                    <div class="clear sliderImage"></div>
                </ul>
            </div>
        </div>

    </div>

    <div id="news" class="block">
        <dl id="newscontent">
            <dt class="news-titlebar">
            <span class="news-class-title">教务处公告</span>
            <span class="news-class-more">
                <a href="http://jwc.bit.edu.cn">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
                    <?php if ($allnews[0] != null): ?>
                        <?php foreach ($allnews[0] as &$news): ?>
                            <li class="newsitem">
                                <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank"><?php echo $news['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="newsitem newsitem-empty">
                            <a href="#" title="">没有新闻</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </dd>
            <dt class="news-titlebar">
            <span class="news-class-title">学校新闻</span>
            <span class="news-class-more">
                <a href="http://www.bit.edu.cn/xww/index.htm">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
                    <?php if ($allnews[1] != null): ?>
                        <?php foreach ($allnews[1] as &$news): ?>
                            <li class="newsitem">
                                <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank"><?php echo $news['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="newsitem newsitem-empty">
                            <a href="#" title="">没有新闻</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </dd>
            <dt class="news-titlebar">
            <span class="news-class-title">公告&通知</span>
            <span class="news-class-more">
                <a href="http://www.bit.edu.cn/ggfw/tzgg17/index.htm">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
                    <?php if ($allnews[2] != null): ?>
                        <?php foreach ($allnews[2] as &$news): ?>
                            <li class="newsitem">
                                <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank"><?php echo $news['title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="newsitem newsitem-empty">
                            <a href="#" title="">没有新闻</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </dd>
        </dl>

    </div>

    <div class="block" id="showip">
        <p class="ip_title">你的IP地址：<span id="ip_add">10.0.0.0</span></p>
        <p class="ip_title">系统/浏览器：</p>
        <p id="ua_info"></p>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //特别推荐 
        $('#slider').s3Slider({
            timeOut: 4000
        });
        //动态插入显IP
        $.getJSON("<?php echo base_url('index.php/showip'); ?>",function(json){
            $('#ip_add').html(json.ip);
            $('#ua_info').html(json.ua);
        });
    });
    
    //task
    $.get("<?php echo base_url('index.php/task?do=1'); ?>");
</script>