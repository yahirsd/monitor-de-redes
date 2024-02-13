var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(carousel, 2000); // Cambia la imagen cada 2 segundos (2000 milisegundos)
}
document.addEventListener("DOMContentLoaded", function () {
  var slides = document.getElementsByClassName("mySlides");
  for (var i = 0; i < slides.length; i++) {
    slides[i].addEventListener("click", function () {
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      carousel(); // Vuelve a llamar a la función carousel para cambiar a la siguiente imagen
    });
  }
});
