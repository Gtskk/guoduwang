<?php

class NodesTableSeeder extends Seeder {

	public function run()
	{

		$node_array = [
			'PHP' => [
				'Wordpress' => [
					'slug' => 'wordpress',
					'description' => 'WordPress是一种使用PHP语言开发的博客平台，用户可以在支持PHP和MySQL数据库的服务器上架设属于自己的网站，有着非常丰富的插件库。',
				],
				'Laravel' => [
					'slug' => 'laravel',
					'description' => 'Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。',
				],
				'Composer' => [
					'slug' => 'composer',
					'description' => 'Composer是PHP中用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer会帮你安装这些依赖的库文件。',
				],
				'设计模式' => [
					'slug' => 'design-pattern',
					'description' => '设计模式（Design pattern）是一套被反复使用、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了可重用代码、让代码更容易被他人理解、保证代码可靠性。',
				],
				'测试' => [
					'slug' => 'testing',
					'description' => '软件测试（英语：software testing），描述一种用来促进鉴定软件的正确性、完整性、安全性和质量的过程。',
				],
				'部署' => [
					'slug' => 'deployment',
					'description' => '',
				],
				'开源项目' => [
					'slug' => 'opensource-project',
					'description' => '',
				],
			],
			'Web 开发' => [
				'数据库' => [
					'slug' => 'database',
					'description' => '数据库（Database）是按照数据结构来组织、存储和管理数据的仓库，常见的数据库有Mysql、Oracle、Sqlite等',
				],
				'Git' => [
					'slug' => 'git',
					'description' => 'Git是一个开源的分布式版本控制系统，用以有效、高速的处理从很小到非常大的项目版本管理。',
				],
				'Linux' => [
					'slug' => 'linux',
					'description' => 'Linux是一种自由和开放源码的类Unix操作系统，存在着许多不同的Linux版本，但它们都使用了Linux内核。',
				],
				'WebServer' => [
					'slug' => 'web-server',
					'description' => 'WEB服务器也称为WWW(WORLD WIDE WEB)服务器，主要功能是提供网上信息浏览服务。常见的有 Nginx, Apache等',
				],
				'算法' => [
					'slug' => 'algrithm',
					'description' => '算法（Algorithm）是指解题方案的准确而完整的描述，是一系列解决问题的清晰指令，算法代表着用系统的方法描述解决问题的策略机制。',
				],
				'网站安全' => [
					'slug' => 'security',
					'description' => '网站安全是指出于防止网站受到外来电脑入侵者对其网站进行挂马，篡改网页等行为而做出一系列的防御工作。',
				],
				'云服务' => [
					'slug' => 'cloud-service',
					'description' => '云服务开发这一概念包含几种不同的开发类型 - 软件即服务(SaaS), 平台即服务(PaaS), Web服务, 按需(on—demand)计算',
				],
			],
			'移动开发' => [
				'iOS' => [
					'slug' => 'ios-development',
					'description' => 'iOS 开发',
				],
				'Android' => [
					'slug' => 'android-development',
					'description' => 'Android 开发',
				],
			],
			'其他语言' => [
				'JavaScript' => [
					'slug' => 'javascript',
					'description' => 'JavaScript是一种基于对象和事件驱动并具有相对安全性的客户端脚本语言，其中nodejs（iojs）是其一个比较流行的方向',
				],
				'CSS' => [
					'slug' => 'css',
					'description' => 'css（层叠样式表）是一种用来表现HTML（标准通用标记语言的一个应用）或XML（标准通用标记语言的一个子集）等文件样式的计算机语言。',
				],
				'Python' => [
					'slug' => 'python',
					'description' => 'Python, 是一种面向对象、直译式计算机程序设计语言',
				],
				'Ruby' => [
					'slug' => 'ruby',
					'description' => 'Ruby，一种为简单快捷的面向对象编程（面向对象程序设计）而创的脚本语言',
				],
			],
			'社区' => [
				'公告' => [
					'slug' => 'announcement',
					'description' => '',
				],
				'Bug反馈' => [
					'slug' => 'feedback',
					'description' => '对于社区的优化或者 bug report , 可以在此节点下提',
				],
				'新功能' => [
					'slug' => 'community-development',
					'description' => '在该节点可以提出有关社区新功能的建议',
				],
			],
			'经验分享' => [
				'健康' => [
					'slug' => 'health',
					'description' => '身体是革命的本钱，所以健康很重要',
				],
				'理财' => [
					'slug' => 'money',
					'description' => '就是钱，让钱更值钱的密码^-^',
				],
				'工具' => [
					'slug' => 'toolings',
					'description' => '使用工具, 是人类文明的标志',
				],
				'书籍' => [
					'slug' => 'book-share',
					'description' => '书籍是知识载体, 让我们一起站在巨人的肩膀上. ',
				],
				'求职' => [
					'slug' => 'request-a-job',
					'description' => '介绍下你自己, 让大家帮你找到一份好的工作',
				],
				'招聘' => [
					'slug' => 'hire',
					'description' => '这里有高质量的 PHPer, 记得认真填写你的需求, 薪资待遇是必须写的哦.',
				],
				'创业' => [
					'slug' => 'start-up',
					'description' => '',
				],
				'其他' => [
					'slug' => 'other-share',
					'description' => '抱歉, 如果你分享的话题不属于其他节点的话, 只能选择这里咯. ',
				],
			]
		];

		$top_nodes = array();
		foreach ($node_array as $key => $value) {
		    $top_nodes[] = [
		        'name' => $key,
		        'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
		    ];
		}
		DB::table('nodes')->insert( $top_nodes );

		$nodes = array();
		foreach ($node_array as $key => $value) {
		    $top_node = Node::where('name','=',$key)->first();

		    foreach ($value as $snode => $svalue) {
		        $nodes[] = [
		            'parent_node' => $top_node->id,
		            'name' => $snode,
		            'slug' => $svalue['slug'],
		            'description' => $svalue['description'],
			        'created_at' => date('Y-m-d H:i:s'),
	                'updated_at' => date('Y-m-d H:i:s'),
		        ];
		    }
		}
		DB::table('nodes')->insert( $nodes );
	}

}