<?php
	$video = $action->getList('video', '', '', 'id', 'asc', '', '3', '');
?>
<style>
.video iframe {
	width: 100%;
}
</style>
<section class="home-video">
    <!-- end block-dịch vụ ký gửi -->
    <div class="container">
            <div class="nha-ban-tieu-bieu"><i class="fas fa-city"></i><span> &nbsp;Video</span>
            </div>
        </div>
    <div class="container video">
    	<?php foreach ($video as $item) { ?>
    	<div class="col-md-4">
    		<?= $item['note'] ?>
    	</div>
    	<?php } ?>
    </div>
</section>