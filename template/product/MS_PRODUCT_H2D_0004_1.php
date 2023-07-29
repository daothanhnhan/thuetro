<?php 

    $action_product = new action_product(); 

    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';



    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);

    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);

    $_SESSION['productcat_id_relate'] = $row[$nameColIdProductCat_product];

    $_SESSION['sidebar'] = 'productDetail';

    $arr_id = $row['productcat_ar'];

    $arr_id = explode(',', $arr_id);

    $productcat_id = (int)$arr_id[0];

    $product_breadcrumb = $action_product->getProductCatLangDetail_byId($productcat_id, $lang);

    $breadcrumb_url = $product_breadcrumb['friendly_url'];

    $breadcrumb_name = $product_breadcrumb['lang_productcat_name'];

    $use_breadcrumb = true;



    $img_sub = json_decode($row['product_sub_img']);

?>

<link rel="stylesheet" href="/plugin/slickNav/slicknav.css"/>

<link rel="stylesheet" href="/plugin/slick/slick.css"/>

<link rel="stylesheet" href="/plugin/slick/slick-theme.css"/>

<script type="text/javascript">

   $(document).ready(function(data){  

      $('.btn_addCart').click(function(){  

         // var product_id = $(this).attr("id");

           var product_id = $('#product_id').val();

           var product_name = $('#product_name').val();  

           var product_price = $('#product_price').val();  

           var product_quantity = $('.number_cart').val();  

           var action = "add";

           // var a = {a : 'a'};

           if(product_quantity > 0)  

           {                  

                 $.ajax({  

                     url:"/functions/ajax.php?action=add_cart",  

                     method:"POST",  

                     dataType:"json",  

                     data:{  

                          product_id:product_id,   

                          product_name:product_name,   

                          product_price:product_price,   

                          product_quantity:product_quantity,   

                          action:action  

                     },  

                     success:function(data)  

                     {  

                          // $('#order_table').html(data.order_table);  

                          // $('.badge').text(data.cart_item);  

                          if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {

                              window.location = '/gio-hang';

                          }else{

                              location.reload();

                          }  

                     },

                     error: function () {

                        alert('loi');

                     }  

                });  



           }  

           else  

           {  

                alert("Please Enter Number of Quantity")  

           }  

      });

   });

 </script>
<link href="/plugin/lightgallery/lightgallery.css" rel="stylesheet">
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0003.php";?>

<div class="gb-chitiet_sanpham_ruouvang">

    <div class="gb-chitiet_sanpham_ruouvang-body">

        <div class="container">

            <div class="gb-chitiet_sanpham_ruouvang-left">



                <!--chi titest sản phẩm-->

                <div class="row">

                    <div class="col-md-6">

                        <div class="gb-chitiet_sanpham_H2D_left-img">

                            <div class="uni-single-car-gallery-images">

                                <div class="slider slider-for">

                                    <div class="slide-item" data-src="/images/<?= $row['product_img'] ?>"><img src="/images/<?= $row['product_img'] ?>" alt="" class="img-responsive img1" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>

                                    <?php 

                                      $d = 1;

                                      foreach ($img_sub as $item) {

                                          $d++;

                                          $image = json_decode($item, true);?>

                                    <div class="slide-item"><img src="/images/<?= $image['image'] ?>" alt="" class="img-responsive img5" data-zoom-image="/images/<?= $image['image'] ?>"></div>

                                    <?php } ?>

                                </div>

                                <div class="slider slider-nav">

                                    <div class="slide-item-nav"><img src="/images/<?= $row['product_img'] ?>" alt="" class="img-responsive" data-zoom-image="/images/<?= $row['product_img'] ?>"></div>

                                    <?php foreach ($img_sub as $item) {

                                    $image = json_decode($item, true);?>

                                    <div class="slide-item-nav"><img src="/images/<?= $image['image'] ?>" alt="" class="img-responsive" data-zoom-image="/images/<?= $image['image'] ?>"></div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="gb-chitiet_sanpham_H2D_left-info">

                            <h1 class="product_title entry-title"><?= $rowLang['lang_product_name'] ?></h1>

                            <!-- .description -->

                            <div class="description">

                                <p>

                                    <?= $rowLang['lang_product_des'] ?>

                                </p>

                            </div>

                            <!--ENTRY PRICE-->

                            <?php include DIR_PRODUCT."MS_PRODUCT_H2D_0002.php";?>

                            <!--THÊM GIỎ HÀNG-->

                            <?php include DIR_CART."MS_CART_H2D_0002.php";?>

                            <div class="gb-divider"></div>

                            <div class="gb-luuy-ruouvang">

                                <p>Hãy liên hệ với chúng tôi để biết thêm về sản phẩm.</p>

                                <a href="tel:0985758366">Hotline: <?= $rowConfig['content_home3'] ?></a>

                            </div>

                            <div class="gb-divider"></div>

                            <!--SHARE-->

                            <?php include DIR_SOCIAL."MS_SOCIAL_H2D_0002.php";?>



                        </div>

                    </div>

                </div>



                <!--THÔNG SỐ VÀ MÔ TẢ-->

                <div class="gb-thongso-mota">

                    <div class="uni-shortcode-tabs-default">

                        <div class="uni-shortcode-tab-3">

                            <div class="tabbable-panel">

                                <div class="tabbable-line">

                                    <ul class="nav nav-tabs ">

                                        <li  class="active">

                                            <a href="#tab_default_32" data-toggle="tab">

                                                Mô tả sản phẩm</a>

                                        </li>

                                       <!--  <li>

                                            <a href="#tab_default_33" data-toggle="tab">

                                                Delivery</a>

                                        </li>

                                        <li>

                                            <a href="#tab_default_34" data-toggle="tab">

                                                Ask a Question</a>

                                        </li>
 -->
                                    </ul>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_default_32">

                                            <?= $rowLang['lang_product_content'] ?>

                                        </div>

                                        <div class="tab-pane" id="tab_default_33">

                                            <p>Comes Beautifully Gift Boxed as shown. Delivered from the UK.</p>

                                        </div>

                                        <div class="tab-pane" id="tab_default_34">

                                            <!--                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div>-->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--realte product-->

                <?php include DIR_PRODUCT."MS_PRODUCT_H2D_0005.php";?>



            </div>

        </div>

    </div>

</div>



<script src="/plugin/slick/scripts.js"></script>

<script src="/plugin/slick/slick.js"></script>

<script src="/plugin/slickNav/jquery.slicknav.js"></script>



<div id="fb-root"></div>

<script>(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";

        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));</script>



<script type="text/javascript">

    $(document).ready(function() {

        $('.slider-for').slick({

            slidesToShow: 1,

            slidesToScroll: 1,

            speed: 500,

            arrows: false,

            fade: true,

            asNavFor: '.slider-nav'

        });

        $('.slider-nav').slick({

            slidesToShow: 4,

            slidesToScroll: 1,

            speed: 500,

            asNavFor: '.slider-for',

            dots: false,

            focusOnSelect: true,

            slide: 'div'

        });

    });

</script>
<script src="/plugin/lightgallery/picturefill.min.js"></script>
<script src="/plugin/lightgallery/lightgallery.js"></script>
<script src="/plugin/lightgallery/lg-pager.js"></script>
<script src="/plugin/lightgallery/lg-autoplay.js"></script>
<script src="/plugin/lightgallery/lg-fullscreen.js"></script>
<script src="/plugin/lightgallery/lg-zoom.js"></script>
<script src="/plugin/lightgallery/lg-hash.js"></script>
<script src="/plugin/lightgallery/lg-share.js"></script>

<script>
    $(document).ready(function(){
        lightGallery(document.getElementById('lightgallery'));
    });
</script>
<script type="text/javascript">
  setTimeout(function(){ 
    // document.getElementsByClassName("slick-track")[0].setAttribute("id", "lightgallery"); 
    // document.getElementsByClassName("slick-track")[1].setAttribute("id", "lightgallery");
  // $("#lightgallery").prepend("<div data-src=\"/images/móc khóa 6 hình bánh xe ô tô.png\"></div>");
  }, 1000);

  
</script>