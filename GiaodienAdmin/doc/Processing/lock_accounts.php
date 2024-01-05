<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['id']) && isset($_GET['is_locked'])) {
    $userId = $_GET['id'];
    $is_locked = $_GET['is_locked']; // Trạng thái khóa (0 hoặc 1)

    $sql = "UPDATE tbl_accounts SET locked = ? WHERE user_id = ?";

    if ($stmt = $con->prepare($sql)) {
        // Liên kết giá trị của locked và user_id với câu lệnh SQL
        $stmt->bind_param("ii", $is_locked, $userId);

        // Thực hiện câu lệnh SQL để cập nhật trạng thái khóa
        if ($stmt->execute()) {
            echo 'success'; // Trả về 'success' nếu cập nhật thành công
        } else {
            echo 'error'; // Trả về 'error' nếu cập nhật thất bại
            
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
