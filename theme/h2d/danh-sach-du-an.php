<?php 
  $list_du_an = $action->getList('service', 'created_id', $_SESSION['admin_id_home'], 'service_id', 'desc', '', '', '');//var_dump($list_du_an);
?>
<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<?php foreach ($list_du_an as $item) { ?>
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
          <p><a href="/sua-du-an/<?= $item['service_id'] ?>">Sửa</a></p>
          <p><a href="/xoa-du-an/<?= $item['service_id'] ?>">Xóa</a></p>
          <p><a href="/mua-goi-du-an/<?= $item['service_id'] ?>">Mua gói VIP</a></p>
        </div>
      </div>
      <?php } ?>
		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
	</div>
	
</div>
