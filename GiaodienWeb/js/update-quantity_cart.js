$(document).ready(function(){
    // Sự kiện khi số lượng sản phẩm thay đổi
    $(document).on('input', '.quantity-input', function() {
        var quantity = $(this).val();
        var cartId = $(this).closest('.quantity').data('cart-id');
        var pricePerItem = $('[data-cart-id="' + cartId + '"]').closest('tr').find('.item-price').data('price');
        var totalPrice = quantity * pricePerItem;
        var formattedTotalPrice = totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        $('[data-cart-id="' + cartId + '"]').closest('td').next('td').find('.item-total').text(formattedTotalPrice);
    });

    // Sự kiện giảm số lượng
    $(document).on('click', '.decrease-btn', function() {
        var input = $(this).next('.quantity-input');
        var currentValue = parseInt(input.val());
        if (currentValue > 1) {
            input.val(currentValue - 1).trigger('input');
        }
    });

    // Sự kiện tăng số lượng
    $(document).on('click', '.increase-btn', function() {
        var input = $(this).prev('.quantity-input');
        var currentValue = parseInt(input.val());
        var maxQuantity = parseInt(input.data('quantity'));
        if (currentValue < maxQuantity) {
            input.val(currentValue + 1).trigger('input');
        } else {
            alert('Bạn không thể mua nhiều hơn số lượng hiện có!');
        }
    });
});
