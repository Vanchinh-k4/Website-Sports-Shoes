<?php
include_once('../db/connect.php');

if (isset($_POST['save'])) {
    $menuId = $_POST['menuId'];
    $menuName = $_POST['menuName'];

   
    if (!ctype_digit($menuId)) {
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Menu ID phải là số nguyên!',
        }).then(function() {
            window.location.href = 'menungang.php';
        });
        </script>";
        exit; 
    }
    $checkQuery = "SELECT * FROM tbl_menu WHERE menu_id = ? OR menu_name = ?";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, 'ss', $menuId, $menuName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script> 
        Swal.fire({
            icon: 'warning',
            title: 'ID hoặc Menu đã tồn tại!',
        }).then(function() {
            window.location.href = 'menungang.php';
        });
        </script>";
    } else {
        $insertQuery = "INSERT INTO tbl_menu (menu_id, menu_name) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, 'ss', $menuId, $menuName);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script> 
            Swal.fire({
                icon: 'success',
                title: 'Thêm Menu thành công!',
            }).then(function() {
                window.location.href = 'menungang.php';
            });
            </script>";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
}
?>
