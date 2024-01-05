<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách đơn hàng | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/2336.jpg" width="50px"
        alt="User Image">
      <div>
      <p class="app-sidebar__user-name"><b><a href="quan-ly-ho-so-admin.php" style="color:white"><span class="fas fa-pen"></span> Văn Chính</a></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item" href="quanlimenu/menungang.php"><i class='app-menu__icon fas fa-bars'></i><span
            class="app-menu__label">Quản lý giao diện</span></a></li>
      <li><a class="app-menu__item" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item active" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="quan-ly-tai-khoan.php"><i
            class='app-menu__icon fas fa-users'></i><span class="app-menu__label">Quản lý tài khoản</span></a>
      </li>
      <li><a class="app-menu__item" href="quan-ly-tin-tuc.php"><i
            class='app-menu__icon fas fa-newspaper'></i><span class="app-menu__label">Quản lý tin tức</span></a>
      </li>
      <li><a class="app-menu__item" href="quan-ly-binh-luan.php"><i
            class='app-menu__icon far fa-comments'></i><span class="app-menu__label">Quản lý bình luận</span></a>
      </li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách đơn hàng</li>
          <li class="breadcrumb-item"><a href="#">Thêm đơn hàng</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Thông tin đơn hàng được đặt</h3>
            <div class="tile-body">
              <form class="row">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Ảnh</th>
                    <th>Tên đơn hàng</th>
                    <th>Size</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                  </tr>
                </thead>
                <tbody>
               <?php
               $totalOrder=0;
               $totalProduct=0;    
               if (isset($_GET['id'])) {
                 $id = $_GET['id'];            
          $query = "SELECT tbl_hoadon.email, tbl_hoadon.madonhang, tbl_hoadon.hang_duoc_mua, tbl_hoadon.noi_dung
          FROM tbl_hoadon 
          WHERE tbl_hoadon.id = ?";
          $stmt = $con->prepare($query);
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $daduyet="Đã xử lý";
          
          
          if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $madonhang = $row["madonhang"];
        $hang_duoc_mua = $row["hang_duoc_mua"]; 
        $noidung = $row["noi_dung"];
        $hang_duoc_mua = rtrim($hang_duoc_mua, ';'); 
        $hang_duoc_mua_array = explode(';', $hang_duoc_mua);
        foreach ($hang_duoc_mua_array as $item) {
            $detail = explode(',', str_replace(array('[', ']'), '', $item)); 
            if (count($detail) >= 3) {
                $productId = $detail[0]; 
                $soluong = $detail[1];
                $kichco = $detail[2];

                $query_sanpham = "SELECT sanpham_name, sanpham_giasale, sanpham_img
                                  FROM tbl_sanpham 
                                  WHERE sanpham_id = ?";
                $stmt_sanpham = $con->prepare($query_sanpham);
                $stmt_sanpham->bind_param("i", $productId);
                $stmt_sanpham->execute();
                $result_sanpham = $stmt_sanpham->get_result();
                
                if ($result_sanpham && $result_sanpham->num_rows > 0) {
                    while ($row_sanpham = $result_sanpham->fetch_assoc()) {        
                        $tendonhang = $row_sanpham["sanpham_name"];
                        $gia =$row_sanpham['sanpham_giasale'];
                        $totalProduct = $soluong * $gia;
                        $totalOrder += $totalProduct; 
                        echo '<tr>'; 
                        echo '<td>'.$madonhang.'</td>';
                        echo '<td><img src="'. $row_sanpham['sanpham_img'] . '" alt="" width="100px;"></td>';
                        echo '<td>'.$tendonhang.'</td>';
                        echo '<td>'.$kichco.'</td>';
                        echo '<td>'.number_format(floatval($gia), 0, ',', '.').'đ</td>';
                        echo '<td>'.$soluong.'</td>';
                        echo '<td>'.number_format(floatval($totalProduct), 0, ',', '.').'đ</td>';
                        echo '</tr>';
                       
                    }
                    
                    
                }
                
            }
        }
    }
  }
}
?>
    <table>
      <?php
      echo '<tr>';
      echo '<td class="totalorder"><h4>Tổng tiền các sản phẩm: '.number_format(floatval($totalOrder), 0, ',', '.').'đ</h4></td>';
      echo '</tr>';
      ?>
        </table>
             <br>
                </tbody>
                  <?php
              if(isset($_GET["id"])){
                $id=$_GET["id"];
                $success="Đã xử lý";
                $query_user = "SELECT *  
                FROM tbl_hoadon  
                WHERE id = $id";
              $result=mysqli_query($con, $query_user);
              $row_result=mysqli_fetch_assoc($result);
              $waitprocess=$row_result["noi_dung"];
              }
              ?>
                  <table class="table table-hover table-bordered" id="inforuser">
                                    
                    <tbody>
                    <h4> Thông tin người mua:</h4>
                      <tr> 
                      <th>Tên</th>
                      <td><?php echo $row_result["ten_nguoi_mua"] ?></td>
                      </tr>
                      <tr>
                        <th>Số điện thoại</th>
                        <td><?php echo $row_result["dien_thoai"] ?></td>
                      </tr> 
                      <tr>
                      <th>Email</th>
                      <td> <?php echo $row_result["email"]?></td>
                      </tr>
                      <tr>
                      <th>Địa chỉ</th>
                      <td><?php echo $row_result["dia_chi"] ?></td>
                      </tr>
                      <tr>
                      <th>Nội dung</th>
                      <?php
                      if($success==$waitprocess){
                        echo '<td style="color:rgb(173 2 2); font-weight: bold; font-size:20px;">'.$waitprocess.'</td>';
                      }else{
                        echo '<td style="color:rgb(206 3 206); font-weight: bold; font-size:20px;">'.$waitprocess.'</td>';
                      }
                      ?>
                      </tr>
                      
                    
                    </tbody>
                  </table>
                
              </table>
         </form>
          </div>
          <button class="btn btn-save" id="approveBtn" type="button"><a href="Processing/update_status.php?id=<?php echo $id ?>">Duyệt</a></button>
          <button class="btn btn-remove" id="approveBtn" type="button"><a href="Processing/remove_status.php?id=<?php echo $id ?>">Hủy bỏ</a></button>
          <a class="btn btn-cancell" href="table-data-oder.php">Đóng</a>
        </div>
    </main>
   <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>





  
  </body>
</html>