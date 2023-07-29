<?php 
    $page = $action->getDetail('page', 'page_id', 52);
?>
<style>

</style>
<section class="featured-properties-area section-padding-30-50">
        <div class="container-fluid" id="img-marsk" style="background: url(css/images/bg-ky-gui-1.jpg) no-repeat center center; background-size: cover;">
            <div class="container ">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="/images/<?= $page['page_img'] ?>" alt="ky-gui-nha-dat" class="img-fluid fix-height">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 30px 0; color: #a9a9a9;">

                       <a href="/<?= $page['friendly_url'] ?>"><h1 style="color: white;"><?= $page['page_name'] ?></h1> </a>
                        <div style="color: white;line-height: 20px;">
                            <?= $page['page_des'] ?>
                        </div>
                        
                        <a href="/<?= $page['friendly_url'] ?>"><h6 style="color: white;">Xem thêm</h6> </a>   
                    </div>                    
                </div>
            </div>
        </div>
    </section>