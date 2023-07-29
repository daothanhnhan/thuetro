<?php 
  $state = 0;
  $created_id = $_SESSION['admin_id_home'];
  $tam_dung = 0;
  $khong_duoc_duyet = 0;
  $tin_da_duyet_quan = $action->getList_New('product', array('state', 'created_id', 'tam_dung', 'khong_duoc_duyet'), array(&$state, &$created_id, &$tam_dung, &$khong_duoc_duyet), array('product_id'), array('desc'), 'iiii', '', '', '');

  $quan_id = array();
  foreach ($tin_da_duyet_quan as $item) {
  	if (!empty($item['huyen_id'])) {
  		$quan_id[] = $item['huyen_id'];
  	}
  	
  }
  // var_dump($quan_id);


  $tin_da_duyet = $action_product->getProductList_byMultiLevel_orderProductId_tin_account('', 'desc', '', '', '');
  // var_dump($tin_da_duyet);
  

  $loai_tin_2 = $action->getList('loai_tin_2', '', '', 'id', 'asc', '', '', '');
  $loai_bds = $action->getList('productcat', '', '', 'productcat_id', 'asc', '', '', '');
?>
<style>
.list-tin-control .list-action {
	display: flex;
}
.list-tin-control .list-action a {
	display: flex;
	align-items: center;
	margin-right: 20px;
	cursor: pointer;
}
.list-tin-control .giua {
	vertical-align: middle !important;
  	text-align: center;
}
.list-tin-control .ma {
	font-weight: bold;
}
.list-tin-control .anh {
	width: 60px;
}
.list-tin-control .loai-tin {
	font-weight: bold;
	color: #d60000;
}
.list-tin-control .loai-bds {
	font-weight: bold;
}
.list-tin-control hr {
	margin-top: 3px;
	margin-bottom: 3px;
}
.list-tin-control p {
	margin-bottom: 0;
}
.list-tin-control .ten-tin {
	font-weight: bold;
	text-transform: uppercase;
}
.list-tin-control .district {
	font-weight: bold;
}
.list-tin-control .ngay span {
	font-weight: bold;
}
.tim-tin-account {
	display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    margin-top: 10px;
    align-items: center;
}
.tim-tin-account button {
	background: #114fe5;
	color: #fff;
	border: 0;
}
.list-tin-control thead tr {
	background: #114fe5;
	color: #fff;
}
.list-tin-control .list-action a {
	color: #114fe5;
	font-weight: bold;
}
</style>
<form action="/index.php" method="get" accept-charset="utf-8" class="tim-tin-account">
	<input type="hidden" name="page" value="tin-da-duyet">
	<input type="number" name="ma" placeholder="Mã tin" style="width: 100px;" value="<?= $_GET['ma'] ?>">
	<select name="loai-tin" >
		<option value="0">Loại tin</option>
		<?php foreach ($loai_tin_2 as $item) { ?>
		<option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['loai-tin'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
		<?php } ?>
	</select>
	<select name="loai-bds" >
		<option value="0">Loại BĐS</option>
		<?php foreach ($loai_bds as $item) { ?>
		<option value="<?= $item['productcat_id'] ?>" <?= $item['productcat_id']==$_GET['loai-bds'] ? 'selected' : '' ?> ><?= $item['productcat_name'] ?></option>
		<?php } ?>
	</select>
	<select name="district" >
		<option value="0">Quận/Huyện</option>
		<?php 
		foreach ($quan_id as $id) { 
			$quan = $action->getDetail('district', 'id', $id);//var_dump($quan)
		?>
		<option value="<?= $quan['id'] ?>" <?= $quan['id']==$_GET['district'] ? 'selected' : '' ?> ><?= $quan['name'] ?></option>
		<?php } ?>
	</select>
	<span>Ngày đăng</span>
	<input type="date" name="dang" value="<?= $_GET['dang'] ?>">
	<button type="submit">Tìm</button>
</form>
<table class="table table-bordered list-tin-control">
	<thead>
		<tr>
			<th>STT</th>
			<th>Mã tin</th>
			<th>Loại tin</th>
			<th>Tiêu đề</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$d = 0;
		foreach ($tin_da_duyet_quan as $item) {
			$d++;
			// var_dump($item['productcat_ar']);
			$productcat_ar = explode(",", $item['productcat_ar']);//var_dump($productcat_ar);
			$han = date('Y-m-d H:i:s', strtotime($item['ngay_dang'].' +60 days'));
			$up_free = 0;
			if (empty($item['ngay_lam_moi_tin_free'])) {
				$up_free = 1;
			} else {
				$now = date('Y-m-d H:i:s');
				$ngay_5 = date('Y-m-d H:i:s', strtotime($now.' -5 days'));
				if ($ngay_5 > $item['ngay_lam_moi_tin_free']) {
					$up_free = 1;
				}
			}

			//////////////
			if ($item['vip'] == 0) {
				$loai_vip = 'Tin thường';
			}
			if ($item['vip'] == 1) {
				$loai_vip = 'VIP 5';
			}
			if ($item['vip'] == 2) {
				$loai_vip = 'VIP 4';
			}
			if ($item['vip'] == 3) {
				$loai_vip = 'VIP 3';
			}
			if ($item['vip'] == 4) {
				$loai_vip = 'VIP 2';
			}
			if ($item['vip'] == 5) {
				$loai_vip = 'VIP 1';
			}
			if ($item['vip'] == 6) {
				$loai_vip = 'VIP đặc biệt';
			}
		?>
		<tr>
			<td class="giua"><?= $d ?></td>
			<td class="giua">
				<p class="ma"><?= $item['product_id'] ?></p>
				<img src="/images/<?= $item['product_img'] ?>" alt="" class="anh">
			</td>
			<td class="giua">
				<p class="loai-tin"><?= $action->getDetail('loai_tin_2', 'id', $item['loai_tin'])['name'] ?></p>
				<p class="loai-bds"><?= $action->getDetail('productcat', 'productcat_id', $productcat_ar[0])['productcat_name'] ?></p>
			</td>
			<td>
				<a class="ten-tin" href="/<?= $item['friendly_url'] ?>" title=""><?= $item['product_name'] ?> (<span style="color: red;"><?= $loai_vip ?></span>)</a>
				<hr>
				<p class="district"><?= $action->getDetail('district', 'id', $item['huyen_id'])['name']; ?></p>
				<hr>
				<p class="ngay">Ngày đăng: <span><?= substr($item['ngay_dang'], 0, 10) ?></span> | Hết hạn: <span><?= substr($han, 0, 10) ?></span> | Cập nhật: <span><?= substr($item['ngay_lam_moi_tin_free'], 0, 10) ?></span></p>
				<p>Ngày Up miễn phí gần đây: <span><?= $item['ngay_lam_moi_tin_free'] ?></span></p>
				<hr>
				<div class="list-action">
					<a href="/sua-tin/<?= $item['product_id'] ?>"><img src="/images/edit.png" alt="icon">Sửa</a>
					<a href="/xoa-tin/<?= $item['product_id'] ?>"><img src="/images/del.png" alt="icon">Xóa</a>
					<a onclick="tam_dung(<?= $item['product_id'] ?>)"><img src="/images/stop.png" alt="icon">Tạm dừng</a>
					<?php if ($up_free == 0) { ?>
					<a href="/mua-goi/<?= $item['product_id'] ?>"><img src="/images/up.png" alt="icon"><span style="color: red;">Up mất phí</span></a>
					<?php } else { ?>
					<a onclick="up_free(<?= $item['product_id'] ?>)"><img src="/images/up.png" alt="icon">Up miễn phí</a>
					<?php } ?>
					<a href="/mua-goi/<?= $item['product_id'] ?>"><img src="/images/setvip.gif" alt="icon">Nâng cấp VIP</a>
				
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script>
	function tam_dung (product_id) {
		// alert(product_id);
		const xhttp = new XMLHttpRequest();
		  xhttp.onload = function() {
		    // document.getElementById("demo").innerHTML = this.responseText;
		    	location.reload();
		    }
		  xhttp.open("GET", "/functions/ajax/tam_dung.php?product_id="+product_id, true);
		  xhttp.send();
	}

	function up_free (product_id) {
		// alert(product_id);
		const xhttp = new XMLHttpRequest();
		  xhttp.onload = function() {
		    // document.getElementById("demo").innerHTML = this.responseText;
		    	alert(this.responseText);
		    	location.reload();
		    }
		  xhttp.open("GET", "/functions/ajax/up_free.php?product_id="+product_id, true);
		  xhttp.send();
	}
</script>