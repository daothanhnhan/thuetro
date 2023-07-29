<?php 

    if (!isset($_SESSION['attribute'])) {
        $_SESSION['attribute'] = array();
    }

    ///////////////////////////////

    if (!isset($_SESSION['history'])) {

        $_SESSION['history'] = $_GET['page'];

    } else {

        if ($_SESSION['history'] == $_GET['page']) {



        } else {


            $_SESSION['history'] = $_GET['page'];

            $_SESSION['attribute'] = array();
            unset($_SESSION['price']);
        }

    }

?>
<?php                                                                          

    if (isset($_GET['slug']) && $_GET['slug'] != '') {

        $slug = $_GET['slug'];



        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);

        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);

        $rows_all = $action_product->getProductList_byMultiLevel_orderProductId_all($rowCat[$nameColId_productCat],'desc',$trang,'',$slug);
        $product_count = count($rows_all);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId_timkiem($rowCat['productcat_id'],'desc',$trang,'6',$slug);//var_dump($rows);

    }else{

        $rows = $action->getList('product','','','product_id','desc',$trang,12,'san-pham');

    }

    

    $_SESSION['sidebar'] = 'productCat';

    $thuoc_tinh_1 = $action_product->get_list_attribute($rows_all);//var_dump($thuoc_tinh_1);var_dump($_SESSION['attribute']);

    $mau_sac = $action->getList('thuoc_tinh_value', 'thuoc_tinh_id', '1', 'id', 'asc', '', '', '');
    // $kich_co = $action->getList('thuoc_tinh_value', 'thuoc_tinh_id', '2', 'id', 'asc', '', '', '');
    // $day_deo = $action->getList('thuoc_tinh_value', 'thuoc_tinh_id', '3', 'id', 'asc', '', '', '');
    // $kieu_khoa = $action->getList('thuoc_tinh_value', 'thuoc_tinh_id', '4', 'id', 'asc', '', '', '');

    foreach ($thuoc_tinh_1 as $tt) {
        if ($tt['name'] == 2) {
            $kich_co = $tt['value'];
        }
        if ($tt['name'] == 3) {
            $day_deo = $tt['value'];
        }
        if ($tt['name'] == 4) {
            $kieu_khoa = $tt['value'];
        }

    }

    $title = "Kết quả tìm kiếm";
?>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_CHOVIET_0001.php";?>
<?php //include DIR_EMAIL."MS_EMAIL_CHONHADAT_0001.php";?>
<style>
.star-tin {
    /*min-height: 20px;*/
}

.page-productcat .so-anh {
    position: absolute;
    right: 10px;
    bottom: 10px;
    color: #fff;
    font-size: 14px;
}
.page-productcat .yeu-thich {
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
<div class="gb-page-sanpham_ruouvang home-tin-now">

    <div class="container">

        <div class="col-xs-8">

            <?php //include DIR_SEARCH."MS_SEARCH_H2D_0001.php";?>
            <!-- <div class="col-xs-6">
                <div class="boloc" style="cursor: pointer;">BỘ LỌC +</div>
                
            </div> -->

            <!-- <div class="col-xs-6">
                <div class="frl">
                    <p class="flr">Tuỳ chọn sắp xếp sản phẩm</p> 
                    <div class="switch flr">
                        <a class="sub-active flr" href="javascript:void(0)" onclick="col3()" >
                            <span class="line-col"></span>
                            <span class="line-col"></span>
                            <span class="line-col"></span>
                        </a>
                        <a class="sub-active  active flr" href="javascript:void(0)" onclick="col4()" >
                            <span class="line-col"></span>
                            <span class="line-col"></span>
                            <span class="line-col"></span>
                            <span class="line-col"></span>
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="content-boloc hiden col-xs-12">
                    <div class="pro-tab">
                        <h2>GIÁ</h2>
                        <label >
                            <input type="checkbox" onclick="price('0-400000')" <?= $_SESSION['price']=='0-400000' ? 'checked' : '' ?> > <span class="checkmark"></span>
                            < 400.000
                        </label><br>
                        <label > 
                            <input type="checkbox" onclick="price('400000-600000')" <?= $_SESSION['price']=='400000-600000' ? 'checked' : '' ?> > <span class="checkmark"></span>
                            400.000 - 600.000
                        </label><br>
                        <label > 
                            <input type="checkbox" onclick="price('600000-900000')" <?= $_SESSION['price']=='600000-900000' ? 'checked' : '' ?> > <span class="checkmark"></span>
                        600.000 - 900.000</label><br>
                        <label > 
                            <input type="checkbox" onclick="price('900000-0')" <?= $_SESSION['price']=='900000-0' ? 'checked' : '' ?> > <span class="checkmark"></span>
                        > 900.000</label><br>
                           
                        
                    </div>
                    <div class="pro-tab">
                        <h2>Màu sắc</h2>
                        <div class="y-scroll">
                            <?php foreach ($mau_sac as $item) { ?>
                            <label >
                            <input type="checkbox" onclick="attribute('1', '<?= $item['id'] ?>')" <?= in_array($item['id'], $_SESSION['attribute']) ? 'checked' : '' ?> > <span class="checkmark"></span>
                                <?= $item['name'] ?>
                            </label><br>
                            <?php } ?>
                        </div>
                           
                        
                    </div>

                    <div class="pro-tab">
                        <h2>Kích cỡ</h2>     
                        <div class="y-scroll">
                            <?php 
                            foreach ($kich_co as $tt_v) { 
                                $value_tt = $action->getDetail('thuoc_tinh_value', 'id', $tt_v);
                            ?>
                            <label >
                            <input type="checkbox" onclick="attribute('2', '<?= $tt_v ?>')" <?= in_array($tt_v, $_SESSION['attribute']) ? 'checked' : '' ?> > <span class="checkmark"></span>
                                <?= $value_tt['name'] ?>
                            </label><br>
                            <?php } ?>
                        </div>                   
                    </div>
                    <div class="pro-tab">
                        <h2>Loại dây đeo</h2>
                        <div class="y-scroll">
                            <?php 
                            foreach ($day_deo as $tt_v) { 
                                $value_tt = $action->getDetail('thuoc_tinh_value', 'id', $tt_v);
                            ?>
                            <label >
                            <input type="checkbox" onclick="attribute('3', '<?= $tt_v ?>')" <?= in_array($tt_v, $_SESSION['attribute']) ? 'checked' : '' ?> > <span class="checkmark"></span>
                                <?= $value_tt['name'] ?>
                            </label><br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="pro-tab">
                        <h2>Kiểu khóa</h2> 
                        <div class="y-scroll">
                            <?php 
                            foreach ($kieu_khoa as $tt_v) { 
                                $value_tt = $action->getDetail('thuoc_tinh_value', 'id', $tt_v);
                            ?>
                            <label >
                            <input type="checkbox" onclick="attribute('4', '<?= $tt_v ?>')" <?= in_array($tt_v, $_SESSION['attribute']) ? 'checked' : '' ?> > <span class="checkmark"></span>
                                <?= $value_tt['name'] ?>
                            </label><br>
                            <?php } ?>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="butotoe">
                        <a href="javascript:void(0)">Hoàn tất</a>
                       
                    </div>
                    <p onclick="clear_checkbox()" style="text-decoration: underline; text-align: center;margin-top: 5px; cursor: pointer;">Bỏ chọn</p>
                </div>
            <div class="row page-productcat" style="display: flex;flex-wrap: wrap;">

                <?php 

                $d = 0;

                foreach ($rows['data'] as $item) {

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
                    // var_dump($item['vip']);

                    $so_anh = count(json_decode($item['product_sub_img'])) + 1;

                    $date1 = new DateTime($now);   
                    $date2 = new DateTime($item['ngay_dang']);   
                    $interval = $date1->diff($date2);
                    $day = $interval->d." ngày";
                ?>

                <div class="col-xs-12 item">
                        <a href="/<?= $item['friendly_url'] ?>" title="" class="title"><?= $item['product_name'] ?></a>
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
                        <div class="row m-5">
                            <div class="col-xs-4 p-5">
                                <div style="position: relative;">
                                    <i class="fa fa-heart-o yeu-thich" id="yeu-thich-<?= $item['product_id'] ?>" onclick="yeu_thich(<?= $item['product_id'] ?>)"></i>
                                </div>
                                <a href="/<?= $item['friendly_url'] ?>" title="">
                                    <img src="/images/<?= $item['product_img'] ?>" alt="tin" class="w100">
                                    <div class="so-anh">
                                        <i class="fa fa-image"></i> <?= $so_anh ?>
                                    </div>
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
                                <div>
                                                <p><?= $day ?></p>
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

            <?php include DIR_EMAIL."MS_EMAIL_CHONHADAT_0002.php";?>


            <?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0003.php";?>

            <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0006.php";?>

            <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0002.php";?>

            <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0005.php";?>

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