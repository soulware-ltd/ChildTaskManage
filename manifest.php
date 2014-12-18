<?php

$manifest = array(
	'acceptable_sugar_versions' => array (
		'regex_matches' => array (
			0 => "5.0.*",
			1 => "5.1.*",
			2 => "5.2.*",
			3 => "5.5.*",
			4 => "6.4.*",
			5 => "6.5.*",
		),
	),
	'acceptable_sugar_flavors' => array (
		0 => 'CE',
	),
	'name' 				=> 'SoulwareProjectChildTaskManage',
	'description' 		=> 'Adds two new buttons for Project\'s detailview to duplicate and delete projects with child tasks.',
	'author' 			=> 'Gábor Darvas, Soulware Ltd.',
	'published_date'	=> '2014/01/17',
	'version' 			=> '0.9.5',
	'type' 				=> 'module',
	'icon' 				=> '',
	'is_uninstallable' => true,
);
$installdefs = array(
	'id'=> 'SoulwareProjectChildTaskManage',
	'copy' => array(
		0 => array(
		'from' => '<basepath>/custom/modules/Project/handleChildren.class.php',
		'to' => 'custom/modules/Project/handleChildren.class.php',
		),
	),
	'language' => array (
		0 => array('from'=> '<basepath>/custom/Extension/modules/Project/Ext/Language/en_us.lang.php',
			 'to_module'=> 'Project',
			 'language'=>'en_us'
		),
		1 => array('from'=> '<basepath>/custom/Extension/modules/Project/Ext/Language/hu_hu.lang.php',
			 'to_module'=> 'Project',
			 'language'=>'hu_hu'
		),
	 ),
	'logic_hooks' => array(
		0 => array(
			'module' => 'Project',
	        'hook' => 'after_save',
	        'order' => 99,
	        'description' => 'copy children',
			'file'=> 'custom/modules/Project/handleChildren.class.php',
	        'class' => 'handleChildren',
	        'function' => 'copyChildren',
		),
		1 => array(
			'module' => 'Project',
	        'hook' => 'before_delete',
	        'order' => 99,
	        'description' => 'delete children',
			'file'=> 'custom/modules/Project/handleChildren.class.php',
	        'class' => 'handleChildren',
	        'function' => 'deleteChildren',
		),
	),
);

?>
