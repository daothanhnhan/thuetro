<?php 
  function doi_mat_khau ($admin_id) {
  	global $conn_vn;
  	if (isset($_POST['doi_mat_khau'])) {
  		$pass1 = mysqli_real_escape_string($conn_vn, $_POST['pass1']);
  		$pass2 = mysqli_real_escape_string($conn_vn, $_POST['pass2']);

  		if ($pass1 != $pass2) {
  			echo '<script>alert(\'Mật khẩu không khớp\');</script>';
  		} else {
  			$admin_password = password_hash($pass1, PASSWORD_DEFAULT);
  			$sql = "UPDATE admin SET admin_password = '$admin_password' WHERE admin_id = $admin_id";
  			$result = mysqli_query($conn_vn, $sql);
  			if ($result) {
  				echo '<script>alert(\'Bạn đổi mật khẩu thành công.\');</script>';
  			} else {
  				echo '<script>alert(\'Có lỗi xảy ra.\');</script>';
  			}
  		}
  	}
  }

  doi_mat_khau($_SESSION['admin_id_home']);
?>

<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<form action="" method="post">
			  
			  <div class="form-group">
			    <label for="pwd">Mật khẩu:</label>
			    <input type="password" class="form-control" id="pwd" name="pass1" required="">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Nhập lại mật khẩu:</label>
			    <input type="password" class="form-control" id="pwd" name="pass2" required="">
			  </div>
			  <button type="submit" class="btn btn-default" name="doi_mat_khau">Đổi mật khẩu</button>
			</form>
		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
	</div>
	
</div>

