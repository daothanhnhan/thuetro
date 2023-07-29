
<style>
.container {
    width: 1000px;
}
</style>
<!--MENU MOBILE-->
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<?php include_once DIR_MENU."MS_MENU_H2D_0002.php"; ?>
<!-- End menu mobile-->
<!--MENU DESTOP-->
<header>
    <div class="gb-header-ruouvang">
        <div class="gb-top-header_ruouvang">
            <div class="container">
                <?php include_once DIR_HEADER."MS_HEADER_H2D_0002.php"; ?>
            </div>
            <div class="gb-header-between_ruouvang sticky-menu">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-12 col-sm-12">
                           <div class="row">
                                <?php include DIR_MENU."MS_MENU_H2D_0001.php";?>
                           </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
$(document).ready(function() {

    $(".sticky-menu").sticky({ topSpacing: 0 });

});
</script>