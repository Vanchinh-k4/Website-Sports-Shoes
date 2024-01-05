<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = array();
if (isset($_POST['sanpham2_id'])) {
    $sanpham2_id = $_POST['sanpham2_id'];

    $query = "SELECT kichco, soluong FROM tbl_size WHERE sanpham_id = $sanpham2_id";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    } else {
        $data['error'] = "Không có dữ liệu cho sản phẩm này.";
    }
    mysqli_free_result($result);
} else {
    $data['error'] = "Không tìm thấy sanpham_id.";
}
mysqli_close($con);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>