
$(document).on('click', '.trash', function () {
      var OrderId = $(this).data('id'); 
        var rowToDelete = $(this).closest('tr');

        swal({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn là muốn xóa đơn hàng này?",
            buttons: ["Hủy bỏ", "Đồng ý"],
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: 'Processing/form-delete-order.php',
                    data: { id: OrderId },
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
