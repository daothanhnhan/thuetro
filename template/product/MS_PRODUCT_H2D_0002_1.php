<p class="prices_ruouvang">
    <!--    <span class="prices_ruouvang-news">$16.88</span>-->
    <?php if ($row['product_price_sale']!=0) { ?>
    <span class="prices_ruouvang-old sale"> <?= $action_product->percent($row['product_price'], $row['product_price_sale']) ?> đ</span> <span style="text-decoration-line: line-through"><?= number_format($row['product_price']) ?> đ</span>
<?php } else { ?>
	<span class="prices_ruouvang-old "> <?= number_format($row['product_price']) ?> đ</span> 
<?php } ?>
</p>