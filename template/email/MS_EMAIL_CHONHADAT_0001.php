<?php 
    $huong = $action->getList('huong', '', '', 'id', 'asc', '', '', '');
    $huyen = $action->getList('huyen', '', '', 'id', 'asc', '', '', '');
    $phuong = array();
    if (!empty($_GET['huyen'])) {
        $phuong = $action->getList('phuong', 'huyen_id', $_GET['huyen'], 'id', 'asc', '', '', '');
    }
    $procat = $action->getList('productcat', '', '', 'productcat_id', 'asc', '', '', '');

    $home_top_news = $action->getList('news', '', '', 'news_id', 'desc', '', '4', '');//var_dump($home_top_news);
    // var_dump($home_top_news[0]['news_img']);
    $list_procat_1 = $action->getList('productcat', 'productcat_parent', '0', 'productcat_id', 'asc', '', '', '');

    $city = $action->getList('city', '', '', 'id', 'asc', '', '', '');

    $quan = array();
    if (isset($_GET['tinh'])) {
        $quan = $action->getList('district', 'city_id', $_GET['tinh'], 'id', 'asc', '', '', '');
    }

    $dien_tich = $action->getList('dien_tich', '', '', 'id', 'asc', '', '', '');
    $muc_gia = $action->getList('muc_gia', '', '', 'id', 'asc', '', '', '');
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">
<link rel="stylesheet" href="/plugin/animsition/css/animate.css">
<style>
.home-banner-slide {
    position: relative;
}
.box-on-slide {
    position: absolute;
    top: 10px;
    left: 200px;
    z-index: 9999;
    width: 50%;
    background: #00000061;
    padding: 10px;
    color: #fff;
}
.box-on-slide .form-control {
    color: #fff;
}
</style>
<div class="home-banner-slide">
    <div class="gb-slideshow_ruouvang-banner-home-form-slide owl-carousel owl-theme">
        <div class="item">
            <img src="/images/banner-home.png" alt="banner" style="width: 100%;">
        </div>
    </div>
    <div class="box-on-slide">
        <div class="col-xs-61">
            <div class="advanced-search-form">
                        <!-- Search Title 
                        <div class="search-title">
                            <p>Tìm kiếm nhà đất</p>
                        </div>
                         Search Form -->
                        <form id="advanceSearch" method="get" action="/index.php">
                            <input type="hidden" name="page" value="tim-kiem">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="title" class="form-control" name="title" value="<?= str_replace("-", " ", $_GET['title']) ?>" placeholder="Nhập địa điểm cần tìm">
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Loại tin</label>
                                        <select class="form-control" id="price" style="" name="loai-tin">
                                            <!-- <option value="0">Chọn mức giá</option> -->
                                            <option value="1" <?= $_GET['loai-tin']==1 ? 'selected' : '' ?> >Cần bán</option>
                                            <option value="2" <?= $_GET['loai-tin']==2 ? 'selected' : '' ?> >Cho thuê</option>
                                            <option value="3" <?= $_GET['loai-tin']==3 ? 'selected' : '' ?> >Cần mua</option>
                                            <option value="4" <?= $_GET['loai-tin']==4 ? 'selected' : '' ?> >Cần thuê</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Loại BĐS</label>
                                        <select class="form-control" id="province_category" style="" name="loai-bds">
                                            <option value="0">--- Chọn loại BĐS ---</option>
                                            <?php 
                                            foreach ($list_procat_1 as $item) { 
                                                $list_procat_2 = $action->getList('productcat', 'productcat_parent', $item['productcat_id'], 'productcat_id', 'asc', '', '', '');
                                            ?>
                                            <option value="<?= $item['productcat_id'] ?>" <?= $item['productcat_id']==$_GET['loai-bds'] ? 'selected' : '' ?> ><?= $item['productcat_name'] ?></option>
                                                <?php foreach ($list_procat_2 as $item_2) { ?>
                                                    <option value="<?= $item_2['productcat_id'] ?>" <?= $item_2['productcat_id']==$_GET['loai-bds'] ? 'selected' : '' ?> >&nbsp;&nbsp;- <?= $item_2['productcat_name'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Tỉnh/Thành</label>
                                        <select class="form-control" id="sold_only" style="" name="tinh" onchange="chon_tinh(this.value)">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($city as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $_GET['tinh']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Quận/Huyện</label>
                                        <select class="form-control" id="huyen_id" style="" name="quan">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($quan as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $_GET['quan']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Diện tích</label>
                                        <select class="form-control" name="dien-tich">
                                            <option value="0">---------- Tất cả ----------</option>
                                            <?php foreach ($dien_tich as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['dien-tich'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>               
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Mức giá</label>
                                        <select class="form-control" name="muc-gia">
                                            <option value="0">---------- Tất cả ----------</option>
                                            <?php foreach ($muc_gia as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['muc-gia'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>                                  
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Hướng</label>
                                        <select class="form-control" id="" style="" name="huong">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($huong as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['huong'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 justify-content-end text-center">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Tìm kiếm</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-right">
                                    <!-- <a>Tìm kiếm nâng cao</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
        
    </div>
</div>

<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>
<script>

    $(document).ready(function (){

        $('.gb-slideshow_ruouvang-banner-home-form-slide').owlCarousel({

            loop:true,

            margin:0,

            navSpeed:500,

            nav:true,

            dots: true,

            autoplay: true,

            rewind: true,

            navText:[],

            items:1,

            responsive:{

                0:{

                    nav:false

                },

                767:{

                    nav:true

                }

            }

        });

    });

</script>
<div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="advanced-search-form">
                        <!-- Search Title 
                        <div class="search-title">
                            <p>Tìm kiếm nhà đất</p>
                        </div>
                         Search Form -->
                        <form id="advanceSearch" method="get" action="/index.php">
                            <input type="hidden" name="page" value="tim-kiem">
                            <div class="row">

                                <div class="col-12 col-xs-12 col-lg-12">
                                    <div class="form-group">
                                        <input type="title" class="form-control" name="title" value="<?= str_replace("-", " ", $_GET['title']) ?>" placeholder="Nhập địa điểm cần tìm">
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Loại tin</label>
                                        <select class="form-control" id="price" style="" name="loai-tin">
                                            <!-- <option value="0">Chọn mức giá</option> -->
                                            <option value="1" <?= $_GET['loai-tin']==1 ? 'selected' : '' ?> >Cần bán</option>
                                            <option value="2" <?= $_GET['loai-tin']==2 ? 'selected' : '' ?> >Cho thuê</option>
                                            <option value="3" <?= $_GET['loai-tin']==3 ? 'selected' : '' ?> >Cần mua</option>
                                            <option value="4" <?= $_GET['loai-tin']==4 ? 'selected' : '' ?> >Cần thuê</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Loại BĐS</label>
                                        <select class="form-control" id="province_category" style="" name="loai-bds">
                                            <option value="0">--- Chọn loại BĐS ---</option>
                                            <?php 
                                            foreach ($list_procat_1 as $item) { 
                                                $list_procat_2 = $action->getList('productcat', 'productcat_parent', $item['productcat_id'], 'productcat_id', 'asc', '', '', '');
                                            ?>
                                            <option value="<?= $item['productcat_id'] ?>" <?= $item['productcat_id']==$_GET['loai-bds'] ? 'selected' : '' ?> ><?= $item['productcat_name'] ?></option>
                                                <?php foreach ($list_procat_2 as $item_2) { ?>
                                                    <option value="<?= $item_2['productcat_id'] ?>" <?= $item_2['productcat_id']==$_GET['loai-bds'] ? 'selected' : '' ?> >&nbsp;&nbsp;- <?= $item_2['productcat_name'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Tỉnh/Thành</label>
                                        <select class="form-control" id="sold_only" style="" name="tinh" onchange="chon_tinh(this.value)">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($city as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $_GET['tinh']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Quận/Huyện</label>
                                        <select class="form-control" id="huyen_id" style="" name="quan">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($quan as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $_GET['quan']==$item['id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Diện tích</label>
                                        <select class="form-control" name="dien-tich">
                                            <option value="0">---------- Tất cả ----------</option>
                                            <?php foreach ($dien_tich as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['dien-tich'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>               
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Mức giá</label>
                                        <select class="form-control" name="muc-gia">
                                            <option value="0">---------- Tất cả ----------</option>
                                            <?php foreach ($muc_gia as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['muc-gia'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>                                  
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-xs-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="usr">Hướng</label>
                                        <select class="form-control" id="" style="" name="huong">
                                            <option value="0">------ Tất cả ------</option>
                                            <?php foreach ($huong as $item) { ?>
                                            <option value="<?= $item['id'] ?>" <?= $item['id']==$_GET['huong'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 justify-content-end text-center">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Tìm kiếm</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-right">
                                    <!-- <a>Tìm kiếm nâng cao</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-6 home-top-news">
                    <div class="row m-3">
                        <div class="col-xs-12 p-3">
                            <p class="home-top-title-news">TIN TỨC NỔI BẬT</p>
                        </div>
                        
                        <div class="col-xs-4 p-3">
                            <a href="" title="" class="aspect-box">
                                <img src="/images/<?= $home_top_news[0]['news_img'] ?>" alt="tin tức" class="w100 aspect-img">
                            </a>
                        </div>
                        <div class="col-xs-8 p-3">
                            <a href="" title=""><?= $home_top_news[0]['news_name'] ?></a>
                            <p><?= $home_top_news[0]['news_des'] ?></p>
                            <div class="home-top-news-list">
                                <?php 
                                unset($home_top_news[0]);
                                foreach ($home_top_news as $item) { 
                                ?>
                                <a><?= $item['news_name'] ?></a>
                                <hr>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function chon_tinh (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("huyen_id").innerHTML = this.responseText;
        }
      xhttp.open("GET", "/functions/ajax/chon_tinh_home.php?id="+id, true);
      xhttp.send();
    }
</script>