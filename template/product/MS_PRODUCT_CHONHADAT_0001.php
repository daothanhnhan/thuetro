<?php 

    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 6);//var_dump($product_related1);die;

?>
<style>

.name-top h4 a {
    color: #114fe5;
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
</style>
<section>
		<div>
		</div>
	    <div class="container" style="padding-top: 80px;">
            <div class="nha-ban-tieu-bieu"><i class="fas fa-home"></i><span> &nbsp; CÓ THỂ BẠN QUAN TÂM</span>
            </div>
        </div>
		<div class="container1">
			<div class="row">
			<?php 

            foreach ($product_related1 as $item) {

                $row = $item;

                $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);

                $huong = $action->getDetail('huong', 'id', $item['product_shape'])['name'];
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
                                <a href="/<?= $item['friendly_url'] ?>">
                                    <img src="/images/<?= $item['product_img'] ?>" class="card-img-custom fix-height-custom" alt="...">
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
                                                <p class="p-width-2">Diện tích: <span>&nbsp;<?= $square ?>m<sup>2</sup></span></p>
                                                <p class="p-width-2">Giá: <span>&nbsp;<?= $gia ?> <?= $loai_so ?></span></p>
                                                
                                            </div>
                                            <div class="d-flex justify-content-start" style="margin-top: 10px;">
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
		</div>
    </section>