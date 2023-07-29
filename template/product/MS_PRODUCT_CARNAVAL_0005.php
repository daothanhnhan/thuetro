<?php 
    $limit = 12;                                                                           
   function search ($lang, $trang, $limit) {
        if (isset($_POST['q'])) {
            $q = $_POST['q'];
            $q = trim($q);
            $q = vi_en1($q);            
        } else {
            $q = $_GET['search'];
            // $q = str_replace('-', ' ', $q);
        }

        $start = $trang * $limit;
        global $conn_vn;
        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' ORDER BY product.product_id DESC";
        $result = mysqli_query($conn_vn, $sql);
        $count = mysqli_num_rows($result);
        // echo $sql;

        $sql = "SELECT * FROM product_languages INNER JOIN product ON product_languages.product_id = product.product_id WHERE product_languages.friendly_url like '%$q%' And product_languages.languages_code = '$lang' ORDER BY product.product_id DESC LIMIT $start,$limit";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $return = array(
                'data' => $rows,
                'count' => $count,
                'q' => $q
            );
        return $return;
    }
    $rows = search($lang, $trang, $limit);//var_dump($rows['count']);die;
?>
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
<div class="gb-page-sanpham_ruouvang">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6" style="display: none;">
                <div class="boloc">BỘ LỌC +</div>
                
            </div>

            <div class="col-md-12">
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
            </div>
            <div class="content-boloc hiden col-md-12">
                    <div class="pro-tab">
                        <h2>GIÁ</h2>
                        <label >
                            <input type="checkbox"> <span class="checkmark"></span>
                            < 400.000
                        </label><br>
                        <label > 
                            <input type="checkbox"> <span class="checkmark"></span>
                            400.000 - 600.000
                        </label><br>
                        <label > <input type="checkbox"> <span class="checkmark"></span>
                        600.000 - 900.000</label><br>
                        <label > <input type="checkbox"> <span class="checkmark"></span>
                        > 900.000</label><br>
                           
                        
                    </div>
                    <div class="pro-tab">
                        <h2>Màu sắc</h2>
                        <div class="y-scroll">
                            <label >
                            <input type="checkbox"> <span class="checkmark"></span>
                                Đen
                            </label><br>
                            <label > 
                                <input type="checkbox"> <span class="checkmark"></span>
                                Đỏ
                            </label><br>
                            <label>
                                <input type="checkbox"> <span class="checkmark"></span>
                                Tím
                            </label>
                            <br>
                            <label>
                                <input type="checkbox"> <span class="checkmark"></span>Vàng
                            </label><br>

                            <label> 
                                <input type="checkbox"> <span class="checkmark"></span>
                                Xanh
                            </label><br>
                            <label>
                                <input type="checkbox"> <span class="checkmark"></span>
                                Xám
                            </label>
                            <br>
                            <label>
                                <input type="checkbox"> <span class="checkmark"></span>Hồng
                            </label><br>
                            </div>
                           
                        
                    </div>

                    <div class="pro-tab">
                        <h2>Kích cỡ</h2>                        
                    </div>
                    <div class="pro-tab">
                        <h2>Loại dây đeo</h2>
                    </div>
                    <div class="pro-tab">
                        <h2>Kiểu khóa</h2> 
                    </div>
                    <div style="clear: both;"></div>
                    <div class="butotoe">
                        <a href="javascript:void(0)">Hoàn tất</a>
                       
                    </div>
                    <p onclick="clear_checkbox()" style="text-decoration: underline; text-align: center;margin-top: 5px; cursor: pointer;">Bỏ chọn</p>
                </div>
            <div class="row" style="display: flex;flex-wrap: wrap;">

                <?php 

                $d = 0;

                foreach ($rows['data'] as $item) {

                    $d++;

                    $row = $item;

                    $rowLang = $action_product->getProductLangDetail_byId($item['product_id'],$lang);

                ?>

                <div class="col-sm-3 change-col item-load" style="display: ;">

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

                <?php

                    // if ($d%4==0) {

                    //     echo '<hr style="width:100%;border:0;" />';

                    // }

                }

                ?>
            
        </div>
        <div style="text-align: center;"><?php 
                    $config = array(
                        'current_page'  => $trang+1, // Trang hiện tại
                        'total_record'  => $rows['count'], // Tổng số record
                        'total_page'    => 1, // Tổng số trang
                        'limit'         => $limit,// limit
                        'start'         => 0, // start
                        'link_full'     => '',// Link full có dạng như sau: domain/com/page/{page}
                        'link_first'    => '',// Link trang đầu tiên
                        'range'         => 9, // Số button trang bạn muốn hiển thị 
                        'min'           => 0, // Tham số min
                        'max'           => 0,  // tham số max, min và max là 2 tham số private
                        'search'        => str_replace(' ', '-', $rows['q'])

                    );

                    $pagination = new Pagination;
                    $pagination->init($config);
                    echo $pagination->htmlPaging1();
                ?>
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