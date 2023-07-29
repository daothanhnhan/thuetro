<?php 

    $list = $action->getList('productcat','','','productcat_id','desc','','','');

    $attribute_list = $action->getList('thuoc_tinh', '', '', 'id', 'asc', '' ,'', '');

    $nhom = $action->getList('product_diff_color', '', '', 'id', 'asc', '', '', '');

    $huong = $action->getList('huong', '', '', 'id', 'asc', '', '', '');

    $huyen = $action->getList('huyen', '', '', 'id', 'asc', '', '', '');

    $da_ban = $action->getList('da_ban', '', '', 'id', 'asc', '', '', '');
    $su_uu_tien = $action->getList('su_uu_tien', '', '', 'id', 'asc', '', '', '');
    $rent_time = $action->getList('rent_time', '', '', 'id', 'asc', '', '', '');
    $quyen_dat = $action->getList('quyen_dat', '', '', 'id', 'asc', '', '', '');
    $phan_loai = $action->getList('phan_loai', '', '', 'id', 'asc', '', '', '');
    $is_house = $action->getList('is_house', '', '', 'id', 'asc', '', '', '');

?>

<script src="js/previewImage.js"></script>

<script>



    function addMoreSize(self){

        var total = $(self).parents('.colorProduct').data('total');

        $.ajax({

            url: "ajax.php",

            data: {'action': 'addMoreSize', 'total': total },

            type: "post",

            success:function(html){

                $(self).parent('.size_section').append(html);

                //$("#size_section").append(html);

            }

        })

    }



    function deleteColor(val){

        $(val).parent().remove();

    }

    

    $(document).ready(function() {



        $('#addMoreSales').on('click',function(e){

            e.preventDefault();

            var total = $('.salesProduct').length;

            $.ajax({

                url: "ajax.php",

                data: {'action': 'addMoreSales', 'total': total },

                type: "post",

                success:function(html){

                    $("#sales_section").append(html);

                }

            })

        })



        $("#addMoreColor").on("click",function(e){

            e.preventDefault();

            var total = $('.colorProduct').length;

            $.ajax({

                url: "ajax.php",

                data: {'action': 'addMoreColor', 'total': total },

                type: "post",

                success:function(html){

                    $("#color_section").append(html);

                }

            })

        })



        $('#addSalePrice').on('click',function(e){

            e.preventDefault();

        })





        $("input[id=fileUpload2").previewimage({

            div: "#preview2",

            imgwidth: 90,

            imgheight: 90

        });



    });



    

</script>

<form action="" method="post" enctype="multipart/form-data" id="addProduct">

    <button class="btnAddTop" type="submit" style="position: fixed;top: 0;right: 220px;z-index: 9">Lưu</button>

    <input type="hidden" name="action" value="addProduct">

    <input type="hidden" name="table" id="table" value="product">

    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Thông tin sản phẩm</span>

            <p class="subLeftNCP">Cung cấp thông tin về tên, mô tả loại sản phẩm và nhà sản xuất để phân loại sản phẩm</p>   

            <p class="titleRightNCP">Chọn ảnh đại diện cho sản phẩm</p>

            <div id="wrapper">

                <input id="fileUpload" type="file" name="fileUpload1" onchange="showImage(this)" />

                <br />

                <div id="image-holder">

                 </div>

            </div> 

        </div>

        <div class="boxNodeContentPage">



            <p class="titleRightNCP">Tên sản phẩm</p>

            <input type="text" id="title" onchange="ChangeToSlug()" class="txtNCP1" value="" name="product_name" required/>

            <!-- <p class="titleRightNCP">Danh mục</p>
            <select class="sltBV" name="productcat_id" size="10">
                <?php $action->showCategoriesSelect($list, 'productcat_parent', 0, '', 'productcat_id', 'productcat_name', 0); ?>
            </select> -->

            <p class="titleRightNCP">Danh mục</p>
            <div class="sltBV" name="productcat_id" size="10">
                <?php $action->showProductCategoriesSelect($list, 'productcat_parent', 0, $row['productcat_id'], 'productcat_id', 'productcat_name', 0, $row['productcat_ar']); ?>
            </div>


            <!-- <p class="titleRightNCP">Tên rút gọn</p>

            <input type="text" class="txtNCP1" name="shortName1_service3" value="<?php //echo $rowPro['shortName1_service3'];?>" /> -->

            <p class="titleRightNCP">Mô tả ngắn:</p>

            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP2 ckeditor" id="editor0" name="product_des"><?php echo $rowPro['product_des'];?></textarea></p>

            

            <p class="titleRightNCP">Nội dung:</p>

            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor" id="editor1" name="product_content"><?php echo $rowPro['product_content'];?></textarea></p>

           

        </div>

    </div><!--end rowNodeContentPage-->



    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Ảnh sản phẩm</span>

            <p class="subLeftNCP">Thiết lập ảnh sản phẩm</p>

        </div>

        <div class="boxNodeContentPage">

            <h3>Ảnh phụ sản phẩm</h3>

            <input type="file" name="fileUpload2" id="fileUpload2">

            <div class="preview2" id="preview2"> 

            </div>

        </div>

    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage" style="display: none;">

        <div class="leftNCP">

            <span class="titLeftNCP">Quản lý kích cỡ Hà Nội</span>

            <p class="subLeftNCP">Bạn có thể cấu hình và quản lý kho cho từng loại của sản phẩm này</p>

        </div>

        <div class="boxNodeContentPage">

            <button type="button" onclick="add_size()">Thêm</button>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Kích cỡ Hà Nội</p>
                    <div id="size">
                                
                    </div>                    

                </div>    

            </div><!--end rowNCP-->

        </div>

    </div>

    <script type="text/javascript">
        function add_size () {
            var size = document.getElementById('size').innerHTML;
            document.getElementById('size').innerHTML = size + '<div class="del-input"><input type="text" class="txtNCP1" value="" name="product_size[]"/><button type="button" onclick="del_size(this)">Xóa</button></div>';
        }

        function del_size (input) {
            document.getElementById('size').removeChild(input.parentNode);
        }
    </script>

    <div class="rowNodeContentPage" style="display: none;">

        <div class="leftNCP">

            <span class="titLeftNCP">Quản lý kích cỡ Hồ Chí Minh</span>

            <p class="subLeftNCP">Bạn có thể cấu hình và quản lý kho cho từng loại của sản phẩm này</p>

        </div>

        <div class="boxNodeContentPage">

            <button type="button" onclick="add_size_1()">Thêm</button>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Kích cỡ Hồ Chí Minh</p>
                    <div id="size_1">
                                 
                    </div>                    

                </div>    

            </div><!--end rowNCP-->

        </div>

    </div>

    <script type="text/javascript">
        function add_size_1 () {
            var size = document.getElementById('size_1').innerHTML;
            document.getElementById('size_1').innerHTML = size + '<div class="del-input"><input type="text" class="txtNCP1" value="" name="product_sub_info1[]"/><button type="button" onclick="del_size_1(this)">Xóa</button></div>';
        }

        function del_size_1 (input) {
            document.getElementById('size_1').removeChild(input.parentNode);
        }
    </script>

    <!-- <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Thiết lập kích cỡ và màu sắc</span>

            <p class="subLeftNCP">Thiết lập kích cỡ và màu sắc</p>

        </div>

        <div class="boxNodeContentPage">

            <div class="rowNCP" id="color_section">

            </div>

            <a href="#" id="addMoreColor" class="addMoreColor">Thêm tùy chọn màu</a>

        </div>

    </div> --><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage" style="display: none;">

        <div class="leftNCP">

            <span class="titLeftNCP">Quản lý thuộc tính và tùy chọn</span>

            <p class="subLeftNCP">Bạn có thể cấu hình và quản lý thuộc tính cho từng loại của sản phẩm này</p>

        </div>

        <div class="boxNodeContentPage">

            <div class="rowNCP">

                <?php 
                foreach ($attribute_list as $item_list) { 
                    $list_value_attr = $action->getList('thuoc_tinh_value', 'thuoc_tinh_id', $item_list['id'], 'id', 'asc', '', '', '');
                ?>

                <div class="subColContent">

                    <p class="titleRightNCP"><?= $item_list['name'] ?></p>

                    <select name="thuoc_tinh[]" class="txtNCP1">
                        <option value="0">==Chọn thuộc tính==</option>
                        <?php foreach ($list_value_attr as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>                                      

                <?php } ?>

                <div class="subColContent">

                    <p class="titleRightNCP">Sản phẩm cùng loại khách màu</p>

                    <select name="diff_color" class="txtNCP1">
                        <option value="0">==Chọn nhóm ==</option>
                        <?php foreach ($nhom as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div><!--end rowNCP-->

        </div>

    </div>

    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Quản lý kho và tùy chọn</span>

            <p class="subLeftNCP">Bạn có thể cấu hình và quản lý kho cho từng loại của sản phẩm này</p>

        </div>

        <div class="boxNodeContentPage">

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Giá gốc (VNĐ)</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_price'];?>" name="product_price"/>

                </div>                                      

                <div class="subColContent" >

                    <p class="titleRightNCP">Khuyến mãi (%)</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_price_sale'];?>" name="product_price_sale"/>

                </div>         

                

                

            </div><!--end rowNCP-->

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Diện tích (m<sup>2</sup>)</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_code'];?>" name="product_code"/>

                </div>                                      

                <!-- <div class="subColContent" >

                    <p class="titleRightNCP">Xuất xứ</p>

                    <input type="text" class="txtNCP1" value="<?php echo $rowPro['product_original'];?>" name="product_original"/>

                </div> -->           

                <div class="subColContent" >

                    <p class="titleRightNCP">Hướng</p>

                    
                    <select name="product_shape" class="txtNCP1">
                        <option value="0">Chọn Hướng</option>
                        <?php foreach ($huong as $item) { ?>
                        <option value="<?= $item['id'] ?>" ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>    

            </div><!--end rowNCP-->

            <div class="rowNCP">

                <!-- <div class="subColContent">

                    <p class="titleRightNCP">Kích cỡ</p>

                    <input type="text" class="txtNCP1" value="<?php echo $rowPro['product_size'];?>" name="product_size"/>

                </div>                                      

                <div class="subColContent" >

                    <p class="titleRightNCP">Đóng gói</p>

                    <input type="text" class="txtNCP1" value="<?php echo $rowPro['product_package'];?>" name="product_package"/>

                </div>  -->

                <div class="subColContent">

                    <p class="titleRightNCP">Quyền sử dụng đất</p>

                    <select name="product_expiration" class="txtNCP1">
                        <?php foreach ($quyen_dat as $item) { ?>
                        <option value="<?= $item['id'] ?>" <?= $item['id']==$row['product_expiration'] ? 'selected' : '' ?> ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="subColContent" >

                    <p class="titleRightNCP">Tầng nhà</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_material'];?>" name="product_material"/>

                </div>                

            </div><!--end rowNCP-->

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Phòng ngủ</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_delivery'];?>" name="product_delivery"/>

                </div>                                      

                <div class="subColContent" >

                    <p class="titleRightNCP">Phòng tắm</p>

                    <input type="number" class="txtNCP1" value="<?php echo $rowPro['product_delivery_time'];?>" name="product_delivery_time"/>

                </div>               

            </div><!--end rowNCP-->

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Huyện</p>

                    <select name="huyen_id" class="txtNCP1" onchange="list_phuong(this.value)">
                        <option value="0">Chọn Huyện</option>
                        
                        <?php foreach ($huyen as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>                                      

                <div class="subColContent" >

                    <p class="titleRightNCP">Phường</p>

                    <select name="phuong_id" class="txtNCP1" id="phuong_id">
                        <option value="0">Chọn Phường</option>
                        
                        
                    </select>

                </div>               

            </div><!--end rowNCP-->

            <!-- <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Hình thức thanh toán</p>

                    <input type="text" class="txtNCP1" value="<?php echo $rowPro['product_payment'];?>" name="product_payment"/>

                </div>                                      

                           

            </div> --><!--end rowNCP-->

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Địa chỉ</p>

                    <input type="text" class="txtNCP1" value="<?php echo $row['address'];?>" name="address"/>

                </div>                                      

                           
                <div class="subColContent">

                    <p class="titleRightNCP">Bản đồ địa điểm</p>

                    <input type="text" class="txtNCP1" value="<?php echo $row['map'];?>" name="map"/>

                </div>
                
            </div>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Đã bán</p>

                    <select name="da_ban" class="txtNCP1">
                        <?php foreach ($da_ban as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>                                      

                           
                <div class="subColContent">

                    <p class="titleRightNCP">Sự ưu tiên</p>

                    <select name="su_uu_tien" class="txtNCP1" >
                        <?php foreach ($su_uu_tien as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                
            </div>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Phân loại</p>

                    <select name="phan_loai" class="txtNCP1">
                        <?php foreach ($phan_loai as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>                                      

                           
                <div class="subColContent">

                    <p class="titleRightNCP">Rent time</p>

                    <select name="rent_time" class="txtNCP1" >
                        <?php foreach ($rent_time as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                
            </div>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Sử dụng m<sup>2</sup></p>

                    <input type="number" class="txtNCP1" value="<?php echo $row['use_met'];?>" name="use_met"/>

                </div>                                      

                           
                <div class="subColContent">

                    <p class="titleRightNCP">Tôi là chủ sở hữu</p>

                    <input type="text" class="txtNCP1" value="<?php echo $row['chu_so_huu'];?>" name="chu_so_huu" placeholder="Chính chủ/Môi giới/Dịch vụ" />

                </div>
                
            </div>

            <div class="rowNCP">

                <div class="subColContent">

                    <p class="titleRightNCP">Nhãn</p>

                    <input type="text" class="txtNCP1" value="<?php echo $row['tag'];?>" name="tag"/>

                </div>                                      

                           
                <div class="subColContent">

                    <p class="titleRightNCP">Is house</p>

                    <select name="is_house" class="txtNCP1" >
                        <?php foreach ($is_house as $item) { ?>
                        <option value="<?= $item['id'] ?>"  ><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>

                </div>
                
            </div>

        </div>

    </div>



    <div class="rowNodeContentPage">

        <div class="leftNCP">

            <span class="titLeftNCP">Tối ưu SEO</span>

            <p class="subLeftNCP">Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục xuất hiện trên công cụ tìm kiếm.</p>                

        </div>

        <div class="boxNodeContentPage">

            <div>

                <p class="titleRightNCP">Tiêu đề trang</p>

                <p class="subRightNCP"> <strong class="text-character"></strong>/70 ký tự</p>

                <input type="text" class="txtNCP1" placeholder="Điều khoản dịch vụ" name="title_seo" id="title_seo" value="<?php echo $rowPro['title_seo'];?>" onkeyup="countChar(this)"/>

            </div>

            <div>

                <p class="titleRightNCP">Thẻ mô tả</p>

                <p class="subRightNCP"><strong class="text-character"></strong>/160 ký tự</p>

                <textarea class="longtxtNCP2" name="des_seo" onkeyup="countChar(this)"><?php echo $rowPro['des_seo'];?></textarea>

            </div>

            <p class="titleRightNCP">Đường dẫn</p>

            <div class="coverLinkNCP">

                <p class="nameLinkNCP"><?php echo $_SERVER['SERVER_NAME']?>/</p>

                <div id="slug">

                    <input type="text" id="slug1" class="txtLinkNCP" name="friendly_url" value="<?php echo $rowPro['friendly_url'];?>" />     

                </div>

            </div>

            <p class="titleRightNCP">Keyword</p>

            <input type="text" class="txtNCP1" placeholder="Nhập keyword" name="keyword" value="<?php echo $rowPro['keyword'];?>"/>

        </div>

    </div><!--end rowNodeContentPage-->

    <div class="rowNodeContentPage" <?php echo ($_SESSION['admin_role']==2)?'style="display:none"':'';?> >

        <div class="leftNCP">

            <span class="titLeftNCP">Trạng thái</span>

        </div>

        <div class="boxNodeContentPage">

            <div>

                <label class="selectCate">

                    <input type="checkbox" value="1" name="product_favorite"><i class='fab fa-hotjar'></i> Sản phẩm nổi bật

                </label>

            </div>

            <div>

                <label class="selectCate">

                    <input type="checkbox" value="1" name="product_new" <?= $rowPro['product_new'] == 1 ? 'checked' : '' ?>><i class='far fa-newspaper'></i> Sản phẩm mới

                </label>

            </div>

            <div>

                <label class="selectCate">

                    <input type="checkbox" value="1" name="product_hot" <?= $rowPro['product_hot'] == 1 ? 'product_hot' : '' ?>><i class='fas fa-running'></i> Sản phẩm bán chạy

                </label>

            </div>

            <div>

                <label class="selectCate">

                    <input type="checkbox" value="1" name="state" <?= $rowPro['state'] == 1 ? 'checked' : '' ?>><i class='fab fa-angellist'></i> Trạng thái hiển thị

                </label>

            </div>

            

        </div>

    </div><!--end rowNodeContentPage-->

    

    <button type="submit" class="btn btnSave">Lưu</button>

            

</form>

<script>
    function list_phuong (id) {
        // alert(id);
        const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("phuong_id").innerHTML = this.responseText;
        }
      xhttp.open("GET", "/functions/ajax/list_phuong.php?id="+id, true);
      xhttp.send();
    }
</script>