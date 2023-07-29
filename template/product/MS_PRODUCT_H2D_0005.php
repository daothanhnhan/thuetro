<?php 

    $product_related1 = $action_product->getListProductRelate_byIdCat_hasLimit($productcat_id, 8);//var_dump($product_related1);die;

?>

<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">

<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">

<div class="gb-home-product gb-home-product-relate">

    <div class="container">

        <div class="titleCategoryProduct_ruouvang">SẢN PHẨM XEM CÙNG</div>

        <div class="gb-home-product-relate-slide owl-carousel owl-theme">

            <?php 

            foreach ($product_related1 as $item) {

                $row = $item;

                $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);

            ?>

            <div class="item">

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
                            <?php if ($row['product_new']==1) { ?>
                            <div class="news">
                                <p>NEW</p>
                            </div>
                            <?php } ?>
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

    </div>

</div>



<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>

<script>

    $(document).ready(function (){

        var owl = $('.gb-home-product-relate-slide');

        owl.owlCarousel({

            loop:true,

            margin:30,

            navSpeed:500,

            nav:true,

            dots:false,

            autoplay: true,

            rewind: true,

            navText:[],
            items:4,
             responsive:{
                0:{
                    items:2
                },
                767:{items:4}
                
            }
       

            

        });

    });

</script>