<?php

$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (isset($_POST['menu_id'])) {
    $menuId = $_POST['menu_id'];

    $query = "SELECT * FROM tbl_menu WHERE menu_id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $menuId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $menuInfo = mysqli_fetch_assoc($result);

            if ($menuInfo) {
                echo json_encode($menuInfo);
            } else {
                echo json_encode(['error' => 'Không tìm thấy sản phẩm']);
            }
        } else {
            echo json_encode(['error' => 'Lỗi truy vấn cơ sở dữ liệu']);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['error' => 'Lỗi truy vấn SQL']);
    }
} else {
    echo json_encode(['error' => '']);
}


?>
