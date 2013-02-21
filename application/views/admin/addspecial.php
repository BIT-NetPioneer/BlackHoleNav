<!--<form id="special-form" action="<?php echo base_url('index.php/admin/doaddspecial'); ?>" method="post">-->
<?php echo form_open_multipart('admin/addspecial', array('id' => 'special-form')); ?>

<?php echo validation_errors(); ?>

<p>
    <label for="name">标题</label>
    <input id="name" class="special-form-input" type="text" name="name" value="<?php echo set_value('name'); ?>"/>
</p>
<p>
    <label for="url">链接地址</label>
    <input id="url" class="special-form-input" type="url" name="url" value="<?php echo set_value('url'); ?>"/>
</p>
<p>
    <label for="description">描述</label>
    <input id="description" class="special-form-input" type="text" name="description" value="<?php echo set_value('description'); ?>"/>
</p>
<p>
    <label for="image">图片-上传</label>
    <input id="image" class="special-form-input" type="file" name="image" value="<?php echo set_value('image'); ?>"/>
</p>
<p>
    <label for="date">过期日期</label>
    <input id="date" class="special-form-input" type="date" name="date" value="<?php echo set_value('date'); ?>"/>
</p>
<p>
    <input id="special-form-submit" class="" type="submit" name="" value="提交" />
</p>
<?php echo form_close(); ?>