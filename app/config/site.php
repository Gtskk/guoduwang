<?php
return array(
	'site_name' => '家居乐',
	'description' => '家居乐',
	'keywords' => '家居',
	'author' => '哥特式KK',

	//主菜单
	//menu 2 type are available single or dropdown and it must be a route
    'main_menu' => array(
        '家居乐服务' => array('type' => 'single', 'route' => 'service', 'class' => 'w9'),
        '优选品牌' => array('type' => 'single', 'class' => 'w9'),
        '基础建材' => array('type' => 'single', 'route' => 'product', 'param' => 8, 'menu' => array(8, 36, 37, 38, 39, 40), 'class' => 'w9'),
        '软装' => array('type' => 'single', 'route' => 'product', 'param' => 7, 'class' => 'w9', 'menu' => array(7, 32, 33, 34, 35)),
        '阳台' => array('type' => 'single', 'route' => 'product', 'param' => 6, 'menu' => array(6, 30, 31)),
        '客厅' => array('type' => 'single', 'route' => 'product', 'param' => 5, 'menu' => array(5, 27, 28, 29)),
        '卧室' => array('type' => 'single', 'route' => 'product', 'param' => 4, 'menu' => array(4, 24, 25, 26)),
        '厨房' => array('type' => 'single', 'route' => 'product', 'param' => 2, 'menu' => array(2, 18, 19, 20, 21, 22, 23)),
        '卫生间' => array('type' => 'single', 'route' => 'product', 'param' => 1, 'menu' => array(1, 3, 9, 10, 11, 12, 13, 14, 15, 16, 17)),
        '装修设计' => array('type' => 'single', 'route' => 'design'),
        '当季活动' => array('type' => 'single', 'route' => 'posts.index', 'param' => array('type' => 'new_act'), 'class' => 'w10'),
    ),
);