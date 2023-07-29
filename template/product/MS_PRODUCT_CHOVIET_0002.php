<?php 
    $home_list_id_city = array(2, 1, 3, 27, 44, 25);
?>
<style>

</style>
<div class="home-nha-dat-khu-vuc">
	<div class="home-title">
        <p class="text">NHÀ ĐẤT KHU VỰC</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="vien">
                <div class="row" style="display: flex;flex-wrap: wrap;">
                    <div class="col-md-6 box">
                        <p><b>NHÀ BÁN</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=101&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=101&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>ĐẤT BÁN</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=113&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=1&loai-bds=113&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    <div class="col-md-6 box">
                        <p><b>CĂN HỘ CHUNG CƯ BÁN</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=105&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=105&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    <div class="col-md-6 box">
                        <p><b>SHOP, KIOT, QUÁN BÁN</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=110&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=110&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    <div class="col-md-6 box">
                        <p><b>BIỆT THỰ, VILLA, KHÁCH SẠN BÁN</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    <div class="col-md-6 box">
                        <p><b>NHÀ CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=101&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=101&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>CĂN HỘ CHUNG CƯ CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=105&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=105&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    

                    <div class="col-md-6 box">
                        <p><b>VĂN PHÒNG CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=107&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=107&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>PHÒNG TRỌ CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=106&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=106&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>SHOP, KIOT, QUÁN CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=110&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=110&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    

                    <div class="col-md-6 box">
                        <p><b>NHÀ MẶT PHỐ CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>

                    
                    <div class="col-md-6 box">
                        <p><b>BIỆT THƯ, VILLA, KHÁCH SẠN CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>HOMESTAY CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                    <div class="col-md-6 box">
                        <p><b>NHÀ NGUYÊN CĂN CHO THUÊ</b></p>
                        <ul>
                            <?php
                            foreach ($home_list_id_city as $id) { 
                                $city = $action->getDetail('city', 'id', $id);
                            ?>
                            <li><a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=<?= $id ?>&quan=0&dien-tich=0&muc-gia=0&huong=0" title=""><?= $city['name'] ?></a></li>
                            <?php } ?>
                            <a href="/index.php?page=tim-kiem&title=&loai-tin=2&loai-bds=102&tinh=0&quan=0&dien-tich=0&muc-gia=0&huong=0" title="" class="khac">Các tỉnh khác</a>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    	
    </div>
</div>

<img src="/images/t02-fixSize-fix.jpg" alt="banner" style="width: 100%;">