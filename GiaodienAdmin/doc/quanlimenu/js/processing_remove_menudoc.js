$(document).ready(function() {
    $('.trash1').click(function(e) {
        e.preventDefault();

        var item_id = $(this).data('submenu1_id');
        var rowToDelete = $(this).closest('tr'); 

        Swal.fire({
            icon: 'question',
            title: 'Bạn có chắc chắn muốn xóa mục này?',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url: 'deletemenudoc.php?item_id=' + item_id,
                    success: function(response) {
                        if (response === 'success') {
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