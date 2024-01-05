window.addEventListener('scroll', function() {
    var menu = document.querySelector('.mainmenu-area');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) { // Điều kiện để menu đứng hiển thị (ví dụ: sau khi cuộn 100px)
        menu.classList.add('sticky');
    } else {
        menu.classList.remove('sticky');
    }
});
