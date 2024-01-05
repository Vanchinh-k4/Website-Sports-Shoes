<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    $sql = "DELETE FROM tbl_accounts WHERE user_id = ?";

    if ($stmt = $con->prepare($sql)) {
        // Liên kết giá trị của user_id với câu lệnh SQL
        $stmt->bind_param("i", $userId);

        // Thực hiện câu lệnh SQL để xóa tài khoản
        if ($stmt->execute()) {
            echo 'success'; // Trả về 'success' nếu xóa thành công
        } else {
            echo 'error'; // Trả về 'error' nếu xóa thất bại
            
            // Log lỗi SQL
            error_log("Error: " . $sql . " - " . $stmt->error);
        }
        $stmt->close();
    } else {
        echo 'error'; // Trả về 'error' nếu có lỗi trong việc chuẩn bị câu lệnh SQL

        // Log lỗi chuẩn bị câu lệnh SQL
        error_log("Error preparing statement: " . $sql . " - " . $con->error);
    }
    $con->close();
}
?>
