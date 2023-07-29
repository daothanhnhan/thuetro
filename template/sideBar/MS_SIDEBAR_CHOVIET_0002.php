<div class="home-title">
			<p class="text">TÌM KIẾM DỰ ÁN</p>
		</div>
		<div class="du-an-tim-kiem vien">
			<form action="/index.php" method="get" accept-charset="utf-8">
				<input type="hidden" name="page" value="tim-du-an">
				<input type="text" name="name" placeholder="Nhập tên cần tìm" value="<?= $_GET['name'] ?>">
				<select name="loai" >
					<option value="0">---- Loại dự án ----</option>
					<?php foreach ($loai_du_an as $item) { ?>
					<option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['loai'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
					<?php } ?>
				</select>
				<select name="tinh"  onchange="chon_city(this.value)">
					<option value="0">---- Tỉnh/Thành ----</option>
					<?php foreach ($city as $item) { ?>
					<option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['tinh'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
					<?php } ?>
				</select>
				<select name="quan" id="district_id">
					<option value="0">---- Quận/Huyện ----</option>
					<?php foreach ($quan as $item) { ?>
					<option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['quan'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
					<?php } ?>
				</select>
				<div class="text-center">
					<button type="submit">Tìm kiếm</button>
				</div>
				
			</form>
			
		</div>

		<div class="home-title">
			<p class="text">DỰ ÁN BẤT ĐỘNG SẢN</p>
		</div>
		<div class="vien">
			<ul class="list-loai-du-an">
				<?php foreach ($loai_du_an as $item) { ?>
				<li><a href="/index.php?page=tim-du-an&name=&loai=<?= $item['id'] ?>&tinh=0&quan=0" title=""><?= $item['name'] ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="home-title">
			<p class="text">DỰ ÁN BẤT ĐỘNG SẢN</p>
		</div>
		<div class="vien">
			<ul class="list-du-an-tinh">
				<?php foreach ($city as $item) { ?>
				<li><a href="/index.php?page=tim-du-an&name=&loai=0&tinh=<?= $item['id'] ?>&quan=0" title="">Dự án bất động sản <b><?= $item['name'] ?></b></a></li>
				<?php } ?>
			</ul>
		</div>

<script>
    function chon_city (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("district_id").innerHTML = this.responseText;
    chon_district(0);
    }
  xhttp.open("GET", "/functions/ajax/admin_chon_city.php?id="+id, true);
  xhttp.send();
    }
</script>