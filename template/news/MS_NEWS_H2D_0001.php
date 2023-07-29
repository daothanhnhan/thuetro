<?php   
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];//echo 'tuan';die;                    
        $rowCatLang = $action_news->getNewsCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_news->getNewsCatDetail_byId($rowCatLang[$nameColIdNewsCat_newsCatLanguage],$lang);
        if (newsCatPageHasSub) {
            $rows = $action_news->getNewsList_byMultiLevel_orderNewsId($rowCat[$nameColId_newsCat],'desc',$trang,15,$slug);
        } else {
            $rows = $action_news->getNewsCat_byNewsCatIdParentHighest($rowCat[$nameColId_newsCat],'desc');//var_dump($rows);die;
        }        
    }
    else $rows = $action->getList($nameTable_news,'','',$nameColId_news,'desc',$trang,15,'tin-tuc'); 
    // var_dump($rows);die;
?>
<?php 
    $action_lang = new action_lang();
    $url_lang = $action_lang->get_url_lang_newscat($slug, $lang);
?>
<input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
<input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang">
<?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>

<div class="gb-page-blog_ruouvang news-in-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php 
                    $d = 0;
                    foreach ($rows['data'] as $item) {
                        $d++;
                        $rowLang = $action_news->getNewsLangDetail_byId($item['news_id'],$lang); //var_dump($item);
                    ?>
                    <div class="col-sm-4">
                        <div class="blog-inner">
                                    <div class="blog-img">
                                        <a href="/<?=$item['friendly_url']?>" title="<?=$item['news_name']?>">
                                            
                                            <picture>
                                                <img src="/images/<?=$item['news_img']?>">
                                            </picture>
                                            
                                        </a>
                                        <span class="time_post f"><i class="fa fa-clock-o"></i>&nbsp;
                                            <?= date('d/m/Y', strtotime($item['news_created_date']) )?></span>
                                    </div>
                                    <div class="content__">
                                        <h3 class="h4">
                                            <a class="text2line" title="<?=$rowLang['lang_news_name']?>" href="/<?=$rowLang['friendly_url']?>"><?=$rowLang['lang_news_name']?></a>
                                        </h3>
                                        
                                        
                                        <p> <?=$rowLang['lang_news_des']?></p>
                                    </div>

                                </div>
                    </div>
                    <?php 
                    if ($d%3==0) {
                        echo '<hr style="width:100%;border:0;" />';
                    }
                    } ?>
                </div>
                <div><?= $rows['paging'] ?></div>
            </div>
            <!-- <div class="col-md-4">
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0009.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0002.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0003.php";?>
                <?php //include DIR_SIDEBAR."MS_SIDEBAR_H2D_0008.php";?>
            </div> -->
        </div>
    </div>
</div>