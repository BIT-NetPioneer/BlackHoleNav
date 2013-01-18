<form id="special-form" action="<?php echo base_url('index.php/admin/doaddspecial'); ?>" method="post">
    <p>
        <label for="name">标题</label>
        <input id="name" class="special-form-input" type="text" name="name"/>
    </p>
    <p>
        <label for="url">链接地址</label>
        <input id="url" class="special-form-input" type="url" name="url"/>
    </p>
    <p>
        <label for="description">描述</label>
        <input id="description" class="special-form-input" type="text" name="description"/>
    </p>
    <p>
        <label for="image">图片-上传</label>
        <input id="image" class="special-form-input" type="file" name="image"/>
    </p>
    <p>
        <label for="date">过期日期</label>
        <input id="date" class="special-form-input" type="date" name="date"/>
    </p>
    <p>
        <input id="special-form-submit" class="" type="submit" name="" value="提交" />
    </p>
</form>