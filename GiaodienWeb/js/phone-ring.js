 document.addEventListener("DOMContentLoaded", function() {
    var phoneRingElements = document.querySelectorAll('.phonering-alo-alo');

    phoneRingElements.forEach(function(element) {
        element.classList.add('active-ring');
    });
});
