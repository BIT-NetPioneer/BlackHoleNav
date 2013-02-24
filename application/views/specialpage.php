<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>特别推荐</title>
        <link href="<?php echo base_url('/css/reset.css'); ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url('/css/specialpage.css'); ?>" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class="wrap">
            <ul class="list-grid">
                <?php for ($i = 0; $i < 9; $i++): ?>
                    <?php if (isset($specialdata[$i])): ?>
                        <li class="sp-cell item-cell">
                            <a href="<?php echo $specialdata[$i]['url']; ?>" target="_blank" >
                                <img alt="<?php echo $specialdata[$i]['description']; ?>" src="<?php echo $specialdata[$i]['image']; ?>" />
                                <p><?php echo $specialdata[$i]['name']; ?></p>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="sp-cell nothing-cell"></li>
                    <?php endif; ?>
                <?php endfor; ?>

            </ul>
        </div>

    </body>
</html>
