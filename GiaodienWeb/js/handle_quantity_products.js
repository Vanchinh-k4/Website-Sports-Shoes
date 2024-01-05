    document.addEventListener('DOMContentLoaded', function() {
    const decreaseBtn = document.querySelector('.decrease-btn');
    const increaseBtn = document.querySelector('.increase-btn');
    const quantityInput = document.getElementById('choose_quantity');
    const maxQuantity = parseInt(quantityInput.getAttribute('data-quantity'));

    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < maxQuantity) {
            quantityInput.value = currentValue + 1;
        } else {
            alert('Bạn không thể chọn nhiều hơn số lượng hiện có!');
        }
    });
});
