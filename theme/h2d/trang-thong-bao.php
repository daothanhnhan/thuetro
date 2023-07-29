<?php 
  $thong_bao = $action->getList('thong_bao', 'user_id', $_SESSION['admin_id_home'], 'id', 'asc', '', '', '');
?>
<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<table style="width: 100%;">
				
				<thead>
					<tr>
						<th>Tiêu đề</th>
						<th>Nội dung</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($thong_bao as $item) { ?>
					<tr>
						<td><?= $item['name'] ?></td>
						<td><?= $item['note'] ?></td>
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

