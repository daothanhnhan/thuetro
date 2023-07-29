<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$name = $_GET['name'];
	$value = $_GET['value'];

	// if (empty($_SESSION['attribute'])) {
	// 	$_SESSION['attribute'][] = array(
	// 		'name' => $name,
	// 		'value' => $value
	// 	);
	// 	echo 'moi';
	// } else {
	// 	$arr_name = array();
	// 	foreach ($_SESSION['attribute'] as $k => $v) {
	// 		$arr_name[] = $v['name'];
	// 	}
	// 	if (in_array($name, $arr_name)) {
	// 		foreach ($_SESSION['attribute'] as $k => $v) {
	// 			if ($name == $v['name']) {
	// 				unset($_SESSION['attribute'][$k]);
	// 			}
	// 		}
	// 		echo 'xoa';
	// 	} else {
	// 		$_SESSION['attribute'][] = array(
	// 				'name' => $name,
	// 				'value' => $value
	// 			);
	// 		echo 'them';
	// 	}
	// }

	if (empty($_SESSION['attribute'])) {
		$_SESSION['attribute'][] = $value;
	} else {
		if (!in_array($value, $_SESSION['attribute'])) {
			$check = 0;
			foreach ($_SESSION['attribute'] as $k => $item) {
				$name_1 = $action->getDetail('thuoc_tinh_value', 'id', $item)['thuoc_tinh_id'];
				if ($name == $name_1) {
					$_SESSION['attribute'][$k] = $value;
					$check = 1;
				}
			}
			
			if ($check == 0) {
				$_SESSION['attribute'][] = $value;
			}
			
		} else {
			foreach ($_SESSION['attribute'] as $k => $item) {
				if ($item == $value) {
					unset($_SESSION['attribute'][$k]);
				}
			}
		}
	}
	// var_dump($_SESSION['attribute']);
?>