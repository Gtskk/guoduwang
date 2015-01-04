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
        '优选文章' => array('type' => 'single', 'route' => 'posts.index'),
        '服务项目' => array('type' => 'single', 'route' => 'products.index'),
        '装修设计' => array('type' => 'single'),
    ),
    'theme' => 'gtskk'

);