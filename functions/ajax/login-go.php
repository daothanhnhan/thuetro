<?php 
	session_start();
	include_once dirname(__FILE__).'/../database.php';
	$name = $_GET['name'];
	$email = $_GET['email'];
	$id = $_GET['id'];
	$sql = "SELECT * FROM admin WHERE admin_login = '$id'";
	$result = mysqli_query($conn_vn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		$pass = $id . 'gbvn';
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO admin (admin_name, admin_login, admin_password, admin_email, admin_phone, admin_state, admin_role, is_google) VALUE ('$name', '$id', '$pass', '$email', '', '1', '2', '1')";
		$result = mysqli_query($conn_vn, $sql);

		$_SESSION['admin_id_home'] = mysqli_insert_id($conn_vn);
		echo 'ok';
		// echo $row['id'];
	} else {
		$row = mysqli_fetch_assoc($result);
		$id_go = $row['admin_login'];
		$pass = $id . 'gbvn';
		$password = $row['admin_password'];
		if ($row['is_google'] != '0') {
			if (password_verify($pass, $password)) {
				$_SESSION['admin_id_home'] = $row['admin_id'];
				echo 'ok';
			} else {
				echo 'error';
			}
		} else {
			echo 'has';
		}
	}
	
?>