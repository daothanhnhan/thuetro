<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$product_id = $_GET['product_id'];
	$goi = $_GET['goi'];
	$user_id = $_SESSION['admin_id_home'];
	$now = date('Y-m-d H:i:s');
	$now1 = date('Y-m-d', strtotime($now.' +30 days'));
	// echo $now1;
	// die;

	$product = $action->getDetail('product', 'product_id', $product_id);
	$admin_home = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

	$con_du = $admin_home['tien_mua'];

	if ($goi == 1) {
		$tien = 20000;
		$lan = 50;
	}
	if ($goi == 2) {
		$tien = 50000;
		$lan = 500;
	}
	if ($goi == 3) {
		$tien = 100000;
		$lan = 1500;
	}
	if ($goi == 4) {
		$tien = 150000;
		$lan = 3000;
	}
	if ($goi == 5) {
		$tien = 200000;
		$lan = 10000;
	}

	if ($con_du < $tien) {
		echo 'Bạn không đủ tiền.';
		die;
	}

	// $sql = "UPDATE product SET diem_lam_moi = $lan, ngay_up_tin = '$now1' WHERE product_id = $product_id";
	$sql = "UPDATE admin SET luot_up_tin = $lan, ngay_mua_up_tin = '$now' WHERE admin_id = $user_id";
	$result = mysqli_query($conn_vn, $sql);
	// echo mysqli_error($conn_vn);

	if ($result) {
		$tien_con_lai = $con_du - $tien;
		$sql = "UPDATE admin SET tien_mua = $tien_con_lai WHERE admin_id = $user_id";
		$result1 = mysqli_query($conn_vn, $sql);
		if ($result1) {
			echo 'Bạn mua gói làm mới thành công.';
		}
	}

	