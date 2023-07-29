<?php 
    $get = $action ->getList('service','','','service_id','desc','',8,'');
    // var_dump($get);

 ?>
<div class="service_law">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2><?= $lang=='vn' ? 'DỰ AN NHÀ ĐẤT' : 'PRACTICE' ?></h2>
            </div>
            <div class="list-service">
                <?php 
                    foreach ($get as $key ) { 
                        $service_lang = $action->getDetail_New('service_languages', array('service_id', 'languages_code'), array($key['service_id'], $lang), '');
                ?>
                <div class="col-md-3  text-center">
                    <a href="/<?=$service_lang['friendly_url']?>">
                        <div class="go-ani">
                            <div class="pre-img" style="background-image: url('/images/<?=$key['service_img']?>');"></div>
                            <h3>
                                <?=$service_lang['lang_service_name']?>
                            </h3>
                            <p>
                                <?=$service_lang['lang_service_des']?>
                            </p>
                        </div>
                    </a>
                </div>
                <?php    }

                 ?>
            </div>
        </div>
    </div>
</div>