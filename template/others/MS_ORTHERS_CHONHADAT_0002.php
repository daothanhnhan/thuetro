<?php 
    $products = $action_product->getProductList_byMultiLevel_orderProductId(104,'desc','','6',$slug);
    $productcat_chothue = $action->getDetail('productcat', 'productcat_id', 104);
?>
<style>

</style>
<section>
    <!-- end block-dịch vụ ký gửi -->
    <div class="container">
            <div class="nha-ban-tieu-bieu"><i class="fas fa-city"></i><span> &nbsp;NHÀ ĐẤT CHO THUÊ</span>
            </div>
        </div>
    <!-- nhà đất cho thuê -->
    <div class="container-fluid" style="background-color: #fff; padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
        <div class="row" id="highlight3" style="display: flex;flex-wrap: wrap;">
                <?php 
                foreach ($products as $item) { 
                    $huong = $action->getDetail('huong', 'id', $item['product_shape'])['name'];
                    $loai_so = 'triệu';
                    $gia = number_format($item['product_price']/1000000, 1);
                    if ($item['product_price'] >= 1000000000) {
                        $loai_so = 'tỷ';
                        $gia = number_format($item['product_price']/1000000000, 1);
                    }
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
                ?>
                <div class="col-custom-6">
                    <div class="col-custom-2">
                        <img src="/images/<?= $item['product_img'] ?>" alt="cho_nha_dat_47" class="img-fluid img-scale-custom">
                        <span class="price-custom"><?= $gia ?> <?= $loai_so ?>  / 1 năm<span class="don-vi-tinh"></span></span>
                    </div>
                    <div class="col-custom-4 desc">
                            <div class="top" style="padding:0;">                       
                                <h4 class="padding-bottom-h4">
                                    <a href="/<?= $item['friendly_url'] ?>"><?= $item['product_name'] ?></a>
                                </h4>
                            </div>
                            <div class="float-left width-kh-ng-b">
                                <p class="p-custom-style"><span class="icon"><i class="fas fa-couch"></i> </span><span>&nbsp;<?= $couch ?></span></p>
                                <p class="p-custom-style"><span class="icon"><i class="fas fa-bed"></i></span> &nbsp;<?= $bed ?></p>
                                <p class="p-custom-style"><span class="icon"><i class="fas fa-bath"></i></span> &nbsp;<?= $bath ?></p>
                                <p class="p-custom-style-2"><span class="icon"><i class="fas fa-vector-square"></i></span> &nbsp; <?= $square ?> m<sup>2</sup></p>
                            </div>                             
                        </div>
                </div>
				<?php } ?>	
                <p style="text-align: center;width: 100%;"><a href="/<?= $productcat_chothue['friendly_url'] ?>" title="" class="xem-them">Xem thêm >></a></p>
				</div>  
        </div>
        
    </div>
    <!-- end nhà đất cho thuê -->
</section>