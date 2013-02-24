<div id="pageright">

    <div id="special" class="block">
        <div class="title special-title">
            <p>特别推荐</p>
            <span class="title-class-more">
                <a href="javascript:void(0)">更多</a>
            </span>
        </div>
        <div id="specialcontent">
            <div id="slider">
                <ul id="sliderContent">
                    <?php if ($specials != NULL) : ?>
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
        <p class="ip_title">你的IP地址：<span id="ip_add">Unknow</span></p>
        <p class="ip_title">系统/浏览器：</p>
        <p id="ua_info"></p>
    </div>

    <div class="block" id="func-panel">
        <div class="title">
            <p>相关功能</p>
        </div>
        <ul id="func-panel-list">
            <li class="func-panel-item">
                <a href="<?php echo base_url('index.php/submit/url'); ?>">申请网址收录</a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    var isconnect=0;
    $(document).ready(function() {
        //特别推荐 
        $('#slider').s3Slider({
            timeOut: 4000
        });
        //动态插入显IP
        $.getJSON("<?php echo base_url('index.php/showip'); ?>",function(json){
            $('#ip_add').html(json.ip);
            $('#ua_info').html(json.ua);
            isconnect=1;
        });
    });
    
    $(function (){
        $(".title-class-more a").manhuaDialog({					       
            Event : "click",								//触发响应事件
            title : "特别推荐",					//弹出层的标题
            type : "iframe",									//弹出层类型(text、容器ID、URL、Iframe)
            content : "<?php echo base_url('index.php/nav/specialpage'); ?>",
            width : 731,									//弹出层的宽度
            height : 648,									//弹出层的高度	
            scrollTop : 100,								//层滑动的高度也就是弹出层时离顶部滑动的距离
            isAuto : false,									//是否自动弹出
            time : 1000,									//设置弹出层时间，前提是isAuto=true
            isClose : false,  								//是否自动关闭		
            timeOut : 5000									//设置自动关闭时间，前提是isClose=true	
        });
    });
    
    //task
    //$.get("<?php echo base_url('index.php/task?do=1'); ?>");
</script>
<img style="display: none; height: 0px; width: 0px" src="<?php echo base_url('index.php/task?do=1'); ?>" />