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
<div class="container">
	<h1><?= $tin['product_name'] ?></h1>
	<h1>Mua các gói</h1>
	<p>Tiền của bạn: <?= number_format($admin_home['tien_mua']) ?>đ</p>


	

	<h2 class="title-goi">Mua Gói VIP</h2>

	<p>Gói hiện tại: <?= $goi_vip[$tin['vip']] ?></p>
	<p>Ngày hết hạn: <?= $tin['ngay_vip'] ?></p>

	<p>Đăng VIP Ngày</p>

	<form action="">
	  <div class="form-group">
	    <label for="email">Loại VIP:</label>
	    <select name="vip_type_day" id="vip_type_day" class="vip-type form-control" onchange="vip_type_dayf(this.value)">
			<option value="0">--- Loại VIP ---</option>
			<option value="1" <?= $tin['vip']== 1 ? 'selected' : '' ?> >VIP 5 / 10.000đ / Ngày</option>
			<option value="2" <?= $tin['vip']== 2 ? 'selected' : '' ?> >VIP 4 / 12.000đ / Ngày</option>
			<option value="3" <?= $tin['vip']== 3 ? 'selected' : '' ?> >VIP 3 / 14.000đ / Ngày</option>
			<option value="4" <?= $tin['vip']== 4 ? 'selected' : '' ?> >VIP 2 / 20.000đ / Ngày</option>
			<option value="5" <?= $tin['vip']== 5 ? 'selected' : '' ?> >VIP 1 / 40.000đ / Ngày</option>
			<option value="6" <?= $tin['vip']== 6 ? 'selected' : '' ?> >VIP Đặc Biệt / 80.000đ / Ngày</option>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="pwd">Số ngày VIP:</label>
	    <select name="day_number" id="dayNumber" class="daynumber form-control" onchange="so_ngay(this.value)">
			<option value="0">--- Số ngày ---</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
		</select>
	  </div>

	  <div class="form-group">
	    <label for="pwd">Chi phí: <span id="tien-vip-ngay">0</span>đ</label>
		</div>
	  
	  <button type="button" class="btn btn-primary" onclick="mua_goi_ngay(<?= $tin['product_id'] ?>)">Mua gói ngày</button>
	</form>
	<br>
	<table class="table table-bordered hidden">
	    <thead>
	      <tr>
	        <th>Loại VIP</th>
	        <th>Giá/1 tin/Ngày</th>
	        
	        <th>Mô tả</th>
	        <th>Mua gói ngày</th>
	        
	        <th>Gia hạn tháng</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>VIP 5</td>
	        <td>10.000</td>
	        
	        <td>Tin VIP 5 luôn xuất hiện phía trên tin thường</td>
	        <td>
	        	<?php if ($tin['vip'] != 1) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 1)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 1) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 1)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 4</td>
	        <td>12.000</td>
	        
	        <td>Tin VIP 4 luôn xuất hiện phía trên tin VIP 5</td>
	        <td>
	        	<?php if ($tin['vip'] != 2) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 2)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 2) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 2)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 3</td>
	        <td>14.000</td>
	        
	        <td>Tin VIP 3 luôn xuất hiện phía trên tin VIP 4</td>
	        <td>
	        	<?php if ($tin['vip'] != 3) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 3)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 3) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 3)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 2</td>
	        <td>20.000</td>
	        
	        <td>Tin VIP 2 luôn xuất hiện phía trên tin VIP 3</td>
	        <td>
	        	<?php if ($tin['vip'] != 4) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 4)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 4) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 4)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 1</td>
	        <td>40.000</td>
	        
	        <td>Tin VIP 1 luôn xuất hiện phía trên tin VIP 2</td>
	        <td>
	        	<?php if ($tin['vip'] != 5) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 5)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 5) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 5)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP Đặc Biệt</td>
	        <td>80.000</td>
	        
	        <td>Tin VIP Đặc Biệt luôn xuất hiện phía trên tin VIP 1</td>
	        <td>
	        	<?php if ($tin['vip'] != 6) { ?>
	        	<button type="" onclick="mua_vip_ngay(<?= $_GET['trang'] ?>, 6)">Mua ngày</button>
	        	<?php } ?>
	        </td>
	        
	        <td>
	        	<?php if ($tin['vip'] == 6) { ?>
	        	<button type="" onclick="add_vip_ngay(<?= $_GET['trang'] ?>, 6)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	  </tbody>
	</table>

	<p>Đăng VIP Tháng</p>

	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Loại VIP</th>
	        
	        <th>Giá/1 tin/Tháng(30 ngày)</th>
	        <th>Mô tả</th>
	        
	        <th>Mua gói tháng</th>
	        <th>Gia hạn tháng</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>VIP 5</td>
	        
	        <td>250.000</td>
	        <td>Tin VIP 5 luôn xuất hiện phía trên tin thường</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 1) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 1)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 1) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 1)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 4</td>
	        
	        <td>300.000</td>
	        <td>Tin VIP 4 luôn xuất hiện phía trên tin VIP 5</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 2) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 2)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 2) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 2)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 3</td>
	        
	        <td>350.000</td>
	        <td>Tin VIP 3 luôn xuất hiện phía trên tin VIP 4</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 3) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 3)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 3) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 3)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 2</td>
	        
	        <td>500.000</td>
	        <td>Tin VIP 2 luôn xuất hiện phía trên tin VIP 3</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 4) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 4)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 4) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 4)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP 1</td>
	        
	        <td>1.000.000</td>
	        <td>Tin VIP 1 luôn xuất hiện phía trên tin VIP 2</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 5) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 5)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 5) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 5)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	      <tr>
	        <td>VIP Đặc Biệt</td>
	        
	        <td>2.000.000</td>
	        <td>Tin VIP Đặc Biệt luôn xuất hiện phía trên tin VIP 1</td>
	        
	        <td>
	        	<?php if ($tin['vip'] != 6) { ?>
	        	<button type="" onclick="mua_vip_thang(<?= $_GET['trang'] ?>, 6)">Mua tháng</button>
	        	<?php } ?>
	        </td>
	        <td>
	        	<?php if ($tin['vip'] == 6) { ?>
	        	<button type="" onclick="add_vip_thang(<?= $_GET['trang'] ?>, 6)">Gia hạn</button>
	        	<?php } ?>
	        </td>
	      </tr>
	  </tbody>
	</table>
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


<script>
	function vip_type_dayf (val) {
		var so_ngay = document.getElementById('dayNumber').value;
		var tien = 0;
		// alert(so_ngay);
		if (val != 0 && so_ngay != 0) {
			if (val == 1) {
				tien = 10000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 2) {
				tien = 12000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 3) {
				tien = 14000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 4) {
				tien = 20000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 5) {
				tien = 40000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 6) {
				tien = 80000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
		} else {
			document.getElementById('tien-vip-ngay').innerHTML = 0;
		}
	}

	function so_ngay (so_ngay) {
		var val = document.getElementById('vip_type_day').value;
		var tien = 0;
		// alert(val);
		if (val != 0 && so_ngay != 0) {
			if (val == 1) {
				tien = 10000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 2) {
				tien = 12000 * so_ngay;
				// alert(tien);
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 3) {
				tien = 14000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 4) {
				tien = 20000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 5) {
				tien = 40000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
			if (val == 6) {
				tien = 80000 * so_ngay;
				document.getElementById('tien-vip-ngay').innerHTML = number_format(tien);
			}
		} else {
			document.getElementById('tien-vip-ngay').innerHTML = 0;
		}
	}

	function chon_loai_tin (so) {
		if (so == 1) {
			document.getElementById('info-tin-thuong').style.display = 'block';
			document.getElementById('info-tin-vip-ngay').style.display = 'none';
			document.getElementById('info-tin-vip-thang').style.display = 'none';
		}
		if (so == 2) {
			document.getElementById('info-tin-thuong').style.display = 'none';
			document.getElementById('info-tin-vip-ngay').style.display = 'block';
			document.getElementById('info-tin-vip-thang').style.display = 'none';
		}
		if (so == 3) {
			document.getElementById('info-tin-thuong').style.display = 'none';
			document.getElementById('info-tin-vip-ngay').style.display = 'none';
			document.getElementById('info-tin-vip-thang').style.display = 'block';
		}
	}

function number_format (number, decimals, dec_point, thousands_sep) {
    var n = number, prec = decimals;

    var toFixedFix = function (n,prec) {
        var k = Math.pow(10,prec);
        return (Math.round(n*k)/k).toString();
    };

    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);
    var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
    var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

    var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec);
    // Fix for Internet Explorer parseFloat(0.55).toFixed(0) = 0;

    var abs = toFixedFix(Math.abs(n), prec);
    var _, i;

    if (abs >= 1000) {
        _ = abs.split(/\D/);
        i = _[0].length % 3 || 3;

        _[0] = s.slice(0,i + (n < 0)) +
               _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
        s = _.join(dec);
    } else {
        s = s.replace('.', dec);
    }

    var decPos = s.indexOf(dec);
    if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
        s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
    }
    else if (prec >= 1 && decPos === -1) {
        s += dec+new Array(prec).join(0)+'0';
    }
    return s;
}
</script>

<script>
	function mua_goi_ngay (product_id) {
		var val = document.getElementById('vip_type_day').value;
		var so_ngay = document.getElementById('dayNumber').value;

		if (val != 0 && so_ngay != 0) {
			const xhttp = new XMLHttpRequest();
			  xhttp.onload = function() {
			    // document.getElementById("demo").innerHTML = this.responseText;
			    	alert(this.responseText);
			    	location.reload();
			    }
			  xhttp.open("GET", "/functions/ajax/mua_goi_vip_ngay.php?vip_type="+val+"&so_ngay="+so_ngay+"&product_id="+product_id, true);
			  xhttp.send();
		}
	}
</script>