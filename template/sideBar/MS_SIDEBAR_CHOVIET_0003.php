<?php 
	$sidebar_city = $action->getList('city', '', '', 'id', 'asc', '' , '', '');
?>
<div class="home-title">
	<p class="text">NHÀ ĐÂT BÁN</p>
</div>
<div class="vien">
	<ul class="list-du-an-tinh">
		<?php foreach ($sidebar_city as $item) { ?>
		<li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=113&tinh=<?= $item['id'] ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Nhà đât <b><?= $item['name'] ?></b></a></li>
		<?php } ?>
	</ul>
</div>