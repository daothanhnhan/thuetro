<?php 
    $sidebar_procat = $action_product->getProductCat_byProductCatIdParentSort(0, 'asc');
?>
<div class="gb-danhmucsanpham_cuanhom widget-sidebar">
    <aside class="widget">
        <h3 class="widget-title-sidebar-cuanhom">Danh mục sản phẩm</h3>
        <div class="widget-content">
            <div class="accordion-default">
                <ul class="accordion">
                    <!-- <li><a href="">Quà tặng các dịp lễ tết</a></li>
                    <li class=""><a href="">Sổ da các loại </a></li>
                    <li class=""><a href="">Bút các loại</a></li>
                    <li class=""><a href="">Balo, Túi vải các loại</a></li>

                    <li class="accordion-toggle"><a href="">Ô dù</a></li>
                    <ul class="accordion-content">
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô 3 gập tự động 2 chiều</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô 3 gập không tự động</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô 2 gập bán tự động</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô 5 gập mini</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô gold</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô cán thẳng</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Ô 2 tầng</a></li>
                        <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Các loại ô khác</a></li>
                    </ul>

                    <li class=""><a href="">Đồ gốm sứ</a></li>
                    <li class=""><a href="">Đồ Thủy tinh</a></li>
                    <li class=""><a href="">Đồng phục may mặc, mũ, áo</a></li>
                    <li class=""><a href="">Huy hiệu, biển tên</a></li>
                    <li class=""><a href="">Các sản phẩm khác</a></li> -->
                    <?php 
                    foreach ($sidebar_procat as $item) {
                        $row = $item;
                        $rowLang = $action_product->getProductCatLangDetail_byId($item['productcat_id'], $lang); 
                        $sidebar_procat_sub = $action_product->getProductCat_byProductCatIdParentSort($item['productcat_id'], 'asc');
                        if (empty($sidebar_procat_sub)) {

                        echo '<li class=""><a href="/'.$rowLang['friendly_url'].'">'.$rowLang['lang_productcat_name'].'</a></li>';

                        } else { 
                        echo '<li class="accordion-toggle"><a href="/'.$rowLang['friendly_url'].'">'.$rowLang['lang_productcat_name'].'</a></li>';
                        echo '<ul class="accordion-content">';
                        foreach ($sidebar_procat_sub as $item_sub) {
                            $rowLang_sub = $action_product->getProductCatLangDetail_byId($item_sub['productcat_id'], $lang);
                            echo '<li><a href="/'.$rowLang_sub['friendly_url'].'"><i class="fa fa-angle-right" aria-hidden="true"></i>'.$rowLang_sub['lang_productcat_name'].'</a></li>';
                        }
                        echo '</ul>';
                        }
                    ?>
                    
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
</div>

<script>
    $(document).ready(function () {
        $('.accordion-default .accordion .accordion-toggle').on('click', function (e) {
            $(this).next().slideToggle('600');
            $(".accordion-content").not($(this).next()).slideUp('600');
            $(this).toggleClass('active').siblings().removeClass('active');
        });
    });
</script>