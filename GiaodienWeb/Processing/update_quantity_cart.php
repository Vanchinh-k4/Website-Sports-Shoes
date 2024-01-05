<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $size = $_POST["size"];
    $user_id = $_POST["userId"];

    // Cập nhật số lượng trong cơ sở dữ liệu
    $query = "UPDATE tbl_giohang SET soluong = '$quantity' WHERE sanpham_id = '$productId' AND user_id='$user_id' AND size ='$size'";
    $result = mysqli_query($con, $query);

    if($result) {
        // Trả về thông báo thành công nếu cập nhật thành công
        echo "Cập nhật số lượng thành công!";
    } else {
        // Trả về thông báo lỗi nếu có lỗi khi cập nhật
        echo "Có lỗi xảy ra khi cập nhật số lượng: " . mysqli_error($con);
    }
} else {
    // Trả về thông báo nếu thiếu dữ liệu gửi từ AJAX
    echo "Thiếu dữ liệu gửi từ client!";
}

// Đóng kết nối
mysqli_close($con);
?>
