<?php
return array(

	'site_config' => array(
		'site_name' => '过渡网',
		'description' => '这是过渡网，帮助在校学生很好的过渡到社会',
		'keywords' => '在校学生，社会工作',
		'author' => '哥特式KK'
	),

	//主菜单
	//menu 2 type are available single or dropdown and it must be a route
    'main_menu' => array(
        '话题' => array('type' => 'single', 'route' => 'topics.index'),
        '会员' => array('type' => 'single', 'route' => 'members.index'),
    ),

    // 网站主题
    'theme' => 'gtskk'

);