<?php
include_once('../db/connect.php');

if (isset($_POST["saveupdate"])) {
    $menuId = $_POST['menuId'];
    $menuName = $_POST['menuName'];

    $updateQuery = "UPDATE tbl_menu SET menu_name = '$menuName' WHERE menu_id = $menuId";

    if (mysqli_query($conn, $updateQuery)) {
        echo " <script> 
        Swal.fire({
            icon: 'success',
            title: 'Cập nhật thành công!',
        }).then(function() {
            window.location.href = 'menungang.php';
        });
        </script>" ;
    } else {
        echo "error";
    }
}
?>
