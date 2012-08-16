<ul>
    <?php foreach ($classes as $class): ?>
        <li class="urlclass">
            <div class="url-class-title">
                <span class="urlspantitle"><?php echo $class['name'];?></span>
            </div>
            <div class="url-class-area">
                <?php foreach ($class['urls'] as $url): ?>
                    <span class="urlspan2 <?php echo $url['style'];?>" title="<?php echo $url['content'];?>">
                        <a href="<?php echo $url['url'];?>" target="_blank" onmousedown="$(this).attr('href','http://localhost/CodeIgniterTest/index.php/c/jmp?uid=<?php echo $url['uid'];?>&url=<?php echo $url['url'];?>')"><?php echo $url['name'];?></a>
                    </span>
                <?php endforeach; ?>
            </div>
            <div class="clear"> </div>
            <hr/>
        </li>
    <?php endforeach; ?>
</ul>