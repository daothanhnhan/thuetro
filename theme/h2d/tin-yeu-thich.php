<?php 
	// var_dump($_SESSION['yeu_thich']);
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

.home-product .so-anh {
    position: absolute;
    right: 10px;
    bottom: 10px;
    color: #fff;
    font-size: 14px;
}
.home-product .yeu-thich {
    color: #fff;
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    z-index: 9999;
}
.color-red {
    color: red !important;
}
</style>
<div class="row m-5" id="highlight1_2" style="display: flex;flex-wrap: wrap;margin-top: 5px;">
<?php 
foreach ($_SESSION['yeu_thich'] as $id) { 
	$item = $action->getDetail('product', 'product_id', $id);
    $pro = $item;
	$huong = $action->getDetail('huong', 'id', $item['product_shape'])['name'];
    $loai_so = 'triệu';
    // echo $item['product_price'];
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
    $square = $item['product_code'];
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
?>
    <div class="col-xs-3 p-5">
        <div class="card card-custom name-top">
            <div class="top d-flex justify-content-between ">
                        <h4><a href="/<?= $pro['friendly_url'] ?>"><?= $pro['product_name'] ?></a></h4>
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
            <a href="/<?= $pro['friendly_url'] ?>">
                <img src="/images/<?= $pro['product_img'] ?>" class="card-img-custom fix-height-custom" alt="...">
            </a>
            <div class="card-body">
                <div class="desc" style="">
                    <div class="top d-flex1 justify-content-between hidden">
                        <h4><a href="/<?= $pro['friendly_url'] ?>"><?= $pro['product_name'] ?></a></h4>
                    </div>
                    <div class="middle">
                        <div class="d-flex1 justify-content-start" style="display: none;">
                            <p class="p-width-3"><span class="icon"><i class="fas fa-couch" aria-hidden="true"></i> </span>&nbsp; 1</p>
                            <p class="p-width-3"><span class="icon"><i class="fas fa-bed" aria-hidden="true"></i></span> &nbsp; 2</p>
                            <p class="p-width-3"><span class="icon"><i class="fas fa-bath" aria-hidden="true"></i></span> &nbsp; 2</p>
                            <p class="p-width-3"><span class="icon"><i class="fas fa-vector-square" aria-hidden="true"></i></span> &nbsp; 0 m<sup>2</sup></p>
                        </div>
                        <div class="d-flex justify-content-start" style="margin-top: 10px;">
                            <p class="p-width-2" style="width: 45%;">DT: <span>&nbsp;<?= $square ?>m<sup>2</sup></span></p>
                            <p class="p-width-2" style="width: 55%;">Giá: <span>&nbsp;<?= $gia ?> <?= $loai_so ?></span></p>
                            
                        </div>
                        <div class="d-flex justify-content-start" style="margin-top: 0px;">
                            <p class="p-width-2" style="width: 100%;">Địa chỉ: <span><?= $district ?> , <?= $city ?></span></p>
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


</div>