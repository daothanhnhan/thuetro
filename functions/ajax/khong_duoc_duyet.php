<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();

	$product_id = $_GET['id'];

	$product = $action->getDetail('product', 'product_id', $product_id);

	if ($product['khong_duoc_duyet'] == 1) {
		$sql = "UPDATE product SET khong_duoc_duyet = 0 WHERE product_id = $product_id";
	} else {
		$sql = "UPDATE product SET khong_duoc_duyet = 1 WHERE product_id = $product_id";
	}

	$result = mysqli_query($conn_vn, $sql);