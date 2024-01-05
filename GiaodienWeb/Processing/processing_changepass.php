
<?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["resetpassword"])) {
        $email = $_POST["nameemail"];
        
        $stmtSelect = $con->prepare("SELECT * FROM tbl_accounts WHERE email = ?");
        $stmtSelect->bind_param("s", $email); 
        $stmtSelect->execute();
        
        
        $result = $stmtSelect->get_result(); 
        if ($result->num_rows > 0) {
            // Email tồn tại trong cơ sở dữ liệu
            $row = $result->fetch_assoc();
            $newPassword = substr( md5(rand (0,999999)), 0, 8);
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = "UPDATE tbl_accounts SET password=? WHERE email=?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$hashedPassword, $email]);            
        
            $kq=GuiMatKhauMoi($email, $newPassword);  
            if ($kq == true) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Một mật khẩu mới đã được gửi về email của bạn',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'index.php';
                });
            </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Không thể gửi yêu cầu lấy lại mật khẩu!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'index.php';
                });
            </script>";
            }
        } else { 
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Email người dùng không tồn tại',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";
        }
    }
}

function GuiMatKhauMoi($email, $newPassword) {
     require "PHPMailer-master/src/PHPMailer.php";
     require "PHPMailer-master/src/SMTP.php";
     require "PHPMailer-master/src/Exception.php";
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                
        $mail->Username = 'cshopsports09@gmail.com';   
        $mail->Password = 'kufj iytx bcth vifn';      
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;                  
        $mail->setFrom('chinhspecial2004@gmail.com', 'SportShoes');  
        $mail->addAddress($email);  
        $mail->isHTML(true);  
        $mail->Subject = '[THƯ GỬI LẠI MẬT KHẨU]';  
        $noidungthu = "<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu mật khẩu mới từ Website Sport Shoes</p>
             Mật khẩu mới của bạn là: {$newPassword}
        ";
        $mail->Body = $noidungthu;
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>

