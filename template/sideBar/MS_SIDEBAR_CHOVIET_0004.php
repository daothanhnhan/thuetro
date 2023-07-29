<?php 
	$sidebar_city = $action->getList('city', '', '', 'id', 'asc', '' , '', '');
?>
<div class="home-title">
	<p class="text">Nhà môi giới nhà đất toàn quốc</p>
</div>
<div class="vien">
	<ul class="list-du-an-tinh">
		<?php foreach ($sidebar_city as $item) { ?>
		<li><a href="/index.php?page=tim-nha-moi-gioi&loai-tin=0&loai-bds=0&tinh=<?= $item['id'] ?>&quan=0" title="">Nhà môi giới ở <b><?= $item['name'] ?></b></a></li>
		<?php } ?>
	</ul>
</div>