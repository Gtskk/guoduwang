<?php

return array(

	'remember' 			=> '记住密码',
	'sign_in'  			=> '登录',
	'error'    			=> '错误',
	'forgot_passwd' 	=> '忘记密码？',
	'register'			=> '注册',
	'have_membership' 	=> '已有账号',
	'first_name'		=> '姓',
	'last_name'			=> '名',
	'email'				=> '邮箱',
	'password'			=> '密码',
	'retype_password'	=> '确认密码',
	'password_reset'	=> '密码重置请求',
	'create_new_passwd'	=> '创建新密码',
	'reset_passwd'		=> '重置密码',
	'password_reset_con'=> '<p>你好，</p>
    						<p>您收到该邮件是因为您进行了密码重置请求。</p>
    						<p>如果不是您的操作请忽略。</p>
    						<p>使用下述链接来重置密码：</p>
    						<p>{{ HTML::linkRoute("cpanel.password.reset", null, array($code)) }}</p>
    						<p>管理员</p>',

    'ensure_email_reset'=>	'请输入用于密码重置的邮箱',
    'reset_success'		=> '密码重置成功！',

);