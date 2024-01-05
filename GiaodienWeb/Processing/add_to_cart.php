<?php

$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$error_message="";

if (isset($_SESSION["user_id"])) {
    if (isset($_POST['add_to_cart'])) {
        $sanpham_id = $_POST['sanpham_id'];
        $size = isset($_POST['choosesize']) ? $_POST['choosesize'] : "";
        $quantity = isset($_POST['choose_quantity']) ? $_POST['choose_quantity'] : "";

        if ($size == "") {
            $error_message = "Vui lòng chọn size";
        } 
        if ($error_message !== "") {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '$error_message',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'chitietsp.php?sanpham_id=' + $sanpham_id;
                });
            </script>";
        
            } else {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu 
        $sanpham_id = $_POST['sanpham_id'];
        $sanpham_name = $_POST['sanpham_name'];
        $sanpham_giasale = $_POST['sanpham_giasale'];
        $sanpham_img = $_POST['sanpham_img'];
        $user_id=$_SESSION["user_id"];
        
        $sql_check_existing = "SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id' AND size = '$size' AND user_id=$user_id";
        $result_check_existing = mysqli_query($con, $sql_check_existing);

        if (mysqli_num_rows($result_check_existing) > 0) {
            $row_existing = mysqli_fetch_assoc($result_check_existing);
            $new_quantity = $row_existing['soluong'] + $quantity;
            
            $sql_update_quantity = "UPDATE tbl_giohang SET soluong = $new_quantity WHERE sanpham_id = '$sanpham_id' AND size = '$size' AND user_id=$user_id";
            
            if (mysqli_query($con, $sql_update_quantity)) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sản phẩm đã được cập nhật',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'sanpham.php';
                });
            </script>";
            } else {
                echo "Lỗi: " . mysqli_error($con);
            }
        } else {
            if ($stmt = $con->prepare("INSERT INTO tbl_giohang (sanpham_id, tensanpham, giasanpham, hinhanh, size, soluong, user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param("ssissii", $sanpham_id, $sanpham_name, $sanpham_giasale, $sanpham_img, $size, $quantity, $user_id);

                if ($stmt->execute()) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sản phẩm đã được thêm vào giỏ hàng',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'chitietsp.php?sanpham_id=$sanpham_id';
                    });
                    </script>";
                } else {
                    echo "Lỗi: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Lỗi: " . $con->error;
            }
            $sql_cart_count = "SELECT COUNT(*) AS total FROM tbl_giohang WHERE user_id = $user_id"; // Đếm số lượng sản phẩm trong giỏ hàng
            $result_cart_count = mysqli_query($con, $sql_cart_count);

    if ($result_cart_count) {
    $row_cart_count = mysqli_fetch_assoc($result_cart_count);
    $new_cart_count = $row_cart_count['total'];

    // Trả về giá trị cart-count mới
    echo $new_cart_count;
} else {
    // Xử lý lỗi nếu có
    echo "Lỗi khi lấy giá trị cart-count mới";
} 
        }
    }
}



    if (isset($_POST["paynow"])) {
        $sanpham_id = $_POST['sanpham_id'];
        $size = isset($_POST['choosesize']) ? $_POST['choosesize'] : "";
        $quantity = isset($_POST['choose_quantity']) ? $_POST['choose_quantity'] : "";

        if ($size == "") {
            $error_message = "Vui lòng chọn size";
        } 
        if ($error_message !== "") {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '$error_message',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'chitietsp.php?sanpham_id=' + $sanpham_id;
                });
            </script>";
        
            } else {
        
        $sanpham_id = $_POST['sanpham_id'];
        $sanpham_name = $_POST['sanpham_name'];
        $sanpham_gia = $_POST['sanpham_giasale'];
        $sanpham_img = $_POST['sanpham_img'];
        $user_id=$_SESSION["user_id"];
        
        $sql_check_existing = "SELECT * FROM tbl_giohang WHERE sanpham_id = '$sanpham_id' AND size = '$size' AND user_id=$user_id";
        $result_check_existing = mysqli_query($con, $sql_check_existing);

        if (mysqli_num_rows($result_check_existing) > 0) {
            $row_existing = mysqli_fetch_assoc($result_check_existing);
            $new_quantity = $row_existing['soluong'] + $quantity;
            
            $sql_update_quantity = "UPDATE tbl_giohang SET soluong = $new_quantity WHERE sanpham_id = '$sanpham_id' AND size = '$size' AND user_id=$user_id";
            
            if (mysqli_query($con, $sql_update_quantity)) {
                echo "<script>            
                    window.location.href = 'giohang.php';
            </script>";
            } else {
                echo "Lỗi: " . mysqli_error($con);
            }
        } else {
            if ($stmt = $con->prepare("INSERT INTO tbl_giohang (sanpham_id, tensanpham, giasanpham, hinhanh, size, soluong, user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param("ssissii", $sanpham_id, $sanpham_name, $sanpham_gia, $sanpham_img, $size, $quantity, $user_id);

                if ($stmt->execute()) {
                    echo "<script>                  
                        window.location.href = 'giohang.php';
                    </script>";
                } else {
                    echo "Lỗi: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Lỗi: " . $con->error;
            }
        }
    }
}
 // Xử lý hiển thị giỏ hàng và tổng số sản phẩm
    $user_id=$_SESSION["user_id"];
    $sql_total = "SELECT SUM(soluong) AS total_items, SUM(giasanpham * soluong) AS total_amount FROM tbl_giohang WHERE user_id=$user_id";
    $result_total = mysqli_query($con, $sql_total);
    $row_total = mysqli_fetch_assoc($result_total);
    $totalItems = $row_total['total_items'];
    $totalAmount = $row_total['total_amount'];
    if (!$result_total) {
        echo "Lỗi: " . mysqli_error($con);
    }
} else {
    if(!isset($_SESSION["user_id"])){
        if(isset($_POST["add_to_cart"])){
            echo"<script>
            Swal.fire({
                icon: 'warning',
                title: 'Vui lòng đăng nhập',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'sanpham.php';
            });
            </script>";
        }
        if(isset($_POST["paynow"])){
            echo"<script>
            Swal.fire({
                icon: 'warning',
                title: 'Vui lòng đăng nhập',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'sanpham.php';
            });
            </script>";
        }
    }
   
}
?>
