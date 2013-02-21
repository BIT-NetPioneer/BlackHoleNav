<table class="submit-table">
    <thead>
        <tr>
            <th>提交日期</th>
            <th>URL地址</th>
            <th>提交者IP</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($submit as &$row): ?>
            <tr>
                <th><?php echo $row['time']; ?></th>
                <th><?php echo $row['url']; ?><a href="<?php echo $row['url']; ?>">&gt</a></th>
                <th><?php echo $row['ip']; ?></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

