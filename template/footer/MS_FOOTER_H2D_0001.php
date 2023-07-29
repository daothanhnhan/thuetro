<style>
.footer-app {
    width: 100px;
}
footer .icon-social ul li {
    display: inline-block;
    list-style: none;
}
footer .icon-social ul li img {
    width: 20px;
    margin: 10px;
}
footer .top-tieu-de b {
    font-size: 11px;
}
footer .footer-bg-se {
    margin-top: 30px;
}

footer .icon-footer li {
    margin-bottom: 0;
}
</style>
<footer style="position: relative;">
    <div class="container">
        <div class="header-top">
            <p><img src="/images/new.gif" style="width: auto;"><b> Hỗ trợ đăng tin: <span><?= $rowConfig['content_home3'] ?> - <?= $rowConfig['content_home6'] ?></span></b></p>
            <p>Thời gian làm việc: <span>08h00 - 17h00 (từ thứ Hai - thứ Bảy)</span> | Email: <span><?= $rowConfig['content_home2'] ?></span> | <span><b><?= $_SERVER['SERVER_NAME'] ?></b></span></p>
        </div>
        <div class="col-xs-8" style="padding-top: 10px;">
            <div class="row top-tieu-de">
                <div class="col-xs-3"><b>NHÀ ĐẤT BÁN</b></div>
                <div class="col-xs-3"><b>NHÀ ĐẤT CHO THUÊ</b></div>
                <div class="col-xs-2"><b>KHUYẾN MẠI</b></div>
                <div class="col-xs-4"><b>BẤT ĐỘNG SẢN VIỆT NAM</b></div>
                <hr>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <ul>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=101&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Nhà bán</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=104&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Biệt thự bán</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=105&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Căn hộ chung cư bán</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=109&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Khách sạn, shop bán</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=114&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Đất nền bán</a></li>
                    </ul>
                </div>
                <div class="col-xs-3">
                    <ul>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=101&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Nhà cho thuê</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=107&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Văn phòng cho thuê</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=106&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Phòng trọ cho thuê</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=105&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Căn hộ chung cư cho thuê</a></li>
                        <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=108&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="">Cho thuê kho, xưởng</a></li>
                    </ul>
                </div>
                <div class="col-xs-3">
                    <ul>
                        <!-- <li><a href="" title="">Bán đất TP. Hồ Chí Minh</a></li> -->
                        <!-- <li><a href="" title="">Bán đất Hà Nội</a></li> -->
                        <!-- <li><a href="" title="">Nhà bán</a></li>
                        <li><a href="" title="">Nhà bán</a></li>
                        <li><a href="" title="">Nhà bán</a></li> -->
                        <li><a href="/khuyen-mai-thang" title="">Khuyến mãi tháng</a></li>
                        <li><a href="/khuyen-mai-dip-nghi-le-tet" title="">Khuyến mãi dịp nghỉ lễ, tết</a></li>

                    </ul>
                    <!-- <div style="border: 0px solid #fff;padding: 5px;">
                        <p style="font-size: 9px;margin-bottom: 0;">Batdongsanvietnam.shop có trách nhiệm chuyển tải thông tin. Không chịu bất kỳ trách nhiệm nào từ các tin này. <a href="" title="" style="color: #ffeb3b;">Xem chi tiết điều khoản</a></p>
                    </div> -->
                </div>
                <div class="col-xs-3">
                    <ul>
                        <li><a href="/mua-ban-nha-dat" title="">Mua bán nhà đất</a></li>
                        <li><a href="/quy-dinh-dang-tin" title="">Quy định đăng tin</a></li>
                        <li><a href="/quy-che-hoat-dong" title="">Quy chế hoạt động</a></li>
                        <li><a href="/bao-mat-thong-tin" title="">Bảo mật thông tin</a></li>
                        <li><a href="/giai-quyet-khieu-nai" title="">Giải quyết khiếu nại</a></li>
                        <li><a href="/ban-do-quy-hoach" title="">Bản đồ quy hoạch</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-4 text-center" style="">
            <div class="row footer-bg-se">
                <p class="text-ho-tro">Hỗ trợ khách hàng</p>
                <!-- <p><?= $rowConfig['content_home3'] ?></p> -->
                <p><?= $rowConfig['content_home7'] ?></p>
                <!-- <p><?= $rowConfig['content_home3'] ?></p> -->
                <p>Email liên hệ: <?= $rowConfig['content_home2'] ?></p>
                <p>© Copyright 2017 All rights reserved. Design by cafelink.org</p>
                <!-- <a><img src="/images/app-android.png" alt="app" class="footer-app"></a>
                <a><img src="/images/app-ios.png" alt="app" class="footer-app"></a> -->
            </div>
            
        </div>

        <div class="col-xs-12">
            <hr>
        </div>

        <div class="col-xs-8 text-left">
            
            <p><b>Công ty TNHH Dịch vụ Thương mại Điện tử và Quảng cáo Chợ Việt</b></p>
            <p><?= $rowConfig['content_home1'] ?></p>
            <p>Địa chỉ: Tầng 12, Tòa nhà Licogi 13, 164 Khuất Duy Tiến, Phường Nhân Chính, Quận Thanh Xuân, Hà Nội, Việt Nam.</p>
            <p>Mã số thuế: 0110368300 được Sở Kế hoạch và Đầu tư thành phố Hà Nội cấp ngày 29/05/2023.</p>
            <p>© Copyright 2017 All rights reserved. Design by cafelink.org</p>
            <div>
                <img src="/images/855a403340c69098c9d7.jpg" alt="qr" style="width: 150px;">
            </div>
            <div style="border: 0px solid #fff;padding: 5px;margin-bottom: 10px;">
                        <p style="font-size: 12px;margin-bottom: 0;"><?= $_SERVER['SERVER_NAME'] ?> có trách nhiệm chuyển tải thông tin. Không chịu bất kỳ trách nhiệm nào từ các tin này. <a href="" title="" style="color: #ffeb3b;">Xem chi tiết điều khoản</a></p>
                    </div>
        </div>
        <div class="col-xs-4">
            
            <a href="" title=""><img src="/images/logoSaleNoti.png" alt="bộ công thương" style="width: 150px;"></a>
            <div>
                <a><img src="/images/app-android.png" alt="app" class="footer-app"></a>
                <a><img src="/images/app-ios.png" alt="app" class="footer-app"></a>
            </div>
            
            <div class="icon-social text-left" style="margin-right: 50px;">
                <ul style=";margin-left: 0;" class="icon-footer">
                    <li><a href="" title=""><img src="/images/fb_icon.png" alt="facebook"></a></li>
                    <li><a href="" title=""><img src="/images/youtube.png" alt="youtube"></a></li>
                    <li><a href="" title=""><img src="/images/Logo_Zalo.png" alt="zalo"></a></li>
                    <li><a href="" title=""><img src="/images/tiktok.png" alt="zalo"></a></li>
                    <li><a href="" title=""><img src="/images/Twitter-logo.png" alt="zalo"></a></li>
                </ul>
            </div>
            
        </div>
    </div>
    <!-- <a href="" title=""><img src="/images/logoSaleNoti.png" alt="bộ công thương" style="position: absolute;bottom: 40px;right: 20px;width: 150px;"></a>
    <div class="icon-social text-right" style="margin-right: 50px;">
                <ul>
                    <li><a href="" title=""><img src="/images/fb_icon.png" alt="facebook"></a></li>
                    <li><a href="" title=""><img src="/images/youtube.png" alt="youtube"></a></li>
                    <li><a href="" title=""><img src="/images/Logo_Zalo.png" alt="zalo"></a></li>
                    <li><a href="" title=""><img src="/images/tiktok.png" alt="zalo"></a></li>
                    <li><a href="" title=""><img src="/images/Twitter-logo.png" alt="zalo"></a></li>
                </ul>
            </div> -->
</footer>

<img src="/images/t01-fixSize-fix.jpg" alt="banner" style="position: fixed;top: 100px;left: 150px;width: 200px;z-index: 999999;" class="hidden-xs hidden-sm banner-ben-1">
<img src="/images/t02-fixSize-fix.jpg" alt="banner" style="position: fixed;top: 100px;right: 150px;width: 200px;z-index: 999999;" class="hidden-xs hidden-sm banner-ben-2">
<style>
@media screen and (max-width: 1600px) {
    .banner-ben-1 {
        left: 10px !important;
        width: 100px !important;
    }
    .banner-ben-2 {
        right: 10px !important;
        width: 100px !important;
    }
}
</style>

<script>
    function yeu_thich (product_id) {
        // alert(product_id);
        document.getElementById("yeu-thich-"+product_id).classList.add("color-red");;
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("demo").innerHTML = this.responseText;
                // alert(this.responseText);
            }
          xhttp.open("GET", "/functions/ajax/yeu-thich.php?product_id="+product_id, true);
          xhttp.send();
    }
</script>