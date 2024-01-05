<?php
include_once('../db/connect.php');

if ( isset($_POST["saveupdate1"]) && isset($_POST['submenu1Id']) && isset($_POST['submenu1Name'])) {
    $submenu1Id = $_POST['submenu1Id'];
    $submenu1Name = $_POST['submenu1Name'];

    $updateQuery = "UPDATE tbl_submenu1 SET submenu1_name = '$submenu1Name' WHERE submenu1_id = $submenu1Id";

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
