// script.js
const cartIcon = document.getElementById("cart-icon");

cartIcon.addEventListener("click", function() {
    // Tên của tệp HTML bạn muốn chuyển hướng đến
    const newPageFilename = "giohang.php";

    // Tạo đường dẫn tới tệp HTML mới
    const newPageURL = new URL(newPageFilename, window.location.href);

    // Chuyển hướng đến trang mới
    window.location.href = newPageURL;
});
