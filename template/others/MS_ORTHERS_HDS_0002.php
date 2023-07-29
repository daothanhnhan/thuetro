<?php 
  function gui_yeu_cau () {
    global $conn_vn;
    if (isset($_POST['gui_yeu_cau'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $note = $_POST['note'];

      $sql = "INSERT INTO gui_yeu_cau (name, phone, email, note) VALUES ('$name', '$phone', '$email', '$note')";

      $result = mysqli_query($conn_vn, $sql);
      if ($result) {
        echo '<script>alert(\'Bạn đã gửi yêu cầu thành công.\');</script>';
      } else {
        echo '<script>alert(\'Có lỗi xảy ra.\');</script>';
      }
    }
  }
  gui_yeu_cau();
?>

<link rel="stylesheet" href="/plugin/owl-carouse/owl.carousel.min.css">

<link rel="stylesheet" href="/plugin/owl-carouse/owl.theme.default.min.css">

<link rel="stylesheet" href="/plugin/animsition/css/animate.css">
<div class="wearehere">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <div class="flex-content">
                  <div class="flex___content">
                      <h3>
                          <?= $lang=='vn' ? 'Chúng tôi ở đây' : 'We are here' ?>
                      </h3>
                      <h4><?= $lang=='vn' ? 'Để giải đáp mọi thắc mắc về pháp luật cho bạn' : 'To answer all your legal questions' ?></h4>
                      <p><?= $lang=='vn' ? 'Quyền lợi của bạn là ưu tiên hàng đầu của chúng tôi. Hãy gửi yêu cầu nếu bạn cần luật sư giải quyết mọi vấn đề pháp lý của mình' : 'Your interests are our top priority. Send a request if you need a lawyer to solve all your legal problems' ?></p>
                      <button data-toggle="modal" data-target="#yeu-cau">
                          <?= $lang=='vn' ? 'Gửi yêu cầu' : 'Send require' ?>
                      </button>
                  </div>
              </div>
          </div>
              <div class="col-md-6">
    <?php include DIR_SLIDESHOW."MS_SLIDESHOW_H2D_0002.php";?>
                
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal -->
<div id="yeu-cau" class="modal fade" role="dialog" style="z-index: 999999;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gửi yêu cầu</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Họ và tên:</label>
            <input type="text" name="name" class="form-control" id="email" required="">
          </div>
          <div class="form-group">
            <label for="email1">Số điện thoại:</label>
            <input type="text" name="phone" class="form-control" id="email1" required="">
          </div>
          <div class="form-group">
            <label for="pwd">Email:</label>
            <input type="email" name="email" class="form-control" id="pwd">
          </div>
          <div class="form-group">
            <label for="comment">Yêu cầu:</label>
            <textarea class="form-control" name="note" rows="5" id="comment"></textarea>
          </div>
          <button type="submit" class="btn btn-default" name="gui_yeu_cau">Gửi</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>