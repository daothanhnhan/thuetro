<style>


</style>
<?php 
    $home_district = $action->getList('district', 'city_id', 2, 'id', 'asc', '', '', '');
    $arr_list_lknb = array(
                        2,
                        3,
                        27,
                        48,
                        44,
                        25,
                        38,
                        
                        62,
                        1,
                        5,
                        6,
                        7,
                        
                        23,
                        8
                    );
?>
<div class="home-lien-ket-noi-bat">
	<div class="home-title text-center">
        <p class="text">Liên kết nổi bật</p>
    </div>
    <div class="vien">
        <ul>
            <?php 
            foreach ($arr_list_lknb as $item) { 
                $city = $action->getDetail('city', 'id', $item);
            ?>
            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=0&tinh=<?= $item ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title="ban dat <?= $item['name'] ?>">Bán đất <b><?= $city['name'] ?></b></a></li>
            <?php } ?>
            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=0&tinh=9&quan=11&dien-tich=0&muc-gia=0&huong=0" title="ban dat <?= $item['name'] ?>">Bán đất <b>Quy Nhơn</b></a></li>
            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=0&tinh=28&quan=316&dien-tich=0&muc-gia=0&huong=0" title="ban dat <?= $item['name'] ?>">Bán đất <b>Phú Quốc</b></a></li>
        </ul>
    </div>
    
</div>