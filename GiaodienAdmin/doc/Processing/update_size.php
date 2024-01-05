<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra và lấy dữ liệu từ form
    $sanphamId = $_POST['sanpham_id'];
    $selectedSize = $_POST['selectedSize'];
    $enterquantity = $_POST['enterquantity'];

    // Bắt đầu một giao dịch
    mysqli_begin_transaction($con);

    // Xóa tất cả dữ liệu cũ cho sanpham_id này
    $sql_delete = "DELETE FROM tbl_size WHERE sanpham_id = '$sanphamId'";
    $con->query($sql_delete);

    // Lặp qua từng cặp dữ liệu và thêm mới
    for ($i = 0; $i < count($selectedSize); $i++) {
        $size = $selectedSize[$i];
        $quantity = $enterquantity[$i];

        // Thêm mới từng cặp dữ liệu
        $sql_insert = "INSERT INTO tbl_size (sanpham_id, kichco, soluong) VALUES ('$sanphamId', '$size', '$quantity')";
        $con->query($sql_insert);
    }

    // Commit giao dịch
    mysqli_commit($con);

    echo "Dữ liệu đã được gửi thành công!";
} else {
    echo "Lỗi: Không có dữ liệu được gửi!";
}

// Đóng kết nối CSDL
mysqli_close($con);
?>
