 $(document).ready(function() {
        $('.product-img').slick({
            dots: false,
            infinite: false,
            speed: 500,
            slidesToShow: 4, 
            slidesToScroll: 1,
            focusOnSelect: true,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
        });

        $('.product-img img').on('click', function() {
            var fullImg = document.getElementById("imgBox");
            fullImg.src = this.src;
        });
    });
