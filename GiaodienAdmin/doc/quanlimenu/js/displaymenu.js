function showTables(tableIds) {
    const tables = document.querySelectorAll('.table-data');
    tables.forEach(table => {
        table.style.display = 'none'; // Ẩn tất cả các bảng
    });

    for (var i = 0; i < tableIds.length; i++) {
        var table = document.getElementById(tableIds[i]);
        if (table) {
            table.style.display = 'block'; // Hiển thị bảng
        }
    }
}