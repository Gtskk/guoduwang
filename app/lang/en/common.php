<?php

return array(

	'remember' 			=> 'Remember',
	'sign_in'  			=> 'Sign In',
	'error'    			=> 'Error',
	'forgot_passwd' 	=> 'Forgot Password ?',
	'register'			=> 'Register',
	'have_membership' 	=> 'I already have a membership',
	'first_name'		=> 'First Name',
	'last_name'			=> 'Last Name',
	'name'				=> 'Name',
	'email'				=> 'Email',
	'password'			=> 'Password',
	'retype_password'	=> 'Retype Password',
	'password_reset'	=> 'Password reset request',
	'create_new_passwd'	=> 'Create a new Password',
	'reset_passwd'		=> 'Reset Password',
	'password_reset_con'=> '<p>Hello,</p>
    						<p>You are receiving this notification because a password reset for your account has been requested.</p>
    						<p>If you did not request this notification then please ignore it.</p>
    						<p>Use the following link within the next 24 hours to reset your password:</p>
    						<p>{{ HTML::linkRoute("cpanel.password.reset", null, array($code)) }}</p>
    						<p>Admin</p>',

    'ensure_email_reset'=> 'Please enter your email address so we can send you an email to reset your password.',
    'reset_success'		=> 'Password reset sent successfully!',

);