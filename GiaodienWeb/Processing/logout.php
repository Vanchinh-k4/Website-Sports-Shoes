<?php
include_once('../db/connect.php');

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $sql_delete_temporary_cart = "DELETE FROM tbl_giohang WHERE user_id = $user_id AND status = 'temporary'";
    
    if (mysqli_query($con, $sql_delete_temporary_cart)) {
    } else {
        echo "Lỗi: " . mysqli_error($con);
    }
}
unset($_SESSION['user_id']);
session_destroy();
header("location:../index.php");

?>