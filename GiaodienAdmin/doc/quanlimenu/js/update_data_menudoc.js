$(document).ready(function () {
    $('.editButton2').click(function () {
        var submenu1Id = $(this).data('submenu1_id');

        $.ajax({
            type: 'POST',
            url: 'get-submenu1-info.php',
            data: { submenu1_id: submenu1Id },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.error) {
                    alert(result.error);
                } else {
                    $('#submenu1IdInput').val(result.submenu1_id);
                    $('#submenu1NameInput').val(result.submenu1_name);
                    $('#table7').show();
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Có lỗi xảy ra khi lấy thông tin sản phẩm từ server.");
            }
        });
    }); 
});