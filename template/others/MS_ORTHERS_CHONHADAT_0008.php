<?php 
	$home_city = $action->getList('city', '', '', 'id', 'asc', '', '', '');
	$home_city_special = array(2, 1, 3, 27, 44, 25, 6, 62, 28, 48, 5);
?>
<style>

</style>
<div class="home-nha-dat">
	<ul>
		<?php 
		foreach ($home_city_special as $id) { 
			$city_home = $action->getDetail('city', 'id', $id);
		?>
		<li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=101&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Nhà đất <b><?= $city_home['name'] ?></b></a></li>
		<?php } ?>


		<?php 
		foreach ($home_city as $item) { 
			if ($item['id'] == 1 || $item['id'] == 2 || $item['id'] == 3 || $item['id'] == 5 || $item['id'] == 6) {
				continue;
			}
			if ($item['id'] == 25 || $item['id'] == 27 || $item['id'] == 28 || $item['id'] == 44 || $item['id'] == 48 || $item['id'] == 62) {
				continue;
			}
		?>
		<li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=101&tinh=<?= $item['id'] ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Nhà đất <b><?= $item['name'] ?></b></a></li>
		<?php } ?>
	</ul>
</div>
