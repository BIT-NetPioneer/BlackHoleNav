<li class="urlclass">
    <span class="urlspantitle"><?php echo $class_title;?></span>
    <?php foreach($urllist as $item):?>
    <span class="urlspan"><a href="<?php echo $item['url'];?>"><?php echo $item['name'];?></a></span>
    <?php endforeach;?>
    <div class="clear"> </div>
    <hr/>
</li>