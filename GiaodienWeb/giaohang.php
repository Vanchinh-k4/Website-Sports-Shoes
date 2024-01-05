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
        <title>Giao hàng | Sport Shoes</title>
        <link rel="icon" href="img/Logo.png" type="image/png">
        <!--google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        <!-- main css -->
    <link rel="stylesheet" href="css/giaohang.css">
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
             <!-- login - signup -->
    <?php  include('Interface/Login-Signup.php') ?>
    </div>
  </div>
      <!-- carasoul section -->
                      </div>
                    </div>
                  </div>
                </nav>
        </header>

        <!-- --------------------SHOW INFO DATA TO FORM--------------- -->
       
 <?php
 $user_id = $_SESSION["user_id"];
 $stmt=$con->prepare("SELECT * FROM tbl_user_info WHERE user_id =?");
 $stmt->bind_param("i", $user_id);
 $stmt->execute();
 $result = $stmt->get_result();

 if(mysqli_num_rows($result)>0){
  $row=mysqli_fetch_assoc($result);
  $name=$row["tennguoidung"];
  $phone=$row["sodienthoai"];
  $province=$row["tinh/tp"];
  $district=$row["quan/huyen"];
  $xaphuong=$row["xa/phuong"];
  $address=$row["diachi"];
 }else{
  $name="";
  $phone="";
  $province="";
  $district="";
  $xaphuong="";
  $address="";
 }
 ?>

        <!-- Delivery -->
        <section class="delivery">
            <div class="container">
                <div class="delivery-top-wrap">
                 <div class="delivery-top">
                     <div class="delivery-top-delivery delivery-top-item">
                         <i class="fas fa-shopping-cart"></i>
                     </div>
                     <div class="delivery-top-adress delivery-top-item">
                         <i class="fas fa-map-marker-alt"></i>
                     </div>
                     <div class="delivery-top-payment delivery-top-item">
                         <i class="fas fa-money-check-alt"></i>
                     </div>
                 </div>
                </div>
                </div>
                <div class="container">
                    <div class="delivery-content row">
                        <div class="delivery-content-left col-md-6">
                           <p style="color:red;">THÔNG TIN VẬN CHUYỂN:</p>
                          <form action="giaohang.php" method="post" id="xuly">
                          <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-bottom">
                                <label for="name1">Họ tên <span style="color: red;">*</span></label>
                                <input type="text" id="name1" value="<?php echo $name ?>" name="name1" required>
                            </div>
                            <div class="delivery-content-left-input-bottom">
                                <label for="phone">Điện thoại <span style="color: red;">*</span></label>
                                <input type="text" id="phone" required  value="<?php echo $phone ?>" name="phone" >
                            </div>
                            <div class="delivery-content-left-input-bottom">
                                <label for="province">Tỉnh/Tp <span style="color: red;">*</span></label>
                                <input type="text" id="province" required value="<?php echo $province ?>" name="province">
                            </div>
                            <div class="delivery-content-left-input-bottom">
                                <label for="district">Quận/Huyện <span style="color: red;">*</span></label>
                                <input type="text"id ="district"required value="<?php echo $district?>" name="district">
                            </div>
                            <div class="delivery-content-left-input-bottom">
                            <label for="ward">Xã/Phường <span style="color: red;">*</span></label>
                            <input type="text" id="ward" required value="<?php echo $xaphuong ?>" name="ward">
                           </div>
                            <div class="delivery-content-left-input-bottom">
                            <label for="address">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" id="address" required value="<?php echo $address ?>" name="address">
                           </div>
                           <div class="hinhthuc">
                            <p> HÌNH THỨC THANH TOÁN:</p>
                           </div>
                  
                           <div class="loading-screen">
                            <div class="loader"></div>
                            </div>
                           <div class="choose" id="demo-ajax">
                            <div class="option" ><button type="submit">Thanh toán khi nhận hàng</button>          
                            </div>
                            <div class="option"><button type="" > MoMo</button></div>
                            <div class="option"><button type=""> VNPay</button></div>
                            </div>
                           </div>
                          
                           <p></p>
                           
                           <div class="delivery-content-left-button row">
                            <a href="giohang.php"><span>&#171;</span id="back">Quay lại giỏ hàng</a>
                           </div>
                          </form>             
                        </div>
 <div class="delivery-content-right col-md-6">
 <?php
if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $totalItems = 0;
    $totalAmount = 0;
}
?>
    <table id="productsTable">
        <tr>
          <th>Tên sản phẩm</th>
            <th>Số lượng</th>
              <th style="text-align: left;">Thành tiền</th>
           </tr>
    </table>
         <table>
           <tr>
            <td style="font-weight: bold; font-size: 19px; " id="totalItems1">Tổng</td>
              <td style="font-size: 17px; color:red;" align="center;" id="totalItems"></td>
                    <td style="font-weight: bold; font-size: 15px" id="totalAmount"></td>
                 </tr>
               <tr>
            <td style="font-weight: bold; font-size: 17px;" colspan="2">Giao hàng</td>
         <td style="font-weight: bold; font-size: 15px;"> <?php if (isset($user_id)) echo "Miễn phí" ?></td>
      </tr>
        <tr>
            <td style="font-weight: bold; font-size: 17px;" colspan="2" id="totalAmount2">Tổng tiền hàng</td>
              <td style="font-weight: bold; font-size: 20px; color:red" id="totalAmount1"></td>
                 </tr>
                      </table>
                           </div>
                                </div>
                                   </section>
        
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
        <script src="https://kit.fontawesome.com/c89e6e2f8c.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- jQuery sticky menu -->
     <script src="js/js1/owl.carousel.min.js"></script>
     <script src="js/js1/jquery.sticky.js"></script>
     <!-- jQuery easing -->
     <script src="js/js1/jquery.easing.1.3.min.js"></script>
     <!-- Main Script -->
     <script src="js/js1/main.js"></script>
     



<script>
 document.addEventListener('DOMContentLoaded', function () {
    var userId = <?php echo json_encode($user_id); ?>;
    var storedData = sessionStorage.getItem('selectedProducts' + userId);
    var productsTable = document.getElementById('productsTable');

    if (storedData) {
        var selectedProducts = JSON.parse(storedData);
        var totalItemsElement = document.getElementById('totalItems');
        var totalAmountElement = document.getElementById('totalAmount');
        var totalAmountElement1 = document.getElementById('totalAmount1');

        if (productsTable && totalItemsElement && totalAmountElement) {
            var totalItems = 0;
            var totalAmount = 0;

            Object.keys(selectedProducts).forEach(function (productId) {
                var product = selectedProducts[productId];
                var quantity = product['quantity'];
                var price = product['price'];
                var productName = product['name']; 

                totalItems += quantity;
                totalAmount += price * quantity;

                var newRow = productsTable.insertRow(-1);

                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                 var cell3 = newRow.insertCell(2);

                cell1.textContent = productName; 
                cell2.textContent = quantity;
                cell3.textContent = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
                }).format(price * quantity); 
               });
            

            // Cập nhật giá trị tổng số sản phẩm và tổng giá trị
            totalItemsElement.textContent = totalItems;
            totalAmountElement.textContent = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(totalAmount);
            totalAmountElement1.textContent = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(totalAmount);
        }
    } else {
        console.error('Không có dữ liệu được lưu trong sessionStorage.');
    }
});

</script>

<!-- ========Ajax xử lý đơn hàng========== -->
<script>
 $(document).ready(function () {
    $("#xuly").submit(function(e){
      e.preventDefault();
        var formData = $("#xuly").serialize(); 
        var storedUserId = <?php echo json_encode($user_id); ?>;
        var storedData = sessionStorage.getItem('selectedProducts' + storedUserId);
        
        if (storedData) {
            var selectedProducts = JSON.parse(storedData);
            var hang_duoc_mua = '';

            Object.values(selectedProducts).forEach(function (product) {
                var size = product.size;
                var productId = product.productId;
                var quantity = product.quantity;
                hang_duoc_mua += '[' + productId + ']' + ',' + '[' + quantity + ']' + ',' + '['+ size + ']' + ';';
 
                $.ajax({
                    url: 'Processing/delete_items.php',
                    type: 'POST',
                    data: {
                        userid: storedUserId,
                        productid: productId,
                        size: size
                    },
                    success: function (data) {
                        sessionStorage.removeItem('selectedProducts' + storedUserId);
                    },
                    error: function (e) {
                    }
                });
            });
            formData += "&hang_duoc_mua=" + encodeURIComponent(hang_duoc_mua);
        }

        $.ajax({
            url: 'Processing/processing_order.php',
            type: 'POST',
            data: formData, 
            success: function (data) {
                setTimeout(function(){
                    $('#demo-ajax').html(data);
                },1500);
            },
            error: function (e) {
                console.log(e.message);
            }
        });
    });
});
</script>

<!-- Hiển thị mâtj khẩu -->
<script>
document.getElementById('showPasswordToggle1').addEventListener('click', function() {
    var passwordField = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon1');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fas', 'fa-eye-slash');
        eyeIcon.classList.add('far', 'fa-eye'); 
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

<!-- Hover user -->
<script>
  document.getElementById('user').addEventListener('mouseenter', function() {
    const loginSignup = document.querySelector('.login-signup');
    loginSignup.style.display = 'block';
});

const loginSignup = document.querySelector('.login-signup');
loginSignup.addEventListener('mouseleave', function() {
    loginSignup.style.display = 'none';
});

// Lấy các phần tử cần thiết
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadingScreen = document.querySelector('.loading-screen');
        const buttons = document.querySelectorAll('.choose .option button');

        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                loadingScreen.style.opacity = '1'; // Hiển thị màn hình tải
                loadingScreen.style.pointerEvents = 'auto'; // Bật sự kiện click
                setTimeout(function() {
                    loadingScreen.style.opacity = '0'; 
                    loadingScreen.style.pointerEvents = 'none';
                }, 5000);
            });
        });
    });
</script>

        <!-- main js -->
        <script src="js/cart.js"></script>
        <script src="js/show-password.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/carousel.js"></script>
        <script src="js/phone-ring.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- slick Slide -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    </body>
</html>