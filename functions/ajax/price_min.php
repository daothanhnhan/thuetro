<?php 
	session_start();
	
	if (!isset($_SESSION['price'])) {
		$_SESSION['price'] = $_GET['price'];
	} else {
		if ($_SESSION['price'] == $_GET['price']) {
			unset($_SESSION['price']);
		} else {
			$_SESSION['price'] = $_GET['price'];
		}
	}
?>