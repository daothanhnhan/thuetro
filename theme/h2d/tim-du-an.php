<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
<?php //include DIR_OTHER."MS_ORTHERS_HDS_0001.php";?>    
<?php 
	$loai_du_an = $action->getList('loai_du_an', '', '', 'id', 'asc', '', '', '');
	$city = $action->getList('city', '', '', 'id', 'asc', '', '', '');
	if (!empty($_GET['tinh'])) {
		$quan = $action->getList('district', 'city_id', $_GET['tinh'], 'id', 'asc', '', '', ''); 
	}

	$duan = $action->getList_tim_du_an('service','','','service_id','desc',$trang,15,$_GET['page'], $_GET['page']);
?>
<style>

</style>
<div class="container" style="margin-top: 10px;">
	<div class="row m-5">
		<div class="col-xs-8 p-5">
		<?php include DIR_OTHER."MS_ORTHERS_CHOVIET_0001.php";?>

		<p class="text-du-an">DANH SÁCH DỰ ÁN BẤT ĐỘNG SẢN</p>
		<hr style="margin:5px;">

		<div class="list-du-an">
			<?php foreach ($duan['data'] as $item) { ?>
			<div class="row m-5">
				<div class="col-xs-3 p-5">
					<a href="/<?= $item['friendly_url'] ?>">
						<img src="/images/<?= $item['service_img'] ?>" alt="dự án" class="w100">
					</a>
				</div>
				<div class="col-xs-9 p-5">
					<a href="/<?= $item['friendly_url'] ?>" title=""><?= $item['service_name'] ?></a>
					<p><em><b><?= $item['service_author'] ?></b></em></p>
					<p><?= $item['service_des'] ?></p>
				</div>
			</div>
			<hr>
			<?php } ?>
		</div>
		
	</div>
	<div class="col-xs-4 p-5">
		<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0002.php";?>
	</div>
	</div>
	
</div>