<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách người dùng | Quản trị Admin</title>
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

  


  <style>
    .fa-times {
        cursor: pointer;
        color: red;
        font-size: 30px;
      
    }
    .fa-lock {
      cursor: pointer;
      font-size: 25px;
    }
    .fa-unlock {
        cursor: pointer;
      font-size: 25px;
    }
  </style>
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
      <p class="app-sidebar__user-name"><b><a href="#" style="color:white"><span class="fas fa-pen"></span> Văn Chính</a></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item" href="quanlimenu/menungang.php"><i class='app-menu__icon fas fa-bars'></i><span
            class="app-menu__label">Quản lý giao diện</span></a></li>
      <li><a class="app-menu__item" href="table-data-product.php"><i
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
      <li><a class="app-menu__item " href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
  <main class="app-content">
  <?php
$currentPasswordError = $newPasswordError = $confirmPasswordError = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["luu"])) {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];
        
        $stmt = $con->prepare("SELECT * FROM tbl_admins ");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $currentHashedPassword = $row["password"];
            $email=$row["email"];
            if (isset($currentPassword) && !empty($currentPassword)) {
                if (password_verify($currentPassword, $currentHashedPassword)) {
                    if (isset($newPassword) && empty($newPassword)) {
                        $newPasswordError = 'Vui lòng nhập mật khẩu mới';
                    } else {
                        if ($newPassword != $confirmPassword) {
                            $confirmPasswordError = 'Xác nhận mật khẩu không trùng khớp';
                        } else {
                            $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                            $stmt = $con->prepare("UPDATE tbl_admins SET password = ? WHERE email=? ");
                            $stmt->bind_param("ss", $newHashedPassword, $email);
                            $stmt->execute();
                            
                            echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Đổi mật khẩu thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = 'quan-ly-ho-so-admin.php';
                            });
                            </script>";
                        }
                    }
                } else {
                    $currentPasswordError = 'Mật khẩu hiện tại không đúng';
                }
            } else {
                $currentPasswordError = 'Vui lòng nhập mật khẩu hiện tại';
            }            
        } else {
            echo "<script>
                window.location.href = 'changepassword.php?error=1';
            </script>";
        }
    }
}
?>
  <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item active"><a href="#"><b>Hồ Sơ Quản Trị</b></a></li>
        </ul>
        <div id="clock"></div>
        </div>
        <div class="profile-main">
                <div class="profile-main-account">
                    <div class="profile-main-account-inner">
                        <form action="quan-ly-ho-so-admin.php" method="post">
                            <div class="profile-main-account-inner-header">
                                <h4>HỒ SƠ CỦA TÔI</h4>
                                <h5>Thay đổi mật khẩu để bảo mật tài khoản an toàn</h5>
                            </div>
                            <hr>
                            <div class="profile-main-account-body">
                                <table>
                                    <tr>
                                        <td><label >Mật khẩu hiện tại</label></td>
                                        <td><input type="password" name="currentPassword" id=""></td>
        
                                    </tr>
                                    <tr>
                                        <td colspan="2"><div class="error-message" style="color:red;">
                                        <?php if (!empty($currentPasswordError)) : ?>
                                        <?php echo $currentPasswordError.'*'; ?>
                                        <?php endif; ?>
                                        </div></td>
                                    </tr>
                                    <tr>
                                        <td><label >Mật khẩu mới</label></td>
                                        <td><input type="password" name="newPassword" iid="newPassword"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><div class="error-message" style="color:red;">
                                        <?php if (!empty($newPasswordError)) : ?>
                                        <?php echo $newPasswordError.'*'; ?>
                                        <?php endif; ?>
                                        </div></td>
                                    </tr>
                                    <tr>
                                        <td><label>Xác nhận mật khẩu</label></td>
                                        <td><input type="password" name="confirmPassword" id="confirmPassword"></td>
                                    </tr>  
                                    <tr>
                                        <td colspan="2"><div class="error-message" style="color:red;">
                                        <?php if (!empty($confirmPasswordError)) : ?>
                                        <?php echo $confirmPasswordError.'*'; ?>
                                        <?php endif; ?>
                                        </div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="change-passworrd">
                                      <button type="submit" name="luu">Lưu lại</button></td>
                                    </tr>                       
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
              
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/remove_account.js"></script>
    <script src="js/lock_account.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>


</script>

    <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
      datasets: [{
          label: "Dữ liệu đầu tiên",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "black",
          pointColor: "rgb(220, 64, 59)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data: [20, 59, 90, 51, 56, 100, 40, 60, 78, 53, 33, 81]
        },
        {
          label: "Dữ liệu kế tiếp",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "rgb(220, 64, 59)",
          pointColor: "black",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data: [48, 48, 49, 39, 86, 10, 50, 70, 60, 70, 75, 90]
        }
      ]
    };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>

    <script>
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
</body>

</html>