<?php 
	$service_id = $_GET['trang'];

	$sql = "DELETE FROM service WHERE service_id = $service_id";
	$result = mysqli_query($conn_vn, $sql);

	header('Location: /danh-sach-du-an');