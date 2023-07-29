<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	// echo date('Y-m-d H:i:s');

	$product_id = $_GET['product_id'];
	$now = date('Y-m-d');

	$product = $action->getDetail('product', 'product_id', $product_id);
	$diem = $product['diem_lam_moi'];
	$diem--;

	if ($product['diem_lam_moi'] <= 0) {
		echo 'Bạn đã hết điểm.';
		die;
	}

	if (empty($product['ngay_up_tin'])) {
		echo 'Bạn đã hết hạn làm mới tin.';
		die;
	}


	if ($product['ngay_up_tin'] < $now) {
		echo 'Bạn đã hết hạn làm mới tin.';
		die;
	}
// echo 'end';

	$sql = "UPDATE product SET diem_lam_moi = $diem, ngay_order = '$now' WHERE product_id = $product_id";
	$result = mysqli_query($conn_vn, $sql);
	if ($result) {
		echo 'Bạn đã làm mới tin thành công';
	}