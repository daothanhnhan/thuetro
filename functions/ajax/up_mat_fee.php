<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$product_id = $_GET['product_id'];
	$user_id = $_SESSION['admin_id_home'];

	$action = new action();

	$product = $action->getDetail('product', 'product_id', $product_id);
	$user = $action->getDetail('admin', 'admin_id', $user_id);
	$luot = $user['luot_up_tin'];
	$luot--;

	$now = date('Y-m-d H:i:s');

	$ngay_mua_up_tin = $user['ngay_mua_up_tin'];
	$ngay_mua_up_tin_30 = date('Y-m-d: H:i:s', strtotime($ngay_mua_up_tin.' +30 days'));
	// echo $ngay_mua_up_tin_30;
	if ($ngay_mua_up_tin_30 < $now) {
		echo 'Gói mua Up tin đã hết hạn';die;
	}


	if ($luot < 0) {
		echo 'Gói mua Up tin đã hết Điểm';die;
	}

	
	
	$sql = "UPDATE product SET ngay_order = '$now' WHERE product_id = $product_id";//echo $sql;
	$result = mysqli_query($conn_vn, $sql);

	$sql = "UPDATE admin SET luot_up_tin = '$luot' WHERE admin_id = $user_id";//echo $sql;
	$result = mysqli_query($conn_vn, $sql);
	// echo mysqli_error($result);
	echo 'Bạn làm mới tin thành công.';
	