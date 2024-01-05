<?php
include_once('../db/connect.php');
?>
<?php
  include_once('deletemenu.php');
  ?>

	<!-- SIDEBAR -->
	<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- Bao gồm tệp CSS của SweetAlert -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
        <?php
  include_once('updatemenudoc.php');
  ?>
</head>
<style>
    .img_slider img {
        width: 20px;
    }
</style>

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
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../img/2336.jpg" width="100px"
        alt="">
      <div>
      <p class="app-sidebar__user-name"><b><a href="../quan-ly-ho-so-admin.php" style="color:white"><span class="fas fa-pen"></span> Văn Chính</a></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item haha" href="../phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li>
      <li><a class="app-menu__item" href="../index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
      <li><a class="app-menu__item active" href="menungang.php"><i class='app-menu__icon fas fa-bars'></i><span
            class="app-menu__label">Quản lý giao diện</span></a></li>
      <li><a class="app-menu__item" href="../table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="../table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
      <li><a class="app-menu__item" href="../quan-ly-tai-khoan.php"><i
            class='app-menu__icon fas fa-users'></i><span class="app-menu__label">Quản lý tài khoản</span></a>
      </li>
      <li><a class="app-menu__item" href="../quan-ly-tin-tuc.php"><i
            class='app-menu__icon fas fa-newspaper'></i><span class="app-menu__label">Quản lý tin tức</span></a>
      </li>
      <li><a class="app-menu__item" href="../quan-ly-binh-luan.php"><i
            class='app-menu__icon far fa-comments'></i><span class="app-menu__label">Quản lý bình luận</span></a>
      </li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
  </aside>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="app-content">	
  <div class="category">
	<div class="button1">
	   <button class="nut" onclick="showTables(['table1', 'table5'])">Menu ngang</button>
	</div>
	<div class="button2">
		<button class="nut" onclick="showTables(['table2', 'table6'])">Danh mục</button>
	</div>
	<div class="button3">
		<button class="nut" onclick="showTables(['table3', 'table5'])">Danh mục con</button>
	</div>
    <div class="button4">
		<button class="nut" onclick="showTables(['table8'])">Slider</button>
	</div>
  </div>

  <!--================ Menu ngang========== -->
		<div class="table-data" id="table1">
				<div class="order">
					<div class="head">
						<h3>Menu ngang</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
               <?php
			   $query="SELECT * FROM tbl_menu";
			   $result=mysqli_query($conn,$query);
			   ?>
					<table>
						<thead>
							<tr>
								<th>Mã Menu</th>
								<th>Tên Menu</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($resultrow=mysqli_fetch_assoc($result)){
								echo '<tr>';
								echo '<td>'.$resultrow["menu_id"].'</td>';
								echo '<td>';
								echo '<p> '.$resultrow["menu_name"].'</p>';
								echo '</td>';
								echo '<td><button id="editButton" class="editButton" data-menu_id="'.$resultrow["menu_id"].'"><i class="fas fa-edit"></i></button></td>';
								echo '<td><button id="delete" class="trash" data-menu_id='.$resultrow["menu_id"].'><i class="fas fa-trash-alt"></i></button></td>';
							    echo '</tr>';
							?>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>


 
              <!--================ Menu dọc========== -->
			<div class="table-data" id="table2">
				<div class="order">
					<div class="head">
						<h3>Danh mục</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
               <?php
			   $query="SELECT tbl_submenu1.*, tbl_menu.menu_name
			   FROM tbl_submenu1
			   JOIN tbl_menu ON tbl_submenu1.menu_id = tbl_menu.menu_id;";
			   $result=mysqli_query($conn,$query);
			   ?>
					<table>
						<thead>
							<tr>
							    <th>Mã danh mục</th>
								<th>Tên danh mục </th>
								<th>Loại Menu</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($resultrow=mysqli_fetch_assoc($result)){
								echo '<tr>';
								echo '<td>'.$resultrow["submenu1_id"].'</td>';
								echo '<td>';
								echo '<p> '.$resultrow["submenu1_name"].'</p>';
								echo '</td>';
								echo '<td>';
								echo '<p> '.$resultrow["menu_name"].'</p>';
								echo '</td>';
								echo '<td><button id="editButton" class="editButton2" data-submenu1_id="'.$resultrow["submenu1_id"].'"><i class="fas fa-edit"></i></button></td>';
								echo '<td><button id="delete" class="trash1" data-submenu1_id='.$resultrow["submenu1_id"].'><i class="fas fa-trash-alt"></i></button></td>';
							    echo '</tr>';
							?>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>			
			</div>

                       <!-- Slider -->
            <div class="table-data" id="table8">
				<div class="order">
					<div class="head">
						<h3>Chỉnh sửa Slider</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
                        <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="../form-add-slider.php" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm Slider</a>
                            </div>
					</div>
               <?php
			   $query="SELECT * FROM tbl_slider";
			   $result=mysqli_query($conn,$query);
			   ?>
					<table>
						<thead> 
                             <tr>
							    <th>ID</th>
								<th>Ảnh</th>
								<th>Tên tiêu đề</th>
                                <th>Tên tiêu đề con</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($resultrow=mysqli_fetch_assoc($result)){
								echo '<tr>';
								echo '<td>'.$resultrow["id"].'</td>';
								echo '<td class="img_slider"><img src="../'.$resultrow["img"].'"></td>';
								echo '<td>';
								echo '<p> '.$resultrow["caption_title"].'</p>';
								echo '</td>';
                                echo '<td>'.$resultrow["caption_subtitle"].'</td>';
								echo '<td><button id="editButton" class="editButton3"><i class="fas fa-edit"></i></button></td>';
								echo '<td><button id="delete_slider" class="trash2"><i class="fas fa-trash-alt"></i></button></td>';
							    echo '</tr>';
							?>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>			
			</div>


            <!--================ Sản phẩm menu dọc========== -->
			<div class="table-data" id="table3">
				<div class="order">
					<div class="head">
						<h3>Chỉnh sửa danh mục con</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
               <?php
			   $query="SELECT * FROM tbl_submenu2";
			   $result=mysqli_query($conn,$query);
			   ?>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Danh mục con </th>
								<th>Tên </th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($resultrow=mysqli_fetch_assoc($result)){
								echo '<tr>';
								echo '<td>'.$resultrow["submenu2_id"].'</td>';
								echo '<td>'.$resultrow["submenu1_id"].'</td>';
								echo '<td>';
								echo '<p> '.$resultrow["submenu2_name"].'</p>';
								echo '</td>';
								echo '<td><button id="edit">Sửa</button></td>';
								echo '<td><button id="delete">Xóa</button></td>';
							    echo '</tr>';
							?>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>			
			</div>


            <?php
            $query = "SELECT * FROM tbl_menu"; // Thêm điều kiện WHERE phù hợp với nhu cầu lấy dữ liệu
            $result = mysqli_query($conn, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                // Lấy dữ liệu từ kết quả truy vấn
                $row = mysqli_fetch_assoc($result);
                $menuId = $row['menu_id'];
                $menuName = $row['menu_name'];
            } 
            ?>
      <!--===== Chỉnh sửa thông tin menu ngang======= -->
      <?php include('updatemenu.php'); ?>
<div class="table-data" id="table4">
    <div class="order">
        <div class="head">
            <h3>Chỉnh sửa</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <form action="menungang.php" id="eidtForm" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Mã Menu</th>
                        <th>Tên Menu</th>
                        <th></th>
                    </tr>
                </thead>
        
                    <tr>
                        <td><input type="text" name="menuId" id="menuIdInput" value="" readonly></td>
                        <td><input type="text" name="menuName" id="menuNameInput" value=""></td>
                        <td><button type="submit"  id="editButton1" name="saveupdate">Lưu</button></td>
            </table>
        </form>
    </div>
</div>


<!--===== Chỉnh sửa thông tin menu dọc======= -->
<?php include('updatemenudoc.php'); ?>
<div class="table-data" id="table7">
    <div class="order">
        <div class="head">
            <h3>Chỉnh sửa</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <form action="menungang.php" id="eidtForm" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Mã Danh mục</th>
                        <th>Tên Danh mục </th>
                        <th></th>
                    </tr>
                </thead>
                <tr>
                    <td><input type="text" name="submenu1Id" id="submenu1IdInput" value="" readonly></td>
                    <td><input type="text" name="submenu1Name" id="submenu1NameInput" value=""></td>
                    <td><button type="submit" id="editButton1" name="saveupdate1">Lưu</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- =======Thêm menu ngang======= -->
<div class="table-data" id="table5">
    <div class="order">
        <div class="head">
            <h3>Thêm menu</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
		<?php
		include_once('insertmenu.php')
		?>
        <form action="menungang.php" id="eidtForm" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Mã Menu</th>
                        <th>Tên Menu</th>
                        <th></th>
                    </tr>
                </thead>
                <tr>
                    <td><input type="text" name="menuId" id="menuIdInput" required></td>
                    <td><input type="text" name="menuName" id="menuNameInput" required></td>
                    <td><button type="submit" id="save" name="save">Thêm</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>



<!-- ==========Thêm menu dọc============ -->
<?php
$query = "SELECT * FROM tbl_menu";
$result1 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result1)) {
    $menuOptions[$row["menu_id"]] = $row["menu_name"];
}
?>
<div class="table-data" id="table6">
    <div class="order">
        <div class="head">
            <h3>Thêm Danh mục</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
		<?php
		include_once('insertmenudoc.php')
		?>
        <form action="menungang.php" id="eidtForm" method="post">
            <table>
                <thead>
                    <tr>
					    <th>Mã Danh mục</th>
						<th>Loại Menu</th>
                        <th>Tên Danh mục</th>
                    </tr>
                </thead>
                <tr>
				    <td><input type="text" name="submenu1Id" id="submenu1IdInput" required></td>
                    <td><select name="menuIdDoc" id="">
					<option value="" selected disabled>----Chọn Loại Menu----</option>
					<?php
                    foreach ($menuOptions as $menuId => $menuName) {
                         echo '<option value="' . $menuId . '">' . $menuName . '</option>';
                            }
                              ?>
					</select></td>
                    <td><input type="text" name="submenu1Name" id="submenu1NameInput" required></td>
                    <td><button type="submit" id="save" name="save1">Thêm</button></td>
                </tr>
            </table>
        </form>
    </div>
</div>
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
<script src="js/displaymenu.js"></script>
<script src="js/display_edit_menu.js"></script>
<script src="js/display_edit_menudoc.js"></script>
<script src="js/processing_remove_menu.js"></script>
<script src="js/processing_remove_menudoc.js"></script>
<script src="js/update_data_menu.js"></script>
<script src="js/update_data_menudoc.js"></script>

<!-- ===========End============================-->
</body>
</html>