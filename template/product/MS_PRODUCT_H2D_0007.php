<?php 
    $home_list_procat = $action_product->getProductCat_home();
    foreach ($home_list_procat as $item_cat) { 
        // var_dump($item_cat['productcat_id']);
        $rowCatLang = $action_product->getProductCatLangDetail_byId($item_cat['productcat_id'], $lang);//var_dump($rowCatLang);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId($item_cat['productcat_id'],'desc',1,8,'');//var_dump($rows);
?>
<div class="gb-producttungmuc_ruouvang">
    <div class="gb-tieubieu-product_ruouvang-title">
        <h3><?= $rowCatLang['lang_productcat_name'] ?></h3>
    </div>
    <div class="gb-tieubieu-product_ruouvang-body">
        <div class="row">
            <?php 
            $d = 0;
            foreach ($rows['data'] as $item) {
                $d++;
                $row = $item;
                $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="gb-product_ruouvang-item">
                    <div class="gb-product_ruouvang-item-img">
                        <a href="/<?= $rowLang['friendly_url'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="<?= $rowLang['lang_product_name'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="gb-product_ruouvang-item-text">
                        <h2><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_product_name'] ?></a></h2>
                        <div class="excerpt-product_ruouvang">
                            <p>
                                <?= substr($rowLang['lang_product_des'], 0, 186) ?>
                            </p>
                        </div>
                        <!--PRICE-->
                        <?php include DIR_PRODUCT."MS_PRODUCT_H2D_0002.php";?>
                    </div>
                    <div class="gb-product_ruouvang-item-yeumua">
                        <!--YÊU THÍCH-->
                        <?php include DIR_CART."MS_CART_H2D_0003.php";?>
                        <!--MUA HÀNG-->
                        <?php include DIR_CART."MS_CART_H2D_0001.php";?>
                    </div>
                </div>
            </div>
            <?php
                if ($d%4==0) {
                    echo '<hr style="width:100%;border:0;" />';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php } ?>