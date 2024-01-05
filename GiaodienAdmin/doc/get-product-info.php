<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['sanpham1_id'])) {
    $productId = $_POST['sanpham1_id'];

    $query = "SELECT sp.*, ac.duongdananh 
              FROM tbl_sanpham AS sp
              LEFT JOIN tbl_anhchitiet AS ac ON sp.sanpham_id = ac.sanpham_id
              WHERE sp.sanpham_id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $productInfo = mysqli_fetch_assoc($result);

            if ($productInfo) {
                $imagePaths = array();

                // Lặp qua tất cả các hàng để lấy các đường dẫn ảnh chi tiết
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePaths[] = $row['duongdananh'];
                }

                // Đưa thông tin sản phẩm và đường dẫn ảnh vào một mảng và trả về JSON
                array_unshift($imagePaths, $productInfo['duongdananh']); // Thêm đường dẫn đầu tiên vào mảng
                $productWithImages = array(
                    'productInfo' => $productInfo,
                    'imagePaths' => $imagePaths
                );
                echo json_encode($productWithImages);
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
