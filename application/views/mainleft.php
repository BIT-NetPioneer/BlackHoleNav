<div id="pageleft">
    <div id="common" class="block">
        <div class="title">
            <p>常用网站</p>
        </div>
        <div class="commonurls">
            <?php foreach ($commons as &$common_row): ?>
                <p class="<?php echo $common_row['type']; ?>">
                    <?php foreach ($common_row['urls'] as &$common_url): ?>
                        <span class="urlspan" >
                            <a href="<?php echo $common_url['url']; ?>" target="_blank" onmousedown="if(isconnect) $(this).attr('href','<?php echo base_url(); ?>index.php/c/jmpc?uid=<?php echo $common_url['uid']; ?>&url=<?php echo urlencode($common_url['url']); ?>')">
                                <?php if ($common_row['type'] == 'row1' || $common_row['type'] == 'row2'): ?>
                                    <img src="<?php echo base_url("img/favicon/" . base64_encode($common_url['url']) . ".png"); ?>" height="16" width="16" />
                                <?php endif; ?>
                                <?php echo $common_url['name']; ?>
                            </a>
                        </span>
                    <?php endforeach; ?>
                </p>
            <?php endforeach; ?>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url('index.php/urlsug/urls'); ?>"></script>
    <div id="urllist" class="block">
        <div class="title urllist-title">
            <p>校内导航</p>
            <form class="url-search" action="">
                <input type="text" id="url-search-input"/>
            </form>
        </div>
        <div class="urls">
            <ul>
                <li class="urlclass hot">
                    <div class="url-class-title hot">
                        <span class="urlspantitle">热门</span>
                    </div>
                    <div class="url-class-area">
                        <?php foreach ($hoturl as &$url): ?>
                            <a href="<?php echo $url['url']; ?>" target="_blank" onmousedown="if(isconnect) $(this).attr('href','<?php echo base_url(); ?>index.php/c/jmpc?uid=<?php echo urlencode($url['uid']); ?>&url=<?php echo urlencode($url['url']); ?>')">
                                <span class="urlspan2">
                                    <?php echo $url['name']; ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <?php foreach ($classes as &$class): ?>
                    <li class="urlclass">
                        <div class="url-class-title">
                            <span class="urlspantitle"><?php echo $class['name']; ?></span>
                        </div>
                        <div class="url-class-area">
                            <?php foreach ($class['urls'] as &$url): ?>
                                <a href="<?php echo $url['url']; ?>" target="_blank" onmousedown="if(isconnect) $(this).attr('href','<?php echo base_url(); ?>index.php/c/jmp?uid=<?php echo urlencode($url['uid']); ?>&url=<?php echo urlencode($url['url']); ?>')">
                                    <span class="urlspan2 <?php echo $url['style']; ?>" title="<?php echo $url['content']; ?>">
                                        <?php echo $url['name']; ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="clear"> </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.urlclass:odd').addClass("urlclass-s");
            $("#url-search-input").autocomplete({
                data: urls,
                //remoteDataType: 'json',
                processData: function(data) {
                    var i, processed = [];
                    for (i=0; i < data.length; i++) {
                        processed.push([data[i][0]+data[i][1]+data[i][2], data[i][0], data[i][1], data[i][2], data[i][3]]);
                    }
                    return processed;
                },
                selectFirst: true,
                delay: 150,
                onItemSelect: function(item){
                    $('#url-search-input').attr('value', '');
                    location.href = '<?php echo base_url('index.php/c/jmp'); ?>?uid=' + item.data[3] + '&url=' + encodeURIComponent(item.data[1]);
                },
                showResult: function(value, data) {
                    return data[0] + '<br/>' + data[1];
                },
                minChars: 1
            });
        });
 
    </script>
</div>
