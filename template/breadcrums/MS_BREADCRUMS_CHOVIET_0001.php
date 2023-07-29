<?php 
	if (!empty($_GET['loai-bds'])) {
		$title = $action->getDetail('productcat', 'productcat_id', $_GET['loai-bds'])['productcat_name'];
	} else {
		$title = $action->getDetail('loai_tin_2', 'id', $_GET['loai-tin'])['name'];
	}
?>
<style>
.gb-breadcrumbs_ruouvang_convert {
	background-image: url(/images/icons/banner-danh-muc-01.jpg);
	background-size: cover;
}

.breadcrumb li{
	color: #fff;
}
</style>
<div class="gb-breadcrumbs_ruouvang_convert">

	<div class="container">
		<nav class="breadcrumb">
			<?php if ($urlAnalytic != 'news_languages') { ?>
				<?= $title ?>
			<?php } ?>
		</nav>	
		

	</div>

</div>