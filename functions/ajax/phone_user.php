<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$user_id = $_GET['user_id'];

	$admin = $action->getDetail('admin', 'admin_id', $user_id);

	echo $admin['admin_phone'];