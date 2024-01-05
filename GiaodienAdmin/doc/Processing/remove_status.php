<?php
$con = mysqli_connect("localhost","root","","bangiay");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $updateQuery = "UPDATE tbl_hoadon SET noi_dung = 'Chờ xử lý' WHERE id = $id";
    if (mysqli_query($con, $updateQuery)) {
        header('Location: ../view-order.php?id='.$id);
    } else {
        echo 'Có lỗi xảy ra khi cập nhật!';
    }
}
?>
