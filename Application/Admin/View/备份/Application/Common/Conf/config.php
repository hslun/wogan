<?php
return array(
	//'配置项'=>'配置值'
	'APP_DEBUG'       => 0,
	'URL_MODEL' => 1,
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '192.168.1.1',
	'DB_NAME' => 'wogan',
	'DB_USER' => 'root',
	'DB_PWD' => '000000',
	'DB_PREFIX' => 'yx_',
	'DEFAULT_FILTER' => 'trim,htmlspecialchars',
           'IMAGE_CONFIG' => array(
		'htmlPath' => '/Public/Uploads/',  // 显示图片是HTML用的路径
		'rootPath' => './Public/Uploads/',
		'maxSize' => 3145728,
		'exts' => array('jpg', 'gif', 'png', 'jpeg'),
	),
	'MD5_KEY' => 'fdDFA(3-GRT49#ER;FDP23278dl32@@@12__dke22',
	'URL_CASE_INSENSITIVE'  =>  true,


);
