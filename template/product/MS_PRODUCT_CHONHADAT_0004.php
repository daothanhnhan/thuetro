<?php 
	if (!isset($_SESSION['admin_id_home'])) {
		echo '<script type="text/javascript">alert(\'Bạn chưa đăng nhập.\');window.location.href="/"</script>';
	}

	$url = $_SERVER['REQUEST_URI'];
	$url_arr = explode('=', $url);
	$type = $url_arr[1];

	$user_tien_mua = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home'])['tien_mua'];

	function uploadPicture($src, $img_name, $img_temp){

		$src = $src.$img_name;//echo $src;

		if (!@getimagesize($src)){

			if (move_uploaded_file($img_temp, $src)) {

				return true;

			}

		}

	}

	function dang_tin () {
		global $conn_vn;
		$action = new action();
		if (isset($_POST['dang_tin'])) {
			// echo '<pre>';
			// var_dump($_FILES);
			$loai_tin = $_POST['loai_tin'];
			$product_name = mysqli_real_escape_string($conn_vn, $_POST['product_name']);
			$product_des = mysqli_real_escape_string($conn_vn, $_POST['product_des']);
			$address = mysqli_real_escape_string($conn_vn, $_POST['address']);
			$huyen_id = mysqli_real_escape_string($conn_vn, $_POST['huyen_id']);
			$phuong_id = mysqli_real_escape_string($conn_vn, $_POST['phuong_id']);
			$product_shape = mysqli_real_escape_string($conn_vn, $_POST['product_shape']);
			$da_ban = mysqli_real_escape_string($conn_vn, $_POST['da_ban']);
			$phan_loai = 0;
			$product_code = mysqli_real_escape_string($conn_vn, $_POST['product_code']);
			$use_met = mysqli_real_escape_string($conn_vn, $_POST['use_met']);
			$product_expiration = mysqli_real_escape_string($conn_vn, $_POST['quyen_dat']);
			$chu_so_huu = mysqli_real_escape_string($conn_vn, $_POST['chu_so_huu']);
			$tag = mysqli_real_escape_string($conn_vn, $_POST['tag']);

			$product_price = mysqli_real_escape_string($conn_vn, $_POST['product_price']);
			$product_material = mysqli_real_escape_string($conn_vn, $_POST['product_material']);
			$product_delivery = mysqli_real_escape_string($conn_vn, $_POST['product_delivery']);
			$product_delivery_time = mysqli_real_escape_string($conn_vn, $_POST['product_delivery_time']);

			$tinh_id = mysqli_real_escape_string($conn_vn, $_POST['tinh_id']);
			$now = date('Y-m-d');
			$ngay_dang = date('Y-m-d H:i:s');

			$dien_tich = mysqli_real_escape_string($conn_vn, $_POST['dien_tich']);

			$huong_ban_cong = mysqli_real_escape_string($conn_vn, $_POST['huong_ban_cong']);

			$productcat_ar = $_POST['productcat_ar'];//var_dump($_POST['productcat_ar']);
			$productcat_ar = implode(",", $productcat_ar);//var_dump($productcat_ar);

			$admin_id = $_SESSION['admin_id_home'];
			$friendly_url = vi_en1($product_name);

			if (empty($use_met)) {
				$use_met = 0;
			}

			if (empty($dien_tich)) {
				$dien_tich = 0;
			}

			if (empty($product_code)) {
				$product_code = 0;
			}

			if (empty($product_price)) {
				$product_price = 0;
			}


			$phong_ve_sinh = $_POST['phong_ve_sinh'];
			$nha_bep = isset($_POST['nha_bep']) ? 1 : 0;
			$be_boi = isset($_POST['be_boi']) ? 1 : 0;
			$san_tenis = isset($_POST['san_tenis']) ? 1 : 0;
			$san_thuong = isset($_POST['san_thuong']) ? 1 : 0;
			$cho_de_xe_oto = isset($_POST['cho_de_xe_oto']) ? 1 : 0;
			$phong_an = isset($_POST['phong_an']) ? 1 : 0;
			$phong_tap_the_hinh = isset($_POST['phong_tap_the_hinh']) ? 1 : 0;
			$phong_massage = isset($_POST['phong_massage']) ? 1 : 0;
			$quay_bar = isset($_POST['quay_bar']) ? 1 : 0;

			if (empty($phong_ve_sinh)) {
				$phong_ve_sinh = 0;
			}


			$duong_truoc_nha = $_POST['duong_truoc_nha'];
			$mat_tien = $_POST['mat_tien'];
			$chieu_dai = $_POST['chieu_dai'];
			$so_tang = $_POST['so_tang'];

			if (empty($duong_truoc_nha)) {
				$duong_truoc_nha = 0;
			}
			if (empty($mat_tien)) {
				$mat_tien = 0;
			}
			if (empty($chieu_dai)) {
				$chieu_dai = 0;
			}
			if (empty($so_tang)) {
				$so_tang = 0;
			}


			$hinh_thuc_dang = $_POST['hinh_thuc_dang'];


			$vip_type_day = $_POST['vip_type_day'];
			$daynumber = $_POST['daynumber'];

			$vip_type_month = $_POST['vip_type_month'];

			$user_tien_mua = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home'])['tien_mua'];

			$vip_luu = 0;
			$ngay_vip_luu = date('Y-m-d H:i:s');

			if ($vip_type_day != 0 && $daynumber != 0 && $hinh_thuc_dang == 2) {
				if ($vip_type_day == 1) {
					$tien_ngay = 10000;
				}
				if ($vip_type_day == 2) {
					$tien_ngay = 12000;
				}
				if ($vip_type_day == 3) {
					$tien_ngay = 14000;
				}
				if ($vip_type_day == 4) {
					$tien_ngay = 20000;
				}
				if ($vip_type_day == 5) {
					$tien_ngay = 40000;
				}
				if ($vip_type_day == 6) {
					$tien_ngay = 80000;
				}

				$ngay_vip_set = date('Y-m-d H:i:s', strtotime('now +'. $daynumber . ' days'));
				$tien_ngay_mua = $tien_ngay * $daynumber;
				$tien_mua = $user_tien_mua;

				if ($tien_mua < $tien_ngay_mua) {
					echo '<script>alert(\'Bạn không đủ tiền.\')</script>';
					// return false;
				} else {
					// $add .= ", ngay_vip = '$ngay_vip_set', vip = $vip_type_day ";
					$vip_luu = $vip_type_day;
					$ngay_vip_luu = $ngay_vip_set;
					
					$tien_mua_set = $tien_mua - $tien_ngay_mua;
					$sql_admin = "UPDATE admin SET tien_mua = '$tien_mua_set' WHERE admin_id = ".$_SESSION['admin_id_home'];
					$result = mysqli_query($conn_vn, $sql_admin);
				}
			}

			if ($vip_type_month != 0 && $hinh_thuc_dang == 3) {
				if ($vip_type_month == 1) {
					$tien_thang = 250000;
				}
				if ($vip_type_month == 2) {
					$tien_thang = 300000;
				}
				if ($vip_type_month == 3) {
					$tien_thang = 350000;
				}
				if ($vip_type_month == 4) {
					$tien_thang = 500000;
				}
				if ($vip_type_month == 5) {
					$tien_thang = 1000000;
				}
				if ($vip_type_month == 6) {
					$tien_thang = 2000000;
				}

				$thang_vip_set = date('Y-m-d H:i:s', strtotime('now + 30 days'));
				$tien_thang_mua = $tien_thang;
				$tien_mua = $user_tien_mua;

				if ($tien_mua < $tien_thang_mua) {
					echo '<script>alert(\'Bạn không đủ tiền.\')</script>';
					// return false;
				} else {
					// $add .= ", ngay_vip = '$thang_vip_set', vip = $vip_type_month ";
					$vip_luu = $vip_type_month;
					$ngay_vip_luu = $thang_vip_set;
					
					$tien_mua_set = $tien_mua - $tien_thang_mua;
					$sql_admin = "UPDATE admin SET tien_mua = '$tien_mua_set' WHERE admin_id = ".$_SESSION['admin_id_home'];//echo $sql_admin;
					$result = mysqli_query($conn_vn, $sql_admin);
				}
			}


			$time = time();

			$src= "images/";

			if (isset($_FILES['product_img']) && $_FILES['product_img']['name'] != "") {

		    	$img = $_FILES['product_img'];

		    	uploadPicture($src, $time.$img['name'], $img['tmp_name']);	

		    	$img_name = $time.$img['name']; 

	    	} else {

	    		$img_name = '';

	    	}


	    	$sub_img = array();



	    	if(isset($_FILES['fileUpload2']) && $_FILES['fileUpload2']['name'] != ""){



				foreach (array_combine($_FILES['fileUpload2']['name'], $_FILES['fileUpload2']['tmp_name']) as $name => $tmp_name) {

					if ($name != '' && $name != ' ') {

						uploadPicture($src, $time.$name, $tmp_name);

						$sub_img[] = json_encode(array('image'=>$time.$name));

					}

				}

			}
// echo '<pre>';
			// var_dump($_FILES['images']);

			// if(isset($_FILES['images']) && $_FILES['images']['name'] != ""){



			// 	foreach (array_combine($_FILES['images']['name'], $_FILES['images']['tmp_name']) as $name => $tmp_name) {

			// 		if ($name != '' && $name != ' ') {

			// 			uploadPicture($src, $name, $tmp_name);

			// 			$sub_img[] = json_encode(array('image'=>$name));

			// 		}

			// 	}

			// }

			$sub_img = json_encode($sub_img);
			$sub_img = mysqli_real_escape_string($conn_vn, $sub_img);
			// var_dump($sub_img);


			$sql = "INSERT INTO product (loai_tin, product_name, product_des, address, huyen_id, phuong_id, product_shape, da_ban, phan_loai, dien_tich, use_met, product_expiration, chu_so_huu, tag, friendly_url, created_id, state, product_img, product_sub_img, productcat_ar, product_price, product_material, product_delivery, product_delivery_time, tinh_id, ngay_order, ngay_up_tin, ngay_vip, ngay_dang, vip

			, phong_ve_sinh, nha_bep, be_boi, san_tenis, san_thuong, cho_de_xe_oto, phong_an, phong_tap_the_hinh, phong_massage, quay_bar
			, duong_truoc_nha, mat_tien, chieu_dai, so_tang, hinh_thuc_dang, huong_ban_cong) 
					VALUES ('$loai_tin', '$product_name', '$product_des', '$address', '$huyen_id', '$phuong_id', '$product_shape', '$da_ban', '$phan_loai', '$dien_tich', '$use_met', '$product_expiration', '$chu_so_huu', '$tag', '$friendly_url', '$admin_id', '0', '$img_name', '$sub_img', '$productcat_ar', '$product_price', '$product_material', '$product_delivery', '$product_delivery_time', '$tinh_id', '$now', '$now', '$ngay_vip_luu', '$ngay_dang', '$vip_luu'

			, '$phong_ve_sinh', '$nha_bep', '$be_boi', '$san_tenis', '$san_thuong', '$cho_de_xe_oto', '$phong_an', '$phong_tap_the_hinh', '$phong_massage', '$quay_bar'	
			, '$duong_truoc_nha', '$mat_tien', '$chieu_dai', '$so_tang', '$hinh_thuc_dang', '$hinh_thuc_dang')";
			// echo $sql;
			$result = mysqli_query($conn_vn, $sql);
			if ($result) {
				$product_id = mysqli_insert_id($conn_vn);
				$sql_vn = "INSERT INTO product_languages (product_id, lang_product_name, lang_product_des, friendly_url, languages_code) VALUES ('$product_id', '$product_name', '$product_des', '$friendly_url', 'vn')";
				$result_vn = mysqli_query($conn_vn, $sql_vn);
				$sql_en = "INSERT INTO product_languages (product_id, lang_product_name, lang_product_des, friendly_url, languages_code) VALUES ('$product_id', '$product_name', '$product_des', '$friendly_url', 'en')";
				$result_en = mysqli_query($conn_vn, $sql_en);
				if ($result_en) {

				} else {
					echo mysqli_error($conn_vn);
				}
				echo '<script type="text/javascript">alert(\'Bạn đã thêm được một tin đăng.\');window.location.href="/quan-ly-ca-nhan"</script>';
			} else {
				echo '<script>alert(\'Có lỗi xảy ra.\')</script>';
				echo mysqli_error($conn_vn);
			}
		}
	}
	dang_tin();

	$huyen = $action->getList('huyen', '', '', 'id', 'asc', '', '', '');
	$huong = $action->getList('huong', '', '', 'id', 'asc', '', '', '');
	$huong_ban_cong = $action->getList('huong_ban_cong', '', '', 'id', 'asc', '', '', '');
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
?>
<style>
.tin-tab {
	color: #fff;
	background: #114fe5;
	padding: 7px;
	font-weight: bold;
}

.hinh-thuc-dang {
	background: #c71616;
}
.o-tick {
	margin-top: 10px !important;
}

#info-tin-thuong {
	padding: 10px;
}
#info-tin-thuong ul {
	list-style: revert;
	margin-left: 20px;
}
#info-tin-vip-ngay {
	padding: 10px;
}
#info-tin-vip-ngay ul {
	list-style: revert;
	margin-left: 20px;
}
#info-tin-vip-thang {
	padding: 10px;
}
#info-tin-vip-thang ul {
	list-style: revert;
	margin-left: 20px;
}

#gia_xem {
	color: red;
}

.chia-cot {
	width: 33%;
	display: inline-block;
}
</style>
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
		<div class="col-xs-9">
		<h1 style="text-align: center;font-size: 30px;">Đăng tin mới</h1>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			
		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">Loại tin:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="sel1" name="loai_tin">
			    <option value="1" <?= $type==1 ? 'selected' : '' ?> >Cần bán</option>
			    <option value="2" <?= $type==2 ? 'selected' : '' ?> >Cho thuê</option>
			    <option value="3" <?= $type==3 ? 'selected' : '' ?> >Cần mua</option>
			    <option value="4" <?= $type==4 ? 'selected' : '' ?> >Cần thuê</option>
			  </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Loại tin:</label>
		    <div class="col-sm-10">
		    	<?php foreach ($productcat as $item) { ?>
		      <input type="checkbox" class="form-control1" id="email" placeholder="" name="productcat_ar[]" value="<?= $item['productcat_id'] ?>" <?= in_array($item['productcat_id'], $danh_muc) ? 'checked' : '' ?> >
		      <b><?= $item['productcat_name'] ?></b><br>
		      	<?php } ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Tiêu đề:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="email" placeholder="" name="product_name" required="">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Ảnh Chính:</label>
		    <div class="col-sm-10">
		      <input type="file" class="form-control1" id="email" placeholder="" name="product_img">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Ảnh phụ:</label>
		    <div class="col-sm-10">
		      	<input type="file" name="fileUpload2" id="fileUpload2" onclick="check_num()">

            	<div class="preview2" id="preview2"> 

            	</div>
            	<!-- <div class="input-images-1" style="padding-top: .5rem;"></div> -->
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Nội dung:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control ckeditor" rows="5" id="comment" name="product_des"></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Tỉnh:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="sel1" name="tinh_id" onchange="chon_tinh(this.value)">
			    <option value="0" >Chọn Tỉnh</option>
			    <?php foreach ($city as $item) { ?>
			    <option value="<?= $item['id'] ?>" <?= $item['id']==$tin['tinh_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
			    <?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Huyện:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="huyen_id" name="huyen_id" onchange="chon_huyen(this.value)">
			    <option value="0" >Chọn Huyện</option>
			    
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phường:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="phuong_id" name="phuong_id">
			    <option value="0" >Tất cả các phường</option>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Địa chỉ tài sản:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="pwd" placeholder="" name="address">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Giá:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="product_price" onkeyup="gia_xem(this.value)" onchange="gia_xem(this.value)">
		      <p id="gia_xem" style="display: none;"></p>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Diện tích:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="dien_tich">
		    </div>
		  </div>
		  <!-- <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Tổng diện tích:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="use_met">
		    </div>
		  </div> -->

		  <div>
		  	<p class="tin-tab">Các thông tin khác</p>
		  </div>


		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phòng khách:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="product_material">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phòng ngủ:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="product_delivery">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phòng tắm:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="product_delivery_time">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phòng vệ sinh:</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="phong_ve_sinh">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Đường trước nhà(m):</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="duong_truoc_nha"  step=".1">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Mặt tiền(m):</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="mat_tien"  step=".1">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Chiều dài(m):</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="chieu_dai"  step=".1">
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Số tầng(m):</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="pwd" placeholder="" name="so_tang"  step=".1">
		    </div>
		  </div>
		  
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Hướng:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="" name="product_shape">
		      	<?php foreach ($huong as $item) { ?>
			    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
				<?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Hướng ban công:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="" name="huong_ban_cong">
		      	<?php foreach ($huong_ban_cong as $item) { ?>
			    <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
				<?php } ?>
			  </select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Đã bán:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="" name="da_ban">
		      	<?php foreach ($da_ban as $item) { ?>
			    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
				<?php } ?>
			  </select>
		    </div>
		  </div>
		  <!-- <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Phân loại:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="" name="phan_loai">
		      	<?php foreach ($phan_loai as $item) { ?>
			    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
				<?php } ?>
			  </select>
		    </div>
		  </div> -->
		  
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Pháp lý:</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="" name="quyen_dat">
		      	<?php foreach ($quyen_dat as $item) { ?>
			    <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
				<?php } ?>
			  </select>
		    </div>
		  </div>
		  <!-- <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Chính chủ hay môi giới:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="pwd" placeholder="Chính chủ/Môi giới/Dịch vụ" name="chu_so_huu">
		    </div>
		  </div> -->
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Tag:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="pwd" placeholder="" name="tag">
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Nhà bếp:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="nha_bep"  value="1" <?= $tin['nha_bep']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Bể bơi:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="be_boi"  value="1" <?= $tin['be_boi']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Sân tenis:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="san_tenis"  value="1" <?= $tin['san_tenis']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Sân thượng:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="san_thuong"  value="1" <?= $tin['san_thuong']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Chỗ để xe oto:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="cho_de_xe_oto"  value="1" <?= $tin['cho_de_xe_oto']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Phòng ăn:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="phong_an"  value="1" <?= $tin['phong_an']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Phòng tập thể hình:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="phong_tap_the_hinh"  value="1" <?= $tin['phong_tap_the_hinh']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Phòng massage:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="phong_massage"  value="1" <?= $tin['phong_massage']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div class="form-group chia-cot">
		    <label class="control-label col-sm-10" for="pwd">Quầy bar:</label>
		    <div class="col-sm-2">
		      <input type="checkbox" class="form-control1 o-tick" id="pwd" placeholder="" name="quay_bar"  value="1" <?= $tin['quay_bar']==1 ? 'checked' : '' ?> >
		    </div>
		  </div>

		  <div>
		  	<p class="tin-tab hinh-thuc-dang">Hình thức đăng</p>
		  </div>

		  <div>
		  	<div class="radio">
			  <label><input type="radio" name="hinh_thuc_dang" value="1" checked onclick="chon_loai_tin(1)">Tin thường</label>
			  <div id="info-tin-thuong" style="display: block;">
			  	<ul>
			  		<li>Nội dung đang cập nhật 1</li>
			  	</ul>
			  </div>
			</div>
			<div class="radio">
			  <label><input type="radio" name="hinh_thuc_dang" value="2"  onclick="chon_loai_tin(2)">Tin VIP ngày</label>
			  <div id="info-tin-vip-ngay" style="display: none;">

			  	<select name="vip_type_day" id="vip_type_day" class="viptype" onchange="vip_type_dayf(this.value)">
					<option value="0">--- Loại VIP ---</option>
					<option value="1">VIP 5 / 10.000đ / ngày</option>
					<option value="2">VIP 4 / 12.000đ / ngày</option>
					<option value="3">VIP 3 / 14.000đ / ngày</option>
					<option value="4">VIP 2 / 20.000đ / ngày</option>
					<option value="5">VIP 1 / 40.000đ / ngày</option>
					<option value="6">VIP Đặc Biệt / 80.000đ / ngày</option>
				</select>
				<select id="dayNumber" class="daynumber" name="daynumber" onchange="so_ngay(this.value)">
                    <option value="0">Số ngày</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                <span> = </span> <span id="tien-vip-ngay">0</span><span>đ</span>
                <div>
                    <ul>
				  		<li>Nội dung đang cập nhật 2</li>
				  	</ul>   	
                </div>       
			  </div>	
			</div>
			<div class="radio disabled">
			  <label><input type="radio" name="hinh_thuc_dang" value="3"  onclick="chon_loai_tin(3)">Tin VIP tháng</label>
			  <div id="info-tin-vip-thang" style="display: none;">
			  	<select name="vip_type_month" id="vip_type_month" class="viptype">
					<option value="">--- Loại VIP ---</option>
					<option value="1">VIP 5 / 250.000đ / tháng</option>
					<option value="2">VIP 4 / 300.000đ / tháng</option>
					<option value="3">VIP 3 / 350.000đ / tháng</option>
					<option value="4">VIP 2 / 500.000đ / tháng</option>
					<option value="5">VIP 1 / 1.000.000đ / tháng</option>
					<option value="6">VIP Đặc Biệt / 2.000.000đ / tháng</option>
				</select>
				<div>
                    <ul>
				  		<li>Nội dung đang cập nhật 3</li>
				  	</ul>   	
                </div>
			  </div>
			</div>
		  </div>

		  <div>
		  	<p>Số dư tài khoản: <?= number_format($user_tien_mua) ?>đ</p>
		  	
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="dang_tin" class="btn btn-default">Đăng tin</button>
		    </div>
		  </div>
		</form>

		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
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

    function check_num () {
    	var num = document.getElementsByClassName('sub_image_product').length;
    	// alert(num);
    	if (num >= 4) {
    		document.getElementById('fileUpload2').style.display = 'none';
    		
    	} else {
    		
    	}
    }
</script>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/image-uploader.min.js"></script> -->

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

<script>
	function vip_type_dayf (val) {
		var so_ngay = document.getElementById('dayNumber').value;
		var tien = 0;
		// alert(so_ngay);
		if (val != 0 && so_ngay != 0) {
			if (val == 1) {
				tien = 10000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 2) {
				tien = 12000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 3) {
				tien = 14000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 4) {
				tien = 20000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 5) {
				tien = 40000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 6) {
				tien = 80000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
		} else {
			document.getElementById('tien-vip-ngay').innerHTML = 0;
		}
	}

	function so_ngay (so_ngay) {
		var val = document.getElementById('vip_type_day').value;
		var tien = 0;
		// alert(so_ngay);
		if (val != 0 && so_ngay != 0) {
			if (val == 1) {
				tien = 10000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 2) {
				tien = 12000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 3) {
				tien = 14000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 4) {
				tien = 20000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 5) {
				tien = 40000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 6) {
				tien = 80000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
		} else {
			document.getElementById('tien-vip-ngay').innerHTML = 0;
		}
	}

	function chon_loai_tin (so) {
		if (so == 1) {
			document.getElementById('info-tin-thuong').style.display = 'block';
			document.getElementById('info-tin-vip-ngay').style.display = 'none';
			document.getElementById('info-tin-vip-thang').style.display = 'none';
		}
		if (so == 2) {
			document.getElementById('info-tin-thuong').style.display = 'none';
			document.getElementById('info-tin-vip-ngay').style.display = 'block';
			document.getElementById('info-tin-vip-thang').style.display = 'none';
		}
		if (so == 3) {
			document.getElementById('info-tin-thuong').style.display = 'none';
			document.getElementById('info-tin-vip-ngay').style.display = 'none';
			document.getElementById('info-tin-vip-thang').style.display = 'block';
		}
	}

function number_format (number, decimals, dec_point, thousands_sep) {
    var n = number, prec = decimals;

    var toFixedFix = function (n,prec) {
        var k = Math.pow(10,prec);
        return (Math.round(n*k)/k).toString();
    };

    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);
    var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
    var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

    var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec);
    // Fix for Internet Explorer parseFloat(0.55).toFixed(0) = 0;

    var abs = toFixedFix(Math.abs(n), prec);
    var _, i;

    if (abs >= 1000) {
        _ = abs.split(/\D/);
        i = _[0].length % 3 || 3;

        _[0] = s.slice(0,i + (n < 0)) +
               _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
        s = _.join(dec);
    } else {
        s = s.replace('.', dec);
    }

    var decPos = s.indexOf(dec);
    if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
        s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
    }
    else if (prec >= 1 && decPos === -1) {
        s += dec+new Array(prec).join(0)+'0';
    }
    return s;
}
</script>

<script>
	function gia_xem (gia) {
		// alert(gia);
		if (gia >= 1000000) {
			gia = gia/1000000;
			gia = gia + " Tỷ";
		}
		if (gia >= 1000) {
			gia = gia/1000;
			gia = gia + " Triệu";
		}
		if (gia < 1000) {
			// gia = gia/1000;
			gia = gia + " Ngàn";
		}
		document.getElementById("gia_xem").innerHTML = gia ;
	}
</script>