<?php 
    function dang_nhap () {
        global $conn_vn;
        if (isset($_POST['dang_nhap'])) {
            $name = $_POST['name'];
            $pass = $_POST['password'];

            $sql = "SELECT * FROM admin WHERE admin_login = '$name'";
            $result = mysqli_query($conn_vn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $row = mysqli_fetch_assoc($result);
                $admin_pass = $row['admin_password'];
                if (password_verify($pass, $admin_pass)) {
                    echo '<script>alert(\'Đăng nhập thành công.\')</script>';
                    $_SESSION['admin_id_home'] = $row['admin_id'];
                } else {
                    echo '<script>alert(\'Tên đăng nhập hoặc mật khẩu không đúng.\')</script>';
                }
            } else {
                echo '<script>alert(\'Tên đăng nhập hoặc mật khẩu không đúng.\')</script>';
            }
        }
    }
    dang_nhap();

    function dang_ky () {
        global $conn_vn;
        global $action;
        if (isset($_POST['dang_ky'])) {
            $admin_name = $_POST['admin_name'];
            $admin_login = $_POST['admin_login'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $admin_email = $_POST['admin_email'];
            $admin_phone = $_POST['admin_phone'];

            $checkUser = $action->getDetail('admin','admin_login',$admin_login);
            $ok = 1;
            if ($checkUser != '') {
                $ok = 0;
                echo '<script>alert(\'Tên đăng nhập đã tồn tại.\')</script>';
            }

            if ($pass1 != $pass2) {
                $ok = 0;
                echo '<script>alert(\'Mật khẩu không khớp.\')</script>';
            }

            if ($ok == 1) {
                $admin_password = password_hash($pass1, PASSWORD_DEFAULT);

                $sql = "INSERT INTO admin (admin_name, admin_login, admin_password, admin_email, admin_phone, admin_state, admin_role) VAlUES ('$admin_name', '$admin_login', '$admin_password', '$admin_email', '$admin_phone', '1', '2')";
                $result = mysqli_query($conn_vn, $sql);
                if ($result) {
                    $admin_id = mysqli_insert_id($conn_vn);
                    $_SESSION['admin_id_home'] = $admin_id;
                    echo '<script>alert(\'Bạn đã đăng ký thành công.\')</script>';
                } else {
                    echo '<script>alert(\'Có lỗi xảy ra.\')</script>';
                }
            }
        }
    }
    dang_ky();
?>

<style>
</style>
<div class="top-header-area">
            <div class="container-custom">
                <div class="row">    
                    <?php if (!isset($_SESSION['admin_id_home'])) { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row-top">
                                                <span class="font-style-regular">Hỗ trợ đăng tin: Mr.Trường: <?= $rowConfig['content_home10'] ?> </span>
                        <a href="#" class="huong-dan-dang-tin" style="font-size:12px; margin-left:5px;">Hướng dẫn đăng tin</a> 
                        <!-- <a href="#" class="dangtinrao" style="background: #eb0c3b;"><i class="fas fa-plus-circle"></i>  Đăng tin rao</a>
                        <a href="#" class="dangtinrao"><i class="fas fa-user-plus"></i>  Đăng nhập </a>
                        <a href="#" class="dangtinrao"><i class="fas fa-user-plus"></i>  Đăng ký </a> -->
                        <button type="button" class="btn-custom-dangtinrao btn-bg" id="dangbai_btn"><a href="#" class="text-color-custom-dangtinrao"><i class="fas fa-plus-circle"></i>  Đăng tin rao</a></button>
                        
                        <!-- --------------------->
                            <!-- Trigger the modal with a button -->
                            
                            <button type="button" class="btn-custom-dangtinrao" data-toggle="modal" data-target="#dangky"><a href="#" class="text-color-custom-dk-dn"><i class="fas fa-user-plus"></i>  Đăng ký </a></button>                       
                            
                        <!-- ------------------------ -->
                            <button type="button" class="btn-custom-dangtinrao" id="login_btn" data-toggle="modal" data-target="#login"><a class="text-color-custom-dk-dn"><i class="fas fa-user-plus"></i>  Đăng nhập </a></button>                       
                            
                    </div>
                <?php } else { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row-top">
                        <div class="text-dang-tin">Chào mừng mrcat đã đăng nhập thành công. Bạn có thể <a href="/dang-bai">đăng bài<br></a>
                                Lưu ý là bài sau khi đăng phải được Admin duyệt mới có thể lên trang chủ</div>
                        <a href="/dang-xuat">
                            Đăng xuất
                        </a>

                        
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đăng nhập</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="email" name="name" required="">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" required="">
          </div>
          
          <button type="submit" name="dang_nhap" class="btn btn-default">Đăng nhập</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="dangky" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đăng ký tài khoản</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="admin_name" placeholder="Tên" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="admin_login" placeholder="Tên đăng nhập" required="">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="pwd" name="pass1" placeholder="Mật khẩu" required="">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="pwd" name="pass2" placeholder="Nhập lại mật khẩu" required="">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="admin_email" placeholder="Địa chỉ E-Mail" required="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="admin_phone" placeholder="Nhập số điện thoại" required="">
          </div>
          <button type="submit" name="dang_ky" class="btn btn-default">Đăng ký</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>