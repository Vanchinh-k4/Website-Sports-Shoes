$(document).ready(function() {
    $('.trash').click(function(e) {
        e.preventDefault();

        var item_id = $(this).data('menu_id');
        var rowToDelete = $(this).closest('tr'); // Lưu trữ hàng bạn muốn xóa

        Swal.fire({
            icon: 'question',
            title: 'Bạn có chắc chắn muốn xóa mục này?',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'deletemenu.php?item_id=' + item_id,
                    success: function(response) {
                        if (response === 'success') {
                            // Xóa hàng từ bảng
                            rowToDelete.remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'Xóa thành công!',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Xóa không thành công!',
                            });
                        }
                    }
                });
            }
        });
    });
});