
const openModalBtn = document.getElementById('openModalBtn');
const modal = document.getElementById('modal');
const closeModalBtn = document.querySelector('.closee');
const submitReviewBtn = document.getElementById('submitReview');

openModalBtn.addEventListener('click', () => {
  modal.style.display = 'block';
});

closeModalBtn.addEventListener('click', () => {
  closeModal();
});

function closeModal() {
  modal.style.display = 'none';
}

window.addEventListener("click", function(event) {
  if (event.target === modal) {
    closeModal();
  }
});

submitReviewBtn.addEventListener('click', async () => {
  const comment = document.getElementById('comment').value;
  const sanphamId = document.getElementById('sanpham_id').value;
  const formData = new FormData();

  formData.append('comment', comment);
  formData.append('sanpham_id', sanphamId);

  // Lấy userId từ session
  let userId = null;
  try {
    const response = await fetch('Processing/get-user-id.php');
    if (response.ok) {
      const data = await response.json();
      userId = data.user_id;
    }
  } catch (error) {
    console.error('Error fetching user ID:', error);
  }

  if (!userId) {
    Swal.fire({
      icon: 'warning',
      title: 'Vui lòng đăng nhập trước khi gửi đánh giá!',
    });
    return;
  }

  const checkboxes = document.querySelectorAll('input[name="rating_modal"]:checked');
  if (!checkboxes || checkboxes.length === 0) {
    // Hiển thị thông báo yêu cầu chọn rating
    Swal.fire({
      icon: 'warning',
      title: 'Vui lòng chọn số sao đánh giá!',
    });
    return; // Dừng việc gửi đánh giá nếu chưa chọn rating
  }

  const rating = checkboxes.length;
  formData.append('rating', rating);

  const files = document.getElementById('image').files;
  for (let i = 0; i < files.length; i++) {
    formData.append('image[]', files[i]);
  }

  try {
    const response = await fetch('Processing/handle-feedback.php', {
      method: 'POST',
      body: formData,
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await response.text();
    closeModal();
    
    if (data === 'success') {
      Swal.fire({
        icon: 'success',
        title: 'Gửi đánh giá thành công!',
        showConfirmButton: false,
        timer: 1500,
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Đã xảy ra lỗi khi gửi đánh giá!',
        text: data,
      });
    }
  } catch (error) {
    console.error('There was an error!', error);
    // Xử lý lỗi khi gửi dữ liệu
    Swal.fire({
      icon: 'error',
      title: 'Đã xảy ra lỗi khi gửi đánh giá!',
    });
  }
});






//Xử lý chọn ảnh 
   document.getElementById('image').addEventListener('change', function(e) {
  const files = e.target.files;
  const imagePreview = document.querySelector('.image-preview');

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const reader = new FileReader();

    reader.onload = function(event) {
      const img = new Image();
      img.src = event.target.result;

      const imageContainer = document.createElement('div');
      imageContainer.classList.add('image-container');

      const closeButton = document.createElement('span');
      closeButton.innerHTML = '&times;';
      closeButton.classList.add('closeee');
      closeButton.onclick = function() {
        imagePreview.removeChild(imageContainer);
      };

      imageContainer.appendChild(closeButton);
      imageContainer.appendChild(img);
      imagePreview.appendChild(imageContainer);
    };

    reader.readAsDataURL(file);
  }
});
