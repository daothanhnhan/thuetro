<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$product_id = $_GET['product_id'];

	$action = new action();

	$product = $action->getDetail('product', 'product_id', $product_id);
	$ngay_5 = $product['ngay_lam_moi_tin_free'];

	$now = date('Y-m-d H:i:s');
	$ngay_5 = date('Y-m-d H:i:s', strtotime($now.' -5 days'));

	$up_free = 0;
	if (empty($product['ngay_lam_moi_tin_free'])) {
		$up_free = 1;
	} else {
		
		if ($ngay_5 > $item['ngay_lam_moi_tin_free']) {
			$up_free = 1;
		}
	}

	if ($up_free == 0) {
		echo 'Bạn đã làm mới rồi.';
	} else {
		$sql = "UPDATE product SET ngay_lam_moi_tin_free = '$now', ngay_order = '$now' WHERE product_id = $product_id";//echo $sql;
		$result = mysqli_query($conn_vn, $sql);
		// echo mysqli_error($result);
		echo 'Bạn làm mới tin thành công.';
	}