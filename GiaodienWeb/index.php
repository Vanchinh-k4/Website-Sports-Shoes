
<?php
   include_once('db/connect.php');
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Shoes</title>
    <link rel="icon" href="img/Logo.png" type="image/png">
    <!--google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <!-- main css -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/infor-contact.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <link rel="stylesheet" href="css1/responsive1.css">
    <link rel="stylesheet" href="css1/boostrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- slick Slide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>


</head>

<body>
<?php
include('Processing/processing_changepass.php');
include('Processing/processing_login.php');
?>
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
<?php  include('Interface/Login-Signup.php') ?>

  <?php include('Interface/Slider.php') ?>
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 ngày hoàn trả</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Miễn phí ship</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Bảo mật thanh toán</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Sản phẩm mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 

   
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm nổi bật</h2>
                        <div class="product-carousel">
                        <?php include('Interface/outstanding_products.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <hr>
<div class="echbay-sms-messenger style-for-position-br">
	<div class="phonering-alo-alo">
		<a href="tel:0334237858" rel="nofollow" class="echbay-phonering-alo-event">.</a>
	</div>
	<div class="phonering-alo-zalo">
		<a href=""rel="nofollow" class="echbay-phonering-zalo-event">.</a>
	</div>
	<div class="phonering-alo-messenger">
		<a href=""  rel="nofollow" class="echbay-phonering-messenger-event">.</a>
	</div>
</div>
    <!-- End main content area -->
    <!-- Thương hiệu -->
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
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
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
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
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
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c89e6e2f8c.js" crossorigin="anonymous"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/show-password.js"></script>
    <script src="js/phone-ring.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
     <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <!-- jQuery sticky menu -->
     <script src="js/js1/owl.carousel.min.js"></script>
    <script src="js/js1/jquery.sticky.js"></script>
    <!-- jQuery easing -->
    <script src="js/js1/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="js/js1/main.js"></script>
    <script type="text/javascript" src="js/js1/bxslider.min.js"></script>
	<script type="text/javascript" src="js/js1/script.slider.js"></script>
    <!-- slick Slide -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>



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


<!--================= Show password======== -->
<script>
document.getElementById('showPasswordToggle1').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon1');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fas', 'fa-eye-slash');
        eyeIcon.classList.add('far', 'fa-eye');
        // 
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('far', 'fa-eye');
        eyeIcon.classList.add('fas', 'fa-eye-slash');
    }
});
document.getElementById('showPasswordToggle2').addEventListener('click', function() {
    var passwordField = document.getElementById('confirmPassword');
    var eyeIcon = document.getElementById('eyeIcon2');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fas', 'fa-eye-slash');
        eyeIcon.classList.add('far', 'fa-eye');
        // 
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('far', 'fa-eye');
        eyeIcon.classList.add('fas', 'fa-eye-slash');
    }
});
</script>



 <script>
const menuItems = document.querySelectorAll('.mainmenu-area .navbar-nav .menu-item');
// Thêm sự kiện click cho từng menu sản phẩm
menuItems.forEach(item => {
    item.addEventListener('click', function(event) {
        // Kiểm tra nếu submenu được click đang hiển thị, ẩn nó đi
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            // Ẩn tất cả các submenu khác trước khi hiển thị submenu được click
            menuItems.forEach(otherItem => {
                if (otherItem !== this && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
            this.classList.add('active');
        }
        event.stopPropagation();
    });
});
document.addEventListener('click', function() {
    menuItems.forEach(item => {
        if (item.classList.contains('active')) {
            item.classList.remove('active');
        }
    });
});
 </script>



</html>