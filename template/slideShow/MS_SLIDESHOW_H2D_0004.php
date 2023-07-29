<?php 
    $home_du_an = $action->getList('service', 'city_id', '1', 'service_id', 'desc', '', '9', '');
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">

<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">

<link rel="stylesheet" href="/plugin/animsition/css/animate.css">
<style>

</style>
<div class="gb-slideshow_ruouvang">

    <div class="gb-slideshow_ruouvang-slide owl-carousel owl-theme">

        <?php foreach ($home_du_an as $item) { ?>

        <div class="item">

            <img src="/images/<?= $item['service_img']?>" alt="slideshow" class="img-responsive">

            <div class="box-bottom">
                <a href="/<?= $item['friendly_url'] ?>" title=""><?= $item['service_name'] ?></a>
                <p><?= $item['service_author'] ?></p>
            </div>

        </div>

        <?php } ?>   

    </div>

</div>



<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>

<script>

    $(document).ready(function (){

        $('.gb-slideshow_ruouvang-slide').owlCarousel({

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