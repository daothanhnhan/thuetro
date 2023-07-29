<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function lich_su_giao_dich () {
		global $conn_vn;
		$action = new action_page();
		if (isset($_POST['add_trademark'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$price = mysqli_real_escape_string($conn_vn, $_POST['price']);
			$note = mysqli_real_escape_string($conn_vn, $_POST['note']);

			$ngay = date('Y-m-d H:i:s');
			$user_id = $_POST['user_id'];

			$sql = "INSERT INTO lich_su_giao_dich (price, note, ngay, user_id) VALUES ('$price', '$note', '$ngay', '$user_id')";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một lịch sử giao dịch.\');window.location.href="index.php?page=lich-su-giao-dich"</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	lich_su_giao_dich();

	$list_user = $action->getList('admin', 'admin_role', '2', 'admin_id', 'asc', '', '', '');//var_dump($list_user);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin thông báo<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=lich-su-giao-dich">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiền</p>
            <input type="number" class="txtNCP1" name="price" required="" />
            <p class="titleRightNCP">Nội dung</p>
            <textarea name="note" class="txtNCP1" required=""></textarea>
            <p class="titleRightNCP">Khách</p>
            <select name="user_id" class="txtNCP1">
            	<?php foreach ($list_user as $item) { ?>
            	<option value="<?= $item['admin_id'] ?>"><?= $item['admin_login'] ?></option>
            	<?php } ?>
            </select>
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_trademark">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Phát Triển Thương Hiệu Cafe Link Việt Nam</p>