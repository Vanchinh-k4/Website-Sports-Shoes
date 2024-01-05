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
        <title>Giỏ hàng | Sport Shoes</title>
        <link rel="icon" href="img/Logo.png" type="image/png">
        <!--google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
        <!-- main css -->
        <link rel="stylesheet" href="css/giohang.css">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    </head>
    <style>
        /* Ẩn phần tử chứa thông báo ban đầu */
.hidden-box {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid black;
    padding: 10px;
    border-radius: 5px;
    border-color: blanchedalmond ;
}

/* Hiển thị phần tử chứa thông báo khi hover vào checkbox */
.checkbox-item:hover + .hidden-box {
    display: block;
}
.checkbox-item:hover + .hidden-box p{
 color: red;
}
.checkbox-symbol {
    margin-left: -30px;
    color: red;
    font-size: 18px;
    pointer-events: none; /* Ngăn chặn sự kiện click vào dấu X */

}



    </style>
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
            </div>
          </nav>
         </div>
    </header>
 
        <!-- Cart -->
        <section class="cart">
         <div class="container">
           <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
           </div>
         </div>
         <div class="container">
    <div class="cart-content row">
        <div class="cart-content-left">
            <table id="cartTable">
                <tr class="bgr">
                    <th><input type="checkbox" name="" id="selectAll" class="ckeckboxAll"></th>
                    <th>Sản phẩm</th>
                    <th>Tên Sản phẩm</th>
                    <th>Size</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                    <th>Cập nhật</th>
                </tr>
                <?php
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
                    $user_id = $_SESSION["user_id"];
                    $totalItems = 0;
                    $totalAmount = 0;
                    $query = "SELECT gh.*, sp.sanpham_id
                              FROM tbl_giohang gh 
                              JOIN tbl_sanpham sp ON gh.sanpham_id = sp.sanpham_id 
                              WHERE gh.user_id = $user_id AND gh.status = 'đã đăng nhập'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $giasanpham=intval($row["giasanpham"]);
                            $sanpham_id = $row['sanpham_id'];
                            $kichco = $row["size"];
                            echo '<tr>';
                            $querySize = "SELECT soluong FROM tbl_size WHERE sanpham_id = '$sanpham_id' AND kichco = '$kichco'";
                            $resultSize = mysqli_query($con, $querySize);
                        
                            if ($resultSize && mysqli_num_rows($resultSize) > 0) {
                                $rowSize = mysqli_fetch_assoc($resultSize);
                                $soluong_trong_size = $rowSize['soluong'];
                                 if ($soluong_trong_size < $row['soluong']) {
                                 echo '<td><input type="checkbox" name="selectedItem[]" class="checkbox-item" data-productId="' . $row['sanpham_id'] . '" disabled>
                                 <div class="hidden-box"><p>Sản phẩm vượt quá số lượng hiện có.</p> </div>
                                 </td>';
                            
                            } else {
                                echo '<td><input type="checkbox" name="selectedItem[]" class="checkbox-item" data-productId="' . $row['sanpham_id'] . '"></td>';
                             }
                            }
                
                            echo '<td><img src="../GiaodienAdmin/doc/' . $row['hinhanh'] . '" alt=""></td>';
                            echo '<td><a href="chitietsp.php?sanpham_id='.$row["sanpham_id"].'"><span class="name" data-name="' . $row['tensanpham'] . '">' . $row['tensanpham'] . '</span></a></td>';
                            echo '<td><p data-size="' . $row['size'] . '">' . $row['size'] . '</p></td>';
                            echo '<td><p class="item-price" data-price="' .$giasanpham. '">' . number_format($row['giasanpham']) . ' <sup>đ</sup></p></td>';
                            echo '<td>';
                            echo '<div class="quantity" data-cart-id="'.$row["giohang_id"].'">';
                            echo '<input type="button" value="-" class="decrease-btn">';
                            echo '<input type="number" value="' . $row['soluong'] . '" min="1" class="quantity-input" data-quantity="'.$soluong_trong_size.'" data-quantity-id="'.$row['sanpham_id'].'">';
                            echo '<input type="button" value="+" class="increase-btn">';
                            echo '</div>';
                            echo '</td>';
                            echo '<td><p class="item-total">' . number_format($giasanpham * $row['soluong']) . ' <sup>đ</sup></p></td>';
                            echo '<td><a href="" class="remove-item" data-id="' . $row['giohang_id'] . '"><span class="fas fa-trash-alt"></span></a></td>';
                            echo '<td><a href="#" class="animated-button1" data-id="' . $row['sanpham_id'] . '">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <i class="fas fa-sync-alt"></i>
                          </a></td>';
                            echo '</tr>';
                
                            $totalItems += $row['soluong'];
                            $totalAmount += ($row['giasanpham'] * $row['soluong']);
                        }
                    } else {
                        echo '<tr>';
                        echo '<td colspan="7"><h4 style="color:red;">"Hổng" có gì trong giỏ hết </h4></td>';
                        echo '</tr>';
                    }
                }
                
                if (!isset($user_id)) {
                    echo '<tr>';
                    echo '<td colspan="7"><p style="color:red;" >Hãy <a href=""> Đăng Nhập </a>tài khoản của bạn để mua hàng.</p></td>';
                    echo '<tr/>';
                }
                ?>

            </table>
        </div>

        <div class="cart-content-right">
            <table>
                <tr>
                    <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                </tr>
                <tr>
                    <td>TỔNG SẢN PHẨM</td>
                    <td><span id="totalItems"><?php if (isset($user_id)) {echo $totalItems;}?></span></td>
                </tr>
                <tr>
                    <td>TỔNG TIỀN HÀNG</td>
                    <td><p id="totalAmount"><?php if (isset($user_id)) {echo number_format($totalAmount); } ?></p></td>
                </tr>
                <tr>
                    <td>TẠM TÍNH</td>
                    <td><p id="subtotalAmount" style="color: black; font-weight: bold;"><?php if (isset($user_id)) {
                      echo number_format($totalAmount);} ?> <sup>đ</sup></p></td>
                </tr>
            </table>
            <div class="cart-content-right-text">
                <p>Bạn sẽ được giảm giá khi đơn hàng có tổng giá trị trên <i style="color: red;">2,000,000
                        <sup>đ</sup></i></p>
                <p style="color: red; font-weight: bold;"><span style="font-weight: 18px;">
                        </span></p>
            </div>
            <div class="cart-content-right-button">
                <button id="checkoutButton1">TIẾP TỤC MUA SẮM</button>
                <button id="checkoutButton" onclick="checkItemsAndPay()">THANH TOÁN</button>
            </div>
            <div class="cart-content-right-dangnhap">
            </div>
        </div>
    </div>
</div>
        </section>
        <?php




// Kiểm tra nếu có dữ liệu gửi từ form


?>

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
    document.addEventListener("DOMContentLoaded", function () {
      let items=0;
      let amount=0;
        const deleteButtons = document.querySelectorAll(".delete-button");
        const quantityInputs = document.querySelectorAll(".quantity-input");
        const totalItems = document.getElementById("totalItems");
        const totalAmount = document.getElementById("totalAmount");
        const subtotalAmount = document.getElementById("subtotalAmount");

        // Function to update cart totals
        function updateCartTotals() {
            quantityInputs.forEach(input => {
                items += parseInt(input.value);
                amount += parseInt(input.value) * parseFloat(input.dataset.price);
            });

            totalItems.innerText = items;
            totalAmount.innerText = `${amount} ₫`;
            subtotalAmount.innerText = `${amount} ₫`;
        }
        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
                this.closest("tr").remove();
                updateCartTotals();
            });
        });
        quantityInputs.forEach(input => {
            input.addEventListener("change", function () {
                updateCartTotals();
            });
        }); 
        updateCartTotals();
    });
</script>
<script>
$(document).ready(function() {
    $('.remove-item').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

        var item_id = $(this).data('id'); // Lấy giá trị data-id từ liên kết
        Swal.fire({
            icon: 'question',
            title: 'Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'Processing/delete_item.php?item_id=' + item_id;
            }
        });
    });
});
</script>



        <!-- main js -->
        <script src="js/main.js"></script>
        <script src="js/show-password.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/carousel.js"></script>
        <script src="js/phone-ring.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- slick Slide -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
       <script src="js/delivery.js"></script>

       


<!----------------- CHECK AND PAY-------- -->
<script>
function checkItemsAndPay() {
    var checkboxes = document.querySelectorAll('.checkbox-item'); // Chọn tất cả các checkbox
    var atLeastOneChecked = false;

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            atLeastOneChecked = true;
        }
    });

    if (checkboxes.length > 0) {
        if (atLeastOneChecked) {
            var totalItems = <?php echo $totalItems; ?>;
            
            if (totalItems > 0) {
                window.location.href = "giaohang.php";
            }
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Vui lòng chọn ít nhất một sản phẩm để thanh toán!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Bạn không có sản phẩm giỏ hàng!',
            showConfirmButton: false,
            timer: 1500
        });
    }
}
</script>



<!-- Hover User -->
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
  const targetElement = event.target; // Phần tử mà người dùng nhấp chuột

  // Kiểm tra xem phần tử nhấp chuột có phải là userIcon hoặc .login-signup không
  const isClickInsideUserIcon = userIcon.contains(targetElement);
  const isClickInsideLoginSignup = loginSignup.contains(targetElement);

  // Nếu không phải là userIcon hoặc .login-signup, ẩn .login-signup đi
  if (!isClickInsideUserIcon && !isClickInsideLoginSignup) {
    loginSignup.style.display = 'none';
  }
});
</script>

 <!-- ===========Hiển thị tổng giá tiền sản phẩm==================== -->
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy các phần tử cần thiết
            var checkboxes = document.querySelectorAll('.checkbox-item');
            var selectAllCheckbox = document.getElementById('selectAll');
            var quantityInputs = document.querySelectorAll('.quantity-input');
    
            // Lắng nghe sự kiện khi checkbox được chọn
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    calculateTotal();
                });
            });
    
            // Lắng nghe sự kiện khi checkbox "Chọn tất cả" được chọn
            selectAllCheckbox.addEventListener('change', function () {
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                calculateTotal();
            });
    
            // Lắng nghe sự kiện khi số lượng sản phẩm thay đổi
            quantityInputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    calculateTotal();
                });
            });
    
            // Hàm tính tổng tiền và số lượng sản phẩm
            function calculateTotal() {
    var totalAmount = 0;
    var totalItems = 0;

    checkboxes.forEach(function (checkbox) {
        if (!checkbox.disabled && checkbox.checked) {
            var row = checkbox.closest('tr');
            var price = parseFloat(row.querySelector('.item-price').getAttribute('data-price'));
            var quantity = parseInt(row.querySelector('.quantity-input').value);

            totalAmount += price * quantity;
            totalItems += quantity;
        }
    });

    document.getElementById('totalItems').textContent = totalItems;
    document.getElementById('totalAmount').textContent = totalAmount.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND',
        currencyDisplay: 'symbol'
    });
    document.getElementById('subtotalAmount').textContent = totalAmount.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND',
        currencyDisplay: 'symbol'
    });
}

    // Gọi hàm để thiết lập giá trị mặc định
    calculateTotal();
        });
    
        
        //Lưu thông tin và sessionStorage
        document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('.checkbox-item');
    var selectAllCheckbox = document.getElementById('selectAll');

    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateSelectedProducts();
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSelectedProducts();
        });
    });

    function updateSelectedProducts() {
    var userId = <?php echo json_encode($user_id); ?>;
    var storedData = sessionStorage.getItem('selectedProducts' + userId);
    var selectedProducts = storedData ? JSON.parse(storedData) : [];
    var checkboxes = document.querySelectorAll('.checkbox-item:not([disabled])');

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            var productId = checkbox.dataset.productid;
            var quantity = parseInt(checkbox.closest('tr').querySelector('.quantity-input').value);
            var sizeElement = checkbox.closest('tr').querySelector('p[data-size]');
            var size = sizeElement ? sizeElement.getAttribute('data-size') : '';

            var priceElement = checkbox.closest('tr').querySelector('.item-price');
            var price = priceElement ? parseFloat(priceElement.dataset.price) : 0;

            var nameElement = checkbox.closest('tr').querySelector('span[data-name]');
            var name = nameElement ? nameElement.dataset.name : '';

            var existingProductIndex = selectedProducts.findIndex(function (product) {
                return product.productId === productId && product.size === size;
            });

            if (existingProductIndex === -1) {
                selectedProducts.push({
                    productId: productId,
                    name: name,
                    quantity: quantity,
                    size: size,
                    price: price
                });
            }
        } else {
            var productId = checkbox.dataset.productid;
            var sizeElement = checkbox.closest('tr').querySelector('p[data-size]');
            var size = sizeElement ? sizeElement.getAttribute('data-size') : '';

            var existingProductIndex = selectedProducts.findIndex(function (product) {
                return product.productId === productId && product.size === size;
            });

            if (existingProductIndex !== -1) {
                selectedProducts.splice(existingProductIndex, 1);
            }
        }
    });
    sessionStorage.setItem('selectedProducts' + userId, JSON.stringify(selectedProducts));
}



    // Gọi hàm để thiết lập giá trị mặc định
    updateSelectedProducts();
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




<script>
 document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.getElementsByClassName('quantity-input');
    const decreaseBtns = document.getElementsByClassName('decrease-btn');
    const increaseBtns = document.getElementsByClassName('increase-btn');

    for (let i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener('input', function() {
         
           
        });
    }

    for (let i = 0; i < decreaseBtns.length; i++) {
        decreaseBtns[i].addEventListener('click', function() {
            let quantityInput = this.nextElementSibling;
            decreaseQuantity(quantityInput);
        });
    }

    for (let i = 0; i < increaseBtns.length; i++) {
        increaseBtns[i].addEventListener('click', function() {
            let quantityInput = this.previousElementSibling;
            increaseQuantity(quantityInput);
        });
    }

    function decreaseQuantity(quantityInput) {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
           
        }
    }

    function increaseQuantity(quantityInput) {
        let currentValue = parseInt(quantityInput.value);
        let maxQuantity = parseInt(quantityInput.getAttribute('data-quantity'));
        if (currentValue < maxQuantity) {
            quantityInput.value = currentValue + 1;
           
        } else {
            alert('Bạn không thể chọn nhiều hơn số lượng hiện có!');
        }
    }

    // function updateCartOnQuantityChange(input) {
    //     var quantity = $(input).val();
    //     var cartId = $(input).closest('.quantity').data('cart-id');
    //     var pricePerItem = $('[data-cart-id="' + cartId + '"]').closest('tr').find('.item-price').data('price');
    //     var totalPrice = quantity * pricePerItem;
    //     var formattedTotalPrice = totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    //     $('[data-cart-id="' + cartId + '"]').closest('td').next('td').find('.item-total').text(formattedTotalPrice);

    //     const Size = $(input).closest('tr').find('p[data-size]').data('size');
    //     const element =document.querySelector('.checkbox-item');
    //     const sanphamId = element.getAttribute('data-productId'); 

    //     const xhr = new XMLHttpRequest();
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState === XMLHttpRequest.DONE) {
    //             if (xhr.status === 200) {
    //                 const maxQuantity = parseInt(xhr.responseText);
    //                 input.setAttribute('data-quantity', maxQuantity);
    //             } else {
    //                 console.error('Có lỗi khi truy vấn dữ liệu');
    //             }
    //         }
    //     };

    //     xhr.open('GET', 'Processing/get_quantity-update_cart.php?size=' + Size + '&sanpham_id=' + sanphamId, true);
    //     xhr.send();
    // }
});

</script>


<script>
    $(document).ready(function() {
    $('.animated-button1').click(function(event) {
        event.preventDefault();
        const productId = $(this).data('id');
        const quantityInput = $('.quantity-input[data-quantity-id="' + productId + '"]');
        const Size = $(this).closest('tr').find('p[data-size]').data('size');
        
        if(quantityInput.length) {
            const quantityValue = quantityInput.val();
            
            $.ajax({
                url: 'Processing/update_quantity_cart.php',
                type: 'POST',
                data: {
                    productId: productId,
                    quantity: quantityValue,
                    size: Size,
                    userId: <?php echo $_SESSION["user_id"]; ?>
                },
                success: function(data) {
                    console.log('Số lượng đã được cập nhật thành công!');
                    location.reload();
                    // Có thể thực hiện các thao tác khác sau khi cập nhật thành công
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra khi cập nhật số lượng.');
                    // Xử lý lỗi khi không cập nhật được
                }
            });
        } else {
            console.error('Không tìm thấy input số lượng cho sản phẩm có ID ' + productId);
        }
    });
});

</script>




<script>
var disabledCheckboxes = document.querySelectorAll('input[type="checkbox"]:disabled');
disabledCheckboxes.forEach(function(checkbox) {
    var checkboxSymbol = document.createElement('span');
    checkboxSymbol.className = 'checkbox-symbol';
    checkboxSymbol.innerText = '❌'; 

    checkbox.parentNode.appendChild(checkboxSymbol);
});
</script>
    </body>
</html>