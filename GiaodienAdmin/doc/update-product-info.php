<?php
$con = mysqli_connect("localhost", "root", "", "bangiay");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST["save_update"])) {
    $id = $_POST["new_id"];
    $newSubmenu = $_POST['new_submenu'];
    $newproductId = $_POST['new_product_id'];
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];
    $newSale = $_POST['new_sale'];
    $newDetail = $_POST['new_detail'];
    $newStatus = $_POST['new_status'];
    $newoutstanding = $_POST['new_outstanding'];
    $giaSale = $newPrice - ($newSale * $newPrice) / 100;


    $result = updateProduct($con, $newSubmenu, $newproductId, $newName, $newPrice, $newSale, $giaSale,$newoutstanding, $newDetail, $newStatus, $id);
    $mainImageChanged = $_FILES['new_sanpham_img']['error'] !== UPLOAD_ERR_NO_FILE;

    if ($result === true || (!$mainImageChanged && $result === false) || ($result === true && !$mainImageChanged )) {
        $imageResult = updateImagePaths($con, $id, $_FILES['image_detail']);

        if ($imageResult === true) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật thành công!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href='table-data-product.php';
                });
            </script>";
        } elseif ($imageResult === false) {
            echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'Không có sự thay đổi!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.history.back();
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '$imageResult',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.history.back();
                });
            </script>";
        }
    } elseif ($result === false && $mainImageChanged) {
        echo "<script>
            Swal.fire({
                icon: 'info',
                title: 'Không có sự thay đổi!',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.history.back();
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: '$result',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.history.back();
            });
        </script>";
    }
}

// Hàm xử lý cập nhật thông tín sản phẩm
        function updateProduct($con, $newSubmenu, $newproductId, $newName, $newPrice, $newSale, $giaSale,$newoutstanding, $newDetail, $newStatus, $id) {
            if ($_FILES["new_sanpham_img"]["error"] == 0) {
                $sanpham_img_name = basename($_FILES["new_sanpham_img"]["name"]);
                $target_directory = "uploads/";
                $target_file = $target_directory . $sanpham_img_name;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($sanpham_img_name, PATHINFO_EXTENSION));
               
                $check = getimagesize($_FILES["new_sanpham_img"]["tmp_name"]);
                if ($check !== false) {
                    echo " - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tệp không phải là ảnh!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.history.back();
                        });
                    </script>";
                    $uploadOk = 0;
                }
                if ($_FILES["new_sanpham_img"]["size"] > 500000) {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Tệp ảnh quá lớn!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.history.back();
                        });
                    </script>";
                    $uploadOk = 0;
                    exit;
                }
        
        
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "<script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Chỉ nhận các tệp jpg, png, jpeg!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.history.back();
                        });
                    </script>";
                    $uploadOk = 0;
                    exit;
                }
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["new_sanpham_img"]["tmp_name"], $target_file)) {
                        $sanpham_img_path = $target_file;
                        // Tiến hành cập nhật cơ sở dữ liệu
                        $query = "UPDATE tbl_sanpham SET submenu1_id = ?, masanpham = ?, sanpham_name = ?, sanpham_gia = ?, sale = ?, sanpham_giasale = ?, sanpham_img = ?, noibat=?, mo_ta = ?, tinh_trang = ? WHERE sanpham_id = ?";
                        $stmt = mysqli_prepare($con, $query);
                        $stmt = mysqli_prepare($con, $query);
            
                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt, "issiiissssi", $newSubmenu, $newproductId, $newName, $newPrice, $newSale, $giaSale, $sanpham_img_path,$newoutstanding, $newDetail, $newStatus, $id);
                                mysqli_stmt_execute($stmt);
                            }
                        if (mysqli_stmt_affected_rows($stmt) > 0) {
                            return true;
                        } else {
                            return false;
                        }
                       
                    } else {
                        return "Có lỗi xảy ra khi tải tệp ảnh!";
                    }
                } else {
                    return "Dữ liệu tải lên không hợp lệ!";
                }
            } else {
                $query = "UPDATE tbl_sanpham SET submenu1_id = ?, masanpham = ?, sanpham_name = ?, sanpham_gia = ?, sale = ?, sanpham_giasale = ?, noibat=?,  mo_ta = ?, tinh_trang = ? WHERE sanpham_id = ?";
                $stmt = mysqli_prepare($con, $query);
                $stmt = mysqli_prepare($con, $query);
    
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "issiiisssi", $newSubmenu, $newproductId, $newName, $newPrice, $newSale, $giaSale,$newoutstanding, $newDetail, $newStatus, $id);
                        mysqli_stmt_execute($stmt);
                    }
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }
       
    // Hàm xử lý thêm ảnh cho tiết
        function updateImagePaths($con, $id, $imageFiles) {
            if (!empty($imageFiles)) {
                $currentImagePaths = [];
                $sql_query = mysqli_query($con, "SELECT duongdananh FROM tbl_anhchitiet WHERE sanpham_id = $id");
                while ($row = mysqli_fetch_assoc($sql_query)) {
                    $currentImagePaths[] = $row['duongdananh'];
                }
        
                $query = "INSERT INTO tbl_anhchitiet (sanpham_id, duongdananh) VALUES (?, ?)";
                $stmt = mysqli_prepare($con, $query);
        
                if ($stmt) {
                    foreach ($imageFiles['tmp_name'] as $key => $tmp_name) {
                        $file_name = $imageFiles['name'][$key];
                        $target_directory = "uploads1/";
                        $target_file = $target_directory . basename($file_name);
        
                        if (move_uploaded_file($tmp_name, $target_file)) {
                            mysqli_stmt_bind_param($stmt, "is", $id, $target_file);
                            mysqli_stmt_execute($stmt);
                        } 
                    }
                    mysqli_stmt_close($stmt);
                    return true; // Cập nhật thành công
                } else {
                    echo "<script>alert('Lỗi truy vấn SQL')</script>";
                }
            }
            return false; // Không có ảnh mới được tải lên, không có sự thay đổi
        }




        

        

        
        
        




?>
