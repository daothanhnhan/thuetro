<?php 
     $action_page = new action_page(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_page->getPageLangDetail_byUrl($slug,$lang);
    $row = $action_page->getPageDetail_byId($rowLang['news_id'],$lang);
    $_SESSION['sidebar'] = 'pageDetail';

    $action_lang = new action_lang();
    $url_lang = $action_lang->get_url_lang_page($slug, $lang);
?>
<style>
.gb-page-gioithieu-right table td {
    border: 1px solid #000;
}
</style>
<input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
            <input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang">
<div class="gb-page-gioithieu">
    <?php include DIR_BREADCRUMBS."MS_BREADCRUMS_H2D_0001.php";?>
    <div class="container">
        <div class="gb-page-gioithieu-right">
            <?= $rowLang['lang_page_content'] ?>
            <?= $rowLang['lang_page_sub_info1'] ?>
        </div>
    </div>
</div>