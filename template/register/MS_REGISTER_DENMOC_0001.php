<div class="gb-header-top_mptoto-taikhoan">
    <div class="btn-group show-on-hover">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user" aria-hidden="true"></i> Tài khoản <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
        	<?php if (!isset($_SESSION['user_id_gbvn'])) { ?>
            <li style="width: 100%;"><a href="/dang-nhap"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
            <li style="width: 100%;"><a href="/dang-ky"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng ký</a></li>
        <?php } else { ?>
        	<li style="width: 100%;"><a href="/thong-tin-tai-khoan"><i class="fa fa-sign-in" aria-hidden="true"></i> Thông tin tài khoản</a></li>
            <li style="width: 100%;"><a href="/dang-xuat"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
        <?php } ?>
        </ul>
    </div>
</div>