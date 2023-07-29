<?php 
	$state = 1;
	$created_id = $_SESSION['admin_id_home'];
	$tam_dung = 0;
	$khong_duoc_duyet = 0;
	$tin = $action->getList_New('product', array('created_id', 'tam_dung', 'khong_duoc_duyet'), array(&$created_id, &$tam_dung, &$khong_duoc_duyet), array('product_id'), array('desc'), 'iii', '', '', '');
	$tin_da_duyet = 0;
	$tin_cho_duyet = 0;
	foreach ($tin as $item) {
		if ($item['state'] == 1) {
			$tin_da_duyet++;
		} else {
			$tin_cho_duyet++;
		}
	}

	$tin_tam_dung = $action->getList('product', 'tam_dung', '1', 'product_id', 'desc', '', '', '');
	$count_tin_tam_dung = count($tin_tam_dung);

	$tin_khong_duoc_duyet = $action->getList('product', 'khong_duoc_duyet', '1', 'product_id', 'desc', '', '', '');
	$count_tin_khong_duoc_duyet = count($tin_khong_duoc_duyet);

	$tin_het_han = $action_product->getProductList_byMultiLevel_orderProductId_tin_het_han('', 'desc', '', '', '');
	$tin_het_han_count = count($tin_het_han);
?>
<style>

</style>
<div class="user-box-right">
	<p>Quản lý tin đăng</p>
	<ul>
		<li><a href="/tin-da-duyet" title="">Tin đã duyệt <span>(<?= $tin_da_duyet ?>)</span></a></li>
		<li><a href="/tin-cho-duyet" title="">Tin chờ duyệt <span>(<?= $tin_cho_duyet ?>)</span></a></li>
		<li><a href="/tin-khong-duoc-duyet" title="">Tin không được duyệt <span>(<?= $count_tin_khong_duoc_duyet ?>)</span></a></li>
		<li><a href="/tin-tam-dung" title="">Tin tạm dừng đăng <span>(<?= $count_tin_tam_dung ?>)</span></a></li>
		<li><a href="/tin-het-han" title="">Tin hết hạn <span>(<?= $tin_het_han_count ?>)</span></a></li>
	</ul>
	<p>Tiện ích</p>
	<ul>
		
		<li><a href="/so-du-lich-su-giao-dich" title="">Số dư/ Lịch sử giao dịch</a></li>
		<li><a href="/mua-luot-up-tin" title="">Mua lượt Up tin</a></li>
	</ul>
	<p>Dự án</p>
	<ul>
		
		<li><a href="/danh-sach-du-an" title="">Danh sách dự án</a></li>
		<li><a href="/them-du-an" title="">Thêm dự án</a></li>
	</ul>
	<p>Tài khoản cá nhân</p>
	<ul>
		
		<li><a href="/thong-tin-ca-nhan" title="">Thông tin tài khoản</a></li>
		<li><a href="/thay-doi-mat-khau" title="">Thay đổi mật khẩu</a></li>
		<li><a href="/trang-thong-bao" title="">Thông báo</a></li>
	</ul>
</div>