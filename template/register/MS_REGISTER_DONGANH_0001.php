<?php 
  function mua_tra_gop () {
    global $conn_vn;
    if (isset($_POST['mua_tg'])) {
      $name = mysqli_real_escape_string($conn_vn, $_POST['name']);
      $email = mysqli_real_escape_string($conn_vn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn_vn, $_POST['phone']);
      $address = mysqli_real_escape_string($conn_vn, $_POST['address']);
      $note = mysqli_real_escape_string($conn_vn, $_POST['note']);

      $product = array();
      foreach ($_SESSION['shopping_cart'] as $item) {
        $product[] = $item['product_id'];
      }
      $product_in = json_encode($product);
      $product_in = mysqli_real_escape_string($conn_vn, $product_in);
      // var_dump($product_in);

      $sql = "INSERT INTO mua_tra_gop (name, email, phone, address, note, product) VALUES ('$name', '$email', '$phone', '$address', '$note', '$product_in')";
      $result = mysqli_query($conn_vn, $sql);
      if ($result) {
        echo '<script>alert(\'Bạn đã đăng ký mua trả góp thành công.\')</script>';
      } else {
        echo '<script>alert(\'Có lỗi mời thử lại.\')</script>';
      }
    }
  }
  mua_tra_gop();
?>

<div class="container">
  <h1>Đăng ký mua trả góp</h1>

  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Tên *:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email *:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Số điện thoại *:</label>
      <div class="col-sm-10">
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
      <div class="col-sm-10">
        <input type="test" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Ghi chú:</label>
      <div class="col-sm-10">
        <textarea name="note" class="form-control" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="mua_tg" class="btn btn-default">Đăng ký</button>
      </div>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $tong = 0;
      foreach ($_SESSION['shopping_cart'] as $item) { 
        $tong += $item['product_price']*$item['product_quantity'];
        ?>
      <tr>
        <td><?= $item['product_name'] ?></td>
        <td><?= number_format($item['product_price']) ?> đ</td>
        <td><?= $item['product_quantity'] ?></td>
        <td><?= number_format($item['product_price']*$item['product_quantity']) ?> đ</td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="3" rowspan="">Tổng tiền</td>
        <td colspan="" rowspan=""><?= number_format($tong) ?> đ</td>
      </tr>
    </tbody>
  </table>
</div>
