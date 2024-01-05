<?php
include_once('../db/connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name1"];
    $email = $_SESSION["email"];
    $phone = $_POST["phone"];
    $address = $_POST['address'].','.$_POST['ward'].','.$_POST['district'].','.$_POST['province'];
    $noidung = "Chờ xử lý";
    $madon = substr( md5(rand (0,999999)), 0, 16);
    $madon_uppercare = strtoupper($madon);
    $madon_with_hashtag='#'.$madon_uppercare;
    $ngaytaohd = date("Y-m-d H:i:s");

    $productData=$_POST["hang_duoc_mua"];
        $query = "INSERT INTO tbl_hoadon (madonhang, ten_nguoi_mua, email, dia_chi, dien_thoai, noi_dung, hang_duoc_mua, ngaytaohd) 
                    VALUES ('$madon_with_hashtag', '$name', '$email', '$address', '$phone', '$noidung', '$productData', NOW())";


        if (mysqli_query($con, $query)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Đã gửi đơn hàng',
                showConfirmButton: false,
                timer:2000
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";
    
     $donHangs = explode(';', $productData);
    foreach ($donHangs as $donHang) {
    $detail = explode(',', str_replace(array('[', ']'), '', $donHang));

    if (count($detail) >= 3) { 
        $ID_sanPham = $detail[0]; 
        $soLuong = $detail[1]; 
        $kichThuoc = $detail[2]; 

        $truyVanCapNhat = "UPDATE tbl_size 
                            SET soluong = soluong - $soLuong 
                            WHERE sanpham_id = $ID_sanPham AND kichco = '$kichThuoc'";
        mysqli_query($con, $truyVanCapNhat);
}
}

        } try {
            require "../PHPMailer-master/src/PHPMailer.php";
            require "../PHPMailer-master/src/SMTP.php";
            require "../PHPMailer-master/src/Exception.php";
        
            
            $mail = new PHPMailer(true);
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true; 
            $nguoigui = 'chinhspecial2004@gmail.com';
            $matkhau = 'dxip ojvb xmwq fwgc';
            $tennguoigui = 'SportShoes';
            $mail->Username = $nguoigui; 
            $mail->Password = $matkhau;   
            $mail->SMTPSecure = 'ssl';  
            $mail->Port = 465;                
            $mail->setFrom($nguoigui, $tennguoigui ); 
            $to = $email;
            $to_name = "SportShoes";
            
            $mail->addAddress($to, $to_name); 
            $mail->isHTML(true);  
            $mail->Subject = 'Đơn hàng '.$madon_with_hashtag.' của bạn đã được gửi!';      
            $getDateTimeQuery = "SELECT ngaytaohd FROM tbl_hoadon WHERE madonhang = '$madon_with_hashtag'";
            $result = mysqli_query($con, $getDateTimeQuery);
            $row = mysqli_fetch_assoc($result);
            $ngaytaohdFromDB = $row['ngaytaohd'];
            $noidungthu = "<b>Xin chào $name, Đơn hàng của bạn đã được gửi thành công ngày ".date("d/m/Y H:i:s", strtotime($ngaytaohdFromDB))." </b>" ;
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            
        } catch (Exception $e) {
            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }

?>
