<?php 
    $footer_dich_vu = $action ->getList('service','','','service_id','desc','','','');
 ?>
<script type="text/javascript">
function load_url(id, name, price) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("demo").innerHTML = this.responseText;
            // alert(this.responseText);
            // alert('thanh cong.');
            // window.location.href = "/gio-hang";
            if (confirm('Thêm sản phẩm thành công, bạn có muốn thanh toán luôn không')) {
                window.location = '/gio-hang';
            } else {
                location.reload();
            }
        }
    };
    xhttp.open("POST", "/functions/ajax-add-cart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("product_id=" + id + "&product_name=" + name + "&product_price=" + price + "&product_quantity=1&action=add");
    xhttp.send();
}
</script>
<style>
footer .dich-vu {
    /*text-transform: lowercase;*/
    line-height: 20px !important;
    display: inline-block;
    margin-bottom: 6px;
}
/*footer a::first-letter {
     text-transform: capitalize;
     color: red !important;
}*/
</style>
<footer class="site-footer footer-default">
    <div class="footer-main-content_ruouvang">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <!-- <div class="widget-title-footer-ruouvang uni-uppercase footer-logo_ruouvang"><img src="/images/logo.png" alt="" class="img-responsive"></div> -->
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <h2><?= $lang=='vn' ? 'VỀ CHÚNG TÔI' : 'ABOUT US' ?> </h2>
                                    <ul class="hidden">
                                        <li><a href="/ve-chung-toi"><?= $lang=='vn' ? 'Giới thiệu' : 'Introduce' ?></a></li>
                                        <li><a href="/thanh-vien"><?= $lang=='vn' ? 'Thành viên' : 'Member' ?></a></li>
                                        <li><a href="/nghien-cuu"><?= $lang=='vn' ? 'Nghiên cứu' : 'Research' ?></a></li>
                                        <!-- <li><span>Skype: </span> hang.vpms</li> -->
                                    </ul>
                                    <div style="color: #fff;line-height: 25px;font-size: 14px;">
                                        <?= $rowConfig['web_email'] ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <!-- <div class="widget-title-footer-ruouvang uni-uppercase footer-logo_ruouvang"><img src="/images/logo.png" alt="" class="img-responsive"></div> -->
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <h2><?= $lang=='vn' ? 'Thông tin liên hệ' : 'Contact Info' ?></h2>
                                    <ul>
                                        <li><?= $lang=='vn' ? 'Địa chỉ trụ sở' : 'Address' ?>:
                                            <?=$rowConfig_lang['lang_content_home1']?>
                                        </li>
                                        <li><?= $lang=='vn' ? 'Số điện thoại' : 'Tel' ?>:
                                            <?=$rowConfig_lang['lang_content_home3']?>
                                        </li>
                                        <li>Email:
                                            <?=$rowConfig['content_home2']?>
                                        </li>
                                        <!-- <li>Website:
                                            https://hdslaw.vn
                                        </li> -->
                                    </ul>
                                    <?php include DIR_SOCIAL."MS_SOCIAL_H2D_0002.php";?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <!-- <div class="widget-title-footer-ruouvang uni-uppercase footer-logo_ruouvang"><img src="/images/logo.png" alt="" class="img-responsive"></div> -->
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <h2><?= $lang=='vn' ? 'Fanpage' : 'Service' ?></h2>
                                    <ul class="hidden">
                                        <?php 
                                        foreach ($footer_dich_vu as $item) { 
                                            $service_lang = $action->getDetail_New('service_languages', array('service_id', 'languages_code'), array($item['service_id'], $lang), '');
                                        ?>
                                        <li><a class="dich-vu" href="/<?= $service_lang['friendly_url'] ?>" title="<?= $service_lang['lang_service_name'] ?>"><?= $service_lang['lang_service_name'] ?></a></li>
                                        <?php } ?>
                                        
                                    </ul>
                                    <div>
                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkyguibannhadatbuonmathuot&tabs=timeline&width=300&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=484851048588987" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                        
                                    </div>

                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <!-- <div class="widget-title-footer-ruouvang uni-uppercase footer-logo_ruouvang"><img src="/images/logo.png" alt="" class="img-responsive"></div> -->
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <h2><?= $lang=='vn' ? 'Bản đồ' : 'Map' ?></h2>
                                    
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1946.235042535703!2d108.08862240817903!3d12.682711797761465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7aea74537cb%3A0x5b4ed6930e1f1d0b!2zQ2jhu6MgVMOibiBQaG9uZw!5e0!3m2!1svi!2s!4v1646377340396!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <!-- <a href="https://www.facebook.com/kyguibannhadatbuonmathuot"><img src="/images/icons/fb.png" alt="" style="width: 35px;border-radius: 50%;"></a> -->
                                    <!-- <a><img src="/images/icons/Zalo.png" alt="" style="width: 35px;border-radius: 50%;margin-left: 10px;"></a> -->
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scrolltoTop">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </div>
</footer>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        $(".scrolltoTop").css("display", "inline");
    } else {
        $(".scrolltoTop").css("display", "none");
    }
}

// When the user clicks on the button, scroll to the top of the document
$('.scrolltoTop').on("click", function() {
    $('html, body').animate({ scrollTop: 0 }, 'slow');
});
</script>