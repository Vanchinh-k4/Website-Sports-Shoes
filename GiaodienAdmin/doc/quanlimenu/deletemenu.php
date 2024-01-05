<?php
include_once('../db/connect.php');

if(isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];

    $findChildrenQuery = "SELECT * FROM tbl_submenu1 WHERE menu_id = $item_id";
    $childrenResult = mysqli_query($conn, $findChildrenQuery);

    while ($childRow = mysqli_fetch_assoc($childrenResult)) {
        $child_id = $childRow['submenu1_id'];
        $deleteChildQuery = "DELETE FROM tbl_submenu1 WHERE submenu1_id = $child_id";
        if (mysqli_query($conn, $deleteChildQuery)) {
        } else {
            echo 'error';
            exit;
        }
    }
    $delete_query = "DELETE FROM tbl_menu WHERE menu_id = '$item_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "success"; 
    } else {
        echo "error";
    }
}
?>
