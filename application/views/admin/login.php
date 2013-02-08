<form id="login-box" action="<?php echo base_url('index.php/admin/checklogin')?>" method="post">
    <dl>
        <dt class="login-box-title">用户名</dt>
        <dd>
            <input class="login-box-input" name="uname" type="text" />
        </dd>
        <dt class="login-box-title">密码</dt>
        <dd>
            <input class="login-box-input" name="upass" type="password" />
        </dd>
    </dl>
    <input id="login-box-submit" name="" type="submit" value="登录" />
</form>