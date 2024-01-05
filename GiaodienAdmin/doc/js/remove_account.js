jQuery(function () {
    jQuery(".remove-account").click(function () {
        var rowToDelete = $(this).closest('tr');
        var userId = $(this).data('id');

        swal({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn là muốn xóa tài khoản này?",
            buttons: ["Hủy bỏ", "Đồng ý"],
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: 'Processing/remove_accounts.php',
                    data: { id: userId },
                    success: function (response) {
                        if (response === 'success') {
                            rowToDelete.remove();
                            swal({
                                icon: 'success',
                                title: 'Xóa thành công!',
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Xóa không thành công!',
                            });
                        }
                    },
                    error: function() {
                        swal("Đã xảy ra lỗi!", {
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
});