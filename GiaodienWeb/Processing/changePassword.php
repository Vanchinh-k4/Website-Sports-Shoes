<?php
$currentPasswordError = $newPasswordError = $confirmPasswordError = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["luu"])) {
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];
        
        $userId = $_SESSION["user_id"];
        $stmt = $con->prepare("SELECT password FROM tbl_accounts WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $currentHashedPassword = $row["password"];
            if (isset($currentPassword) && !empty($currentPassword)) {
                if (password_verify($currentPassword, $currentHashedPassword)) {
                    if (isset($newPassword) && empty($newPassword)) {
                        $newPasswordError = 'Vui lòng nhập mật khẩu mới';
                    } else {
                        if ($newPassword != $confirmPassword) {
                            $confirmPasswordError = 'Xác nhận mật khẩu không trùng khớp';
                        } else {
                            $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                            $stmt = $con->prepare("UPDATE tbl_accounts SET password = ? WHERE user_id = ?");
                            $stmt->bind_param("si", $newHashedPassword, $userId);
                            $stmt->execute();
                            
                            echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Đổi mật khẩu thành công',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = 'profile.php';
                            });
                            </script>";
                        }
                    }
                } else {
                    $currentPasswordError = 'Mật khẩu hiện tại không đúng';
                }
            } else {
                $currentPasswordError = 'Vui lòng nhập mật khẩu hiện tại';
            }            
        } else {
            echo "<script>
                window.location.href = 'changepassword.php?error=1';
            </script>";
        }
    }
}
?>