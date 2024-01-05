const login = document.getElementById("login");
    const loginModal = document.getElementById("loginModal");
    const closeLogin = document.getElementById("closeLogin");
    const loginForm = document.getElementById("loginForm");
    const showForgotPassword = document.getElementById("showForgotPassword");
    const showSignUp = document.getElementById("showSignUp");
    const loginFormContainer = document.getElementById("loginFormContainer");
    const forgotPasswordContainer = document.getElementById("forgotPasswordContainer");
    const signUpContainer = document.getElementById("signUpContainer");



    login.addEventListener("click", () => {
        loginModal.style.display = "block";
    });

    closeLogin.addEventListener("click", () => {
        loginModal.style.display = "none";
    });
    // Mở cửa sổ modal
    function openModal() {
        loginModal.style.display = "block";
    }

    // Đóng cửa sổ modal
    function closeModal() {
        loginModal.style.display = "none";
    }

    // Hiển thị phần "Quên mật khẩu"
    showForgotPassword.addEventListener("click", function(event) {
        event.preventDefault();
        loginFormContainer.style.display = "none";
        signUpContainer.style.display = "none";
        forgotPasswordContainer.style.display = "block";
    });

    // Hiển thị phần "Đăng ký"
    showSignUp.addEventListener("click", function(event) {
        event.preventDefault();
        loginFormContainer.style.display = "none";
        forgotPasswordContainer.style.display = "none";
        signUpContainer.style.display = "block";
    });
    //Hiển thị phần login
    login1.addEventListener("click", function(event) {
        event.preventDefault();
        signUpContainer.style.display = "none";
        loginFormContainer.style.display = "block";
        forgotPasswordContainer.style.display = "none";
    });

    login2.addEventListener("click", function(event) {
        event.preventDefault();
        forgotPasswordContainer.style.display = "none";
        loginFormContainer.style.display = "block";
        signUpContainer.style.display = "none";
    });


    // Đóng cửa sổ modal khi nhấp vào nút đóng
    closeLogin.addEventListener("click", closeModal);

    // Đóng cửa sổ modal khi nhấp vào bên ngoài nội dung modal
    window.addEventListener("click", function(event) {
        if (event.target === loginModal) {
            closeModal();
        }
    });

    // Xử lý nút đăng nhập trong form đăng nhập   
    loginForm.addEventListener("login", function(e) {
        e.preventDefault();

        // Lấy giá trị email và password từ form đăng nhập
        const email = document.getElementById("loginEmail").value;
        const password = document.getElementById("loginPassword").value;
    });
 

    