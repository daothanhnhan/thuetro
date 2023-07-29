<?php
    $productcat_arr = array(101, 102, 103);
?>
<style>

</style>
<?php 
foreach ($productcat_arr as $procat) { 
    $productcat = $action->getDetail('productcat', 'productcat_id', $procat);
    $products = $action_product->getProductList_byMultiLevel_orderProductId($procat,'desc','','6',$slug);//var_dump($products);
?>
<section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row margin-fixed">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nha-ban-hot" style="text-transform: uppercase;"><i class="fas fa-city"></i>&nbsp;<?= $productcat['productcat_name'] ?></div>
            </div>

            <div class="row" id="highlight1_2" style="display: flex;flex-wrap: wrap;">
<!-- ----------------- -->     
							
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
                    $phap_ly = $action->getDetail('quyen_dat', 'id', $item['product_expiration'])['name'];
                ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="card card-custom">
                                <img src="/images/<?= $item['product_img'] ?>" class="card-img-custom fix-height-custom" alt="...">
                                <div class="card-body">
                                    <div class="desc" style="padding: 10px;">
                                        <div class="top d-flex justify-content-between">
                                            <h4><a href="/<?= $item['friendly_url'] ?>"><?= $item['product_name'] ?></a></h4>
                                        </div>
                                        <div class="middle">
                                            <div class="d-flex justify-content-start">
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-couch"></i> </span>&nbsp; <?= $couch ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-bed"></i></span> &nbsp; <?= $bed ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-bath"></i></span> &nbsp; <?= $bath ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-vector-square"></i></span> &nbsp; <?= $square ?> m<sup>2</sup></p>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <p class="p-width-2">Pháp lý: <span>&nbsp;<?= $phap_ly ?></span></p>
                                                <p class="p-width-2">Hướng: <span>&nbsp;<?= $huong ?></span></p>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="price">
                                    <span>Giá:                               
                                                                                <?= $gia ?> <?= $loai_so ?> <br>
                                                                                                                    </span>
                                </div>
                            </div>
                    </div>
                <?php } ?>
                    		

                    <p style="text-align: center;width: 100%;"><a href="/<?= $productcat['friendly_url'] ?>" title="" class="xem-them">Xem thêm >></a></p>
            
                    </div>
        		
        </div>
	</section>
<?php } ?>