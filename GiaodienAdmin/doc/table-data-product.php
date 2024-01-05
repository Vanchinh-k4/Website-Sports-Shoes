<?php
$con = mysqli_connect("localhost","root","","bangiay");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Danh sách sản phẩm | Quản trị Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
       


        <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;
    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
    #ModalUP {
      padding-right: 10% !important;
    }
    .add {
    cursor: pointer;
    border: none;
    margin-left: 15px;
}
    .form-control1 {
    padding: 0.375rem 0.75rem;
    font-size: 15px;
    line-height: 1.5;
    color: black;
    background-color: #f1f1f1;
    background-clip: padding-box;
    height: 36px;
    border: 1px solid #dadada;
    border-radius: 0.357rem;
    }
    .close-btn1 {
    display: flex;
    margin-top: 25%;
    background: rgba(255, 255, 255, 0.5);
    padding: 4px;
    border-radius: 50%;
    cursor: pointer;
    font-weight: bold;
    font-size: 30px;
}
  </style>

        <script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
      </head>

<body onload="time()" class="app sidebar-mini rtl">
   <!-- Navbar-->
   <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/2336.jpg" width="50px"
        alt="User Image">
      <div>
      <p class="app-sidebar__user-name"><b><a href="quan-ly-ho-so-admin.php" style="color:white"><span class="fas fa-pen"></span> Văn Chính</a></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item " href="quanlimenu/menungang.php"><i class='app-menu__icon fas fa-bars'></i><span
            class="app-menu__label">Quản lý giao diện</span></a></li>
      <li><a class="app-menu__item active" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-tai-khoan.php"><i
            class='app-menu__icon fas fa-users'></i><span class="app-menu__label">Quản lý tài khoản</span></a>
      </li>
      <li><a class="app-menu__item" href="quan-ly-tin-tuc.php"><i
            class='app-menu__icon fas fa-newspaper'></i><span class="app-menu__label">Quản lý tin tức</span></a>
      </li>
      <li><a class="app-menu__item" href="quan-ly-binh-luan.php"><i
            class='app-menu__icon far fa-comments'></i><span class="app-menu__label">Quản lý bình luận</span></a>
      </li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="form-add-san-pham.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i
                                  class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                                  class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                  class="fas fa-copy"></i> Sao chép</a>
                            </div>
              
                            <div class="col-sm-2">
                              <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i
                                  class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                          </div>
                          <form action="form-delete-san-pham.php" method="post">
                          <table class="table table-hover table-bordered" id="sampleTable">
    <thead>
        <tr>
            <th width="10"><input type="checkbox" id="all"></th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Tình trạng</th>
            <th>Giá tiền</th>
            <th>Danh mục</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT sp.*, c.submenu1_name 
        FROM tbl_sanpham sp
        INNER JOIN tbl_submenu1 c ON sp.submenu1_id = c.submenu1_id";
        $result = mysqli_query($con, $sql);   
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td width="10"><input type="checkbox" name="check1" value="' . $row['sanpham_id'] . '"></td>';
            echo '<td>' . $row['masanpham'] . '</td>';
            echo '<td>' . $row['sanpham_name'] . '</td>';
            echo '<td><img src="'. $row['sanpham_img'] . '" alt="" width="100px;"></td>';
            echo '<td><span class="badge bg-success">' . $row['tinh_trang'] . '</span></td>';
            echo '<td>' . $row['sanpham_gia'] . ' đ</td>';
            echo '<td>' . $row['submenu1_name'] . '</td>';
            echo '<td><span class="trash" data-sanpham_id="'.$row['sanpham_id'].'"><button class="btn btn-primary btn-sm remove" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></button></span>';
            echo '<span class="edit" data-sanpham1_id="'.$row['sanpham_id'].'"><button class="btn btn-primary btn-sm "  type="button" title="Sửa"  data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button></span></td>';
  
            echo '</tr>';
           }
           ?>
           </tbody>
               </table>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!--
  MODAL
-->

<?php
include ('get-product-info.php');
include('update-product-info.php');
?>
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
  <form action="table-data-product.php" method="post" enctype="multipart/form-data">
  <div class="modal-content">

<div class="modal-body">
  <div class="row">
    <div class="form-group  col-md-12">
      <span class="thong-tin-thanh-toan">
        <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
      </span>
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4">
        <label class="control-label">ID</label>
        <input class="form-control" type="number" value="" name="new_id" id="new_id" readonly>
      </div>
    <div class="form-group col-md-4">
        <label class="control-label">Mã sản phẩm </label>
        <input class="form-control" type="text" value="" name="new_product_id" id="new_product_id">
      </div>
    <div class="form-group col-md-4">
        <label class="control-label">Tên sản phẩm</label>
      <input class="form-control" type="text" required value="" name="new_name" id="new_name">
    </div>
    <div class="form-group col-md-4 ">
        <label for="exampleSelect1" class="control-label">Tình trạng sản phẩm</label>
        <select class="form-control" id="new_status" name="new_status" value="">
          <option>Còn hàng </option>
          <option>Hết hàng</option>
          <option>Sắp hết hàng</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Giá bán</label>
        <input class="form-control" type="text" value="" name="new_price" id="new_price">
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Sale(0->100%)</label>
        <input class="form-control" type="text" value="" name="new_sale" id="new_sale">
      </div>
      <div class="form-group col-md-4">
        <label for="exampleSelect1" class="control-label">Danh mục</label>
        <select class="form-control" id="new_submenu" name="new_submenu">
          <?php
        $sql = "SELECT submenu1_id,submenu1_name FROM tbl_submenu1"; 
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $submenu1_id = $row['submenu1_id'];
            $submenu1_name = $row['submenu1_name'];
            echo "<option value='$submenu1_id'>$submenu1_name</option>";
        }
        
        } 
        ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Size</label> 
                <div class="col-sm-2">
                <span class="addsize"><a class="btn btn-add btn-sm " data-toggle="modal" data-target="#addsize"><i
                    class="fas fa-folder-plus"></i> Sửa size</a></span>
              </div>
              <label for="exampleSelect1" class="control-label">Nổi bật</label>
         <select class="form-control" id="new_outstanding" name="new_outstanding" value="">
          <option>Có</option>
          <option>Không</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label class="control-label">Mô tả</label>
        <textarea class="form-control"  cols="30" rows="30" name="new_detail" id="new_detail"></textarea>
      </div>
      <div class="form-group col-md-4">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="new_sanpham_img"  onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="150" width="150" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Ảnh chi tiết</label>
                <div class="choose-img">
       <label for="image" class="upload-btn">
       <i class="fas fa-cloud-upload-alt"></i>  Chọn ảnh
        </label>
        <input type="file" id="image" name="image_detail[]" accept="image/*" multiple style="display: none;">
       <div class="image-preview"> </div>
       </div>
      </div>
  </div>
  <BR>
  <a href="#" style="    float: right;
  font-weight: 600;
  color: #ea0000;">Chỉnh sửa sản phẩm nâng cao</a>
  <button  class="btn btn-save" type="submit" id="save_button" name="save_update">Lưu lại</button>
  <a class="btn btn-cancel huybo" data-dismiss="modal" href="#">Hủy bỏ</a>
  <BR>
</div>
<div class="modal-footer">
</div>
</div>
  </form>
</div>
</div>





<!--
MODAL SỬA SIZE
-->
<div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form id ="myForm" action="update_size.php" method="post">
        <input type="hidden" name="sanpham_id" value="">
        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Sửa size</h5>
              </span>
            </div>
            <div class="form-group col-md-5" id="dynamicForm">
              <label class="control-label" >Kích cỡ</label>
              <select class="form-control1 select-size" name="selectedSize[]" id="selectedSize">
              <option value=""></option>
        <?php 
            for ($i = 1; $i <= 100; $i++) {
                echo "<option value='$i'>$i</option>";
            }
        ?>
    </select>
            </div>
            <div class="form-group col-md-5" id="dynamicForm1">
              <label class="control-label">Số lượng</label>
              <input class="form-control1 select-size" type="number" name="enterquantity[]" min="0" required>
            </div>
            <div class="form-group col-md-2" id="dynamicForm2">
            <span class="close-btn1">×</span>
            </div>
            <button class="add" ><i  class="fas fa-plus"></i></button>
            </div> 
          <BR>
          <button class="btn btn-save" type="submit" name="save_size">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        </form>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>






    <!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>





    <script type="text/javascript">
        $('#sampleTable').DataTable();
        //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    </script>
    <script>
   $(document).on('click', '.trash', function () {
    var rowToDelete = $(this).closest('tr');
    var productId = $(this).data('sanpham_id');
        swal({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
            buttons: ["Hủy bỏ", "Đồng ý"],
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: 'Processing/form-delete-san-pham.php',
                    data: { sanpham_id: productId },
                    success: function (response) {
                      if (response === 'success') {
                            rowToDelete.remove();
                            swal({
                                icon: 'success',
                                title: 'Xóa thành công!',
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Xóa không thành công!',
                            });
                        }
                    },
                    error: function() {
                        swal("Đã xảy ra lỗi!", {
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>


<!-- ------------Javascript Change product infomation----------- -->
      <script>
$(document).ready(function () {
  $(document).on('click', '.edit', function () {
        var productId = $(this).data('sanpham1_id');

        $.ajax({
            type: 'POST',
            url: 'get-product-info.php',
            data: { sanpham1_id: productId },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.error) {
                    alert(result.error);
                } else {
                    var productInfo = result.productInfo;

                    $('#new_id').val(productInfo.sanpham_id);
                    $('#new_submenu').val(productInfo.submenu1_id);
                    $('#new_product_id').val(productInfo.masanpham);
                    $('#new_name').val(productInfo.sanpham_name);
                    $('#new_price').val(productInfo.sanpham_gia);
                    $('#new_sale').val(productInfo.sale);
                    $('#new_outstanding').val(productInfo.noibat);
                    var sanphamIdFromParentModal = $('#new_id').val();                  
                    $('input[name="sanpham_id"]').val(sanphamIdFromParentModal);
                    $('.addsize').attr('data-sanpham2_id', sanphamIdFromParentModal);
                    console.log(sanphamIdFromParentModal);
                    var thumb = document.getElementById('thumbimage');
                    thumb.style.display = 'block';
                    thumb.setAttribute('src', productInfo.sanpham_img);

                    var detailImageSrcArray = result.imagePaths;
                    console.log(detailImageSrcArray);
                    $('.image-preview').empty();
                   for (var i = 0; i < detailImageSrcArray.length; i++) {
                    var imageContainer = $('<div class="image-container">');
                   var closeButton = $('<span class="close-btn">×</span>');
                   var imageElement = $('<img>');
                   imageElement.attr('src', detailImageSrcArray[i]);
                   imageElement.attr('alt', 'Ảnh chi tiết');
                  imageElement.css('width', '100px');

                  closeButton.click(function () {
                var parentContainer = $(this).parent('.image-container');
                var indexToRemove = $('.image-preview .image-container').index(parentContainer);

                parentContainer.remove();
                
                // Xóa đường dẫn ảnh khỏi cơ sở dữ liệu khi đóng ảnh
                var imageToRemove = detailImageSrcArray[indexToRemove];
                $.ajax({
                    type: 'POST',
                    url: 'delete-image.php', // Thay đổi thành file xử lý xóa ảnh của bạn
                    data: { imageSrc: imageToRemove, sanpham_id: productId},
                    success: function (response) {
                      console.log("Delete image response:", response);
                        // Xử lý thành công nếu cần
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Có lỗi xảy ra khi xóa ảnh từ cơ sở dữ liệu.");
                    }
                });

                // Xóa phần tử khỏi mảng khi đóng ảnh
                detailImageSrcArray.splice(indexToRemove, 1);
                console.log(detailImageSrcArray);
            });

            imageContainer.append(imageElement);
            imageContainer.append(closeButton);

            $('.image-preview').append(imageContainer);
        }


                    $('#new_detail').val(productInfo.mo_ta);
                    $('#new_status').val(productInfo.tinh_trang);
                    $('#ModalUP').modal('show');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Có lỗi xảy ra khi lấy thông tin sản phẩm từ server.");
            }
        });
        
    });
    $('#ModalUP').on('hidden.bs.modal', function () {
    console.log("Modal is hidden. Clearing data...");
    $('.addsize').attr('data-sanpham2_id', '');
});
});
 
      </script>

      

<script>
  //Xử lý chọn ảnh 
  document.getElementById('image').addEventListener('change', function(e) {
  const files = e.target.files;
  const imagePreview = document.querySelector('.image-preview');

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();

    reader.onload = function(event) {
      const img = new Image();
      img.src = event.target.result;

      const imageContainer = document.createElement('div');
      imageContainer.classList.add('image-container');

      const closeButton = document.createElement('span');
      closeButton.innerHTML = '&times;';
      closeButton.classList.add('closeee');
      closeButton.onclick = function() {
        imagePreview.removeChild(imageContainer);
      };

      imageContainer.appendChild(closeButton);
      imageContainer.appendChild(img);
      imagePreview.appendChild(imageContainer);
    };

    reader.readAsDataURL(file);
  }
});
</script> 

<script>
 $(document).ready(function () {
  $(document).on('click', '.addsize', function () {
    var productId = $(this).data('sanpham2_id');
    console.log("Product ID:", productId);

    $.ajax({
      type: 'POST',
      url: 'Processing/get-size-info.php',
      data: { sanpham2_id: productId },
      success: function (response) {

        function createOptions(selectedValue) {
    var options = '';
    for (var i = 1; i <= 100; i++) {
        var selected = (selectedValue == i) ? 'selected' : ''; 
        options += '<option value="' + i + '" ' + selected + '>' + i + '</option>';
    }
    return options;
}
        $('#dynamicForm').empty(); // Xóa bỏ các phần tử cũ
        $('#dynamicForm1').empty();
        $('#dynamicForm2').empty();

for (var i = 0; i < response.length; i++) {
  var sizeOption = createOptions(response[i].kichco);
    var quantityInput = '<input class="form-control1 select-size" type="number" name="enterquantity[]" min="0"  value="' + response[i].soluong + '" required>';

    $('#dynamicForm').append(
        '<label class="control-label">Kích cỡ</label>' +
        '<select class="form-control1 select-size" name="selectedSize[]">' + sizeOption + '</select>' );
        $('#dynamicForm1').append(
        '<label class="control-label">Số lượng</label>' + quantityInput );
        $('#dynamicForm2').append('<span class="close-btn1">×</span>');
}

$('#addsize').modal('show');
},
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        alert("Có lỗi xảy ra khi lấy thông tin size từ server.");
      }
    });
  });
  $('#addsize').on('hidden.bs.modal', function () {
    console.log("Modal is hidden. Clearing data...");
    $('#dynamicForm').empty();
    $('#dynamicForm1').empty();

    // Đặt giá trị sanpham2_id về rỗng
    $('.addsize').attr('data-sanpham2_id', '');
});
});



</script>
<script>
  $('.huybo').on('click', function() {
    location.reload(); // Làm mới trang khi click nút Hủy bỏ
});

</script>

<script>
    function addNewFields() {
      var sizeLabel = document.createElement('label');
      sizeLabel.textContent = 'Kích cỡ';
      sizeLabel.className = 'control-label'; // Thêm class cho label (nếu cần)

      var sizeSelect = document.createElement('select');
      sizeSelect.className = 'form-control1 select-size';
      sizeSelect.name = 'selectedSize[]';

      var defaultOption = document.createElement('option');
      defaultOption.value = ''; 
      defaultOption.textContent = 'Chọn kích cỡ'; 
      sizeSelect.appendChild(defaultOption);

         for (var i = 1; i <= 100; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            sizeSelect.appendChild(option);
        }

          var dynamicFormDiv = document.getElementById('dynamicForm');
          dynamicFormDiv.appendChild(sizeLabel);
          dynamicFormDiv.appendChild(sizeSelect);

         //Tạo dấu close
        var newSpan = document.createElement('span');
        newSpan.className = 'close-btn1';
        newSpan.textContent = '×';
        var dynamicForm2Div = document.getElementById('dynamicForm2');
        dynamicForm2Div.appendChild(newSpan);


        // Tạo input (nhập số lượng)
        var quantityLabel = document.createElement('label');
            quantityLabel.textContent = 'Số lượng';
            quantityLabel.className = 'control-label'; 

        var quantityInput = document.createElement('input');
        quantityInput.className = 'form-control1';
        quantityInput.type = 'number';
        quantityInput.name = 'enterquantity[]';
        quantityInput.min = '1';
        quantityInput.required = true;
        var dynamicForm1Div = document.getElementById('dynamicForm1');
        dynamicForm1Div.appendChild(quantityLabel);
        dynamicForm1Div.appendChild(quantityInput);
        

        // Tạo nút "Thêm" có dấu cộng
        var addButton = document.querySelector('.add');
        // Thêm containerDiv vào trước nút "Thêm"
        addButton.parentNode.insertBefore(sizecontainer,  addButton);
        addButton.parentNode.insertBefore(quantitycontainer, addButton);
    }

    // Lắng nghe sự kiện click vào nút "Thêm"
    var addButton = document.querySelector('.add');
    addButton.addEventListener('click', addNewFields);
</script>

<script>
  $(document).ready(function () {
    $('#myForm').submit(function (e) {
        e.preventDefault(); 
        var formData = $(this).serialize(); // Chuyển đổi dữ liệu form thành chuỗi query

        // Gửi dữ liệu đi bằng Ajax
        $.ajax({
            type: 'POST',
            url: 'Processing/update_size.php',
            data: formData,
            success: function (response) {
                // Xử lý kết quả trả về nếu cần
                console.log(response);
                $('#addsize').modal('hide');
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    });
});

</script>

</body>

</html>