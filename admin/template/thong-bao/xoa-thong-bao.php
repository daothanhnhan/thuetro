<?php 
	$id = $_GET['id'];
	$sql = "DELETE FROM thong_bao WHERE id = $id";
	$result = mysqli_query($conn_vn, $sql);
	header('location: index.php?page=thong-bao');
?>