//  agrandir les images au clic
var carImages = document.querySelectorAll('.car-image');

carImages.forEach(function(image) {
    image.addEventListener('click', function() {
        this.classList.toggle('enlarged');
    });
});