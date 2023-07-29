<?php 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_news->getNewsLangDetail_byUrl($slug,$lang);
    $row = $action_news->getNewsDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'newsDetail';
?>
<?php 
    $action_lang = new action_lang();
    $url_lang = $action_lang->get_url_lang_newsDetail($slug, $lang);
?>
<style>
.gb-single-blog_ruouvang-right-text ul, .gb-single-blog_ruouvang-right-text ol {
    list-style: revert;
    margin-left: 20px;
    line-height: 20px;
}
.gb-single-blog_ruouvang-right-title h1 {
    font-size: 30px;
    font-weight: bold;
}
.gb-single-blog_ruouvang-right-text h3 {
    font-size: 20px;
}
.gb-single-blog_ruouvang-right .gb-single-blog_ruouvang-right-text p {
    font-size: 16px;
    color: #000;
}
</style>
<input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
<input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang">
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
<div class="gb-single-blog_ruouvang">
    <div class="container">
        <div class="row">
            <div class="col-md-9 gb-single-blog_ruouvang-right">
               <!--  <div class="gb-single-blog_ruouvang-right-img">
                    <img src="/images/<?= $row['news_img'] ?>" alt="<?= $rowLang['lang_news_name'] ?>" class="img-responsive">
                </div> -->
                <div class="gb-single-blog_ruouvang-right-title">
                    <h1><?= $rowLang['lang_news_name'] ?></h1>
                </div>
                <p class="date" style="margin-bottom: 15px;">
                    <?= substr($row['news_created_date'], 0, 10) ?>
                </p>
                
                <div class="gb-single-blog_ruouvang-right-text">
                    <?= $rowLang['lang_news_content'] ?>
                </div>

                <div class="gb-single-blog_ruouvang-share">
                    <div class="row">
                        <div class="col-md-5 gb-single-blog_ruouvang-share-left">
                            <!-- <ul>
                                <li><a href="#">Finance</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Photo</a></li>
                            </ul> -->
                        </div>
                        <div class="col-md-5 col-md-offset-2 gb-single-blog_ruouvang-share-right">
                            <ul>
                                <li><span><i class="fa fa-share-alt" aria-hidden="true"></i> share</span></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--bình luận-->
                <?php include DIR_EMAIL."MS_EMAIL_H2D_0002.php";?>

                <!--tin tức liên quan-->

                
                <?php include DIR_NEWS."MS_NEWS_H2D_0003.php";?>

            </div>
            <div class="col-md-3 gb-blog-left sticky-lg">
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0001.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0002.php";?>
                <?php include DIR_SIDEBAR."MS_SIDEBAR_H2D_0003.php";?>
            </div>
        </div>
    </div>
</div>