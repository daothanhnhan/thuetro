<?php 
	include_once dirname(__FILE__) . "/../database.php";
	include_once dirname(__FILE__) . "/../library.php";
	include_once dirname(__FILE__) . "/../action.php";

	$action = new action();
	$product_id = $_GET['product_id'];

	$sql = "UPDATE product SET tam_dung = 0 WHERE product_id = $product_id";
	$result = mysqli_query($conn_vn, $sql);