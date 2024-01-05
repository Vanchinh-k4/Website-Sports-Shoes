<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();
$user_id = $_SESSION["user_id"];

if (isset($user_id)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sanpham_id = $_POST["sanpham_id"];
        $comment = mysqli_real_escape_string($con, $_POST['comment']);
        $rating = mysqli_real_escape_string($con, $_POST['rating']);

        $filePaths = [];
        if (!empty($_FILES['image']['tmp_name'][0])) {
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['image']['name'][$key];
            $targetFilePath = "uploads/" . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $targetFilePath)) {
                $filePaths[] = $targetFilePath;
            } else {
                echo "Có lỗi khi tải lên tệp ảnh.";
            }
        }
    }else {
        $imagePaths = NULL;
    }

        $imagePaths = implode(', ', $filePaths);

        $stmt = $con->prepare("INSERT INTO tbl_danhgia (sanpham_id, nguoidung_id, noidung, img, sosao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $sanpham_id, $user_id, $comment, $imagePaths, $rating);

        if ($stmt->execute()) {
            // Gửi kết quả trả về cho JavaScript
            echo "success";
        } else {
            echo "Lỗi khi gửi đánh giá: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "Lỗi";
}
?>
