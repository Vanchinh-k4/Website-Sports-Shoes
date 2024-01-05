$(document).ready(function () {
    $('.editButton').click(function () {
        var menuId = $(this).data('menu_id');

        $.ajax({
            type: 'POST',
            url: 'get-menu-info.php',
            data: { menu_id: menuId },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.error) {
                    alert(result.error);
                } else {
                    $('#menuIdInput').val(result.menu_id);
                    $('#menuNameInput').val(result.menu_name);
                    $('#table4').show();
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Có lỗi xảy ra khi lấy thông tin sản phẩm từ server.");
            }
        });
    }); 
});