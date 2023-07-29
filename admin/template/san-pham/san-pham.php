<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('product',array('product_name','product_code'), $_GET['search'],$trang,20,$_GET['page']);
    }else{
        if ($_SESSION['admin_role'] == 1) {
            $rows = $action->getList('product','','','product_id','desc',$trang,20,'san-pham');
        } else {
            $rows = $action->getList('product','created_id',$_SESSION['admin_id'],'product_id','desc',$trang,20,'san-pham');
        }
        
    }
?>	
<div class="boxPageNews">
	<div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="san-pham">
            <button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search" />                                  
        </form>
    </div>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Ngày đăng</th>
                <th>Giá</th>
                <th>User</th>
                <th>Trạng thái</th>
                <th>Không dược duyệt</th>
                <th>Lý do</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($rows['data'] as $key => $row) {
                    // var_dump($row);
                ?>
                    <tr>
                        <td><a href="index.php?page=sua-san-pham&id=<?= $row['product_id']; ?>" title=""><?= $row['product_name']; ?></a></td>
                        <td>
                            <?php 
                                // $action1 = new action_page('VN');
                                // echo $action1->getDetail('productcat','productcat_id',$row['productcat_id'])['productcat_name'];
                                echo $row['ngay_dang'];
                            ?>
                        </td>
                        <td><?= number_format($row['product_price'],'0','','.')?> đ</td>
                        <td><?= $row['created_id'] ?></td>
                        <td><input type="checkbox" name="" <?= $row['state'] == 1 ? 'checked' : ''?> onclick="duyet(<?= $row['product_id'] ?>)"></td>
                        <td><input type="checkbox" name="" <?= $row['khong_duoc_duyet'] == 1 ? 'checked' : ''?> onclick="khong_duoc_duyet(<?= $row['product_id'] ?>)"></td>
                        <td><a href="index.php?page=san-pham-ly-do&product_id=<?= $row['product_id'] ?>">Lý do</a></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
	
    <div class="paging">             
    	<?= $rows['paging'] ?>
	</div>
</div>
<?php  ?>

<script>
    function duyet (id) {
        // alert(id)
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("demo").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/duyet.php?id="+id, true);
          xhttp.send();
    }

    function khong_duoc_duyet (id) {
        // alert(id)
        const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            // document.getElementById("demo").innerHTML = this.responseText;
            }
          xhttp.open("GET", "/functions/ajax/khong_duoc_duyet.php?id="+id, true);
          xhttp.send();
    }
</script>
