
<style>
@-webkit-keyframes my {
	 0% { color: red; } 
	 50% { color: #fff;  } 
	 100% { color: red;  } 
 }
 @-moz-keyframes my { 
	 0% { color: red;  } 
	 50% { color: #fff;  }
	 100% { color: red;  } 
 }
 @-o-keyframes my { 
	 0% { color: red; } 
	 50% { color: #fff; } 
	 100% { color: red;  } 
 }
 @keyframes my { 
	 0% { color: red;  } 
	 50% { color: #fff;  }
	 100% { color: red;  } 
 } 
 .home-du-an-xem-them {
         /*background:#3d3d3d;*/
         /*font-size:24px;*/
         /*font-weight:bold;*/
	 -webkit-animation: my 700ms infinite;
	 -moz-animation: my 700ms infinite; 
	 -o-animation: my 700ms infinite; 
	 animation: my 700ms infinite;
}
</style>
<div class="home-title">
	<p class="text">DỰ ÁN NỔI BẬT<a href="/dich-vu" title="" class="home-du-an-xem-them">Xem thêm</a></p>
</div>
<?php include DIR_SLIDESHOW."MS_SLIDESHOW_H2D_0001.php";?>
<?php include DIR_SLIDESHOW."MS_SLIDESHOW_H2D_0004.php";?>
<?php 
	$home_du_an_1 = $action->getList('service', 'city_id', '3', 'service_id', 'desc', '', '1', '')[0];
	$home_du_an_2 = $action->getList('service', 'city_id', '27', 'service_id', 'desc', '', '1', '')[0];
	$home_du_an_3 = $action->getList('service', 'city_id', '44', 'service_id', 'desc', '', '1', '')[0];
?>
<div class="row m-5 home-du-an">
	
	<div class="col-xs-4 p-5">
		<a href="/<?= $home_du_an_1['friendly_url'] ?>" title="">
			<img src="/images/<?= $home_du_an_1['service_img'] ?>" alt="dự án" class="w100" style="aspect-ratio: 10 / 7;">
		</a>
		<a href="/<?= $home_du_an_1['friendly_url'] ?>" title=""><?= $home_du_an_1['service_name'] ?></a>
		<p>Quận <?= $action->getDetail('district', 'id', $home_du_an_1['district_id'])['name']; ?>, <?= $action->getDetail('city', 'id', $home_du_an_1['city_id'])['name']; ?></p>
	</div>

	<div class="col-xs-4 p-5">
		<a href="/<?= $home_du_an_2['friendly_url'] ?>" title="">
			<img src="/images/<?= $home_du_an_2['service_img'] ?>" alt="dự án" class="w100" style="aspect-ratio: 10 / 7;">
		</a>
		<a href="/<?= $home_du_an_2['friendly_url'] ?>" title=""><?= $home_du_an_2['service_name'] ?></a>
		<p>Quận <?= $action->getDetail('district', 'id', $home_du_an_2['district_id'])['name']; ?>, <?= $action->getDetail('city', 'id', $home_du_an_2['city_id'])['name']; ?></p>
	</div>

	<div class="col-xs-4 p-5">
		<a href="/<?= $home_du_an_3['friendly_url'] ?>" title="">
			<img src="/images/<?= $home_du_an_3['service_img'] ?>" alt="dự án" class="w100" style="aspect-ratio: 10 / 7;">
		</a>
		<a href="/<?= $home_du_an_3['friendly_url'] ?>" title=""><?= $home_du_an_3['service_name'] ?></a>
		<p>Quận <?= $action->getDetail('district', 'id', $home_du_an_3['district_id'])['name']; ?>, <?= $action->getDetail('city', 'id', $home_du_an_3['city_id'])['name']; ?></p>
	</div>
	
</div>