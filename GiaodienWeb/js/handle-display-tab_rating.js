function openTab(evt, tabName) {
    // Lấy tất cả các tab content và ẩn đi
    var tabcontent = document.getElementsByClassName('tabcontent');
    for (var i = 0; i < tabcontent.length; i++) {
      tabcontent[i].classList.remove('active');
    }
    var tablinks = document.getElementsByClassName('tablinks');
    for (var i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove('active');
    }
  
    // Hiển thị tab content được chọn và đánh dấu tab link active
    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
  }
  // Mặc định mở tab đầu tiên khi tải trang
  document.getElementsByClassName('tablinks')[0].click();


// Chọn số sao
  const checkboxes = document.querySelectorAll('.rating input[type="checkbox"]');
  checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener('click', (event) => {
      if (checkbox.checked) {
        for (let i = 0; i < index; i++) {
          checkboxes[i].checked = true;
        }
      } else {
        for (let i = index + 1; i < checkboxes.length; i++) {
          checkboxes[i].checked = false;
        }
      }
    });
  });