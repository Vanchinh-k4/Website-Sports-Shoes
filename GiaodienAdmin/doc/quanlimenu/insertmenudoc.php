<?php
include_once('../db/connect.php');

if (isset($_POST['save1'])) {
    $submenu1Id = $_POST['submenu1Id'];
    $menuIdDoc = $_POST['menuIdDoc'];
    $submenu1Name = $_POST['submenu1Name'];



    if (!ctype_digit($submenu1Id)) {
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: ' Mã danh mục phải là số nguyên!',
        }).then(function() {
            window.location.href = 'menungang.php';
        });
        </script>";
        exit; 
    }

    $checkQuery = "SELECT * FROM tbl_submenu1 WHERE submenu1_id = ?";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, 's', $submenu1Id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        echo "<script> 
        Swal.fire({
            icon: 'warning',
            title: 'Mã danh mục đã tồn tại!',
        }).then(function() {
            window.location.href = 'menungang.php';
        });
        </script>";
    } else {
        $insertQuery = "INSERT INTO tbl_submenu1 (submenu1_id,menu_id,submenu1_name) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, 'iis', $submenu1Id, $menuIdDoc, $submenu1Name);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script> 
            Swal.fire({
                icon: 'success',
                title: 'Thêm danh mục thành công!',
            }).then(function() {
                window.location.href = 'menungang.php';
            });
            </script>";
        } 
    }
}
mysqli_close($conn);
?>