<?php 

    $action_product = new action_product(); 

    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';



    $rowLang = $action_product->getProductLangDetail_byUrl($slug,$lang);

    $row = $action_product->getProductDetail_byId($rowLang[$nameColIdProduct_productLanguage],$lang);//var_dump($row['dien_tich']);

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

    if ($row['diff_color'] != 0) {
      $list_diff_color = $action->getList('product', 'diff_color', $row['diff_color'], 'product_id', 'desc', '', '', '');
    } else {
      $list_diff_color = array();
    }

    if ($_SESSION['kho'] == 1) {
      $list_size = json_decode($row['product_size']);
    } else {
      $list_size = json_decode($row['product_sub_info1']);
    }

    $huong_sp = $action->getDetail('huong', 'id', $row['product_shape'])['name'];//var_dump($huong);

    $phap_ly_sp = $action->getDetail('quyen_dat', 'id', $row['product_expiration'])['name'];

    $user = $action->getDetail('admin', 'admin_id', $row['created_id']);
?>

<link rel="stylesheet" href="/plugin/slickNav/slicknav.css"/>

<link rel="stylesheet" href="/plugin/slick/slick.css"/>

<link rel="stylesheet" href="/plugin/slick/slick-theme.css"/>
<!-- lightgallery -->
<!-- <link rel='stylesheet' href='/plugin/lightgallery1/css/bootstrap.min.css'> -->
<link rel='stylesheet' href='/plugin/lightgallery1/css/slick.css'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lg-fb-comment-box.min.css'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lg-transitions.min.css'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lightgallery.min.css'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lg.eot'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/fonts/lg.svg'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lg.ttf'>
<link rel='stylesheet' href='/plugin/lightgallery1/css/lg.woff'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.4/img/loading.gif'>

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

                              window.location = '/thanh-toan';

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
<style>
#aniimated-thumbnials img {
  height: 500px;
}
.page-product-box-right-name {
  text-transform: uppercase;
}
.nut-hien-so {
  background: #114fe5;
  border:0;
  color: #fff;
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0003.php";?>
<?php //include DIR_EMAIL."MS_EMAIL_CHONHADAT_0001.php";?>

<div class="gb-chitiet_sanpham_ruouvang">

    <div class="gb-chitiet_sanpham_ruouvang-body">

        <div class="container">

            <div class="gb-chitiet_sanpham_ruouvang-left">



                <!--chi titest sản phẩm-->

                <div class="row">

                    <div class="col-md-12">

                        

                    </div>

                    <div class="col-md-8">

                        <div class="gb-chitiet_sanpham_H2D_left-img">

                            <div class="uni-single-car-gallery-images">

                                <div id="aniimated-thumbnials" class="slider-for">

                                    <a href="/images/<?= $row['product_img'] ?>">
                                      <img src="/images/<?= $row['product_img'] ?>" />
                                    </a>
                                    <?php 

                                      $d = 1;

                                      foreach ($img_sub as $item) {

                                          $d++;

                                          $image = json_decode($item, true);?>
                                    <a href="/images/<?= $image['image'] ?>">
                                      <img src="/images/<?= $image['image'] ?>" />
                                    </a>
                                    <?php } ?>

                                </div>
                                <div class="slider-nav">
                                  <div class="item-slick">
                                    <img src="/images/<?= $row['product_img'] ?>" alt="Alt">
                                  </div>
                                  <?php foreach ($img_sub as $item) {

                                    $image = json_decode($item, true);?>
                                  <div class="item-slick">
                                    <img src="/images/<?= $image['image'] ?>" alt="Alt">
                                  </div>
                                  <?php } ?>
                                </div>

                            </div>

                        </div>

                        <div class="gb-chitiet_sanpham_H2D_left-info">

                            <h1 class="product_title entry-title"><?= $rowLang['lang_product_name'] ?></h1>

                            <!-- .description -->
                            <?php if ($row['product_new']==1) { ?>
                            <div class="news hidden">
                                <p>NEW</p>
                            </div>
                            <?php } ?>
                            <!-- <div class="description">

                                <p>

                                    <?= $rowLang['lang_product_des'] ?>

                                </p>

                            </div> -->

                            <!--ENTRY PRICE-->

                            <?php //include DIR_PRODUCT."MS_PRODUCT_H2D_0002_1.php";?>
                            <div class="size hidden">
                              <p>Kích cỡ | <span id="choose-size">Tất cả</span></p>

                              <ul class="many-size">
                                <!-- <li onclick="getSize('35')" class="out-stock">
                                  35
                                </li> -->
                                <?php foreach ($list_size as $item) { ?>
                                <li onclick="getSize('<?= $item ?>')">
                                  <?= $item ?>
                                </li>
                                <?php } ?>
                              </ul>

                            </div>
                            <!--THÊM GIỎ HÀNG-->

                            <?php //include DIR_CART."MS_CART_H2D_0002.php";?>

                            <div class="gb-divider"></div>

                            <div class="gb-luuy-ruouvang hidden">

                                

                                <a href="javascript:void(0)">Sản phẩm có mặt tại 114 cửa hàng</a>

                            </div>

                            <div class="gb-divider"><?= $row['product_des'] ?></div>

                            <div class="info-product">
                              <p><span>Diện tích: </span><?= $row['dien_tich'] ?> m<sup>2</sup></p>
                              <p><span>Hướng: </span><?= $huong_sp ?></p>
                              <p><span>Pháp lý: </span><?= $phap_ly_sp ?></p>
                              <p><span>Giá: </span><?= number_format($row['product_price']) ?>,000 VNĐ</p>
                              <p><span>Mã tin: </span><?= $row['product_id'] ?></p>
                              <p><span>Loại tin: </span><?= $action->getDetail('loai_tin', 'id', $row['loai_tin'])['name'] ?></p>
                              <p><span>Loại BĐS: </span><?= $action->getDetail('productcat', 'productcat_id', $productcat_id)['productcat_name'] ?></p>
                            </div>

                            <div class="info-contact hidden">
                              <p><span>Tư vấn: </span><?= $rowConfig['content_home8'] ?></p>
                              <p><span>Hotline: </span><?= $rowConfig['content_home10'] ?></p>
                            </div>

                            <div class="extra hidden">
                              <h2>
                                Sản phẩm cùng loại khác màu
                              </h2>
                              <ul class="cus-otherproduct">
                                <?php 
                                foreach ($list_diff_color as $item) { 
                                  if ($item['product_id']==$row['product_id']) {
                                    continue;
                                  }
                                ?>
                                <li>
                                  <a href="/<?= $item['friendly_url'] ?>" title=""><img src="/images/<?= $item['product_img'] ?>" alt=""></a>
                                </li>
                                <?php } ?>
                              </ul>
                            </div>
                            <div class="sub-content hidden">
                              <ul class="content">
                                <li class="l1">
                                  <span>Tặng ngay 01 Nón thời trang với hóa đơn 795K.</span>
                                </li>
                                <li class="l2">
                                  Sử dụng ngay <span>coupon freeship</span> để được giảm ngay 30K phí vận chuyển. <a href="">Xem chi tiết</a>
                                </li>
                                <li class="l3">
                                  <span>1800 6909</span> - Hotline đặt hàng (Miễn cước, 8h30 - 22h)
                                </li>
                                <li class="l4">
                                  Giao hàng nhanh trên toàn quốc
                                </li>
                                <li class="l5">
                                  Thanh toán tiện lợi với nhiều hình thức
                                </li>
                                <li class="l6">
                                  Bảo hành sản phẩm trọn đời (trừ mắt kính, thắt lưng)
                                </li>
                                <li class="l7">
                                  Miễn phí đổi sản phẩm trong 7 ngày (trừ mắt kính, thắt lưng)
                                </li>
                              </ul>
                            </div>
                            <!--SHARE-->

                            <?php //include DIR_SOCIAL."MS_SOCIAL_H2D_0002.php";?>



                        </div>

                    </div>

                    <div class="col-md-4">
                      <div class="home-title">
                          <p class="text">Thông tin liên hệ</p>
                      </div>
                      <div class="vien" style="padding: 10px;">
                        <p><b class="page-product-box-right-name"><?= $user['admin_name'] ?></b></p>
                        <p style="font-size: 16px;cursor: pointer;color: red;"><i class="fa fa-phone" style="transform: rotate(90deg);"></i> <span id="phone_user" onclick="phone_userf(<?= $user['admin_id'] ?>)"><?= substr($user['admin_phone'], 0, 7) ?>***</span></p>
                        <div class="text-center">
                          <button onclick="phone_userf(<?= $user['admin_id'] ?>)" class="nut-hien-so">Hiện số</button>
                        </div>
                        <p><?= $user['note'] ?></p>
                      </div>
                      <?php include DIR_EMAIL."MS_EMAIL_CHONHADAT_0002.php";?>
                    </div>

                </div>



                <!--THÔNG SỐ VÀ MÔ TẢ-->

                <div class="gb-thongso-mota hidden">

                    <div class="uni-shortcode-tabs-default">

                        <div class="uni-shortcode-tab-3">

                            <div class="tabbable-panel">

                                <div class="tabbable-line">

                                    <ul class="nav nav-tabs ">

                                        <li  class="active">

                                            <a href="#tab_default_32" data-toggle="tab">

                                                THÔNG TIN CHI TIẾT</a>

                                        </li>

                                        <li>

                                            <a href="#tab_default_33" data-toggle="tab">

                                                HƯỚNG DẪN CHỌN SIZE</a>

                                        </li>

                                       <!--  <li>

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

                                        <!-- <div class="tab-pane" id="tab_default_34"> -->

                                            <!--                                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div>-->

                                        <!-- </div> -->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--realte product-->

                <?php //include DIR_PRODUCT."MS_PRODUCT_H2D_0005.php";?>
                <?php include DIR_PRODUCT."MS_PRODUCT_CHONHADAT_0001.php";?>



            </div>

        </div>

    </div>

</div>


<!-- lightgallery -->
<!-- <script src='/plugin/lightgallery1/js/jquery.min.js'></script> -->
<script src='/plugin/lightgallery1/js/jquery-ui.min.js'></script>
<script src='/plugin/lightgallery1/js/slick.min.js'></script>
<script src='/plugin/lightgallery1/js/lightgallery-all.min.js'></script>

<script>
  $(function() {
  
  $('#aniimated-thumbnials').lightGallery({
    thumbnail: true,
  });
// Card's slider
  var $carousel = $('.slider-for');

  $carousel
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      adaptiveHeight: true,
      asNavFor: '.slider-nav'
    });
  $('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: false,
    focusOnSelect: true,
    variableWidth: true
  });


});
</script>
<script>
  function getSize(num){
    $("#choose-size").html(num);
  }
</script>
<script>
  $(document).ready(function(){
    $('.many-size li').click(function() {
        $(this).siblings('li').removeClass('active1');
        $(this).addClass('active1');
    });
});
</script>

<script>
function phone_userf (user_id) {
  // alert(user_id);
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("phone_user").innerHTML = this.responseText;
    }
  xhttp.open("GET", "/functions/ajax/phone_user.php?user_id="+user_id, true);
  xhttp.send();
}
</script>