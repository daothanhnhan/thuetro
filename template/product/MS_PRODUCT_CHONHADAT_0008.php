<?php                                                                          
    $created_id = $_GET['trang'];
    $state = 1;
    $rows = $action->getList_New('product', array('created_id', 'state'), array(&$created_id, &$state), array('product_id'), array('desc'), 'ii', '', '', '');

    $user = $action->getDetail('admin', 'admin_id', $created_id);
    $anh = '/images/no-avatar.jpg';
    if (!empty($user['image'])) {
        $anh = '/images/portrait/'.$user['image'];
    }

    $city_user = $action->getDetail('city', 'id', $user['city_id'])['name'];
    $district_user = $action->getDetail('district', 'id', $user['district_id'])['name'];
?>
<style>
.thong-tin-nha-moi-gioi p {
    margin-bottom: 5px;
}
.thong-tin-nha-moi-gioi a {
    margin-bottom: 5px;
    display: block;
    font-weight: bold;
}
.thong-tin-nha-moi-gioi .ten {
    font-weight: bold;
    color: blue;
}
.thong-tin-nha-moi-gioi .phone {
    color: #bd0707;
    font-weight: bold;
}
</style>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
<?php //include DIR_EMAIL."MS_EMAIL_CHONHADAT_0001.php";?>

<div class="gb-page-sanpham_ruouvang home-tin-now">

    <div class="container">

        <div class="col-xs-8">
            
            <div class="row" style="display: flex;flex-wrap: wrap;">

                <?php 

                $d = 0;

                foreach ($rows as $item) {

                    $d++;

                    $row = $item;

                    $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);

                    $city = $action->getDetail('city', 'id', $item['tinh_id'])['name'];//echo $item['tinh_id'];
                    $district = $action->getDetail('district', 'id', $item['huyen_id'])['name'];

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
                ?>

                <div class="col-xs-12 item">
                        <a href="/<?= $item['friendly_url'] ?>" title="" class="title"><?= $item['product_name'] ?></a>
                        <div class="row m-5">
                            <div class="col-xs-4 p-5">
                                <a href="/<?= $item['friendly_url'] ?>" title="">
                                    <img src="/images/<?= $item['product_img'] ?>" alt="tin" class="w100">
                                </a>
                            </div>
                            <div class="col-xs-8 p-5">
                                <div class="des">
                                    <p><?= substr(strip_tags($item['product_des']), 0, 400) ?> <a href="/<?= $item['friendly_url'] ?>" title=""><< xem chi tiết >></a></p>
                                    
                                </div>
                                <div class="row text-bold">
                                    <div class="col-xs-4">Kích thước: </div>
                                    <div class="col-xs-4">Diện tích: <?= $square ?> m<sup>2</sup></div>
                                    <div class="col-xs-4 text-right">Hướng: <?= $huong ?></div>
                                </div>
                                <div class="row text-bold">
                                    <div class="col-xs-6">Giá: <span class="gia"><?= $gia ?> <?= $loai_so ?></span></div>
                                    <div class="col-xs-6 text-right">Quận/Huyện: <?= $district ?> , <?= $city ?></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

                    // if ($d%4==0) {

                    //     echo '<hr style="width:100%;border:0;" />';

                    // }

                }

                ?>

            </div>

            <div style="text-align: center;"><?= $rows['paging'] ?></div>

            <!-- <div class="xemthem-product" id="load" style="cursor: pointer;margin-top: 20px;" onclick="product_load(<?= $product_count ?>)">
                <p>Xem thêm <span id="xem-them"><?= $product_count > 12 ? $product_count-12 : 0 ?></span> sản phẩm</p>
            </div> -->

        </div>

        <div class="col-xs-4">

            <div class="home-title">
                <p class="text">Trang cá nhân thành viên</p>
            </div>
            <div class="row m-5 thong-tin-nha-moi-gioi">
                <div class="col-xs-4 p-5">
                    <img src="<?= $anh ?>" alt="cá nhân" style="width: 100%;">
                </div>
                <div class="col-xs-8 p-5">
                    <p class="ten"><i class="fa fa-user"></i> <?= $user['admin_name'] ?></p>
                    <a href="tel:<?= $user['admin_phone'] ?>" title=""><i class="fa fa-phone-square" style="transform: rotate(90deg);"></i> <span class="phone"><?= $user['admin_phone'] ?></span></a>
                    <p><i class="fa fa-map-signs"></i> <?= $district_user ?>, <?= $city_user ?></p>
                </div>
                <div class="col-xs-12">
                    <p><b>Giới thiệu</b></p>
                    <div>
                        <p><?= $user['note'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
    $(document).ready(function(){
    $('.switch a').click(function() {
        $(this).siblings('a').removeClass('active');
        $(this).addClass('active');
    });
}); 


    function col3(){
        $('.change-col').removeClass('col-sm-3');
        $('.change-col').addClass('col-sm-4');
    }
    function col4(){
        $('.change-col').removeClass('col-sm-4');
        $('.change-col').addClass('col-sm-3');
    }
    function clear_checkbox(){
        $('input:checkbox').removeAttr('checked');
    }
</script>
<script>
    $(document).ready(function(){
    $('.boloc').click(function() {
        $('.content-boloc').toggleClass('hiden');
    });
}); 

    $('.boloc').click(function() {
        if($('.content-boloc').hasClass('hiden')) {
            $('.boloc').html('BỘ LỌC -');
        }
        else {
            $('.boloc').html('BỘ LỌC +');
        }
    });
</script>

<script>
$(function(){
    $(".item-load").slice(0, 12).show(); // select the first ten
    $("#load").click(function(e){ // click event for load more
        e.preventDefault();
        $(".item-load:hidden").slice(0, 12).show(); // select next 10 hidden divs and show them
        if($(".item-load:hidden").length == 0){ // check if any hidden divs still exist
            // alert("No more divs"); // alert if there are none left
        }
    });
});
</script>

<script>
    function attribute (name, value) {
        // alert('attribute');

        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var bien = this.responseText;
                // alert(bien);
                // location.reload();
                window.location.href = "/<?= $_GET['page'] ?>";
            }
          };
          xhttp.open("GET", "/functions/ajax/attribute.php?name="+name+"&value="+value, true);
          xhttp.send();
    }

    function price (price) {
        // alert(price);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("demo").innerHTML = this.responseText;
                window.location.href = "/<?= $_GET['page'] ?>";
            }
        };
        xhttp.open("GET", "/functions/ajax/price_min.php?price="+price, true);
        xhttp.send();
    }
</script>
<script>
    var load_num = <?= $product_count ?> - 12;
    function product_load (num) {
        if (load_num > 12) {
            load_num -= 12;
        } else {
            load_num = 0;
        }
        document.getElementById("xem-them").innerHTML = load_num;
    }
</script>