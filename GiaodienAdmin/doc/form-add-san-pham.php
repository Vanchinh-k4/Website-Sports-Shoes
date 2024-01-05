
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thêm sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
  <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<body class="app sidebar-mini rtl">


<!--- ---------Xử lý phần thêm sản phẩm--------------- -->
<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"])) {
  // Xử lý thông tin sản phẩm
  $masanpham = $_POST['ma_sanpham'];
  $submenu1_id = $_POST['danh_muc'];
  $sanpham_name = $_POST['ten_sanpham'];
  $sanpham_gia = $_POST['gia_ban'];
  $sale = $_POST["sale"];
  $mo_ta = $_POST['mota'];
  $tinh_trang = $_POST["tinh_trang"];
  $noibat = $_POST["noi_bat"];
  $sanpham_img_name = basename($_FILES["sanpham_img"]["name"]);
  $target_directory = "uploads/";
  $target_file = $target_directory . $sanpham_img_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($sanpham_img_name, PATHINFO_EXTENSION));

  if (is_numeric($sanpham_gia) && is_numeric($sale)) {
    $giasale = $sanpham_gia - ($sanpham_gia * $sale / 100);
} elseif (!is_numeric($sanpham_gia)) {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Giá phải là giá trị nguyên!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
      window.location.href = 'form-add-san-pham.php';
    });
    </script>";
    $uploadOk = 0;
} elseif (!is_numeric($sale)) {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Sale phải là giá trị nguyên!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
      window.location.href = 'form-add-san-pham.php';
    });
    </script>";
    $uploadOk = 0;
}

  if (isset($_POST["save"])) {
      $check = getimagesize($_FILES["sanpham_img"]["tmp_name"]);
      if ($check !== false) {
          echo " - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "<script>
          Swal.fire({
              icon: 'warning',
              title: 'Tệp không phải là ảnh!',
              showConfirmButton: false,
              timer: 2000
          }).then(function() {
          });
      </script>";
          $uploadOk = 0;
      }
  }
  if ($_FILES["sanpham_img"]["size"] > 1000000) {
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Tệp ảnh quá lớn!',
          showConfirmButton: false,
          timer: 2000
      }).then(function() {
      });
  </script>";
      $uploadOk = 0;
  }

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Chỉ nhận các tệp jpg, png, jpeg!',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
            });
        </script>";
      $uploadOk = 0;
  }

 
  if ($uploadOk != 0) {
      if (move_uploaded_file($_FILES["sanpham_img"]["tmp_name"], $target_file)) {
          $sanpham_img_path = $target_file;

          $sql = "INSERT INTO tbl_sanpham (masanpham, submenu1_id, sanpham_name, sanpham_gia, sale, sanpham_giasale, sanpham_img, noibat, mo_ta, tinh_trang)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("sisiiissss", $masanpham, $submenu1_id, $sanpham_name, $sanpham_gia, $sale, $giasale, $sanpham_img_path, $noibat, $mo_ta, $tinh_trang);

          if ($stmt->execute()) {
            $sanpham_id = $stmt->insert_id;
        
            $image_detail_paths = []; 
            foreach ($_FILES["image_detail"]["tmp_name"] as $key => $tmp_name) {
                $tenHinhAnh = basename($_FILES["image_detail"]["name"][$key]);
                $thuMucDich = "uploads1/";
                $duongDanTapTin = $thuMucDich . $tenHinhAnh;
                $coTheTaiLen = 1;
                $loaiTepAnh = strtolower(pathinfo($tenHinhAnh, PATHINFO_EXTENSION));
        
                if ($coTheTaiLen) {
                    if (move_uploaded_file($tmp_name, $duongDanTapTin)) {
                        $image_detail_paths[] = $duongDanTapTin; 
                    } else {
                        echo "<script>alert('Có lỗi xảy ra khi tải lên tệp.')</script>";
                    }
                }
            }
           
            foreach ($image_detail_paths as $duongDanTapTin) {
                $sql = "INSERT INTO tbl_anhchitiet (sanpham_id, duongdananh) VALUES (?, ?)";
                $stmt2 = $con->prepare($sql);
                $stmt2->bind_param("is", $sanpham_id, $duongDanTapTin);
        
                if ($stmt2->execute()) {
                   
                } else {
                    echo "<script>alert('Lỗi khi thêm chi tiết hình ảnh.')</script>";
                }
              }
                $stmt2->close();

                $selectedSizes = $_SESSION['temp_selectedSizes'];
                $quantities = $_SESSION['temp_quantities'];
      
                if (!empty($selectedSizes) && !empty($quantities) && count($selectedSizes) === count($quantities)) {
                    for ($i = 0; $i < count($selectedSizes); $i++) {
                        $size = $selectedSizes[$i];
                        $quantity = $quantities[$i];
          
                        $sql = "INSERT INTO tbl_size (sanpham_id, kichco, soluong) VALUES ('$sanpham_id', '$size', '$quantity')";
            
                        if ($con->query($sql) !== TRUE) {
                            echo "Lỗi: " . $sql . "<br>" . $con->error;
                        }
                    }
                    unset($_SESSION['temp_selectedSizes']);
                    unset($_SESSION['temp_quantities']);
                } else {
                    echo "Dữ liệu không hợp lệ";
                }
            } else {
          echo "<script>alert('Có lỗi xảy ra khi tải lên tệp.')</script>";
      }
              echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm sản phẩm thành công!',
                        showConfirmButton: false,
                       timer: 1500
                    }).then(function() {
                      window.location.href = 'form-add-san-pham.php';
                    });
                </script>";
          } else {
              echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi khi thêm sản phẩm',
                        text: 'Đã xảy ra lỗi khi thử thêm sản phẩm.'
                    });
                </script>";
          }

          $stmt->close();
      } else {
          echo "Có lỗi xảy ra khi tải lên tệp ảnh.";
      }
    }
?>





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
    .add {
      cursor: pointer;
      border: none;
      margin-left: 15px;
    }
    .form-control1 {
      width: 100%;
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
  </style>
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
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i
                    class="fas fa-folder-plus"></i> Thêm tình trạng</a>
              </div>
            </div>
            <form class="row" action="form-add-san-pham.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                <label class="control-label">Mã sản phẩm </label>
                <input class="form-control" type="text" placeholder="" name="ma_sanpham" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" type="text" name="ten_sanpham" required>
              </div>


             
              <div class="form-group  col-md-3">
                <label class="control-label">Size</label>
                <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addsize"><i
                    class="fas fa-folder-plus"></i> Thêm size</a>
              </div>
              </div>
              <div class="form-group col-md-3 ">
                <label for="exampleSelect1" class="control-label">Tình trạng</label>
                <select class="form-control" id="exampleSelect1" name="tinh_trang" required>
                  <option value="" selected disabled >-- Chọn tình trạng --</option>
                  <option>Còn hàng</option>
                  <option>Hết hàng</option>
                  <option>Sắp hết hàng</option>
                </select>
              </div>
              <div class="form-group col-md-3 ">
              <label for="exampleSelect1" class="control-label">Nổi bật</label>
              <select class="form-control" id="exampleSelect1" name="noi_bat" required>
                  <option value="" selected disabled >-- Chọn --</option>
                  <option>Có</option>
                  <option>Không</option>
                </select>
              </div>
              <div class="form-group col-md-3">
    <label for="exampleSelect1" class="control-label">Danh mục</label>
    <select class="form-control" id="exampleSelect1" name="danh_muc" required>
        <option value="" selected disabled>-- Chọn danh mục --</option>
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

              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input class="form-control" type="text" name="gia_ban" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Sale(0->100%)</label>
                <input class="form-control" type="text" name="sale" required>
              </div>


              <div class="form-group col-md-3">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="sanpham_img" required onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="200" width="200" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>
              </div>


              <div class="form-group col-md-9">
                <label class="control-label">Ảnh chi tiết</label>
                <div class="choose-img">
       <label for="image" class="upload-btn">
       <i class="fas fa-cloud-upload-alt"></i>  Chọn ảnh
      </label>
     <input type="file" id="image" name="image_detail[]" accept="image/*" multiple style="display: none;">
       <div class="image-preview"></div>
       </div>
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="mota" id="mota"></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>
              <button class="btn btn-save" type="submit" name="save">Lưu lại</button>
              <a class="btn btn-cancel" href="table-data-product.php">Hủy bỏ</a>
              </form>
          </div>
        </div>
        
  </main>



  <!--
  MODAL THÊM SIZE
-->



  <div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <form id ="myForm" action="process-add-size.php" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới size</h5>
              </span>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Chọn kích cỡ</label>
              <select class="form-control1" name="selectedSize[]" id="selectedSize">
        <option value="">Chọn kích cỡ</option>
        <?php 
            for ($i = 1; $i <= 100; $i++) {
                echo "<option value='$i'>$i</option>";
            }
        ?>
    </select>
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Nhập số lượng</label>
              <input class="form-control1" type="number" name="enterquantity[]" min="1" required>
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
  <!--
MODAL
-->



  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script>
    const inpFile = document.getElementById("inpFile");
    const loadFile = document.getElementById("loadFile");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load", function () {
          previewImage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
      }
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
    function addNewFields() {
        // Tạo select (chọn kích cỡ)
        var sizeSelect = document.createElement('select');
        sizeSelect.className = 'form-control1';
        sizeSelect.name = 'selectedSize[]';
        var sizeLabel = document.createElement('label');
        sizeLabel.textContent = 'Chọn kích cỡ';
        sizeSelect.appendChild(sizeLabel);
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

        // Tạo input (nhập số lượng)
        var quantityInput = document.createElement('input');
        quantityInput.className = 'form-control1';
        quantityInput.type = 'number';
        quantityInput.name = 'enterquantity[]';
        quantityInput.min = '1';
        quantityInput.required = true;

        // Tạo div container chứa các phần tử mới
        var sizecontainer = document.createElement('div');
        sizecontainer.className = 'form-group col-md-6';
        sizecontainer.appendChild(sizeSelect);

        var quantitycontainer = document.createElement('div');
        quantitycontainer.className = 'form-group col-md-6';
        quantitycontainer.appendChild(quantityInput);

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
$(document).ready(function() {
    $('#myForm').submit(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của submit form

        var formData = $(this).serialize(); // Lấy dữ liệu form
console.log(formData);
        // Gửi dữ liệu form bằng AJAX
        $.ajax({
            type: 'POST',
            url: 'process-add-size.php', // Đường dẫn đến file xử lý PHP
            data: formData,
            success: function(response) {
                // Xử lý phản hồi từ server (nếu cần)
                console.log(response);

                // Đóng modal khi xử lý thành công
                $('#addsize').modal('hide');
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

</body>

</html>