<?php 
    function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	

	function doi_ngu ($id) {
		global $conn_vn;
		if (isset($_POST['add_doingu'])) {
			$src= "../images/";
			// $src = "uploads/";

			$image = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

				uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
				$image = $_FILES['image']['name'];

			}

			$name = mysqli_real_escape_string($conn_vn, $_POST['name']);
			$name_en = mysqli_real_escape_string($conn_vn, $_POST['name_en']);
			$note = mysqli_real_escape_string($conn_vn, $_POST['note']);
			$note_en = mysqli_real_escape_string($conn_vn, $_POST['note_en']);
			$position = mysqli_real_escape_string($conn_vn, $_POST['position']);
			$position_en = mysqli_real_escape_string($conn_vn, $_POST['position_en']);
			$age = mysqli_real_escape_string($conn_vn, $_POST['age']);
			$image = mysqli_real_escape_string($conn_vn, $image);

			$add = '';
			if ($image != '') {
				$add = ", image = '$image'";
			}

			$sql = "UPDATE y_kien SET name = '$name', note = '$note', position = '$position', note_en = '$note_en', name_en = '$name_en', position_en = '$position_en' $add WHERE id = $id";
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một ý kiến.\')</script>';
			} else {
				echo '<script type="text/javascript">alert(\'Có lỗi xảy ra.\')</script>';
			}
			
		}
	}

	doi_ngu($_GET['id']);

	$info = $action->getDetail('y_kien', 'id', $_GET['id']);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung </span>
            <p class="subLeftNCP">Nhập thông tin đội ngũ<br /><br /></p>     
            <p class="subLeftNCP"><a href="index.php?page=y-kien">Quay lại</a><br /><br /></p>     
                    
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tên</p>
            <input type="text" class="txtNCP1" name="name" value="<?= $info['name'] ?>" required/>
            <p class="titleRightNCP">Tên tiếng anh</p>
            <input type="text" class="txtNCP1" name="name_en" value="<?= $info['name_en'] ?>" required/>
            <p class="titleRightNCP">Vị trí</p>
            <input type="text" class="txtNCP1" name="position" value="<?= $info['position'] ?>" required/>
            <p class="titleRightNCP">Vị trí tiếng anh</p>
            <input type="text" class="txtNCP1" name="position_en" value="<?= $info['position_en'] ?>" required/>
            <!-- <p class="titleRightNCP">Tuổi</p>
            <input type="text" class="txtNCP1" name="age" value="<?= $info['age'] ?>" required/> -->
            <p class="titleRightNCP">Mô tả</p>
            <textarea name="note" class="txtNCP1"><?= $info['note'] ?></textarea>
            <p class="titleRightNCP">Mô tả tiếng anh</p>
            <textarea name="note_en" class="txtNCP1"><?= $info['note_en'] ?></textarea>
            <p class="titleRightNCP">Ảnh</p>
            <input type="file" class="txtNCP1" name="image" />
            <img src="/images/<?= $info['image'] ?>" alt="" style="width: 200px;">
            
        </div>
    </div><!--end rowNodeContentPage-->
    
    <button class="btn btnSave" type="submit" name="add_doingu">Lưu</button>
</form>
            
<p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ Cafelink Việt Nam</p>