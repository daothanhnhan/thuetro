<?php 
    $get = $action -> getDetail_New('page_languages',array('page_id', 'languages_code'), array(40, $lang), '');
    $get_1 = $action -> getDetail_New('page_languages',array('page_id', 'languages_code'), array(36, $lang), '');
    $home_gioi_thieu = $action->getDetail('page', 'page_id', 40);
 ?>
<div class="gb-introvechungtoi_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 space-30">
                <div class="text space-10">
                    <h3><?=$get['lang_page_name']?></h3>
                    <h2><?=$get['lang_page_des']?></h2>
                    <?=$get['lang_page_content']?>
                </div>
                <div class="bottom-text">
                    <a class="btn btn-primary" href="/<?= $get_1['friendly_url'] ?>" title="Xem thêm"><?= $lang=='vn' ? 'Xem thêm' : 'see more' ?></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 space-30 text-center">
                <div class="images">
                    <picture>
                        
                        <img src="/images/<?=$home_gioi_thieu['page_img']?>"  class="img-responsive" alt="Giới thiệu chung" >
                    </picture>
                    <div class="dot-ab">
                        <img src="//bizweb.dktcdn.net/100/347/311/themes/762254/assets/section_about_dot.png?1600317274027"class="img-responsive" alt="Giới thiệu chung" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>