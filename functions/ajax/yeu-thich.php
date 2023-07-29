<?php 
	session_start();

	$product_id = $_GET['product_id'];//echo $product_id;

	if (!isset($_SESSION['yeu_thich'])) {
		$_SESSION['yeu_thich'] = array($product_id);
	} else {
		if (in_array($product_id, $_SESSION['yeu_thich'])) {

		} else {
			$_SESSION['yeu_thich'][] = $product_id;
		}
	}