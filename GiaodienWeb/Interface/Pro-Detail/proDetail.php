<!-- Trang hiển thị chi tiết sản phẩm -->
<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['sanpham_id'])) {
    $sanpham_id = $_GET['sanpham_id'];   
    $sql_product_detail = mysqli_query($con, "SELECT sp.*, sm.submenu1_name
    FROM tbl_sanpham sp 
    JOIN tbl_submenu1 sm ON sm.submenu1_id = sp.submenu1_id 
    WHERE sp.sanpham_id = $sanpham_id");
    $row_product_detail = mysqli_fetch_assoc($sql_product_detail);
    echo '<section id="product">';
    echo '<div class="product-detail">';
    echo '<div class="slider product">';
    echo '<div class="img-container">';
    if($row_product_detail["sale"] > 0){
        echo  '<div class="badge-inner secondary on-sale">';
        echo  '<span class="onsale">-'. $row_product_detail['sale'] .'%</span>';
        echo  '</div>';
      } 
      echo '<div class="magnifier">';
    echo '<img id="imgBox" class="" src="../GiaodienAdmin/doc/'. $row_product_detail['sanpham_img'] . '" alt="">';
    echo '<div class="magnified"></div>';
    echo '</div>';
    echo '</div>';
    echo  '<div class="product-img">';
    $sql_anhchitiet = mysqli_query($con,"SELECT * FROM tbl_anhchitiet WHERE sanpham_id = $sanpham_id");
    while($row=mysqli_fetch_assoc($sql_anhchitiet)){
    echo '<img src="../GiaodienAdmin/doc/'.$row["duongdananh"].'" alt="">';
    }
    echo '</div>';
    echo '<div class="slick-prev"><i class="fas fa-backward"></i></div>';
    echo '<div class="slick-next"><i class="fas fa-forward"></i></div>';
    echo '</div>';
    echo '<div class="product-info">';
    echo '<label id="label1">' . $row_product_detail['sanpham_name'] . '</label>';
    echo '<hr>';
    echo '<div class="info-product-price">';
    if($row_product_detail["sanpham_gia"] != $row_product_detail["sanpham_giasale"]) {
        echo '<del><span class="core"> '. number_format(floatval($row_product_detail['sanpham_gia']), 0, ',', '.').'đ</span></del>';
        echo '<span class="discount">'.number_format(floatval($row_product_detail['sanpham_giasale']), 0, ',', '.').'<sup>đ</sup></span>';
     }else if($row_product_detail["sanpham_gia"] == $row_product_detail["sanpham_giasale"]){
        echo '<span class="discount">'.number_format(floatval($row_product_detail['sanpham_giasale']), 0, ',', '.').'<sup>đ</sup></span>';
     }
    echo '</div> <br>';
    echo '<div class="react">Mã sản phẩm: '. $row_product_detail['masanpham']. '</div>';
    echo '<div class="react">Tình trạng:<span class="badge bg-success">'. $row_product_detail['tinh_trang']. '</span></div>';
    echo '<div class="mota"><p></p></div>';
    echo '<br>';
    echo '<div class="detail-coupon">';
    echo '<div class="coupon-icon"><img width="32px; height=""32px;" src="../GiaodienWeb/img/coupon.png"></div>';
    echo '<div class="coupon-content"><span> Giảm 30k - Nhập mã giảm giá Cshop - Áp dụng cho đơn hàng lần 2.</span></div>';
    echo '</div>';
    echo '<form action="chitietsp.php" method="post">';
    echo '<input type="hidden" name="sanpham_id" value="' . $sanpham_id . '">';
    echo '<input type="hidden" name="sanpham_name" value="' . $row_product_detail['sanpham_name'] . '">';
    echo '<input type="hidden" name="sanpham_giasale" value="' . $row_product_detail['sanpham_giasale'] . '">';
    echo '<input type="hidden" name="sanpham_img" value="' . $row_product_detail['sanpham_img'] . '">';
   
    echo '<div class="choose_size">';
    echo '<label for="size">Size:</label>';
    echo '<div class="size">';
    $stmt =$con->prepare("SELECT kichco, soluong FROM tbl_size WHERE sanpham_id = ? ");
    $stmt->bind_param("i", $sanpham_id);
    $stmt->execute();
    $result =$stmt->get_result();
    if($result){
    while ($rowresult = mysqli_fetch_array($result)) {
      if($rowresult["soluong"]>0){
      echo '<label for="' . $rowresult["kichco"] . '">';
      echo '<input type="radio" name="choosesize" value="' . $rowresult["kichco"] . '" id="'.$rowresult["kichco"].'">';
      echo  '<span class="choose">' . $rowresult["kichco"] . '</span>';
      echo '</label>';
    } else {
      echo '<label for="' . $rowresult["kichco"] . '" id="hide">';
      echo '<input type="radio" name="choosesize" value="' . $rowresult["kichco"] . '" id="'.$rowresult["kichco"].'" disabled>';
      echo  '<span class="choose">' . $rowresult["kichco"] . '</span>';
      echo '</label>';
      
    }
    }
  }
    echo '</div>';
    echo '</div>';
    echo '<div class="choosequantity">';
    echo '<label>Chọn số lượng: </label>';
    echo '<div class="quantity">';
    echo '<input type="button" value="-" class="decrease-btn">';
    echo '<input type="number" min="1" step="1" value="1" name="choose_quantity" class="quantity-input" id="choose_quantity" placeholder inputmode="numeric" data-quantity="">';
    echo '<input type="button" value="+" class="increase-btn">';
    echo '</div>';
    echo '</div>';
    echo '<div class="choose-form">';
    echo '<button type="submit" class="checkout-button" name="add_to_cart" onclick="addToCart()">';
    echo '<span class="icon_cart_btn"></span>';
    echo '<span class="add-to-cart">Thêm vào giỏ</span>';
    echo '</button>';
    echo '<button type="submit" class="pay" name="paynow">';
    echo '<span class="icon_paynow_btn"></span>';
    echo '<span> Mua ngay</span>';
    echo '</button>';
    echo '</điv>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
    echo '
    <div class="tabs">
      <button class="tablinks active" onclick="openTab(event, \'description\')">Mô tả sản phẩm</button>
      <button class="tablinks" onclick="openTab(event, \'comments\')">Xem đánh giá</button>
      <button class="tablinks" onclick="openTab(event, \'reviews\')">Đánh giá sản phẩm</button>
    </div>
    <div id="description" class="tabcontent active">
 <div class="product-footer">
    <div class="containerr">
        <div class="row-row-small">
            <div class="col-large-9">
                <div class="title">
                    THÔNG SỐ SẢN PHẨM
                </div>
                <div class="col-inner">
                <table>
                    <tbody>
                        <tr>
                            <th>Size</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Loại hàng</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Quà tặng</th>
                            <td>Full box + tax + bill, Tặng tất</td>
                        </tr>
                        <tr>
                            <th>Thương hiệu</th>
                            <td>'. $row_product_detail["submenu1_name"] .'</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <div class="detail-title">
                    MÔ TẢ SẢN PHẨM
                </div>
                <div class="col-inner1">
                    <div>'. $row_product_detail["mo_ta"].'</div>
                </div>
                <div class="img-size">
                    <img src="img/bang-size.jpg" alt="">
                    <div class="note"><p><i style="color: red">Lưu ý</i>: Shop có các mẫu Sneaker Bigsize từ 44 - 45 - 46 - 47 - 48 - 49 cho
                     anh em chân to giá chênh lệch 30 - 50k so với size chuẩn. Vui lòng nhắn tin
                      Fanpage hoặc Zalo để check size. Xin cảm ơn.</p>
                    <h3><span>Những lý do bạn nên mua giày sneaker tại C-Shop</span></h3>
                    <ul class="circle-list">
                        <li>Giày chuẩn hàng Trung bản chuẩn nhất, cao cấp nhất thị trường.</li>
                        <li>Kiểm tra hàng mới thanh toán, đổi trả size nhanh chóng.</li>
                        <li>Mẫu giày Trends, đẹp, đủ mẫu, đủ size.</li>
                        <li>Ship COD toàn quốc nhanh chóng.</li>
                        <li>Bảo hành lên đến 6 tháng.</li>
                    </ul>
                    </div>
                 </div>
               </div>
          </div>
      </div>
  </div>
</div>


 <div id="comments" class="tabcontent">
 <div class="show-feedback">
 <div class="user-infor-feedback">
 <div class="name-star">
 <span><h4>Name | </h4></span>
 <span><i class=" fas fa-star"></i> </span>
 </div>
 <h5>Sản phẩm đẹp quá ạ</h5>
 <img src="../GiaodienAdmin/doc/'. $row_product_detail['sanpham_img'] . '" alt="">
 </div>
</div>
</div>


<div id="reviews" class="tabcontent">
               <div class="review">
    <h2>Đánh giá cho  '.$row_product_detail["sanpham_name"].' </h2>   
    <button id="openModalBtn">Gửi đánh giá ngay</button>
  </div>
  <div id="modal" class="modal">
    <div class="modal-contentt">
      <span class="closee">&times;</span>
      <h3>Đánh giá sản phẩm</h3>
      <textarea id="comment" placeholder="Mời bạn chia sẽ thêm một số cảm nhận..."></textarea>
<div class="choose-img">
  <label for="image" class="upload-btn">
    <i class="fas fa-camera"></i> Gửi hình chụp thực tế
  </label>
  <input type="file" id="image" name="image" accept="image/*" multiple style="display: none;">
  <div class="image-preview"></div>
</div>
<div class="rating">
  <input type="checkbox" id="star5_modal" name="rating_modal" value="">
  <label for="star5_modal"><i class="fas fa-star"></i></label>

  <input type="checkbox" id="star4_modal" name="rating_modal" value="">
  <label for="star4_modal"><i class="fas fa-star"></i></label>

  <input type="checkbox" id="star3_modal" name="rating_modal" value="">
  <label for="star3_modal"><i class="fas fa-star"></i></label>

  <input type="checkbox" id="star2_modal" name="rating_modal" value="">
  <label for="star2_modal"><i class="fas fa-star"></i></label>

  <input type="checkbox" id="star1_modal" name="rating_modal" value="">
  <label for="star1_modal"><i class="fas fa-star"></i></label>
  <input type="hidden" id="sanpham_id" name="sanpham_id" value="'.$row_product_detail["sanpham_id"].'">
</div>
 <p><button id="submitReview">Gửi đánh giá ngay</button></p>
</div>
</div>
</div>';
} else {
    echo 'Không có thông tin sản phẩm';
}
?>

