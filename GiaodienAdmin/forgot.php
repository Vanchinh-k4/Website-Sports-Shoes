
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Khôi phục mật khẩu | Website quản trị v2.0</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/fg-img.png" alt="IMG">
              </div>
              <?php
$con = mysqli_connect("localhost","root","","bangiay");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["forgotpass"])) {
        $email = $_POST["emailInput"];
        
        $stmtSelect = $con->prepare("SELECT * FROM tbl_admins WHERE email = ?");
        $stmtSelect->bind_param("s", $email); 
        $stmtSelect->execute();
        
        
        $result = $stmtSelect->get_result(); 
        if ($result->num_rows > 0) {
            // Email tồn tại trong cơ sở dữ liệu
            $row = $result->fetch_assoc();
            $newPassword = substr( md5(rand (0,999999)), 0, 8);
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql = "UPDATE tbl_admins SET password=? WHERE email=?";
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
                swal{
                    icon: 'error',
                    title: 'Không thể gửi yêu cầu lấy lại mật khẩu!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'forgot.php';
                });
            </script>";
            }
        } else { 
            echo "<script>
            Swal{
                icon: 'warning',
                title: 'Email người dùng không tồn tại',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'forgot.php';
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
        $mail->setFrom('cshopsports09@gmail.com', 'SportShoes');  
        $mail->addAddress($email);  
        $mail->isHTML(true);  
        $mail->Subject = '[THƯ GỬI LẠI MẬT KHẨU]';  
        $noidungthu = "<p>Bạn nhận được thư này, do bạn yêu cầu mật lấy lại khẩu mới</p>
             Mật khẩu mới của bạn là: <B>{$newPassword}<B>
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
                <form class="login100-form validate-form" action="forgot.php" method="post" >
                    <span class="login100-form-title">
                        <b>KHÔI PHỤC MẬT KHẨU</b>
                    </span>
                  
                        <div class="wrap-input100 validate-input"
                            data-validate="Bạn cần nhập đúng thông tin như: ex@abc.xyz">
                            <input class="input100" type="text" placeholder="Nhập email" name="emailInput" required />
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-mail-send' ></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <input type="submit" name="forgotpass" value="Lấy lại mật khẩu"></input>
                        </div>

                        <div class="text-center p-t-12">
                            <a class="txt2" href="index.php">
                                Trở về đăng nhập
                            </a>
                        </div>
                
                    <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng <i class="far fa-copyright" aria-hidden="true"></i>
     <a
                            class="txt2" href=""> Code bởi Chính </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <!--===============================================================================================-->
   <!--===============================================================================================-->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   
</body>
</html>