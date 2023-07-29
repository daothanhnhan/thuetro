<?php 
	$product_id = $_GET['trang'];

	$sql = "DELETE FROM product WHERE product_id = $product_id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: /quan-ly-ca-nhan');
?>