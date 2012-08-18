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
                <a href="http://jwc.bit.edu.cn">更多</a>
            </span>
            </dt>
            <dd>
                <ul class="news-list">
                    <?php foreach ($allnews[0] as $news): ?>
                        <li class="newsitem">
                            <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank">
                                <?php echo $news['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
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
                    <?php foreach ($allnews[1] as $news): ?>
                        <li class="newsitem">
                            <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank">
                                <?php echo $news['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
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
                    <?php foreach ($allnews[2] as $news): ?>
                        <li class="newsitem">
                            <a href="<?php echo $news['url']; ?>" title="<?php echo $news['title']; ?>" target="_blank">
                                <?php echo $news['title']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </dd>
        </dl>

    </div>
</div>