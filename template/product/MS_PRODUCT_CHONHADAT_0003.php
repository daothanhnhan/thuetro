<?php 
	if (!isset($_SESSION['admin_id_home'])) {
		echo '<script>alert("Bạn chưa đăng nhập");location.href = "/";</script>';
	}
	$products = $action->getList('product', 'created_id', $_SESSION['admin_id_home'], 'product_id', 'desc', '', '', '');
?>

<style>

</style>
<main id="main-container">
    			
                

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nha-ban-hot" style="margin-bottom: 20px;"><i class="fab fa-gratipay"></i>&nbsp; TIN ĐĂNG CỦA BẠN</div>
            </div>
			<span class="muc-dang-tin"><a href="/dang-tin?type=1">Đăng tin Cần bán</a></span>
			<span class="muc-dang-tin"><a href="/dang-tin?type=2">Đăng tin Cho thuê</a></span>
			<span class="muc-dang-tin"><a href="/dang-tin?type=3">Đăng tin Cần mua</a></span>
			<span class="muc-dang-tin"><a href="/dang-tin?type=4">Đăng tin Cần thuê</a></span>
			<div class="row">
					
			<?php 
			foreach ($products as $item) { 
				$couch = $item['product_material'];
                if (empty($couch)) {
                    $couch = 0;
                }
                $bed = $item['product_delivery'];
                if (empty($bed)) {
                    $bed = 0;
                }
                $bath = $item['product_delivery_time'];
                if (empty($bath)) {
                    $bath = 0;
                }
                $square = $item['product_code'];
                if (empty($square)) {
                    $square = 0;
                }
                $phap_ly = $action->getDetail('quyen_dat', 'id', $item['product_expiration'])['name'];
                $ma_nv = $action->getDetail('admin', 'admin_id', $item['created_id'])['admin_login'];
			?>
			<a href="/<?= $item['friendly_url'] ?>">					
			</a><div class="col-xs-12 col-sm-12 col-md-6 col-lg-4"><a href="/<?= $item['friendly_url'] ?>">
				</a><div class="single-property"><a href="/<?= $item['friendly_url'] ?>">
					<div class="images">
						<img class="img-fluid mx-auto d-block" src="/images/<?= $item['product_img'] ?>" alt="chonhadat47">
						<span class="price">						
							<?= $item['state']==1 ? 'Đã duyệt' : 'Chưa duyệt' ?>
						</span>
					</div>
					
					</a><div class="desc"><a href="/<?= $item['friendly_url'] ?>">
						</a><div class="top d-flex justify-content-between"><a href="/<?= $item['friendly_url'] ?>">
							</a><h4><a href="/<?= $item['friendly_url'] ?>"></a><a href="/<?= $item['friendly_url'] ?>"><?= $item['product_name'] ?></a></h4>
						</div>
						<div class="middle">
							<div class="d-flex justify-content-start">
								<p class="p-width-1"><span class="icon"><i class="fas fa-couch"></i> </span>&nbsp; <?= $couch ?></p>
								<p class="p-width-1"><span class="icon"><i class="fas fa-bed"></i></span> &nbsp; <?= $bed ?></p>
								<p class="p-width-1"><span class="icon"><i class="fas fa-bath"></i></span> &nbsp; <?= $bath ?></p>
							</div>
							<div class="d-flex justify-content-start">
								<p class="p-width-2">Pháp lý: <span><?= $phap_ly ?></span></p>
							</div>
						</div>
						<div class="bottom d-flex justify-content-start">
							<p class="p-width-2"><span class="icon"><i class="fas fa-vector-square"></i></span> &nbsp; <?= $square ?> m<sup>2</sup></p>
							<p class="p-width-2">Mã NV: <span><?= $ma_nv ?></span></p>
						</div>
						<a href="/sua-tin/<?= $item['product_id'] ?>">Chỉnh sửa</a>
						<br>
						<br>
						<button class="delete-href btn"><a href="/xoa-tin/<?= $item['product_id'] ?>">Xóa</a></button>
						<?php if ($item['state'] == 1) { ?>
						<a href="/mua-goi/<?= $item['product_id'] ?>" title="">Mua các loại gói</a>						
						<?php } ?>
					</div> 
					
				</div>
			</div>			
			<?php } ?>
        		</div>
        		
        	</div>
            
			<!-- <div class="col-md-3">
        			<ul>
        				<li><a href="/mua-goi">Mua các gói</a></li>
        			</ul>
        		</div> -->
					
			
						
			
			
						

            </div>
			
						
        </div>
    <!-- ##### Featured Properties Area End ##### -->


            </section></main>