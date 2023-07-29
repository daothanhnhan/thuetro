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