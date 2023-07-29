<?php 
	$home_news_hot = $action->getList('news', '', '', 'news_id', 'desc', '', '4', '');
?>
<style>

</style>
<div class="home-news-hot">
	<div class="home-title">
        <p class="text">Tin tức Choviet.com</p>
    </div>
    <div class="vien">
        <ul>
            <?php foreach ($home_news_hot as $item) { ?>
            <li>
                <a href="/<?= $item['friendly_url'] ?>" title=""><?= $item['news_name'] ?></a>
                <span class="date">24/5/2023</span>
            </li>
            <?php } ?>
        </ul>
        <div class="text-right">
            <a href="/tin-tuc"><< Xem thêm >></a>
        </div>
    </div>
    
</div>
