<div id="pageleft">
    <div id="common" class="block">
        <div class="title">
            <p>常用网站</p>
        </div>
        <div class="commonurls">
            <?php foreach ($commons as &$common_row): ?>
                <?php if ($common_row['type'] == 'hr'): ?>
                    <hr />
                <?php else: ?>
                    <p class="<?php echo $common_row['type']; ?>">
                        <?php foreach ($common_row['urls'] as &$common_url): ?>
                            <span class="urlspan" >
                                <a href="<?php echo $common_url['url']; ?>" target="_blank" onmousedown="$(this).attr('href','<?php echo base_url();?>index.php/c/jmpc?uid=<?php echo $common_url['uid']; ?>&url=<?php echo urlencode($common_url['url']); ?>')">
                                    <?php if ($common_row['type'] == 'row1'): ?>
                                        <img src="<?php echo base_url("img/favicon/" . base64_encode($common_url['url']) . ".png"); ?>" height="16" width="16" />
                                    <?php endif; ?>
                                    <?php echo $common_url['name']; ?>
                                </a>
                            </span>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="urllist" class="block">
        <div class="title">
            <p>校内导航</p>
        </div>
        <div class="urls">
            <ul>
                <?php foreach ($classes as &$class): ?>
                    <li class="urlclass">
                        <div class="url-class-title">
                            <span class="urlspantitle"><?php echo $class['name']; ?></span>
                        </div>
                        <div class="url-class-area">
                            <?php foreach ($class['urls'] as &$url): ?>
                                <span class="urlspan2 <?php echo $url['style']; ?>" title="<?php echo $url['content']; ?>">
                                    <a href="<?php echo $url['url']; ?>" target="_blank" onmousedown="$(this).attr('href','<?php echo base_url();?>index.php/c/jmp?uid=59&url=<?php echo urlencode($url['url']); ?>')"><?php echo $url['name']; ?></a>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <div class="clear"> </div>
                        <hr/>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
    <script>
        $('.urlclass:odd').addClass("urlclass-s");
    </script>
</div>
