<?php 
  $dieu_luat = $action->getDetail('page', 'page_id', 36);
?>
<div class="container">
	<div class="row">
		<div class="col-xs-9">
			<?= $dieu_luat['page_content'] ?>
		</div>
		<div class="col-xs-3">
			<?php include DIR_SIDEBAR."MS_SIDEBAR_CHOVIET_0001.php";?>
		</div>
	</div>
	
</div>

<!-- Modal -->
<div id="thong-bao" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body text-center">
        <p>Bạn có 3 tin không được duyệt</p>
        <p>Để tiếp tục đăng tin bạn phải xóa hoặc sửa các tin này</p>
        <p>Tài khoản của bạn sẽ bị khóa nếu có hơn 10 tin không được duyệt</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
    $(window).on('load', function() {
        // $('#thong-bao').modal('show');
    });
</script>