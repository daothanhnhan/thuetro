<!-- <link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">

<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">

<link rel="stylesheet" href="/plugin/animsition/css/animate.css"> -->
<?php 

    $get = $action -> getList('news','newscat_id',12,'news_id','desc','',8,'');
    // var_dump($get);
 ?>
<div class="news-in-home">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2><?= $lang=='vn' ? 'Bản tin pháp luật hàng tháng' : 'Monthly legal newsletter' ?></h2>
                <p><i><?= $lang=='vn' ? 'Thông tin và sự kiện mới nhất từ HDS LAW FIRM' : 'Latest information and events from HDS LAW FIRM' ?></i></p>
            </div>
            <div class="news-home">
                <div class="news-home-slide owl-carousel owl-theme">
                     <?php 
                        foreach ($get as $item) { ?>
                    <div class="item">
                         <div class="blog-inner">
                                    <div class="blog-img">
                                        <a href="/<?=$item['friendly_url']?>" title="<?=$item['news_name']?>">
                                            
                                            <picture>
                                                <img src="/images/<?=$item['news_img']?>">
                                            </picture>
                                            
                                        </a>
                                        <span class="time_post f"><i class="fa fa-clock-o"></i>&nbsp;
                                            <?= date('d/m/Y',$item['news_created_date'] )?></span>
                                    </div>
                                    <div class="content__">
                                        <h3 class="h4">
                                            <a class="text2line" title="<?=$item['news_name']?>" href="/<?=$item['friendly_url']?>"><?=$item['news_name']?></a>
                                        </h3>
                                        
                                        
                                        <p> <?=$item['news_des']?></p>
                                    </div>

                                </div>
                    </div>
                    <?php    }

                     ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="/plugin/owl-carouse/owl.carousel.min.js"></script> -->

<script>

    $(document).ready(function (){

        $('.news-home-slide').owlCarousel({

            loop:true,

            margin:15,

            navSpeed:500,

            nav:false,

            dots: false,

            autoplay: true,

            rewind: true,

            navText:[],

            items:1,

            responsive:{

                0:{
                    items:1,
                    nav:false

                },

                767:{
                    items:3,
                    nav:false

                }

            }

        });

    });

</script>