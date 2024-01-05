// Kính lúp zoom ảnh
    document.addEventListener('DOMContentLoaded', function() {
    const magnifier = document.querySelector('.magnifier');
    const smallImg = document.getElementById('imgBox');
    const magnified = document.querySelector('.magnified');
    
    magnifier.addEventListener('mousemove', function(e) {
        const { left, top, width, height } = this.getBoundingClientRect();
        const { clientX, clientY } = e;
        const x = ((clientX - left) / width) * 100;
        const y = ((clientY - top) / height) * 100;
        const magnifiedWidth = magnified.offsetWidth;
        const magnifiedHeight = magnified.offsetHeight;
        const mouseX = clientX - magnifiedWidth / 1;
        const mouseY = clientY - magnifiedHeight / 1;
        
        magnified.style.backgroundImage = `url('${smallImg.src}')`;
        magnified.style.backgroundPosition = `${x}% ${y}%`;
        magnified.style.display = 'block';
        magnified.style.left = `${mouseX}px`;
        magnified.style.top = `${mouseY}px`;
        magnified.style.zIndex = '9999'; 
    });
    
    magnifier.addEventListener('mouseleave', function() {
        magnified.style.display = 'none';
    });
});

