<?php
include_once('../db/connect.php');
include('../handlelogin.php');

if(isset($_GET['item_id']) && isset($_GET['product_id']) && isset($_GET['quantity']) && isset($_GET['size'])) {
    $item_id = $_GET['item_id'];
    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
    $size = $_GET['size'];

    $select_query = "SELECT hang_duoc_mua FROM tbl_hoadon WHERE id = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, 'i', $item_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $hang_duoc_mua = $row['hang_duoc_mua'];
            $orders = explode(';', $hang_duoc_mua); 
        
            if (is_array($orders) && count($orders) > 0) {
                foreach ($orders as $key => $order) {
                    $order = str_replace(array('[', ']'), '', $order);
        
                
                    $product_info = explode(',', $order);
        
                    if (count($product_info) === 3) {
                        $current_product_id = $product_info[0]; 
                        $current_quantity = $product_info[1]; 
                        $current_size = $product_info[2];
        
                        if ($current_product_id == $product_id && $current_quantity == $quantity && $current_size == $size) {
                            unset($orders[$key]);
                            break; 
                        }
                    } else {
                        echo "Lỗi trong quá trình xử lý thông tin sản phẩm.";
                    }
                }
        
                $newHangDuocMua = implode(';', $orders); 
        
                if (empty($newHangDuocMua)) {
                    $delete_order_query = "DELETE FROM tbl_hoadon WHERE id = ?";
                    $stmt_delete = mysqli_prepare($con, $delete_order_query);
                    mysqli_stmt_bind_param($stmt_delete, 'i', $item_id);
                    mysqli_stmt_execute($stmt_delete);
                    mysqli_stmt_close($stmt_delete);
                } else {
                    $update_query = "UPDATE tbl_hoadon SET hang_duoc_mua = ? WHERE id = ?";
                    $stmt_update = mysqli_prepare($con, $update_query);
                    mysqli_stmt_bind_param($stmt_update, 'si', $newHangDuocMua, $item_id);
                    mysqli_stmt_execute($stmt_update);
                    mysqli_stmt_close($stmt_update);
                }
        
                header('Location: ../donhang.php'); 
                exit;
            } else {
                echo "Không có thông tin sản phẩm trong đơn hàng.";
            }
        } else {
            echo "Không có thông tin đơn hàng.";
        }
        
        
    } else {
        echo "Lỗi khi truy vấn cơ sở dữ liệu.";
    }
}
?>
