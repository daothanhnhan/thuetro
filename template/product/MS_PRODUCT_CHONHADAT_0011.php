<?php 
	if (!isset($_SESSION['admin_id_home'])) {
		echo '<script type="text/javascript">alert(\'Bạn chưa đăng nhập.\');window.location.href="/"</script>';
	}

	$url = $_SERVER['REQUEST_URI'];
	$url_arr = explode('=', $url);
	$type = $url_arr[1];

	function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	function dang_tin ($service_id) {
		global $conn_vn;
		$action = new action();
		if (isset($_POST['dang_tin'])) {
			// echo '<pre>';
			// var_dump($_FILES);
			$loai_du_an = $_POST['loai_du_an'];
			$service_name = mysqli_real_escape_string($conn_vn, $_POST['service_name']);
			$service_des = mysqli_real_escape_string($conn_vn, $_POST['service_des']);
			$service_content = mysqli_real_escape_string($conn_vn, $_POST['service_content']);
			$service_author = mysqli_real_escape_string($conn_vn, $_POST['service_author']);
			$district_id = mysqli_real_escape_string($conn_vn, $_POST['district_id']);
			$ward_id = mysqli_real_escape_string($conn_vn, $_POST['ward_id']);
			$city_id = mysqli_real_escape_string($conn_vn, $_POST['city_id']);
			$now = date('Y-m-d');
			$ngay_dang = date('Y-m-d H:i:s');

			

			$admin_id = $_SESSION['admin_id_home'];
			$friendly_url = vi_en1($service_name);

			$now = date('Y-m-d H:i:s');

			$time = time();


			$src= "images/";

			if (isset($_FILES['service_img']) && $_FILES['service_img']['name'] != "") {

		    	$img = $_FILES['service_img'];

		    	uploadPicture($src, $time.$img['name'], $img['tmp_name']);	

		    	$img_name = $time.$img['name']; 

	    	} else {

	    		$img_name = '';

	    	}


	    	$sub_img = array();

	  

			if(isset($_FILES['images']) && $_FILES['images']['name'] != ""){



				foreach (array_combine($_FILES['images']['name'], $_FILES['images']['tmp_name']) as $name => $tmp_name) {

					if ($name != '' && $name != ' ') {

						uploadPicture($src, $name, $tmp_name);

						$sub_img[] = json_encode(array('image'=>$name));

					}

				}

			}

			$sub_img = json_encode($sub_img);
			$sub_img = mysqli_real_escape_string($conn_vn, $sub_img);
			// var_dump($sub_img);

			$add = '';
			if ($img_name != '') {
				$add .= ", service_img = '$img_name' ";
			}


			$sql = "UPDATE service SET loai_du_an_id = '$loai_du_an', service_name = '$service_name', service_des = '$service_des', service_content = '$service_content', city_id = '$city_id', district_id = '$district_id', friendly_url = '$friendly_url' $add WHERE service_id = $service_id";


			// $sql = "INSERT INTO service (loai_du_an_id, service_name, service_des, service_content, service_author, district_id, ward_id, friendly_url, created_id, state, service_img, city_id, ngay_order, vip, ngay_dang) 
			// 		VALUES ('$loai_du_an', '$service_name', '$service_des', '$service_content', '$service_author', '$district_id', '$ward_id', '$friendly_url', '$admin_id', '0', '$img_name', '$city_id', '$now', '0', '$now')";
			// echo $sql;
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				$service_id = mysqli_insert_id($conn_vn);
				// $sql_vn = "INSERT INTO service_languages (service_id, lang_service_name, lang_service_des, lang_service_content, friendly_url, languages_code) VALUES ('$service_id', '$service_name', '$service_des', '$service_content', '$friendly_url', 'vn')";
				// $result_vn = mysqli_query($conn_vn, $sql_vn);
				$sql_vn = "UPDATE service_languages SET lang_service_name = '$service_name', lang_service_des = '$service_des', lang_service_content = '$service_content', friendly_url = '$friendly_url' WHERE service_id = $service_id";
				// $sql_en = "INSERT INTO service_languages (service_id, lang_service_name, lang_service_des, lang_service_content, friendly_url, languages_code) VALUES ('$service_id', '$service_name', '$service_des', '$service_content', '$friendly_url', 'en')";
				$result_vn = mysqli_query($conn_vn, $sql_vn);
				if ($result_vn) {

				} else {
					echo mysqli_error($conn_vn);
				}
				echo '<script type="text/javascript">alert(\'Bạn đã sửa được một dự án.\')</script>';
			} else {
				echo '<script>alert(\'Có lỗi xảy ra.\')</script>';
				echo mysqli_error($conn_vn);
			}
		}
	}
	dang_tin($_GET['trang']);

	
	$huong = $action->getList('huong', '', '', 'id', 'asc', '', '', '');
	$da_ban = $action->getList('da_ban', '', '', 'id', 'asc', '', '', '');
	$phan_loai = $action->getList('phan_loai', '', '', 'id', 'asc', '', '', '');
	$quyen_dat = $action->getList('quyen_dat', '', '', 'id', 'asc', '', '', '');
	$productcat = $action->getList('productcat', '', '', 'productcat_id', 'asc', '', '', '');

	// if ($type == 1) {
	// 	$danh_muc = array(102);
	// }
	// if ($type == 2) {
	// 	$danh_muc = array(101);
	// }
	// if ($type == 3) {
	// 	$danh_muc = array(103);
	// }
	// if ($type == 4) {
	// 	$danh_muc = array(104);
	// }
	// var_dump($type);
	// var_dump($danh_muc);

	$city = $action->getList('city', '', '', 'id', 'asc', '', '', '');
	


	$loai_du_an = $action->getList('loai_du_an', '', '', 'id', 'asc', '', '', '');

	$info_du_an = $action->getDetail('service', 'service_id', $_GET['trang']);
	// var_dump($info_du_an['friendly_url']);

	if (!empty($info_du_an['city_id'])) {
		$district = $action->getList('district', 'city_id', $info_du_an['city_id'], 'id', 'asc', '', '', '');
	}

	if (!empty($info_du_an['district_id'])) {
		$ward = $action->getList('ward', 'district_id', $info_du_an['district_id'], 'id', 'asc', '', '', '');
	}
?>
<link rel="stylesheet" href="/css/image-uploader.min.css">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
          rel="stylesheet">
<script src="/admin/js/previewImage.js"></script>
<script src="/admin/ckeditor/ckeditor.js"></script>
<script>

    $(document).ready(function() {

        $("input[id=fileUpload2").previewimage({

            div: "#preview2",

            imgwidth: 90,

            imgheight: 90

        });



    });

</script>

<div class="container">
	<div class="row">
		<h1 style="text-align: center;font-size: 30px;">Sửa dự án</h1>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			
		
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Loại tin:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="sel1" name="loai_du_an">
			    <?php foreach ($loai_du_an as $item) { ?>
			    <option value="<?= $item['id'] ?>" <?= $item['id']==$info_du_an['loai_du_an_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
			    <?php } ?>
			  </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Tiêu đề:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="email" placeholder="" name="service_name" value="<?= $info_du_an['service_name'] ?>" required="">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Ảnh Chính:</label>
		    <div class="col-sm-10">
		      <input type="file" class="form-control1" id="email" placeholder="" name="service_img">
		      <img src="/images/<?= $info_du_an['service_img'] ?>" alt="dự án" width="200">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Mô tả ngắn:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control ckeditor1" rows="5" id="comment" name="service_des"><?= $info_du_an['service_des'] ?></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Nội dung:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control ckeditor" rows="5" id="comment" name="service_content"><?= $info_du_an['service_content'] ?></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Địa chỉ:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="pwd" placeholder="" name="service_author" value="<?= $info_du_an['service_author'] ?>">
		    </div>
		  </div>
		  

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Tỉnh:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="sel1" name="city_id" onchange="chon_tinh(this.value)">
			    <option value="0" >Chọn Tỉnh</option>
			    <?php foreach ($city as $item) { ?>
			    <option value="<?= $item['id'] ?>" <?= $item['id']==$info_du_an['city_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
			    <?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Huyện:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="huyen_id" name="district_id" onchange="chon_huyen(this.value)">
			    <option value="0" >Chọn Huyện</option>
			    <?php foreach ($district as $item) { ?>
			    <option value="<?= $item['id'] ?>" <?= $item['id']==$info_du_an['district_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
			    <?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phường:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="phuong_id" name="ward_id">
			    <option value="0" >Tất cả các phường</option>
			    <?php foreach ($ward as $item) { ?>
			    <option value="<?= $item['id'] ?>" <?= $item['id']==$info_du_an['ward_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
			    <?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="dang_tin" class="btn btn-default">Sửa dự án</button>
		    </div>
		  </div>
		</form>
	</div>
</div>

<script>
	function chon_tinh (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      		// alert(this.responseText);
        	document.getElementById("huyen_id").innerHTML = this.responseText;
        	chon_huyen(0);
        }
      xhttp.open("GET", "/functions/ajax/chon_tinh.php?id="+id, true);
      xhttp.send();
    }

    function chon_huyen (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("phuong_id").innerHTML = this.responseText;
        }
      xhttp.open("GET", "/functions/ajax/list_phuong.php?id="+id, true);
      xhttp.send();
    }
</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="/js/image-uploader.min.js"></script>

<script>
$(function () {
	$('.input-images-1').imageUploader({
        imagesInputName: 'photos',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
          mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
          maxSize: undefined,
          maxFiles: 5,
          label:'Drag & Drop files here or click to browse, up to 5 photos'

    });
});

</script>
<!-- https://www.jqueryscript.net/form/drag-drop-image-uploader.html -->