<?php                                                                          
    $admin_role = 2;
    $moi_gioi = 1;
    $rows = $action->getList_New('admin', array('admin_role', 'moi_gioi'), array(&$admin_role, &$moi_gioi), array('admin_id'), array('desc'), 'ii', $trang, '10', $_GET['page'], $_GET['page']);
?>

<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
<?php //include DIR_EMAIL."MS_EMAIL_CHONHADAT_0001.php";?>
<style>
.nha-moi-gioi p {
    margin-bottom: 5px;
}
.nha-moi-gioi a {
    margin-bottom: 5px;
    display: block;
    font-weight: bold;
}
.nha-moi-gioi .ten {
    font-weight: bold;
    color: blue;
}
.nha-moi-gioi .phone {
    color: #bd0707;
    font-weight: bold;
}
</style>
<div class="gb-page-sanpham_ruouvang home-tin-now nha-moi-gioi">

    <div class="container">

        <div class="col-xs-8">

            
            <div class="row" style="display: flex;flex-wrap: wrap;">

                <?php 

                $d = 0;

                foreach ($rows['data'] as $item) {

                    $d++;

                    $row = $item;

                    // $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);

                    $anh = '/images/no-avatar.jpg';
                    if (!empty($item['image'])) {
                        $anh = '/images/portrait/'.$item['image'];
                    }

                    $city = $action->getDetail('city', 'id', $item['city_id'])['name'];
                    $district = $action->getDetail('district', 'id', $item['district_id'])['name'];
                ?>

                <div class="col-xs-12 item">
                        <a href="/<?= $item['friendly_url'] ?>" title="" class="title"><?= $item['product_name'] ?></a>
                        <div class="row m-5">
                            <div class="col-xs-4 p-5">
                                <a href="/nha-moi-gioi-chi-tiet/<?= $item['admin_id'] ?>" title="">
                                    <img src="<?= $anh ?>" alt="tin" class="w100">
                                </a>
                            </div>
                            <div class="col-xs-8 p-5">
                                <div class="des hidden">
                                </div>
                                <p class="ten"><i class="fa fa-user"></i> <?= $item['admin_name'] ?></p>
                                <a href="tel:<?= $item['admin_phone'] ?>" title=""><i class="fa fa-phone-square" style="transform: rotate(90deg);"></i> <span class="phone"><?= $item['admin_phone'] ?></span></a>
                                <p><i class="fa fa-map-signs"></i> <?= $district ?>, <?= $city ?></p>
                                <a href="/nha-moi-gioi-chi-tiet/<?= $item['admin_id'] ?>" title="">Xem trang cá nhân</a>
                                <p><?= $item['note'] ?></p>
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

            <?php include DIR_EMAIL."MS_EMAIL_CHONHADAT_0003.php";?>


            <?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0004.php";?>

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