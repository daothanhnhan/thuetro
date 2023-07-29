<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();
	$product_id = $_GET['product_id'];

	$now = date('Y-m-d H:i:s');

	$sql = "UPDATE product SET ngay_dang = '$now' WHERE product_id = $product_id";
	$result = mysqli_query($conn_vn, $sql);