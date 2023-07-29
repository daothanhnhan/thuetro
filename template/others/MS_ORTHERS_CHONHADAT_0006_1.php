<?php
    $productcat_arr = array(101);
?>
<style>
.pagination {
    margin: 0;
}
.name-top h4 a {
    color: #000;
    font-size: 14px;
    font-weight: bold;
    overflow: hidden;
    /* width: 100px; */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    /*margin-bottom: 10px;*/
    min-height: 44px;
}
.star-tin {
    min-height: 20px;
}

.home-product .tag-vip {
    color: #fff;
    background: #c4000f;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 14px;
    z-index: 9999;
    padding: 5px;
    text-transform: uppercase;
}
</style>
<?php 
foreach ($productcat_arr as $procat) { 
    $productcat = $action->getDetail('productcat', 'productcat_id', $procat);
    // $products = $action_product->getProductList_byMultiLevel_orderProductId_home($procat,'desc',$trang,'6', 'home-hot', 'home-hot');
    if ($_GET['page'] != 'home-hot') {
        $trang_1 = 1;
    } else {
        $trang_1 = $trang;
    }
    $products = $action_product->getProductList_byMultiLevel_orderProductId_home_cho_thue(0,'desc',$trang_1,'6','home-hot','home-hot');
    
?>
<section class="featured-properties-area section-padding-100-50 home-product">
        <div class="container1">
            <div class="row margin-fixed hidden">
                <div class="col-xs-12 col-sm-12 col-xs-12 col-lg-12 nha-ban-hot" style="text-transform: uppercase;"><i class="fas fa-city"></i>&nbsp;<?= $productcat['productcat_name'] ?></div>
            </div>

            <div class="home-title" style="background: #c4000f;">
                <p class="text">BẤT ĐỘNG SẢN CHO THUÊ NỔI BẬT</p>
            </div>

            <div class="row m-5" id="highlight1_2" style="display: flex;flex-wrap: wrap;margin-top: 5px;">
<!-- ----------------- -->     
							
                <?php 
                foreach ($products['data'] as $item) { 
                    $huong = $action->getDetail('huong', 'id', $item['product_shape'])['name'];
                    $loai_so = 'triệu';
                    // echo $item['product_price'];
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
                    $square = $item['dien_tich'];
                    if (empty($square)) {
                        $square = 0;
                    }
                    $phap_ly = $action->getDetail('quyen_dat', 'id', $item['product_expiration'])['name'];

                    $city = $action->getDetail('city', 'id', $item['tinh_id'])['name'];//echo $item['tinh_id'];
                    $district = $action->getDetail('district', 'id', $item['huyen_id'])['name'];

                    $vip_img = '';
                    if ($item['vip'] != 0) {
                        $vip_img = '<img src="/images/vip.gif" alt="vip">';
                    }

                    $so_anh = count(json_decode($item['product_sub_img'])) + 1;

                    $date1 = new DateTime($now);   
                    $date2 = new DateTime($item['ngay_dang']);   
                    $interval = $date1->diff($date2);
                    $day = $interval->d." ngày";
                    if ($interval->d == 0) {
                        $day = 'Hôm nay';
                    }

                    $ten_vip = '';
                    if ($item['vip'] == 1) {
                        $ten_vip = 'VIP new';
                    }
                    if ($item['vip'] == 2) {
                        $ten_vip = 'VIP đồng';
                    }
                    if ($item['vip'] == 3) {
                        $ten_vip = 'VIP bạc';
                    }
                    if ($item['vip'] == 4) {
                        $ten_vip = 'VIP vàng';
                    }
                    if ($item['vip'] == 5) {
                        $ten_vip = 'VIP kim cương';
                    }
                    if ($item['vip'] == 6) {
                        $ten_vip = 'VIP đặc biệt';
                    }
                ?>
                    <div class="col-xs-4 p-5">
                            <div class="card card-custom name-top">
                                <div class="top d-flex justify-content-between ">
                                            <h4><a href="/<?= $item['friendly_url'] ?>"><?= $item['product_name'].$vip_img ?></a></h4>
                                        </div>
                                <div class="star-tin" style="margin-bottom: 10px;">
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
                                <div style="position: relative;">
                                    <i class="fa fa-heart-o yeu-thich" id="yeu-thich-<?= $item['product_id'] ?>" onclick="yeu_thich(<?= $item['product_id'] ?>)"></i>
                                </div>
                                <div style="position: relative;">
                                    <?php if ($item['vip'] != 0) { ?>
                                    <span class="tag-vip"><?= $ten_vip ?></span>
                                    <?php } ?>
                                </div>
                                <a href="/<?= $item['friendly_url'] ?>" style="position: relative;">
                                    <img src="/images/<?= $item['product_img'] ?>" class="card-img-custom fix-height-custom" alt="...">
                                    <div class="so-anh">
                                        <i class="fa fa-image"></i> <?= $so_anh ?>
                                    </div>
                                </a>

                                <div class="card-body">
                                    <div class="desc" style="">
                                        <div class="top d-flex1 justify-content-between hidden">
                                            <h4><a href="/<?= $item['friendly_url'] ?>"><?= $item['product_name'] ?></a></h4>
                                        </div>
                                        <div class="middle">
                                            <div class="d-flex1 justify-content-start" style="display: none;">
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-couch"></i> </span>&nbsp; <?= $couch ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-bed"></i></span> &nbsp; <?= $bed ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-bath"></i></span> &nbsp; <?= $bath ?></p>
                                                <p class="p-width-3"><span class="icon"><i class="fas fa-vector-square"></i></span> &nbsp; <?= $square ?> m<sup>2</sup></p>
                                            </div>
                                            <div class="d-flex justify-content-start" style="margin-top: 10px;">
                                                <p class="p-width-2" style="width: 45%;">DT: <span>&nbsp;<?= $square ?>m<sup>2</sup></span></p>
                                                <p class="p-width-2" style="width: 55%;">Giá: <span>&nbsp;<?= $gia ?> <?= $loai_so ?></span></p>
                                                
                                            </div>
                                            <div class="d-flex justify-content-start" style="margin-top: 0px;">
                                                <p class="p-width-2" style="width: 100%;">Địa chỉ: <span style="color: #000;"><?= $district ?> , <?= $city ?></span></p>
                                            </div>
                                            <div>
                                                <p><?= $day ?></p>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="price hidden">
                                    <span>Giá:                               
                                                                                <?= $gia ?> <?= $loai_so ?> <br>
                                                                                                                    </span>
                                </div>
                            </div>
                    </div>
                <?php } ?>
                    		

                    <!-- <p style="text-align: center;width: 100%;"><a href="/<?= $productcat['friendly_url'] ?>" title="" class="xem-them">Xem thêm >></a></p> -->
            
                    </div>

                    <div class="text-center">
                        <?= $products['paging'] ?>
                    </div>
        		
        </div>
	</section>
<?php } ?>