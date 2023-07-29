<?php
    $productcat_arr = array(101);
?>
<style>

</style>
<?php 
foreach ($productcat_arr as $procat) { 
    $productcat = $action->getDetail('productcat', 'productcat_id', $procat);
    $products = $action_product->getProductList_byMultiLevel_orderProductId_home_cho_thue(0,'desc','','6',$slug);//var_dump($products);
?>
<section class="featured-properties-area section-padding-100-50 home-tin-now">
        <div class="container1">
            <div class="row margin-fixed hidden">
                <div class="col-xs-12 col-sm-12 col-xs-12 col-lg-12 nha-ban-hot" style="text-transform: uppercase;"><i class="fas fa-city"></i>&nbsp;<?= $productcat['productcat_name'] ?></div>
            </div>

            <div class="home-title">
                <p class="text">BẤT ĐỘNG SẢN CHO THUÊ NỔI BẬT</p>
            </div>

            <div class="row" id="highlight1_2" style="display: flex;flex-wrap: wrap;margin-left: 0;margin-right: 0;">
<!-- ----------------- -->     
							
                <?php 
                foreach ($products as $item) { 
                    $huong = $action->getDetail('huong', 'id', $item['product_shape'])['name'];
                    $city = $action->getDetail('city', 'id', $item['tinh_id'])['name'];//echo $item['tinh_id'];
                    $district = $action->getDetail('district', 'id', $item['huyen_id'])['name'];
                    $ward = $action->getDetail('ward', 'id', $item['huyen_id'])['name'];
                    $loai_so = 'triệu';
                    $gia = number_format($item['product_price']/1000, 1);
                    if ($item['product_price'] >= 1000000) {
                        $loai_so = 'tỷ';
                        $gia = number_format($item['product_price']/1000000, 1);
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
                    $square = $item['dien_tich'];
                    if (empty($square)) {
                        $square = 0;
                    }
                    $phap_ly = $action->getDetail('quyen_dat', 'id', $item['product_expiration'])['name'];

                    $vip_img = '';
                    if ($item['vip'] != 0) {
                        $vip_img = '<img src="/images/vip.gif" alt="vip">';
                    }
                ?>
                    <div class="col-xs-12 item">
                        <a href="/<?= $item['friendly_url'] ?>" title="" class="title"><?= $item['product_name'].$vip_img ?></a>
                        <div class="star-tin">
                                    <?php if ($item['vip']==6) { ?>
                                    <i class="fa fa-star" style="color:blue;"></i>
                                    <i class="fa fa-star" style="color:blue;"></i>
                                    <i class="fa fa-star" style="color:blue;"></i>
                                    <i class="fa fa-star" style="color:blue;"></i>
                                    <i class="fa fa-star" style="color:blue;"></i>
                                    <?php } else { ?>
                                        <?php for ($i=1;$i<=$item['vip'];$i++) { ?>
                                            <i class="fa fa-star" style="color:#eded00;"></i>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                        <div class="row m-5">
                            <div class="col-xs-4 p-5">
                                <a href="/<?= $item['friendly_url'] ?>" title="">
                                    <img src="/images/<?= $item['product_img'] ?>" alt="tin" class="w100">
                                </a>
                            </div>
                            <div class="col-xs-8 p-5">
                                <div class="des">
                                    <p><?= substr(strip_tags($item['product_des']), 0, 300)?> <a href="/<?= $item['friendly_url'] ?>" title=""><< xem chi tiết >></a></p>
                                    
                                </div>
                                <div class="row text-bold">
                                    <div class="col-xs-4">Kích thước: </div>
                                    <div class="col-xs-4">Diện tích: <?= $square ?> m<sup>2</sup></div>
                                    <div class="col-xs-4 text-right">Hướng: <?= $huong ?></div>
                                </div>
                                <div class="row text-bold">
                                    <div class="col-xs-6">Giá: <span class="gia"><?= $gia ?> <?= $loai_so ?></span></div>
                                    <div class="col-xs-6 text-right">Quận/Huyện: <?= $ward ?>, <?= $district ?> , <?= $city ?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    		
            
            </div>
        		
        </div>
	</section>
<?php } ?>

<div class="row">
    <div class="col-xs-6 text-left link-end-home">
        <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=113&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Xem thêm tin nhà đất cho thuê khác</a>
    </div>
    <div class="col-xs-6 text-right link-end-home">
        <a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=113&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Xem thêm tin nhà đất bán khác</a>
    </div>
</div>