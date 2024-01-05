<?php
include_once('../db/connect.php');
include('../handlelogin.php');

if(isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    $delete_query = "DELETE FROM tbl_giohang WHERE giohang_id = '$item_id'";

    if (mysqli_query($con, $delete_query)) {
        header('Location: ../giohang.php'); // Chuyển hướng về trang giỏ hàng sau khi xóa
        exit;
    } else {
        echo "Error deleting item: " . mysqli_error($con);
    }
}


?>
