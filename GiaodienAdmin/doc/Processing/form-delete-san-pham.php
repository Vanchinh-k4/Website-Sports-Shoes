<?php
$con = mysqli_connect("localhost","root","","bangiay");


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['sanpham_id'])) {
        $productId = $_GET['sanpham_id'];
        
        $sql = "DELETE FROM tbl_sanpham WHERE sanpham_id = ?";

        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("i", $productId);
            if ($stmt->execute()) {
                echo 'success'; 
            } else {
                echo 'error'; 
            }
            $stmt->close();
            $con->close();
        }
    }
}
?>
