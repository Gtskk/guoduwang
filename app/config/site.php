<?php
return array(

	'site_config' => array(
		'site_name' => '过渡网',
		'description' => '这是过渡网，帮助在校学生很好的过渡到社会',
		'keywords' => '在校学生，社会工作',
		'author' => '哥特式KK'
	),

	// 会员页面显示数目
	'members_count' => 48,

	// 话题每页显示数目
	'topic_per_page' => 13,

	//主菜单
	//menu 2 type are available single or dropdown and it must be a route
    'main_menu' => array(
        '话题' => array('type' => 'single', 'route' => 'topics.index'),
        '会员' => array('type' => 'single', 'route' => 'members.index'),
        '关于' => array('type' => 'single', 'route' => 'about'),
    ),

    // 网站主题
    // 'theme' => 'gtskk',

    /****************************  推荐资源 *********************/
    'recommend_resources' => array(
    	array('name'=>'Laravel 中文文档', 'url'=>'http://www.golaravel.com/'),
    	array('name'=>'PHP The Right Way 中文版', 'url'=>'http://wulijun.github.io/php-the-right-way/'),
    	array('name'=>'Culttt', 'url'=>'http://culttt.com/'),
    	array('name'=>'Sitepoint 技术网站', 'url'=>'http://www.sitepoint.com/'),
    ),

    /*************************** Pusher 相关 ******************/
    'pusher_key' => '1bc9b80b828a5ca33f9a',
    'pusher_secret' => '0b2b0751596e42dfa75f',
    'pusher_app_id' => '109079',

);