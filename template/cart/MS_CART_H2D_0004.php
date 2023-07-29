<?php 
	$total_cart = 0;
	if (isset($_SESSION['shopping_cart'])) {
		foreach ($_SESSION['shopping_cart'] as $v) {
			$total_cart++;
		}
	}
?>
<!-- <div class="gb-cart_noithatmc">
    <div class="gb-cart_noithatmc-text">
        <h3>Giỏ hàng của bạn</h3>
        <p> <span class="badge"><?= $total_cart ?></span> items - <span>0 đ</span></p>
    </div>
    <div class="gb-cart_noithatmc-icons">
        <a href="/gio-hang"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
    </div>
</div> -->

<div class="gb-cartheader_h2d">
    <a href="/gio-hang"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
</div>