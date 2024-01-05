<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['size']) && isset($_GET['sanpham_id'])) {
    $size = $_GET['size'];
    $sanpham_id = $_GET['sanpham_id'];

    $stmt = $con->prepare("SELECT soluong FROM tbl_size WHERE kichco = ? AND sanpham_id = ?");
    $stmt->bind_param("ii", $size, $sanpham_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $row = $result->fetch_assoc();
        echo $row['soluong']; // Trả về số lượng tương ứng
    } else {
        echo "Không có dữ liệu";
    }
} else {
    echo "Thiếu thông tin";
}
?>
