<?php
   include_once('db/connect.php');
   include('Processing/processing_login.php');
   include('Processing/processing_changepass.php');
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>| Sport Shoes</title>
        <link rel="icon" href="img/Logo.png" type="image/png">
        <!--google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        <!-- main css -->
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/infor-contact.css">
        <link rel="stylesheet" href="css1/responsive.css">
        <link rel="stylesheet" href="css1/responsive1.css">
        <link rel="stylesheet" href="css1/boostrap.css">
        <link rel="stylesheet" href="css1/owl.carousel.css">
        <!-- icon -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- animation -->
        <link rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <!-- bootstrap -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- slick Slide -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    </head>
    <body>
       <!--======== Header========  -->
<nav  class="navbar navbar-default navbar-fixed-top">
 <div class="mainmenu-area ">
    <div class="container">
        <div class="row">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                   <?php 
                   include('Interface/Header/header.php') 
                   ?>
                    <div class="login_signup">
                    <div class="search-bar display-sm-inline">
          <input type="text" id="search-input" placeholder="Tìm kiếm...">
          <button id="search-button" style="margin-right: 15px;"><i class="fas fa-search"></i></button>
</div>

<?php
if(isset($_SESSION["name"])){
?>
   <div class="menuuser">
   <div class="menuusers">
    <div class="icon-container">
        <span id="user" class="user-icon" style="font-size: 20px;"><i class="fas fa-user"></i></span>
        <h6>Tài khoản của tôi</h6>
    </div>
    <div class="login-signup">
        <div class="user-action">
            <span><a href="profile.php"><?php echo $_SESSION["name"] ?></a></span>
        </div>
        <div class="user-action" id="fill">
            <span><a href="Processing/logout.php">Thoát ra <span class="fas fa-sign-out"></span></a></span>
            
        </div>
    </div>
</div>
<div class="menuusers">
    <div class="icon-container">
    <div class="cart-count-icon">        
       <span id="cart-icon" class="fas fa-shopping-cart display-sm-inline"></span>
        <span id="cart-count">0</span>
      </div>
        <h6>Giỏ hàng</h6>
    </div>
</div>
</div>

<?php 
} else { 
?>
<div class="menuuser">
<div class="menuusers">
    <div class="icon-container">
        <span id="user" class="user-icon" style="font-size: 20px;"><i class="fas fa-user"></i></span>
        <h6>Tài khoản của tôi</h6>
    </div>
    <div class="login-signup">
        <div class="user-action" id="login">
            <i class="fas fa-sign-in-alt"></i>
            <span>Đăng nhập</span>
        </div>
        <div class="user-action" id="fill">
            <i class="fas fa-user"></i>
            <span>Đăng ký</span>
        </div>
    </div>
</div>
<div class="menuusers">
    <div class="icon-container">
    <div class="cart-count-icon">        
       <span id="cart-icon" class="fas fa-shopping-cart display-sm-inline"></span>
        <span id="cart-count">0</span>
      </div>
        <h6>Giỏ hàng</h6>
    </div>
</div>
</div>
<?php
 }
?> 
            </div>
                </ul>
        </div>
     </div>   
    </div>
</div>
    </nav>

        
        <!-- =================SECTION PROFILE======================= -->


        <!-- -------------CHANGE PASSWORD-------------- -->
  <?php include('Processing/changePassword.php') ?>
        <section class="page">
            <div class="container">
                <a href="index.php">Trang chủ</a>
                <span>|</span>
                <span>Thành viên</span>
            </div>
        </section>
        <section class="user-page">
     <div class="container">
        <div class="profile-layout">
            <div class="profile-siderbar">
                <div class="profile-siderbar_user">
                    <a href="profile.php" class="profile-sidebar--thumb">
                       <div class="shoppe-avt">
                        <img src="img/user1.png" class="shoppe-avt_img" width="50"; height="50">
                       </div>
                    </a>
                    <div class="profile-siderbar_info">
                    <div class="profile-siderbar_info-name">
                        <a href="editprofile.php"><span class="fas fa-pen"></span> Sửa hồ sơ</a> 
                        <h5>Xin chào,<?php echo $_SESSION['name'] ?></h5>
                    </div>
                </div>
                </div>  
                <hr style="width:200px">  
                <div class="profile-siderbar-menu">
                <div class="profile-siderbar-menu-item">
                <a href=""><span class="fas fa-tags"></span> Ưu đãi dành cho bạn</a>
                </div> 
                <div class="profile-siderbar-menu-item">
                   <a href="profile.php"><span class="fas fa-user"></span> Tài khoản của tôi</a> <br>
                   <span id="profile"><a href="profile.php">Hồ sơ</a></span> <br>
                   <span><a href="" id="profile" style="color: orange;">Đổi mật khẩu</a></span>
                </div>
                <div class="profile-siderbar-menu-item">
                <a href="donhang.php" id="donhang"><span class="fas fa-file-alt"></span> Đơn mua</a>
                </div>
                <div class="profile-siderbar-menu-item">
                 <span class="fas fa-bell"></span> Thông báo
                </div>
                <div class="profile-siderbar-menu-item">
                   <span class="fas fa-tag"></span> Kho vocher                 
                    </div>   
                    <div class="profile-siderbar-menu-item">
                    <span class="fas fa-shopping-bag"></span> Sản phẩm yêu thích
                    </div>   
                    <div class="profile-siderbar-menu-item">
                    <a href="logout.php"><span class="fas fa-sign-out"></span> Đăng xuất</a>
                    </div>              
            </div>
            </div>
            <div class="profile-main">
                <div class="profile-main-account">
                    <div class="profile-main-account-inner">
                        <form action="changepassword.php" method="post">
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
                                        <td colspan="1">
                                      <button type="submit" name="luu">Lưu lại</button></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
        </section>
  <div class="echbay-sms-messenger style-for-position-br">
	<div class="phonering-alo-alo">
		<a href="tel:0334237858" rel="nofollow" class="echbay-phonering-alo-event">.</a>
	</div>
	<div class="phonering-alo-zalo">
		<a href=""  rel="nofollow" class="echbay-phonering-zalo-event">.</a>
	</div>
	<div class="phonering-alo-messenger">
		<a href=""  rel="nofollow" class="echbay-phonering-messenger-event">.</a>
	</div>
</div>

        
        <!-- Thương hiệu  -->
        <nav class="thuonghieu">
        <div class="container-fluid3">
            <div class="col-xs-12">
                <div class="title-block">
                    <div class="wrap-content">
                        <h3 class="title-group">Thương hiệu</h3>
                        <div class="title-group-note">Thương hiệu nỗi bật của chúng tôi</div>
                    </div>
                </div>
            </div>
             <div class="row"></div>
            <div id="owl-demo" class="owl-carousel owl-theme">
             <?php include('Interface/trademark.php') ?>
                 </div>
                    </div>
                         </nav>
        <!-- footer -->
        <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-3 col-sm-6">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="sanpham.php">Sản phẩm</a></li>
                        <li><a href="khuyenmai.php">Khuyến mãi</a></li>
                        <li><a href="tintuc.php">Tin tức</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="footer-col col-md-3 col-sm-6">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                        <li><a href="#">Đang chuyển hàng</a></li>
                        <li><a href="#">Lợi nhuận</a></li>
                        <li><a href="#">Tình trạng đặt hàng</a></li>
                        <li><a href="#">Các lựa chọn thanh toán</a></li>
                    </ul>
                </div>
                <div class="footer-col col-md-3 col-sm-6">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">Giày Adidas</a></li>
                        <li><a href="#">Giày MLB</a></li>
                        <li><a href="#">Giày Nike</a></li>
                        <li><a href="#">Giày NewBlance</a></li>
                    </ul>
                </div>
                <div class="footer-col col-md-3 col-sm-6">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <a id="address">Địa chỉ: 59 Lưu Quang Vũ, P.Hòa Quý, Q.Ngũ Hành Sơn, TP.Đà Nẵng</a>
                </div>
            </div>
        </div>
        <div class="end">
                <div class="container-fluid" style="background: #00563f1b;">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left">
                            <p class="mt-2">
                            Copyright 2024 ©  <a href="#">SportShoes.com</a> <a href="#">All Rights Reserved</a></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
        <!-- fontawsome -->
        <script src="https://kit.fontawesome.com/c89e6e2f8c.js" crossorigin="anonymous"></script>
        <script>
  </script>
        <!-- main js -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- slick Slide -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="js/profile.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="js/profile.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- jQuery sticky menu -->
    <script src="js/js1/owl.carousel.min.js"></script>
    <script src="js/js1/jquery.sticky.js"></script>
    <!-- jQuery easing -->
    <script src="js/js1/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="js/js1/main.js"></script>
    <script src="js/cart.js"></script> 
    <script src="js/carousel.js"></script>
    <script src="js/phone-ring.js"></script>

    <!--============== Hover user =============-->
<script>
  document.getElementById('user').addEventListener('mouseenter', function() {
    const loginSignup = document.querySelector('.login-signup');
    loginSignup.style.display = 'block';
});
const loginSignup = document.querySelector('.login-signup');
loginSignup.addEventListener('mouseleave', function() {
    loginSignup.style.display = 'none';
});
const userIcon = document.getElementById('user');
// Ẩn .login-signup khi click ra ngoài
document.addEventListener('click', function(event) {
  const targetElement = event.target;
  const isClickInsideUserIcon = userIcon.contains(targetElement);
  const isClickInsideLoginSignup = loginSignup.contains(targetElement);
  // Nếu không phải là userIcon hoặc .login-signup, ẩn .login-signup đi
  if (!isClickInsideUserIcon && !isClickInsideLoginSignup) {
    loginSignup.style.display = 'none';
  }
});
</script>

    </body>
</html>
