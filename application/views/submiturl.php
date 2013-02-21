<?php echo form_open('submit/url', array('id' => 'submit-url-form')); ?>
<?php echo validation_errors(); ?>
<p>
    <label for="url-addr">URL地址：</label>
    <input type="text" name="url-addr" value="<?php echo set_value('url-addr'); ?>" />
</p>
<p>
    <label for="url-addr">验证码：</label>
    <input type="text" name="cap" />   
    <?php echo $cap_url; ?>
</p>
<input type="hidden" name="cap-time" value="<?php echo $cap_ts; ?>" />
<input type="hidden" name="cap-hash" value="<?php echo $cap_hash; ?>" />
<input type="submit" value="提交"/>
<?php echo form_close(); ?>