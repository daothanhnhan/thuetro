<?php
    function uploadPicture($src, $img_name, $img_temp){

        $src = $src.$img_name;//echo $src;

        if (!@getimagesize($src)){

            if (move_uploaded_file($img_temp, $src)) {

                return true;

            }

        }

    }

    $message = "";

    function update_infor(){
        global $conn_vn;
        if(isset($_POST['update_infor'])){
            $name = ($_POST['name']==NULL) ? '' : $_POST['name'];
            $email = ($_POST['email']==NULL) ? '' : $_POST['email'];
            $address = ($_POST['address']==NULL) ? '' : $_POST['address'];
            $phone = ($_POST['phone']==NULL) ? '' : $_POST['phone'];

            $phone_2 = $_POST['phone_2'];

            $moi_gioi = $_POST['moi_gioi'];
            $ban = isset($_POST['ban']) ? 1 : 0;
            $cho_thue = isset($_POST['cho_thue']) ? 1 : 0;

            $loai_bds = $_POST['loai_bds'];
            $city_id = $_POST['city_id'];
            $district_id = $_POST['district_id'];

            $note = mysqli_real_escape_string($conn_vn, $_POST['note']);

            $sex = $_POST['sex'];
            $birthday = $_POST['birthday'];
            $admin_address = $_POST['admin_address'];
            $cccd = mysqli_real_escape_string($conn_vn, $_POST['cccd']);
            $giay_phep = mysqli_real_escape_string($conn_vn, $_POST['giay_phep']);

            $src= "images/portrait/";

            $image = '';
            $time = time();
            // var_dump($_FILES);
            if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
                
                uploadPicture($src, $time.$_FILES['image']['name'], $_FILES['image']['tmp_name']);
                $image = $time.$_FILES['image']['name'];
                // var_dump($image);
            }

            $add = '';
            if ($image != '') {
                $add .= ", image = '$image' ";
            }

            $sql = "UPDATE admin SET admin_name = '$name', admin_phone = '$phone', admin_phone_2 = '$phone_2', admin_address = '$admin_address', admin_email = '$email', moi_gioi = '$moi_gioi', ban = '$ban', cho_thue = '$cho_thue', loai_bds = '$loai_bds', city_id = '$city_id', district_id = '$district_id', note = '$note', sex = '$sex', birthday = '$birthday', cccd = '$cccd', giay_phep = '$giay_phep' $add Where admin_id = " . $_SESSION['admin_id_home'];
            // echo $sql;
            $result = mysqli_query($conn_vn, $sql) or die('error: ' . mysqli_error($conn_vn));
            echo '<script type="text/javascript">alert(\'Thông tin được cập nhật thành công!\'); window.location.href = "/thong-tin-ca-nhan";</script>';
        }
    }

    update_infor();

    
    $list_user = $action->getDetail('admin', 'admin_id', $_SESSION['admin_id_home']);

    $productcat = $action->getList('productcat', '', '', 'productcat_id', 'asc', '', '', '');

    $city = $action->getList('city', '', '', 'id', 'asc', '', '', '');
    if (!empty($list_user['city_id'])) {
        $district = $action->getList('district', 'city_id', $list_user['city_id'], 'id', 'asc', '', '', '');
    } else {
        $district = $action->getList('district', 'city_id', 1, 'id', 'asc', '', '', '');
    }
    
?>
<style>
div.user-infor table tr {
    /*margin-bottom: 9px;*/
}
div.user-infor table td:nth-child(1) {
    text-align: right;
    width: 68%;
    margin-right: 5px;
}
div.user-infor .avatar {
    position: absolute;
    top: 50px;
    right: 10px;
    max-height: 200px;
    max-width: 100px;
}
div.user-infor #loginname, div.user-infor #account_code {
    font-weight: 700;
}
div.user-infor .balance {
    color: #220cc4;
    font-weight: 700;
}
div.user-infor .notice {
    color: #ff0000;
}
div.info-2 table td:nth-child(1) {
    text-align: right;
    width: 40%;
    padding-right: 5px;
}
input[type=text], textarea, input[type=password] {
    border: 1px solid #e0e0e0;
    border-radius: 3px;
    line-height: 20px;
    height: 20px;
}
div.user-infor input[type="text"] {
    width: 255px;
    padding-left: 2px;
    margin-bottom: 3px;
}
div.user-infor input[type="email"] {
    width: 255px;
    padding-left: 2px;
    margin-bottom: 3px;
    border: 1px solid #ccc;
    height: 25px;
}
select {
    border: 1px solid #ccc;
    height: 25px;
}
div.user-infor select {
    width: 255px;
    padding: 1px;
    margin-bottom: 3px;
}
div.user-infor .introduce {
    width: 255px;
    height: 180px;
}
div.user-infor .user-infor-title {
    border-bottom: 1px solid #e0e0e0;
    padding: 0 0 5px;
    text-transform: uppercase;
    margin-bottom: 10px;
    font-weight: 700;
    color: #1118bd;
    text-align: left;
}

.loai-tai-khoan {
    display: flex;
    align-items: flex-end;
    /*padding-top: 5px;*/
}
.loai-tai-khoan input {
    margin-left: 10px;
}
</style>
<div class="gb-register1 user-infor">
     <h1 class="title-khoahoc"><i class="fa fa-bookmark" aria-hidden="true"></i> Thông tin tài khoản</h1>
     <div>
         <table cellspacing="0">
            <tbody><tr>
            </tr>            
            <tr>
                <td>                    
                </td>
                <td>
                    <?php if (empty($list_user['image'])) { ?>
                    <img src="/images/no-avatar.jpg" id="avatar" class="avatar">
                    <?php } else { ?>
                    <img src="/images/portrait/<?= $list_user['image'] ?>" id="avatar" class="avatar">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    Mã tài khoản:
                </td>
                <td>
                    <span id="account_code"><?= $list_user['admin_id'] ?></span>                               
                </td>                       
            </tr>  
            <tr>
                <td>
                    Tên truy cập:
                </td>
                <td>
                    <span id="loginname"><?= $list_user['admin_login'] ?></span>                                
                </td>                       
            </tr>    
            <tr>
                <td>
                    Ngày đăng ký:
                </td>
                <td>
                    <span id="register_date"><?= $list_user['ngay_tao'] ?></span>                                
                </td>                       
            </tr>
            <tr>
                <td>
                    Tình trang chứng thực:
                </td>
                <td>
                    <span id="verify_status"><img src="/images/verified.png"></span>                               
                </td>                       
            </tr>
            <tr>
                <td>
                    Trạng thái hoạt động:
                </td>
                <td>
                    <span id="activity_status">Đang hoạt động</span>                                
                </td>                       
            </tr>
            <tr>
                <td>
                    Số dư tài khoản:
                </td>
                <td>
                    <span id="balance" class="balance"><?= number_format($list_user['tien_mua']) ?> đồng</span>                              
                </td>                       
            </tr>
            <tr>
                <td>
                    Số lần đã bị khóa:
                </td>
                <td>
                    <span id="block_times"></span>                          
                </td>                       
            </tr>
            <tr>
                <td>
                    Lý do khóa:
                </td>
                <td>
                    <span id="block_reason"></span>                         
                </td>                       
            </tr>
            <tr>
                <td>
                    Lần bị khóa gần nhất:
                </td>
                <td>
                    <span id="last_block_date"></span>                          
                </td>                       
            </tr>    
            <tr>
                <td>
                    Điểm đánh giá:
                </td>
                <td>
                    <div class="review-star">
                        <span id="rate"><span class="rate" style="width:60%;"></span></span>    
                    </div>                      
                </td>                       
            </tr>  
            <tr>
                <td>
                    Tài khoản bị cảnh báo:
                </td>
                <td>
                    <span id="notice" class="notice">Không có</span>                        
                </td>                       
            </tr>      
        </tbody></table>
     </div>
     <h1 class="title-khoahoc"><i class="fa fa-bookmark" aria-hidden="true"></i> Thông tin liên hệ</h1>
     <div class="info-2">
         <table cellspacing="0">
            <tbody><tr>
                <td>
                    Tên liên hệ:
                </td>
                <td>
                    <input name="name" type="text" id="fullname" class="fullname"  value="<?= $list_user['admin_name'] ?>" form="thong-tin-ca-nhan" required>                          
                </td>                       
            </tr>
            <tr>
                <td>
                    Email liên hệ:
                </td>
                <td>
                    <input name="email" type="email" id="email1" class="email1"  value="<?= $list_user['admin_email'] ?>" form="thong-tin-ca-nhan">
                </td>
            </tr>
            
            <!-- <tr>
                <td>
                    Tỉnh/Thành phố:
                </td>
                <td>
                    
                    <select class="" id="sel1" name="city_id" onchange="chon_tinh(this.value)">
                        <option value="0">------ Tỉnh/Thành ------</option>
                        <?php foreach ($city as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['city_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                      </select>
                </td>
            </tr>
            <tr>
                <td>
                    Quận/Huyện:
                </td>
                <td>
                    
                    <select class="" id="huyen_id" name="district_id">
                        <option value="0">------ Quận/Huyện ------</option>
                        <?php foreach ($district as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['district_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                      </select>
                </td>
            </tr> -->
            <tr>
                <td>
                    Di dộng 1:
                </td>
                <td>
                    <input name="phone" type="text" id="phone1" class="phone1"  value="<?= $list_user['admin_phone'] ?>" form="thong-tin-ca-nhan">                          
                </td>
            </tr>
            <tr>
                <td>
                    Di động 2:
                </td>
                <td>
                    <input name="phone_2" type="text" id="phone2" class="phone2"  value="<?= $list_user['admin_phone_2'] ?>" form="thong-tin-ca-nhan">                         
                </td>
            </tr>    
            <tr>
                <td colspan="2"><div id="phoneNotice" class="phone-notice" style="color: #ff0000;"></div></td>
            </tr>             
            <tr>
                <td>
                    Loại tài khoản:
                </td>
                <td style="" class="loai-tai-khoan">
                    <input value="0" name="moi_gioi" type="radio" id="agent1" class="agent" style="width:16px; height:16px;" <?= $list_user['moi_gioi']==0 ? 'checked' : '' ?>  form="thong-tin-ca-nhan"> Cá nhân  
                    <input value="1" name="moi_gioi" type="radio" id="agent2" class="agent" style="width:16px; height:16px;"  <?= $list_user['moi_gioi']==1 ? 'checked' : '' ?>  form="thong-tin-ca-nhan"> Nhà môi giới                       
                </td>
            </tr>
            <tr>
                <td>
                    Giới tính:
                </td>
                <td style="" class="loai-tai-khoan">
                    <input value="0" name="sex" type="radio" id="agent1" class="agent" style="width:16px; height:16px;" <?= $list_user['sex']==0 ? 'checked' : '' ?>  form="thong-tin-ca-nhan"> Nam  
                    <input value="1" name="sex" type="radio" id="agent2" class="agent" style="width:16px; height:16px;"  <?= $list_user['sex']==1 ? 'checked' : '' ?>  form="thong-tin-ca-nhan"> Nữ     
                     <input value="2" name="sex" type="radio" id="agent2" class="agent" style="width:16px; height:16px;"  <?= $list_user['sex']==2 ? 'checked' : '' ?>  form="thong-tin-ca-nhan"> Khác                  
                </td>
            </tr>       
            <tr>
                <td>
                    Ngày sinh:
                </td>
                <td>
                    <input name="birthday" type="date" id="phone2" class="phone2"  value="<?= $list_user['birthday'] ?>" form="thong-tin-ca-nhan">                         
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ:
                </td>
                <td>
                    <input name="admin_address" type="text" id="phone2" class="phone2"  value="<?= $list_user['admin_address'] ?>" form="thong-tin-ca-nhan">                         
                </td>
            </tr>
            <tr>
                <td>
                    CMND/CCCD:
                </td>
                <td>
                    <input name="cccd" type="text" id="phone2" class="phone2"  value="<?= $list_user['cccd'] ?>" form="thong-tin-ca-nhan">                         
                </td>
            </tr>
            <tr>
                <td>
                    Giấy phép kinh doanh:
                </td>
                <td>
                    <input name="giay_phep" type="text" id="phone2" class="phone2"  value="<?= $list_user['giay_phep'] ?>" form="thong-tin-ca-nhan">                         
                </td>
            </tr>

            <tr class="row-agent">
                <td colspan="2">
                    <div class="user-infor-title"><h1 class="title-khoahoc" style="margin-bottom: 0;"><i class="fa fa-bookmark" aria-hidden="true"></i> Hoạt động môi giới</h1></div>
                    
                </td>
            </tr>

            
            <tr class="row-agent">
                <td>                
                    Ảnh đại diện:
                </td>
                <td>                    
                    <input type="file" class="input-avatar" name="image" accept="image/*" form="thong-tin-ca-nhan">                         
                </td>
            </tr>
             <tr class="row-agent">
                <td>                
                    
                </td>
                <td>                    
                    <span style="color:#1765AB">Ảnh đại diện là của cá nhân hoặc doanh nghiệp (<span style="color:Red">đăng ảnh không liên quan sẽ bị khóa tài khoản</span>)</span>
                </td>
            </tr>
            
            <tr class="row-agent">
                <td>
                    Loại BĐS môi giới chính:
                </td>
                <td>
                               
                    <select class="" id="sel1" name="loai_bds" form="thong-tin-ca-nhan">
                         <option value="0">------ Loại BĐS ------</option>
                        <?php foreach ($productcat as $item) { ?>
                        <option value="<?= $item['productcat_id'] ?>" <?= $item['productcat_id']==$list_user['loai_bds'] ? 'selected' : '' ?> ><?= $item['productcat_name'] ?></option>
                        <?php } ?>
                      </select>
                </td>
            </tr>
            <tr>
                <td>
                    Nhu cầu môi giới:
                </td>
                <td>
                    <input value="1" name="ban" type="checkbox" id="agent1" class="agent"  form="thong-tin-ca-nhan" <?= $list_user['ban']==1 ? 'checked' : '' ?>  style="width:16px; height:16px;"> Bán  
                    <input value="1" name="cho_thue" type="checkbox" id="agent2" class="agent" form="thong-tin-ca-nhan" style="width:16px; height:16px;"  <?= $list_user['ban']==1 ? 'checked' : '' ?> > Cho thuê                       
                </td>
            </tr>
            <tr class="row-agent">
                <td>
                    Khu vực hoạt động chính:
                </td>
                <td>
                    <select class="" id="sel1" name="city_id" onchange="chon_tinh(this.value)"  form="thong-tin-ca-nhan">
                        <option value="0">------ Tỉnh/Thành ------</option>
                        <?php foreach ($city as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['city_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                      </select>
                </td>
            </tr>
            <tr class="row-agent">
                <td>
            
                </td>
                <td>
                    <select class="" id="huyen_id" name="district_id" form="thong-tin-ca-nhan">
                        <option value="0">------ Quận/Huyện ------</option>
                        <?php foreach ($district as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['district_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                      </select>
                </td>
            </tr>
            <tr class="row-agent">
                <td style="vertical-align: middle;">
                    Giới thiệu
                </td>
                <td style="position:relative">
                    <textarea name="note" id="introduce" class="introduce" rows="4" maxlength="250" placeholder="Chuyên môi giới nhà và đất Quận 7, Quận 5. Uy tín, tận tâm" form="thong-tin-ca-nhan"><?= $list_user['note'] ?></textarea> 
                        <!-- <div class="introduce-sample">
                            Ví dụ: Chuyên môi giới nhà và đất Quận 7, Quận 5. Trên 10 năm kinh nghiệm môi giới, uy tín, tận tâm...
                            <br>
                            <b style="color:#000000">Chú ý: Nội dung không chứa đường dẫn đến website khác.</b>
                        </div> -->
                </td>
            </tr>
            <tr>
            </tr>
            <!-- <tr>
                <td>
                </td>
                <td class="button" align="left">
            <a href="javascript:void(0)" onclick="UpdateUserInfor()"><span>Cập nhật</span></a>                      
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:void(0)" onclick="BackToDefault()"><span>Trở lại</span></a>
                </td>   
            </tr>  -->  
        </tbody></table>
     </div>
     <h1 class="title-khoahoc"><i class="fa fa-bookmark" aria-hidden="true"></i> Chứng thực tài khoản</h1>
     <div class="info-2">
         <table cellspacing="0" style="width: 100%;">
            <tbody>
            <tr>
                <td>
                    Tài khoản cá nhân
                </td>
                <td>
                    CMNN/CCCD/Hộ chiếu                          
                </td>                       
            </tr>
            <tr>
                <td>
                    Mặt trước
                </td>
                <td>
                    <input name="cccd_truoc" type="file" id="" class="email1" form="thong-tin-ca-nhan">
                </td>
            </tr>
            <tr>
                <td>
                    Mặt sau
                </td>
                <td>
                    <input name="cccd_sau" type="file" id="" class="email1" form="thong-tin-ca-nhan">
                </td>
            </tr>
        </tbody>
    </table>
</div>
     <!-- <h1 class="title-khoahoc"><i class="fa fa-bookmark" aria-hidden="true"></i> Tài khoản của tôi</h1> -->
    <form action="" method="post" enctype="multipart/form-data" id="thong-tin-ca-nhan">
        <!-- <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" class="form-control" name="name" placeholder="Họ và tên" value="<?= $list_user['admin_name'] ?>" required>
        </div>
        <div class="form-group">
                <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Địa chỉ Email" value="<?= $list_user['admin_email'] ?>" >
        </div>
        <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="<?= $list_user['admin_address'] ?>" >
        </div>
        <div class="form-group">
            <label>Số điện thoại:</label>
            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="<?= $list_user['admin_phone'] ?>" >
        </div>
        <div class="form-group">
            <label>Ảnh đại diện:</label>
            <input type="file" class="form-control" name="image" placeholder="Số điện thoại" >
            <img src="/images/portrait/<?= $list_user['image'] ?>" alt="" width="200">
        </div>
        <div class="form-group">
            <label>Loại tài khoản:</label>
            <div class="radio">
              <label><input type="radio" name="moi_gioi" value="0" <?= $list_user['moi_gioi']==0 ? 'checked' : '' ?> >Cá nhân</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="moi_gioi" value="1" <?= $list_user['moi_gioi']==1 ? 'checked' : '' ?> >Môi giới</label>
            </div>
            
        </div>
        <div class="form-group">
            <label>Nhu cầu Môi giới:</label>
            <div class="radio">
                <label class="checkbox-inline"><input type="checkbox" value="1" <?= $list_user['ban']==1 ? 'checked' : '' ?> name="ban">Bán</label>
            </div>
            <div class="radio">
                <label class="checkbox-inline"><input type="checkbox" value="1" <?= $list_user['cho_thue']==1 ? 'checked' : '' ?> name="cho_thue">Cho thuê</label>
            </div>
        </div>
         <div class="form-group">
            <label>Nhu cầu Môi giới:</label>
            <select class="form-control" id="sel1" name="loai_bds">
                <?php foreach ($productcat as $item) { ?>
                <option value="<?= $item['productcat_id'] ?>" <?= $item['productcat_id']==$list_user['loai_bds'] ? 'selected' : '' ?> ><?= $item['productcat_name'] ?></option>
                <?php } ?>
              </select>
        </div>
        <div class="form-group">
            <label>Tỉnh:</label>
            <select class="form-control" id="sel1" name="city_id" onchange="chon_tinh(this.value)">
                <?php foreach ($city as $item) { ?>
                <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['city_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                <?php } ?>
              </select>
        </div>
        <div class="form-group">
            <label>Huyện:</label>
            <select class="form-control" id="huyen_id" name="district_id">
                <?php foreach ($district as $item) { ?>
                <option value="<?= $item['id'] ?>" <?= $item['id']==$list_user['district_id'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                <?php } ?>
              </select>
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <textarea class="form-control" rows="5" id="comment" name="note"><?= $list_user['note'] ?></textarea>
        </div> -->
        <div class="form-group">
            <button type="submit" name="update_infor" class="btn btn-success" style="background: #da251c;">Cập nhật</button>
            <!-- <a href="/thong-tin-ca-nhan" class="btn btn-danger" role="button">Hủy</a> -->
        </div>
    </form>
</div>
<style type="text/css" media="screen">
	.gb-register1 label{padding-bottom: 10px;}
    .title-khoahoc{
        font-size: 18px;
        text-transform: uppercase;
        padding-bottom: 15px;
        color: #da251c;
    }
    .ten-khoahoc{color: #207244;}
</style>

<script>
    function chon_tinh (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
            // alert(this.responseText);
            document.getElementById("huyen_id").innerHTML = this.responseText;
            chon_huyen(0);
        }
      xhttp.open("GET", "/functions/ajax/chon_tinh.php?id="+id, true);
      xhttp.send();
    }
</script>