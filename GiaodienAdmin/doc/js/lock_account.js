jQuery(function () {
    jQuery(".locked").click(function () {
        var userId = $(this).data('id');
        var button = $(this);
        var isLocked = button.find('i').hasClass('fa-lock');

        swal({
            title: isLocked ? "Cảnh báo mở khóa" : "Cảnh báo khóa",
            text: isLocked ? "Bạn có chắc chắn muốn mở khóa tài khoản này?" : "Bạn có chắc chắn muốn khóa tài khoản này?",
            buttons: ["Hủy bỏ", "Đồng ý"],
        }).then((willToggle) => {
            if (willToggle) {
                $.ajax({
                    type: 'GET',
                    url: 'Processing/lock_accounts.php',
                    data: { id: userId, is_locked: isLocked ? 0 : 1 },
                    success: function (response) {
                        if (response === 'success') {
                            swal({
                                icon: 'success',
                                title: isLocked ? 'Đã mở khóa!' : 'Đã khóa!',
                            });
                            button.find('i').toggleClass('fa-lock fa-unlock'); 
                        } else {
                            swal({
                                icon: 'error',
                                title: isLocked ? 'Mở khóa không thành công!' : 'Khóa không thành công!',
                            });
                        }
                    },
                    error: function () {
                        swal("Đã xảy ra lỗi!", {
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
});
