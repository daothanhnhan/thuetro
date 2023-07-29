<div class="gb-chi-tiet-add-to-cart">
    <form class="cart" method="post" enctype="multipart/form-data">
        <div class="quantity">
            <div class="form-group">
                <label>Số lượng:</label>
                <br>
                <p id="minus" class="" >−</p>
                <input type="number" min="0" value="1" id="pwd" class="number_cart" />
                <p id="plus" class="" >+</p>
               <!--  <input type="number" class="form-control qty number_cart" id="pwd" min="0" value="1"> -->
                <input type="hidden" name="id" id="product_id" value="<?php echo $rowLang['product_id'];?>">
                <input type="hidden" name="name" id="product_name" value="<?= $rowLang['lang_product_name'];?>">
                <?php if ($row['product_price_sale']==0) { ?>
                <input type="hidden" name="price" id="product_price" value="<?php echo $row['product_price'];?>">
              <?php } else { ?>
                <input type="hidden" name="price" id="product_price" value="<?php echo $action_product->percent_1($row['product_price'],$row['product_price_sale']);?>">
              <?php } ?>
            </div>
        </div>
        <br>
        <button type="button" name="add-to-cart" class="single_add_to_cart_button button alt btn_addCart">Mua ngay</button>
        <div class="clearfix"></div>
    </form>
</div>
<script>
    


const minusButton = document.getElementById('minus');
const plusButton = document.getElementById('plus');
const inputField = document.getElementById('pwd');

minusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  if (currentValue > 1) {
    inputField.value = currentValue - 1;
  }
  
});

plusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue + 1;
});
</script>