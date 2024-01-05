
<?php
$con = mysqli_connect("localhost","root","","bangiay");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $con->prepare("SELECT * FROM tbl_accounts WHERE email = ?");
    $stmt->bind_param("s", $email );
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['locked'] == 1) { 
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Tài khoản của bạn đã bị khóa do vi phạm một số tiêu chuẩn của cửa hàng! Hãy liên hệ với bộ phận hỗ trợ để được giúp đỡ.',
                    showConfirmButton: false,
                    timer: 5000
                }).then(function() {
                    window.location.href = 'index.php';
                });
            </script>";
    } else {
            if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            if(isset($_POST['remember']) and ($_POST['remember']=="on")){
                setcookie("email", $email, time() + 3000);
                setcookie("password", $password, time() + 3000);
                }
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Đăng nhập thành công',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";

        } else {
            echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Thông tin đăng nhập không hợp lệ',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";

        }
    }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Không tìm thấy tài khoản',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";

    }

    $stmt->close();
}
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitSignUp"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass=$_POST["password"];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $confirmpass=$_POST["confirmPassword"];
    
    $check_email_query = "SELECT * FROM tbl_accounts WHERE email = ?";
    $check_stmt = mysqli_prepare($con, $check_email_query);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

if (mysqli_stmt_num_rows($check_stmt) > 0) { 
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Email đã tồn tại!',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = 'index.php';
        });
    </script>";
}
    if($confirmpass != $pass){
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Mật khẩu không trùng khớp!',
        showConfirmButton: false,
        timer: 1500
    }).then(function() {
        window.location.href = 'index.php';
    });
</script>";
  }else{
    $sql = "INSERT INTO tbl_accounts (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Đăng ký thành công!',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'index.php';
            });
        </script>";
  }try {
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require "PHPMailer-master/src/Exception.php";

    
    $mail = new PHPMailer(true);
    $mail->isSMTP();  
    $mail->CharSet  = "utf-8";
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true; 
$nguoigui = 'cshopsports09@gmail.com';
$matkhau = 'kufj iytx bcth vifn';
$tennguoigui = '[THÔNG BÁO ĐĂNG KÍ TÀI KHOẢN]';
    $mail->Username = $nguoigui; 
    $mail->Password = $matkhau;   
    $mail->SMTPSecure = 'ssl';  
    $mail->Port = 465;                
    $mail->setFrom($nguoigui, $tennguoigui ); 
    $to = $email;
    $to_name = "SportShoes";
    
    $mail->addAddress($to, $to_name); 
    $mail->isHTML(true);  
    $mail->Subject = '[TB] CHÚC MỪNG BẠN ĐÃ ĐĂNG KÍ TÀI KHOẢN THÀNH CÔNG !';      
    $noidungthu = "<b>DỊCH VỤ ĐĂNG KÍ TÀI KHOẢN CỦA SPORTSHOES!</b><br>Cảm ơn bạn đã đăng kí tài khoản tại SportShoes ! <br> Nhanh tay mua sắm để hưởng nhiều chính sách ưu đãi tại cửa hàng !" ;
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
}
  ?>


