<?php
include_once('../db/connect.php');

if(isset($_POST['userid']) && isset($_POST['productid']) && isset($_POST['size'])) {
    $userid = $_POST['userid'];
    $productid = $_POST['productid'];
    $size = $_POST['size'];

    // Xóa sản phẩm dựa trên productid, size và userid
    $delete_query = "DELETE FROM tbl_giohang WHERE sanpham_id = '$productid' AND size = '$size' AND user_id = '$userid'";

    if (mysqli_query($con, $delete_query)) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }
}
?>
