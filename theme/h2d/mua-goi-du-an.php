<?php 
  if (!isset($_SESSION['admin_id_home'])) {
    header("location: /");
  }
  // echo '<pre>';
  // var_dump($_SESSION['admin_id_home']);
  $admin_home = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

  $du_an = $action->getDetail('service', 'service_id', $_GET['trang']);

  $goi_vip = array('Thường', 'VIP 5', 'VIP 4', 'VIP 3', 'VIP 2', 'VIP 1', 'VIP Đặc Biệt');
?>
<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<p>Tiền của bạn: <?= number_format($admin_home['tien_mua']) ?>đ</p>

      <h2 class="title-goi">Mua Gói VIP dự án</h2>

  <p>Gói hiện tại: <?= $goi_vip[$du_an['vip']] ?></p>
  <p>Ngày hết hạn: <?= $du_an['ngay_vip'] ?></p>

  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Loại VIP</th>
          <th>Giá/Tháng(30 ngày)</th>
          <th>Mô tả</th>
          <th>Mua gói tháng</th>
          <!-- <th>Gia hạn tháng</th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>VIP 5</td>
          
          <td>250.000</td>
          <td>Tin VIP 5 luôn xuất hiện phía trên tin thường</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 1)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 1)">Gia hạn</button></td> -->
        </tr>
        <tr>
          <td>VIP 4</td>
          
          <td>300.000</td>
          <td>Tin VIP 4 luôn xuất hiện phía trên tin VIP 5</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 2)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 2)">Gia hạn</button></td> -->
        </tr>
        <tr>
          <td>VIP 3</td>
          
          <td>350.000</td>
          <td>Tin VIP 3 luôn xuất hiện phía trên tin VIP 4</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 3)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 3)">Gia hạn</button></td> -->
        </tr>
        <tr>
          <td>VIP 2</td>
          
          <td>500.000</td>
          <td>Tin VIP 2 luôn xuất hiện phía trên tin VIP 3</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 4)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 4)">Gia hạn</button></td> -->
        </tr>
        <tr>
          <td>VIP 1</td>
          
          <td>1.000.000</td>
          <td>Tin VIP 1 luôn xuất hiện phía trên tin VIP 2</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 5)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 5)">Gia hạn</button></td> -->
        </tr>
        <tr>
          <td>VIP Đặc Biệt</td>
          
          <td>2.000.000</td>
          <td>Tin VIP Đặc Biệt luôn xuất hiện phía trên tin VIP 1</td>
          
          <td><button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 6)">Mua tháng</button></td>
          <!-- <td><button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 6)">Gia hạn</button></td> -->
        </tr>
    </tbody>
  </table>
		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
	</div>
	
</div>

<script>
  function lam_moi (product_id) {
    // alert(product_id);
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      // document.getElementById("demo").innerHTML = this.responseText;
          alert(this.responseText);
          location.reload();
        }
      xhttp.open("GET", "/functions/ajax/lam_moi.php?product_id="+product_id, true);
      xhttp.send();
  }

  function mua_lam_moi (product_id, goi) {
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      // document.getElementById("demo").innerHTML = this.responseText;
          alert(this.responseText);
          location.reload();
        }
      xhttp.open("GET", "/functions/ajax/mua_lam_moi.php?product_id="+product_id+"&goi="+goi, true);
      xhttp.send();
  }

  function mua_vip_ngay (product_id, goi) {
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      // document.getElementById("demo").innerHTML = this.responseText;
          alert(this.responseText);
          location.reload();
        }
      xhttp.open("GET", "/functions/ajax/mua_vip_ngay.php?product_id="+product_id+"&goi="+goi, true);
      xhttp.send();
  }

  function mua_vip_thang (service_id, goi) {
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      // document.getElementById("demo").innerHTML = this.responseText;
          alert(this.responseText);
          location.reload();
        }
      xhttp.open("GET", "/functions/ajax/mua_vip_thang_du_an.php?service_id="+service_id+"&goi="+goi, true);
      xhttp.send();
  }

  function add_vip_thang (product_id, goi) {
    const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
      // document.getElementById("demo").innerHTML = this.responseText;
          alert(this.responseText);
          location.reload();
        }
      xhttp.open("GET", "/functions/ajax/add_vip_thang.php?product_id="+product_id+"&goi="+goi, true);
      xhttp.send();
  }
</script>