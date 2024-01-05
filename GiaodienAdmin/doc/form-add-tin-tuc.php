
<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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


<!--- ---------Xử lý phần thêm tin tức--------------- -->
<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_tintuc"])) {
  $title = $_POST["tieude_baiviet"];
  $content = $_POST["noidung_baiviet"];
  $title_img_name = basename($_FILES["tieude_img"]["name"]);
  $target_directory = "uploads/";
  $target_file = $target_directory . $title_img_name;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($title_img_name, PATHINFO_EXTENSION));
  
  
    if (isset($_POST["save_tintuc"])) {
        $check = getimagesize($_FILES["tieude_img"]["tmp_name"]);
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
    if ($_FILES["tieude_img"]["size"] > 500000) {
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
      if (move_uploaded_file($_FILES["tieude_img"]["tmp_name"], $target_file)) {
          $title_img_path = $target_file;

          $sql = "INSERT INTO tbl_tintuc (title, content, img) VALUES (?, ?, ?) ";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("sss", $title, $content, $title_img_path);
          if($stmt->execute())
              echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm thành công!',
                        showConfirmButton: false,
                       timer: 2000
                    }).then(function() {
                      window.location.href = 'form-add-tin-tuc.php';
                    });
                </script>";
          } else {
              echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi khi thêm bài viết',
                        text: 'Đã xảy ra lỗi khi thử thêm bài viết.'
                    });
                </script>";
          }
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
      <li><a class="app-menu__item " href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-tai-khoan.php"><i
            class='app-menu__icon fas fa-users'></i><span class="app-menu__label">Quản lý tài khoản</span></a>
      </li>
      <li><a class="app-menu__item active" href="quan-ly-tin-tuc.php"><i
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
        <li class="breadcrumb-item">Danh sách tin tức</li>
        <li class="breadcrumb-item"><a href="#">Thêm tin tức</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới tin tức</h3>
          <div class="tile-body">
            <div class="row element-button">
            </div>
            <form class="row" action="form-add-tin-tuc.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                <label class="control-label">Tiêu đề bài viết </label>
                <input class="form-control" type="text" placeholder="" name="tieude_baiviet" required>
              </div>
             

              <div class="form-group col-md-3">
                <label class="control-label">Ảnh tiêu đề</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="tieude_img" required onchange="readURL(this);" />
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
              <div class="form-group col-md-12">
                <label class="control-label">Nội dung bài viết</label>
                <textarea class="form-control" name="noidung_baiviet" id="mota"></textarea>
                <script>CKEDITOR.replace('mota');</script>
              </div>
              <button class="btn btn-save" type="submit" name="save_tintuc">Lưu lại</button>
              <a class="btn btn-cancel" href="quan-ly-tin-tuc.php">Hủy bỏ</a>
              </form>
          </div>
        </div>
        
  </main>


  <!--
  MODAL CHỨC VỤ 
-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới nhà cung cấp</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên chức vụ mới</label>
              <input class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
MODAL
-->


  <!--
  MODAL TÌNH TRẠNG
-->
  <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới tình trạng</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tình trạng mới</label>
              <input class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
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

</body>

</html>