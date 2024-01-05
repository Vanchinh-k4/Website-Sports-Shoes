$(document).ready(function() {
    $('.remove-order').click(function(e) {
        e.preventDefault(); 

        var orderId = $(this).data('id');
        var productQuantity = $(this).data('product-quantity');
        var productSize = $(this).data('product-size');
        var productId = $(this).data('product-id');

        Swal.fire({
            icon: 'question',
            title: 'Bạn có chắc chắn muốn xóa đơn hàng này không?',
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'Processing/delete_order.php?item_id=' + orderId + '&product_id=' + productId + '&quantity=' + productQuantity + '&size=' + productSize;
            }
        });
    });
});
