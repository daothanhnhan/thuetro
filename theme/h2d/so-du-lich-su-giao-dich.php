<?php 
  $lich_su_giao_dich = $action->getList('lich_su_giao_dich', 'user_id', $_SESSION['admin_id_home'], 'id', 'asc', '', '', '');
  $user_tien_mua = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home'])['tien_mua'];
?>
<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<p>Số dư tài khoản: <?= number_format($user_tien_mua) ?>đ</p>
			<table style="width: 100%;">
				
				<thead>
					<tr>
						<th>Tiền</th>
						<th>Nội dung</th>
						<th>Ngày</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lich_su_giao_dich as $item) { ?>
					<tr>
						<td><?= number_format($item['price']) ?></td>
						<td><?= $item['note'] ?></td>
						<td><?= $item['ngay'] ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
	</div>
	
</div>

