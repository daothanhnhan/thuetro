<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM lich_su_giao_dich WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=lich-su-giao-dich');
?>