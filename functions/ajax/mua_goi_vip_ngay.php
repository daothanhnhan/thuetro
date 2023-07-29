<?php 
	session_start();
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$product_id = $_GET['product_id'];
	// $goi = $_GET['goi'];
	$user_id = $_SESSION['admin_id_home'];
	$now = date('Y-m-d H:i:s');
	$so_ngay = $_GET['so_ngay'];
	$vip_type = $_GET['vip_type'];
	

	// echo $now1;
	// die;
	$goi_vip = array('Thường', 'VIP 5', 'VIP 4', 'VIP 3', 'VIP 2', 'VIP 1', 'VIP Đặc Biệt');

	$product = $action->getDetail('product', 'product_id', $product_id);
	$admin_home = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

	$han = $product['ngay_vip'];

	$vip_get = $product['vip'];

	if ($han > $now) {
		$ngay_them = date('Y-m-d H:i:s', strtotime($han.' +'.$so_ngay.' days'));
	} else {
		$ngay_them = date('Y-m-d H:i:s', strtotime('now +'.$so_ngay.' days'));
	}

	$con_du = $admin_home['tien_mua'];

	if ($vip_type == 1) {
		$tien = 10000;
		$vip = 1;
	}
	if ($vip_type == 2) {
		$tien = 12000;
		$vip = 2;
	}
	if ($vip_type == 3) {
		$tien = 14000;
		$vip = 3;
	}
	if ($vip_type == 4) {
		$tien = 20000;
		$vip = 4;
	}
	if ($vip_type == 5) {
		$tien = 40000;
		$vip = 5;
	}
	if ($vip_type == 6) {
		$tien = 80000;
		$vip = 6;
	}

	$tien_goi = $tien * $so_ngay;//echo $tien_goi;

	if ($con_du < $tien_goi) {
		echo 'Bạn không đủ tiền.';
		die;
	}

	// if ($han > $mai) {
	// 	echo 'Gói của bạn chưa hết hạn.';
	// 	die;
	// }

	if ($vip_get == $vip_type) {
		$sql = "UPDATE product SET hinh_thuc_dang = 2, ngay_vip = '$ngay_them' WHERE product_id = $product_id";
	} else {
		$ngay_them = date('Y-m-d H:i:s', strtotime('now +'.$so_ngay.' days'));
		$sql = "UPDATE product SET hinh_thuc_dang = 2, ngay_vip = '$ngay_them', vip = $vip_type WHERE product_id = $product_id";
	}
	// echo $sql;
	$result = mysqli_query($conn_vn, $sql);

	if ($result) {
		// echo $tien_goi;
		$tien_con_lai = $con_du - $tien_goi;
		$sql = "UPDATE admin SET tien_mua = $tien_con_lai WHERE admin_id = $user_id";
		// echo $sql;
		$result1 = mysqli_query($conn_vn, $sql);
		if ($result1) {
			$loai_goi = $goi_vip[$vip_type];
			echo 'Bạn mua gói '.$loai_goi.' thành công.';
		}
	}
