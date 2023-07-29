<?php 
    $home_pro_new = $action_product->getListProductNew_hasLimit(12);
?>

<div class="gb-tieubieu-product_ruouvang">
    <div class="container">
        <div class="gb-tieubieu-product_ruouvang-title">
            <h3>SẢN PHẨM MỚI NHẤT</h3>
            <p class="hidden-xs">
                <a href="/san-pham-moi" >Xem tất cả ></a>
            </p>
        </div>
        <div class="gb-tieubieu-product_ruouvang-body">
            <div class="gb-tieubieu-product_ruouvang-slide">
                <?php 
                foreach ($home_pro_new as $item) {
                    $row = $item;
                    $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);
                ?>
                <div class="col-md-3 col-xs-6">
                    <div class="gb-product_ruouvang-item">
                        <div class="gb-product_ruouvang-item-img">
                            <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                        </div>
                        <div class="gb-product_ruouvang-item-text">
                            <?php include DIR_PRODUCT."MS_PRODUCT_H2D_0002_1.php";?>
                            <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h2>
                            <div class="excerpt-product_ruouvang">
                                <p>
                                    <?= substr($rowLang['lang_product_des'], 0, 150) ?>
                                </p>
                            </div>
                            <div class="news">
                                <p>NEW</p>
                            </div>
                            <?php if ($row['product_price_sale']!=0) { ?>
                            <div class="news">
                                <p>-<?= $row['product_price_sale'] ?>%</p>
                            </div>
                            <?php } ?>
                            <!--PRICE-->
                            <?php //include DIR_PRODUCT."MS_PRODUCT_H2D_0002.php";?>
                        </div>
                        <div class="gb-product_ruouvang-item-yeumua">
                            <!--YÊU THÍCH-->
                            <?php //include DIR_CART."MS_CART_H2D_0003.php";?>
                            <!--MUA HÀNG-->
                            <?php //include DIR_CART."MS_CART_H2D_0001.php";?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <p class="hidden-md">
                <a href="/san-pham-moi" >Xem tất cả ></a>
            </p>
        </div>
    </div>
</div>
