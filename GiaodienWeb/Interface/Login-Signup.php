<!-- Cửa sổ modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeLogin">&times;</span>
      <div id="loginFormContainer">
        <h2>Đăng nhập</h2> <br>
        <form id="loginForm" action="index.php" method="post">
          <input type="email" id="loginemail" name="email" required placeholder="Tên tài khoản hoặc email">  <br>
          <div class="password-container">
          <input type="password" id="loginpassword" name="password" required placeholder="Mật khẩu">  <br>
              <span class="show-password" id="showPasswordToggle">
                  <i class="far fa-eye-slash" id="eyeIcon"></i>
              </span>
          </div>
          <div class="remember-checkbox">
            <label>
              <input type="checkbox" name="remember" id="checkbox">
              <span id="nd">Ghi nhớ mật khẩu</span>
              <p id="nd1"><a href="#" id="showForgotPassword">Quên mật khẩu?</a></p>
            </label>
          </div>
          <button type="submit" name="login">Đăng nhập</button> <br>
         <p id="nd2">Bạn chưa có tài khoản? <a href="#" id="showSignUp">Đăng ký</a></p>
          <h3>-Hoặc đăng nhập với-</h3>
        </form>
      </div>
     <form action="index.php" method="post" id="handleforgot">
     <div id="forgotPasswordContainer" style="display: none;">
        <h2>Quên mật khẩu</h2>
        <p>Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</p>
        <input type="text" name="nameemail" id="forgotpassword"  placeholder="Tên đăng nhập hoặc email" required>   <br> <br>
        <button type="submit" id="resetpassword" name="resetpassword">Đặt lại mật khẩu</button>  <br> <br>
        <h5 align="center" id="login2">Đăng nhập</h5>
      </div>
     </form>
  
      <div id="signUpContainer" style="display: none;">
      <h2>Đăng ký</h2> <br>
    <form id="signUpForm" method="post" action="index.php">
      <input type="text" id="name" name="name" required placeholder="Họ Và Tên"> <br>
      <input type="email" id="email" name="email" required placeholder="Địa chỉ Email"> <br>
      <div class="password-container1">
          <input type="password" id="password" name="password" required placeholder="Mật khẩu">  <br>
              <span class="show-password" id="showPasswordToggle1">
                  <i class="far fa-eye-slash" id="eyeIcon1"></i>
              </span>
          </div>
          <div class="password-container2">
          <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Nhập lại mật khẩu"> <br>
              <span class="show-password2" id="showPasswordToggle2">
                  <i class="far fa-eye-slash" id="eyeIcon2"></i>
              </span>
          </div>
      
      <button type="submit" name="submitSignUp">Đăng ký</button>
      <h5 align="center" id="login1">Đăng nhập</h5>
    </form>
  </div>
      </div>
    </div>