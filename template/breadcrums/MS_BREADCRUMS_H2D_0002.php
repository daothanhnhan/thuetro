<!-- <div class="gb-breadcrumbs_ruouvang">
    <div class="container">
        <h1 class="hero-title-breadcrums_ruouvang"><?= $title ?></h1>
    </div>
</div> -->
<?php 
	$arr_procat = array();
	function getParent ($id) {
		global $conn_vn;
		global $arr_procat;
		if ($id != 0) {
			$sql = "SELECT * FROM productcat WHERE productcat_id = $id";
			$result = mysqli_query($conn_vn, $sql);
			$row = mysqli_fetch_assoc($result);
			$arr_procat[] = array(
					'url' => $row['friendly_url'],
					'name' => $row['productcat_name']
				);
			getParent($row['productcat_parent']);
		}		
	}

	getParent($rowCat[$nameColId_productCat]);
	krsort($arr_procat);
	// var_dump($arr_procat);
?>
<div class="gb-breadcrumbs_ruouvang_convert" style="padding-top: 30px">
	<div class="container">
		<nav class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page"><a href="	/"><i class="fa fa-home" aria-hidden="true" style="color:#fff;"></i></a></li>
				<?php foreach ($arr_procat as $item) { ?>
		        <li><a href="/<?= $item['url'] ?>" style="color:#fff;"><?= $item['name'] ?></a></li>
		        <?php } ?>
				 <!-- <li class="breadcrumb-item " aria-current="page"><?= $title ?></li> -->
		</nav>	
	</div>
</div>