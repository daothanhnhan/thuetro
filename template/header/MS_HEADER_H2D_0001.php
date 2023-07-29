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
                    echo '<script>alert(\'Đăng nhập thành công.\');location.href = "/quan-ly-ca-nhan";</script>';
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
.container {
    width: 1000px;
}
body {
    font-size: 12px;
    padding: 0;
    margin: 0;
    background-repeat: repeat-x;
    /*font-family: Arial,Verdana,sans-serif;*/
    background-image: url(/images/background.jpg);
    background-repeat: repeat-x;
    background-position: top left;
    line-height: 16px;
    /*position: relative;*/
}
.content-main {
    width: 1000px;
    margin: auto;
    background: #fff;
    box-shadow: 0 0 15px #969696;
    /*position: relative;*/
    z-index: 100;
    /*padding-top: 40px;*/
}
</style>
<!--MENU MOBILE-->
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<?php include_once DIR_MENU."MS_MENU_H2D_0002.php"; ?>
<!-- End menu mobile-->
<!--MENU DESTOP-->
<header class="">
    <div class="gb-header-ruouvang">
        <div class="gb-top-header_ruouvang">
            <div class="container">
                <?php include_once DIR_HEADER."MS_HEADER_CHOVIET_0001.php"; ?>
            </div>
            <div class="gb-header-between_ruouvang">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-md-12 col-sm-12">
                           <div class="row">
                                <?php include DIR_MENU."MS_MENU_H2D_0001.php";?>
                           </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /header -->
<script src="/plugin/sticky/jquery.sticky.js"></script>
<script>
$(document).ready(function() {

    $(".sticky-menu").sticky({ topSpacing: 0 });

});
</script>

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
          <div>
            <br>
            <a href="/login-go.html" title=""><img src="/images/google-sign-in-button.png" alt="login" width="200"></a>
          </div>
          
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