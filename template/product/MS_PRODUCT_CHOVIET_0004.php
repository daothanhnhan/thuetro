<?php 
	if (!isset($_SESSION['admin_id_home'])) {
		header("location: /");
	}
	// echo '<pre>';
	// var_dump($_SESSION['admin_id_home']);
	$admin_home = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

	$tin = $action->getDetail('product', 'product_id', $_GET['trang']);

	$goi_vip = array('Thường', 'VIP 5', 'VIP 4', 'VIP 3', 'VIP 2', 'VIP 1', 'VIP Đặc Biệt');
?>
<style>
.title-goi {
	font-size: 20px;
}
</style>
<div class="container1">
	<h1>Mua các gói</h1>
	<p>Tiền của bạn: <?= number_format($admin_home['tien_mua']) ?>đ</p>
	<p>Số lượt của bạn: <?= number_format($admin_home['luot_up_tin']) ?></p>
	<p>Ngày mua tin: <?= $admin_home['ngay_mua_up_tin']?></p>


	<h2 class="title-goi">Mua gói làm mới tin</h2>
	


	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Số lần Up</th>
	        <th>Giá</th>
	        <th>Hạn sử dụng</th>
	        <th>Mua</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>50 lần</td>
	        <td>20.000 đồng</td>
	        <td>30 ngày</td>
	        <td><button type="" onclick="mua_lam_moi(1)">Mua</button></td>
	      </tr>
	      <tr>
	        <td>500 lần</td>
	        <td>50.000 đồng</td>
	        <td>30 ngày</td>
	        <td><button type="" onclick="mua_lam_moi(2)">Mua</button></td>
	      </tr>
	      <tr>
	        <td>1.500 lần</td>
	        <td>100.000 đồng</td>
	        <td>30 ngày</td>
	        <td><button type="" onclick="mua_lam_moi(3)">Mua</button></td>
	      </tr>
	      <tr>
	        <td>3.000 lần</td>
	        <td>150.000 đồng</td>
	        <td>30 ngày</td>
	        <td><button type="" onclick="mua_lam_moi(4)">Mua</button></td>
	      </tr>
	      <tr>
	        <td>10.000 lần</td>
	        <td>200.000 đồng</td>
	        <td>30 ngày</td>
	        <td><button type="" onclick="mua_lam_moi(5)">Mua</button></td>
	      </tr>
	    </tbody>
	  </table>

	<p>(*) Hạn sử dụng 30 ngày tính từ thời điểm mua. Nếu không sử dụng hết trong 30 ngày thì lượt UP tự động mất.</p>
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

	function mua_lam_moi (goi) {
		var product_id = 0;
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

	function mua_vip_thang (product_id, goi) {
		const xhttp = new XMLHttpRequest();
  		xhttp.onload = function() {
	    // document.getElementById("demo").innerHTML = this.responseText;
		    	alert(this.responseText);
		    	location.reload();
		    }
		  xhttp.open("GET", "/functions/ajax/mua_vip_thang.php?product_id="+product_id+"&goi="+goi, true);
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