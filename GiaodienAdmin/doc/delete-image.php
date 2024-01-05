<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy đường dẫn ảnh từ dữ liệu được gửi từ AJAX
        $imageSrc = $_POST['imageSrc'];
        $sanpham_id = $_POST["sanpham_id"];
        $sql = "DELETE FROM tbl_anhchitiet WHERE  duongdananh = ? ";
        error_log("Delete image request received."); 
    if ($stmt = $con->prepare($sql)) {

        $stmt->bind_param("s", $imageSrc);

        if ($stmt->execute()) {
            echo 'success'; 
        } else {
            echo 'error'; 
            
        
            error_log("Error: " . $sql . " - " . $stmt->error);
        }
        $stmt->close();
    } else {
        echo 'error'; 

        error_log("Error preparing statement: " . $sql . " - " . $con->error);
    }
    }

// Kiểm tra nếu là yêu cầu POST và có dữ liệu được gửi đến từ AJAX



?>