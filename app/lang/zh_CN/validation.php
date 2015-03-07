<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "必须同意:attribute。",
	"active_url"       => ":attribute不是可用的URL。",
	"after"            => ":attribute必须是在:date之后的日期",
	"alpha"            => ":attribute只能包含字母。",
	"alpha_dash"       => ":attribute只能包含字母，数字和下划线。",
	"alpha_num"        => ":attribute只能包含字母和数字。",
	"array"            => ":attribute必须是一个数组。",
	"before"           => ":attribute必须是在:date之前的日期。",
	"between"          => array(
		"numeric" => ":attribute必须在:min和:max之间。",
		"file"    => ":attribute必须在:min KB和:max KB之间。",
		"string"  => ":attribute必须在:min字符和:max字符之间。",
		"array"   => ":attribute必须在:min项目和:max项目之间。",
	),
	"confirmed"        => ":attribute确认不匹配。",
	"date"             => ":attribute不是可用的日期。",
	"date_format"      => ":attribute不匹配格式:format。",
	"different"        => ":attribute和:other必须不同。",
	"digits"           => ":attribute必须是:digits个数字。",
	"digits_between"   => ":attribute必须为:min到:max个数字。",
	"email"            => ":attribute格式不可用。",
	"exists"           => "已选的:attribute不可用。",
	"image"            => ":attribute必须是一个图像文件。",
	"in"               => "已选的:attribute不可用",
	"integer"          => ":attribute必须是一个整数。",
	"ip"               => ":attribute必须是一个可用的IP地址。",
	"max"              => array(
		"numeric" => ":attribute应该小于:max KB。",
		"file"    => ":attribute应该小于:max KB。",
		"string"  => ":attribute应该小于:max个字符。",
		"array"   => ":attribute应该小于:max个项目。",
	),
	"mimes"            => ":attribute必须是一个type: :values类型的文件。",
	"min"              => array(
		"numeric" => ":attribute至少为:min。",
		"file"    => ":attribute至少为:min KB。",
		"string"  => ":attribute至少为:min个字符。",
		"array"   => ":attribute至少有:min个项目。",
	),
	"not_in"           => "已选的:attribute不可用。",
	"numeric"          => ":attribute必须是数字。",
	"regex"            => ":attribute格式不可用。",
	"required"         => ":attribute必填。",
	"required_if"      => "如果:other是:value，:attribute必填。",
	"required_with"    => "如果:values存在，:attribute必填。",
	"required_without" => "如果:values不存在，:attribute必填。",
	"same"             => ":attribute和:other必须匹配。",
	"size"             => array(
		"numeric" => ":attribute必须是:size。",
		"file"    => ":attribute必须是:size KB。",
		"string"  => ":attribute必须是:size个字符。",
		"array"   => ":attribute必须包含:size个项目。",
	),
	"unique"           => ":attribute已存在。",
	"url"              => ":attribute格式不可用。",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'email' => '邮箱',
		'password' => '密码'
	),

	/*
	|--------------------------------------------------------------------------
	| Cartalyst sentry translation
	|--------------------------------------------------------------------------
	|
	| The following language lines are sentry translation
	|
	*/

	'sentry' => array(
    	'password_required'           => '密码必填。',
    	'login_item_required'		  => '[:login]必填。',
    	'forbid_login'				  => '[:login]不能登录，因为他还没有被激活。',
    	'method_not_support'		  => '[:method]方法不被Sentry支持或者没有设置用于访问快捷方法的用户。',
    	'user_existed'				  => '[:login]用户已存在，登录信息必须是独一无二的。',
    	'user_already_activated' 	  => '不能尝试激活已经被激活的用户。',
    	'user_not_found_id'			  => 'ID为[:id]的用户不能找到。',
    	'user_not_found_login'		  => '登录属性为[:login]的用户不能找到。',
    	'user_not_found_credentials'  => '所给的认证信息不能匹配任何用户。',
    	'user_not_found_code'		  => '所给的激活码不能匹配任何用户。',
    	'user_not_found_reset_code'	  => '所给的密码重置代码不能匹配任何用户。',
	),

);
