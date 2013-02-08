<ul id="func-list">
    <?php foreach ($adminfuncs as $title => $url) : ?>
        <li class="func-list-item">
            <a href="<?php echo base_url($url); ?>"><?php echo $title; ?></a>
        </li>
    <?php endforeach; ?>
</ul>