// document.addEventListener('DOMContentLoaded', function () {
//     var userId = <?php echo json_encode($user_id); ?>;
//     var storedData = sessionStorage.getItem('selectedProducts' + userId);
//     var productsTable = document.getElementById('productsTable');

//     if (storedData) {
//         var selectedProducts = JSON.parse(storedData);
//         var totalItemsElement = document.getElementById('totalItems');
//         var totalAmountElement = document.getElementById('totalAmount');
//         var totalAmountElement1 = document.getElementById('totalAmount1');

//         if (productsTable && totalItemsElement && totalAmountElement) {
//             var totalItems = 0;
//             var totalAmount = 0;

//             Object.keys(selectedProducts).forEach(function (productId) {
//                 var product = selectedProducts[productId];
//                 var quantity = product['quantity'];
//                 var price = product['price'];
//                 var productName = product['name']; 

//                 totalItems += quantity;
//                 totalAmount += price * quantity;

//                 var newRow = productsTable.insertRow(-1);

//                 var cell1 = newRow.insertCell(0);
//                 var cell2 = newRow.insertCell(1);
//                  var cell3 = newRow.insertCell(2);

                
//                 cell1.textContent = productName; 
//                 cell2.textContent = quantity;  
//                 cell3.textContent = new Intl.NumberFormat('vi-VN', {
//                 style: 'currency',
//                 currency: 'VND'
//                 }).format(price * quantity);    
            

            
//             totalItemsElement.textContent = totalItems;
//             totalAmountElement.textContent = new Intl.NumberFormat('vi-VN', {
//                 style: 'currency',
//                 currency: 'VND'
//             }).format(totalAmount);
//             totalAmountElement1.textContent = new Intl.NumberFormat('vi-VN', {
//                 style: 'currency',
//                 currency: 'VND'
//             }).format(totalAmount + 40000);
//         }
//     } else {
//         console.error('Không có dữ liệu được lưu trong sessionStorage.');
//     }
// });
