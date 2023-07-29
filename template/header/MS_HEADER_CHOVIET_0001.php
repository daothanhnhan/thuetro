<?php 
	$user_name = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home'])['admin_name'];
?>
<style>
.lang-co li {
	display: inline-block;
}
.lang-co img {
	/*width: 30px;*/
	height: 30px;
}
</style>
<div class="row">
	<!-- <div class="header-top">
		<p><img src="/images/new.gif" style="width: auto;"> Hỗ trợ đăng tin: <span><?= $rowConfig['content_home3'] ?> - <?= $rowConfig['content_home6'] ?></span></p>
		<p>Thời gian làm việc: <span>7h30 - 12h; 14h - 17h (từ thứ Hai - thứ Bảy)</span> | Email: <span><?= $rowConfig['content_home2'] ?></span> | <span><?= $rowConfig['content_home6'] ?></span></p>
	</div> -->
	<!-- <div>
		<a href="/" title=""><img src="/images/chotot.jpg" class="w100"></a>
	</div> -->
	<?php include DIR_SLIDESHOW."MS_SLIDESHOW_H2D_0003.php";?>
	<div class="menu-dang-ky text-right">
		<ul>
			<li><a href="/tin-yeu-thich" title="" class="dang-tin"><img src="/images/yeu-thich.png" alt="icon"> Tin yêu thích</a></li>
			<li><a href="/dang-tin" title="" class="dang-tin"><img src="/images/dang-tin.png" alt="icon"> Đăng tin nhà đất</a></li>
			<li><a href="#" title="" data-toggle="modal" data-target="#dangky" class="tai-khoan"><img src="/images/register.png" alt="icon"> Đăng ký thành viên</a></li>
			<?php if (isset($_SESSION['admin_id_home'])) { ?>
			<li><a href="/quan-ly-ca-nhan" class="tai-khoan"><img src="/images/login.png" alt="icon"> Xin chào <?= $user_name ?></a>  &nbsp;&nbsp;<a href="/dang-xuat" title="" class="tai-khoan" style="color: #c4000f;">(Thoát)</a></li>
			<?php } else { ?>
			<li><a href="#" title="" data-toggle="modal" data-target="#login" class="tai-khoan"><img src="/images/login.png" alt="icon"> Đăng nhập</a></li>
			<?php } ?>
		</ul>
	</div>

	<ul class="lang-co text-right">
        <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="0">
               <img src="/images/ptd_vn.jpg" alt="flag" class=" ptd_lgue">
             </a>
           </li>
           <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="1">
               <img src="/images/ptd_en.jpg" alt="flag" class="ptd_lgue">
             </a>
           </li>

           <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="2">
               <img src="/images/han.png" alt="flag" class="ptd_lgue">
             </a>
           </li>
           <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="3">
               <img src="/images/nga.png" alt="flag" class="ptd_lgue">
             </a>
           </li>
           <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="4">
               <img src="/images/nhat.png" alt="flag" class="ptd_lgue">
             </a>
           </li>
           <li class="translation-icons">
             <a href="javascript:void(0)" title="" data-placement="5">
               <img src="/images/ptd_cn.png" alt="flag" class="ptd_lgue">
             </a>
           </li>                        
    </ul>
</div>