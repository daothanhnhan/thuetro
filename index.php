<?php
//phpinfo();die;
session_start();
ob_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$folder = dirname(__FILE__);
include_once('config.php');
include_once('__autoload.php');
$action = new action();
include_once dirname(__FILE__).DIR_FUNCTIONS."database.php";
// $urlAnalytic = $action->showabc();    
include_once dirname(__FILE__).DIR_FUNCTIONS_PAGING."pagination.php";
include_once 'functions/phpmailer/class.smtp.php';
include_once 'functions/phpmailer/class.phpmailer.php';
include_once "functions/vi_en.php";
// // LÀM RÕ NHỮNG THƯ VIỆN NÀY
// // include_once('lib/vi_en.php');
// // include_once('lib/nganLuong/NL_Checkoutv3.php');

// // LÀM RÕ Install Cart

// Install MultiLanguage
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE."lang_config.php";
include_once dirname(__FILE__).DIR_FUNCTIONS_LANGUAGE.$lang_file;
// Install Friendly Url
include_once dirname(__FILE__).DIR_FUNCTIONS_URL."url_config.php";
// Configure Website
include_once dirname(__FILE__).DIR_FUNCTIONS."website_config.php";
// echo $translate['link_contact'];die;
$trang = isset($_GET['trang']) ? $_GET['trang'] : '1';
// $action = new action();
$cart = new action_cart();
$menu = new action_menu();
$action_product = new action_product();
$action_news = new action_news();
$action_page = new action_page();
$action_service = new action_service();

if($lang == "vn"){
    $rowConfig_lang = $action->getDetail('config_languages','id',1);
}else{
    $rowConfig_lang = $action->getDetail('config_languages','id',2);
}


$rowConfig = $action->getDetail('config','config_id',1);
/////////////
$set_vip_now = date('Y-m-d H:i:s');
$sql = "UPDATE product SET vip = 0 WHERE vip != 0 AND ngay_vip < '$set_vip_now'";
// echo $sql;
$result = mysqli_query($conn_vn, $sql);
/////////////
$set_vip_now = date('Y-m-d H:i:s');
$sql = "UPDATE service SET vip = 0 WHERE vip != 0 AND ngay_vip < '$set_vip_now'";
// echo $sql;
$result = mysqli_query($conn_vn, $sql);
/////////////
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $meta_des ?>">
    <meta name="keywords" content="<?= $meta_key ?>">
    <!-- <meta name="google-site-verification" content="72HO8qMw04xRlO8a31YWsNRngawj9cbpkD2xY6JlGQs" /> -->
    <title>
        <?= $title ?>
    </title>
    <link rel="icon" href="/images/<?= $rowConfig['icon_web'] ?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/plugin/bootstrap/css/bootstrap-theme.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css'>
    <link rel="stylesheet" href="/plugin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style-h2d.css">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/style2.css">
    <script src="/plugin/jquery/jquery-2.0.2.min.js"></script>
    <script src="/plugin/bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/490a9b3f2f.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- 
<style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed; right: 24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 50px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size:13px;}</style> -->
<!--     <div class="fb-livechat">
        <div class="ctrlq fb-overlay">
        </div>
        <div class="fb-widget">
            <div class="ctrlq fb-close">
            </div>
            <div class="fb-page" data-href="https://www.facebook.com/hds.lawfirm/" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false">
            </div>
            <div id="fb-root">
            </div>
        </div>
        <a href="https://www.facebook.com/hds.lawfirm/" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
            <div class="bubble">1</div>
            <div class="bubble-msg">Chat Facebook với Chúng tôi</div>
        </a>
    </div> -->
<!--     <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>$(document).ready(function(){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script> -->
<div class="content-main">
    <?php include_once dirname(__FILE__).DIR_THEMES."header.php";?>
    <div class="gb-content">
        <?php
    if (isset($_GET['page'])){

        $urlAnalytic = $action->getTypePage_byUrl($_GET['page'],$lang);
        // echo $urlAnalytic;
        switch ($urlAnalytic) {

            case 'tin-tuc':
                $title = 'Tin tức';
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;

            case 'news':
                $title = 'News';
                include_once dirname(__FILE__).DIR_THEMES."tintuc.php"; break;

            case 'search-news':
                include_once dirname(__FILE__) . DIR_THEMES . "search-news.php";break;

            case 'dich-vu':
                $title = 'DỰ ÁN NHÀ ĐẤT';
                include_once dirname(__FILE__) . DIR_THEMES . "dich-vu.php";break;

            case 'services':
                $title = 'PRACTICE';
                include_once dirname(__FILE__) . DIR_THEMES . "dich-vu.php";break;

            case 'service_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "chi-tiet-dich-vu.php";break;

            case 'newscat_languages':
                include_once dirname(__FILE__) . DIR_THEMES . "tintuc.php";break;

            case 'news_languages':

                include_once dirname(__FILE__).DIR_THEMES."chitiettintuc.php"; break;
            case 'lien-he':
                $title = 'Liên hệ';
                if ($lang=='vn') { $title = 'Liên hệ'; } else { $title = 'Contact'; }
                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;

            case 'contact':
                $title = 'Contact';
                if ($lang=='vn') { $title = 'Liên hệ'; } else { $title = 'Contact'; }
                include_once dirname(__FILE__).DIR_THEMES."lienhe.php"; break;

            case 'gio-hang':

                include_once dirname(__FILE__).DIR_THEMES."giohang.php"; break;

            case 'khuyen-mai':

                include_once dirname(__FILE__).DIR_THEMES."khuyenmai.php"; break;

            case 'san-pham':
                $title = 'Sản phẩm';
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;

            case 'productcat_languages':
                include_once dirname(__FILE__).DIR_THEMES."sanpham.php"; break;

            case 'search-product':
                include_once dirname(__FILE__).DIR_THEMES."search-product.php";break;

            case 'price':
                include_once dirname(__FILE__) . DIR_THEMES . "price.php";break;

            case 'hang-thanh-ly':

                include_once dirname(__FILE__).DIR_THEMES."hangthanhly.php"; break;

            case 'thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."cart-payment.php"; break;
            case 'product_languages':

                include_once dirname(__FILE__).DIR_THEMES."chitietsanpham.php"; break;
            case 'huong-dan-dat-hang':

                include_once dirname(__FILE__).DIR_THEMES."huongdanmuahang.php"; break;
            case 'huong-dan-thanh-toan':

                include_once dirname(__FILE__).DIR_THEMES."cachthucthanhtoan.php"; break;

            case 'chinh-sach-van-chuyen':

                include_once dirname(__FILE__).DIR_THEMES."chinhsachvanchuyen.php"; break;
            case 'page_language':

                include_once dirname(__FILE__).DIR_THEMES."gioithieu.php"; break;

            case 'san-pham-moi':
                $title = 'Sản phẩm mới';
                include_once dirname(__FILE__) . DIR_THEMES."san-pham-moi.php";break;

            case 'san-pham-khuyen-mai':
                $title = 'Sản phẩm khuyến mãi';
                include_once dirname(__FILE__) . DIR_THEMES."san-pham-khuyen-mai.php";break;

            case 'san-pham-ban-chay':
                $title = 'Sản phẩm bán chạy';
                include_once dirname(__FILE__) . DIR_THEMES."san-pham-ban-chay.php";break;

            case 'san-pham-noi-bat':
                $title = 'Sản phẩm nổi bật';
                include_once dirname(__FILE__) . DIR_THEMES."san-pham-noi-bat.php";break;

            case 'dang-nhap':
                include_once dirname(__FILE__) . DIR_THEMES . "dangnhap.php";break;

            case 'dang-ky':
                include_once dirname(__FILE__) . DIR_THEMES . "dangnhap.php";break;

            case 'dang-xuat':
                include_once dirname(__FILE__) . DIR_THEMES . "dangxuat.php";break;

            case 'thong-tin-tai-khoan':
                include_once dirname(__FILE__) . DIR_THEMES . "thong-tin-ca-nhan.php";break;

            case 'thong-tin-ca-nhan':
                include_once dirname(__FILE__) . DIR_THEMES . "thong-tin-ca-nhan.php";break;

            case 'don-hang':
                include_once dirname(__FILE__) .DIR_THEMES . "cart.php";break;
            case 'chi-tiet-don-hang':
                include_once dirname(__FILE__) .DIR_THEMES . "cart-detail.php";break;

            case 'doi-mat-khau':
                include_once dirname(__FILE__) . DIR_THEMES . "doi-mat-khau.php";break;

            case 'tim-kiem':
                include_once dirname(__FILE__) . DIR_THEMES . "tim-kiem.php";break;

            case 'dang-bai':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-bai.php";break;

            case 'dang-tin':
                include_once dirname(__FILE__) . DIR_THEMES . "dang-tin.php";break;

            case 'sua-tin':
                include_once dirname(__FILE__) . DIR_THEMES . "sua-tin.php";break;

            case 'xoa-tin':
                include_once dirname(__FILE__) . DIR_THEMES . "xoa-tin.php";break;

            case 'home':
                include_once dirname(__FILE__) . DIR_THEMES . "home.php";break;

            case 'home-hot':
                include_once dirname(__FILE__) . DIR_THEMES . "home.php";break;

            case 'mua-goi':
                include_once dirname(__FILE__) . DIR_THEMES . "mua-goi.php";break;

            case 'quan-ly-ca-nhan':
                include_once dirname(__FILE__) . DIR_THEMES . "quan-ly-ca-nhan.php";break;

            case 'tin-da-duyet':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-da-duyet.php";break;

            case 'tin-cho-duyet':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-cho-duyet.php";break;

            case 'tin-tam-dung':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-tam-dung.php";break;

            case 'tin-khong-duoc-duyet':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-khong-duoc-duyet.php";break;

            case 'tin-het-han':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-het-han.php";break;

            case 'tim-du-an':
                $title = "Tìm dự án";
                include_once dirname(__FILE__) . DIR_THEMES . "tim-du-an.php";break;

            case 'ban-do':
                include_once dirname(__FILE__) . DIR_THEMES . "ban-do.php";break;

            case 'nha-moi-gioi':
                $title = "Nhà môi giới";
                include_once dirname(__FILE__) . DIR_THEMES . "nha-moi-gioi.php";break;

            case 'nha-moi-gioi-ban':
                $title = "Nhà môi giới bán";
                include_once dirname(__FILE__) . DIR_THEMES . "nha-moi-gioi-ban.php";break;

            case 'nha-moi-gioi-cho-thue':
                $title = "Nhà môi giới cho thuê";
                include_once dirname(__FILE__) . DIR_THEMES . "nha-moi-gioi-cho-thue.php";break;

            case 'nha-moi-gioi-chi-tiet':
                $title = "Tin nhà môi giới";
                include_once dirname(__FILE__) . DIR_THEMES . "nha-moi-gioi-chi-tiet.php";break;

            case 'tim-nha-moi-gioi':
                $title = "Tìm Nhà môi giới";
                include_once dirname(__FILE__) . DIR_THEMES . "tim-nha-moi-gioi.php";break;

            case 'them-du-an':
                include_once dirname(__FILE__) . DIR_THEMES . "them-du-an.php";break;

            case 'sua-du-an':
                include_once dirname(__FILE__) . DIR_THEMES . "sua-du-an.php";break;

            case 'xoa-du-an':
                include_once dirname(__FILE__) . DIR_THEMES . "xoa-du-an.php";break;

            case 'danh-sach-du-an':
                include_once dirname(__FILE__) . DIR_THEMES . "danh-sach-du-an.php";break;

            case 'mua-goi-du-an':
                include_once dirname(__FILE__) . DIR_THEMES . "mua-goi-du-an.php";break;

            case 'so-du-lich-su-giao-dich':
                include_once dirname(__FILE__) . DIR_THEMES . "so-du-lich-su-giao-dich.php";break;

            case 'mua-luot-up-tin':
                include_once dirname(__FILE__) . DIR_THEMES . "mua-luot-up-tin.php";break;

            case 'thay-doi-mat-khau':
                include_once dirname(__FILE__) . DIR_THEMES . "thay-doi-mat-khau.php";break;

            case 'trang-thong-bao':
                include_once dirname(__FILE__) . DIR_THEMES . "trang-thong-bao.php";break;

            case 'tin-yeu-thich':
                include_once dirname(__FILE__) . DIR_THEMES . "tin-yeu-thich.php";break;
        }
    }
    else include_once dirname(__FILE__).DIR_THEMES."home.php";
    ?>
    </div>
    <?php include_once dirname(__FILE__).DIR_THEMES."footer.php"; ?>
</div>
<script type="text/javascript" src="/functions/language/lang.js"></script>
   <!--  <div id="share_us2">
        <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/hds.lawfirm/%2F&tabs=timeline&width=340&height=212&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=220693348668109" width="340" height="212" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
    </div> -->
    <!-- <style type="text/css">
    #share_us2 {
        position: fixed;
        right: -342px;
        top: 50%;
        width: 390px;
        min-height: 180px;
        background: url(../images/fb11.png) 0 0 no-repeat;
        background-position: left top;
        background-repeat: no-repeat;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        padding: 0px 0px 10px 48px;
        z-index: 99999;
        -webkit-transition: 1s ease;
        -moz-transition: 1s ease;
        -ms-transition: 1s ease;
        -o-transition: 1s ease;
        transition: 1s ease;
    }

    #share_us2:hover {
        position: fixed;
        right: 0px;
        -webkit-transition: 1s ease;
        -moz-transition: 1s ease;
        -ms-transition: 1s ease;
        -o-transition: 1s ease;
        transition: 1s ease;
    }

    #share_us a {
        color: #fff;
    }
    </style> -->
    </div>
  <!--   <a href="tel:0902097644" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="left: 0px; bottom: 0px;" datasqstyle="{&quot;top&quot;:null}" datasquuid="4c643075-c7e6-4adf-8841-746771cfb831" datasqtop="640">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone" style="float: none;"></i></div>
    </a> -->
    <!-- CSS Call -->
    <style type="text/css">
    .suntory-alo-phone {
        background-color: transparent;
        cursor: pointer;
        height: 120px;
        position: fixed;
        transition: visibility 0.5s ease 0s;
        -webkit-transition: visibility 0.5s ease 0s;
        -moz-transition: visibility 0.5s ease 0s;
        width: 120px;
        z-index: 20000000 !important;
    }

    .suntory-alo-ph-circle {
        animation: 1.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim;
        background-color: transparent;
        border: 2px solid rgba(30, 30, 30, 0.4);
        border-radius: 100%;
        height: 100px;
        left: 0px;
        opacity: 0.1;
        position: absolute;
        top: 0px;
        transform-origin: 50% 50% 0;
        transition: all 0.5s ease 0s;
        width: 100px;
    }

    .suntory-alo-ph-circle-fill {
        animation: 2.3s ease-in-out 0s normal none infinite running suntory-alo-circle-fill-anim;
        border: 2px solid transparent;
        border-radius: 100%;
        height: 70px;
        left: 15px;
        position: absolute;
        top: 15px;
        transform-origin: 50% 50% 0;
        transition: all 0.5s ease 0s;
        width: 70px;
    }

    .suntory-alo-ph-img-circle {
        border: 2px solid transparent;
        border-radius: 100%;
        height: 50px;
        left: 25px;
        opacity: 0.7;
        position: absolute;
        top: 25px;
        transform-origin: 50% 50% 0;
        width: 50px;
        text-align: center;
    }

    .suntory-alo-phone.suntory-alo-hover,
    .suntory-alo-phone:hover {
        opacity: 1;
    }

    .suntory-alo-phone.suntory-alo-active .suntory-alo-ph-circle {
        animation: 1.1s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
    }

    .suntory-alo-phone.suntory-alo-static .suntory-alo-ph-circle {
        animation: 2.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
    }

    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle,
    .suntory-alo-phone:hover .suntory-alo-ph-circle {
        border-color: #00aff2;
        opacity: 0.5;
    }

    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle,
    .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle {
        border-color: #EB278D;
        opacity: 1;
    }

    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle {
        border-color: #bfebfc;
        opacity: 1;
    }

    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle-fill,
    .suntory-alo-phone:hover .suntory-alo-ph-circle-fill {
        background-color: rgba(0, 175, 242, 0.9);
    }

    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle-fill,
    .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle-fill {
        background-color: #EB278D;
    }

    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle-fill {
        background-color: rgba(0, 175, 242, 0.9);
    }

    .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-img-circle,
    .suntory-alo-phone:hover .suntory-alo-ph-img-circle {
        background-color: #00aff2;
    }

    .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-img-circle,
    .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-img-circle {
        background-color: #EB278D;
    }

    .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-img-circle {
        background-color: #00aff2;
    }

    @keyframes suntory-alo-circle-anim {
        0% {
            opacity: 0.1;
            transform: rotate(0deg) scale(0.5) skew(1deg);
        }

        30% {
            opacity: 0.5;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }

        100% {
            opacity: 0.6;
            transform: rotate(0deg) scale(1) skew(1deg);
        }
    }

    @keyframes suntory-alo-circle-img-anim {
        0% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }

        50% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }

        100% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }
    }

    @keyframes suntory-alo-circle-fill-anim {
        0% {
            opacity: 0.2;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }

        50% {
            opacity: 0.2;
            transform: rotate(0deg) scale(1) skew(1deg);
        }

        100% {
            opacity: 0.2;
            transform: rotate(0deg) scale(0.7) skew(1deg);
        }
    }

    .suntory-alo-ph-img-circle i {
        animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;
        font-size: 30px;
        line-height: 50px;
        color: #fff;
    }

    @keyframes suntory-alo-ring-ring {
        0% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg);
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg);
        }

        50% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }

        100% {
            transform: rotate(0deg) scale(1) skew(1deg);
        }
    </style>
</body>

<!-- phan google translate -->
    <script type="text/javascript" 
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script type="text/javascript">
        // $($('span:contains("Select Language")')[1]).html('English');
    </script>
    <!-- Code provided by Google -->
       <div id="google_translate_element" style="display: ;"></div>

    <!-- <div class="translation-icons">
       <a href="#" class="nl" data-placement="0">en</a>
       <a href="#" class="de" data-placement="1">zh</a>
   </div> -->
   <!-- //load the script of google   -->

<script>

function googleTranslateElementInit() {
new google.translate.TranslateElement({
//defaultLanguage: 'en', 
//pageLanguage: 'en', 
includedLanguages: 'vi,en,zh-CN,ja,ko,ru', 
layout: google.translate.TranslateElement.InlineLayout.SIMPLE, 
autoDisplay: false,
multilanguagePage: true}, 'google_translate_element')
};
var clickCount = 0;

$(window).load(function () {

    $('.translation-icons a').click(function(e) {
    e.preventDefault();

    var d = 0;
    var $frame1 = $('.skiptranslate');
    var ten = '';
    for (var i=0;i<$frame1.length;i++) {
      // alert($frame1.eq(i).attr('title'));
      ten = $frame1.eq(i).attr('title');
      // alert(ten);
      if (ten == undefined) {
        // d = i;
        // break;
      } else {
        d = i;
        break;
      }
    }
// alert(d);
    var $frame = $('.skiptranslate').eq(d);

    if (!$frame.size()) {
        alert("Error: Could not find Google translate frame.");
        return false;
        }
// alert($frame.attr('title'));
     //find the a links element inside the gtranlate first frame
    var langs = $('.skiptranslate').eq(d).contents().find('td a');

     //the number of the language in flag-elements
    var placement = $(this).data('placement');

 //this again I need to adjust the mapping numbers of the languages in the flag elements        
    if (clickCount == 0){
        placement = $(this).data('placement');
        clickCount++;
        }
    //and finaly imitate click on the gtranslate element which is the same as the number of the language in flag link
    langs.eq(placement).find('span.text').click();
    return false;

});
});
</script>

</html>