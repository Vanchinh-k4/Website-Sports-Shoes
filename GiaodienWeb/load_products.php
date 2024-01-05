
<?php
include_once('db/connect.php');
if (isset($_GET['submenu1_id'])) {
  $submenu1_id = $_GET['submenu1_id'];
  $query = "SELECT tbl_sanpham.*, tbl_submenu1.submenu1_name
            FROM tbl_sanpham
            INNER JOIN tbl_submenu1 ON tbl_sanpham.submenu1_id = tbl_submenu1.submenu1_id
            WHERE tbl_sanpham.submenu1_id = $submenu1_id
            ORDER BY tbl_sanpham.sanpham_id DESC";
} else {
  $query = "SELECT tbl_sanpham.*, tbl_submenu1.submenu1_name
            FROM tbl_sanpham
            INNER JOIN tbl_submenu1 ON tbl_sanpham.submenu1_id = tbl_submenu1.submenu1_id
            ORDER BY tbl_sanpham.sanpham_id DESC";
}
$result = mysqli_query($con, $query); 

// Tạo một mảng để lưu trữ sản phẩm theo submenu1_id
$products_by_submenu1 = array();

while ($row_sanpham = mysqli_fetch_array($result)) {
    $submenu1_id = $row_sanpham['submenu1_id'];
    if (!isset($products_by_submenu1[$submenu1_id])) {
        $products_by_submenu1[$submenu1_id] = array(
            'submenu1_id' => $submenu1_id,
            'submenu1_name' => $row_sanpham['submenu1_name'],
            'products' => array(),
        );
    }
    $products_by_submenu1[$submenu1_id]['products'][] = $row_sanpham;
}
?>

    <!-- =====Products==== -->
    <div  id="product-list">
    <?php
    foreach ($products_by_submenu1 as $submenu1) {
        $submenu1_id = $submenu1['submenu1_id'];
        $submenu1_name = $submenu1['submenu1_name'];
        $products = $submenu1['products'];
        ?>
            <div class="container2">
            <i id="submenu1_<?php echo $submenu1_id; ?>">
                <h3><?php echo $submenu1_name; ?></h3>
            </i>
            <div class="row">
           
                            <?php
                            $adminUploadsPath = "../GiaodienAdmin/doc/";
                             foreach ($products as $row_sanpham) {
                               ?>
                                <div class="single-product1">
                               <div class=" col-sm-2">
                                        <?php
                                        if ($row_sanpham["sale"] > 0) {
                                            echo '<div class="badge-inner secondary on-sale">';
                                            echo '<span class="onsale">-' . $row_sanpham['sale'] . '%</span>';
                                            echo '</div>';
                                        }
                                        ?>
                                      <div class="info-product-pricee">
                                        <a href="chitietsp.php?sanpham_id=<?php echo $row_sanpham['sanpham_id']; ?>">
                                            <img class="zoom-img"
                                                src="<?php echo $adminUploadsPath . $row_sanpham['sanpham_img']; ?>"
                                                alt="">
                                        </a>
                                        <a href="chitietsp.php?sanpham_id=<?php echo $row_sanpham['sanpham_id']; ?>">
                                        <p><?php echo $row_sanpham['sanpham_name']; ?></p>
                                        </a>
                                            <?php
                                            if ($row_sanpham["sanpham_gia"] != $row_sanpham["sanpham_giasale"]) {
                                               
                                                echo '<div><del><span class="core"> ' . number_format(floatval($row_sanpham['sanpham_gia']), 0, ',', '.') . 'đ</span></del></div>';
                                                echo '<div><span class="discount">' . number_format(floatval($row_sanpham['sanpham_giasale']), 0, ',', '.') . '<sup>đ</sup></span></div>';
                                            } else if ($row_sanpham["sanpham_gia"] == $row_sanpham["sanpham_giasale"]) {
                                                echo '<div><span class="discount">' . number_format(floatval($row_sanpham['sanpham_giasale']), 0, ',', '.') . '<sup>đ</sup></span></div>';
                                            }
                                             
                                            ?>
                                            </div>
                                        </div> 
                                        </div>
                                        <?php } ?>
                                    </div>
                                    </div>
                               <?php } ?>                                      
                         </div>
          