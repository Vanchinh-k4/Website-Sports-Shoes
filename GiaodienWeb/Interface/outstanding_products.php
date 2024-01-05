<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_outstanding =mysqli_query($con, "SELECT * FROM tbl_sanpham WHERE noibat='co' ORDER BY sanpham_id DESC");
while($row_result=mysqli_fetch_assoc($sql_outstanding)){
echo '<div class="single-product">';
 echo '<div class="product-f-image">';
 if ($row_result["sale"] > 0) {
    echo '<div class="badge-inner secondary on-sale">';
    echo '<span class="onsale">-' . $row_result['sale'] . '%</span>';
    echo '</div>';
}
 echo '<img src="../GiaodienAdmin/doc/'.$row_result["sanpham_img"].'" alt="">';
 echo '<div class="product-hover">';
 echo '<a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>';
 echo '<a href="chitietsp.php?sanpham_id='.$row_result["sanpham_id"].'" class="view-details-link"><i class="fa fa-link"></i> Xem chi tiết</a>';
 echo ' </div>';
 echo '</div>';
 echo '<div class="product-carousel-price">';
 echo '<a href="chitietsp.php?sanpham_id= '.$row_result['sanpham_id'].'">';
 echo '<p> '.$row_result['sanpham_name'].'</p>';
 echo '</a>';
 if ($row_result["sanpham_gia"] != $row_result["sanpham_giasale"]) {
                                               
    echo '<div class="price"><del><span class="core"> ' . number_format(floatval($row_result['sanpham_gia']), 0, ',', '.') . 'đ</span></del></div>';
    echo '<div class="pricesale"><span class="discount">' . number_format(floatval($row_result['sanpham_giasale']), 0, ',', '.') . '<sup>đ</sup></span></div>';
} else if ($row_result["sanpham_gia"] == $row_result["sanpham_giasale"]) {
    echo '<div class="pricesale"><span class="discount">' . number_format(floatval($row_result['sanpham_giasale']), 0, ',', '.') . '<sup>đ</sup></span></div>';
}
 echo '</div>';
 echo '</div>';
}

?>
