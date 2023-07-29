<?php 
    $y_kien = $action->getList('y_kien', '', '', 'id', 'asc', '', '', '');
?>
<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">

<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">

<link rel="stylesheet" href="/plugin/animsition/css/animate.css">

<div class="gb-khachhang">

    <div class="gb-khachhang-slide owl-carousel owl-theme">

       
        <?php foreach ($y_kien as $item) { ?>
        <div class="item">

            <div class="image-customer">
                <img src="/images/<?= $item['image'] ?>" alt="slideshow" class="img-responsive">
            </div>
            <div class="info-customer text-center">
                <p class="name"><?= $lang=='vn' ? $item['name'] : $item['name_en'] ?> <br> <span><?= $lang=='vn' ? $item['position'] : $item['position_en'] ?></span></p>
                <p class="quotes">
                    <?= $lang=='vn' ? $item['note'] : $item['note_en'] ?>
                </p>
            </div>

        </div>
        <?php } ?>

    </div>

</div>



<script src="/plugin/owl-carouse/owl.carousel.min.js"></script>

<script>

    $(document).ready(function (){

        $('.gb-khachhang-slide').owlCarousel({

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