<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$product_id = $_GET['product_id'];
	$goi = $_GET['goi'];
	$user_id = $_SESSION['admin_id_home'];
	$now = date('Y-m-d');
	

	// echo $now1;
	// die;
	$goi_vip = array('Thường', 'VIP 5', 'VIP 4', 'VIP 3', 'VIP 2', 'VIP 1', 'VIP Đặc Biệt');

	$product = $action->getDetail('product', 'product_id', $product_id);
	$admin_home = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

	$han = $product['ngay_vip'];
	$thang = date('Y-m-d', strtotime($han.' +30 days'));
	$product_goi = $product['vip'];

	if ($product_goi != $goi) {
		echo 'Gói bạn chọn không đúng.';die;
	}

	$con_du = $admin_home['tien_mua'];

	if ($goi == 1) {
		$tien = 250000;
		$vip = 1;
	}
	if ($goi == 2) {
		$tien = 300000;
		$vip = 2;
	}
	if ($goi == 3) {
		$tien = 350000;
		$vip = 3;
	}
	if ($goi == 4) {
		$tien = 500000;
		$vip = 4;
	}
	if ($goi == 5) {
		$tien = 1000000;
		$vip = 5;
	}
	if ($goi == 6) {
		$tien = 2000000;
		$vip = 6;
	}

	if ($con_du < $tien) {
		echo 'Bạn không đủ tiền.';
		die;
	}

	// if ($han > $mai) {
	// 	echo 'Gói của bạn chưa hết hạn.';
	// 	die;
	// }

	$sql = "UPDATE product SET vip = $vip, ngay_vip = '$thang' WHERE product_id = $product_id";
	$result = mysqli_query($conn_vn, $sql);

	if ($result) {
		$tien_con_lai = $con_du - $tien;
		$sql = "UPDATE admin SET tien_mua = $tien_con_lai WHERE admin_id = $user_id";
		$result1 = mysqli_query($conn_vn, $sql);
		if ($result1) {
			$loai_goi = $goi_vip[$vip];
			echo 'Bạn gia hạn gói '.$loai_goi.' thành công.';
		}
	}
