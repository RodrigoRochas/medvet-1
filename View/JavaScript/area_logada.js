const carouselContainer = document.querySelector('.carousel-container');
const carouselItems = document.querySelectorAll('.carousel-item');
const carouselControls = document.querySelectorAll('.carousel-control');

let currentIndex = 0;
let itemWidth = 0;

function setItemWidth() {
  itemWidth = carouselContainer.clientWidth / 3;
  carouselItems.forEach(item => {
    item.style.width = `${itemWidth}px`;
  });
}

function slideCarousel() {
  carouselContainer.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
}

function handleControlClick() {
  const control = this;
  const direction = control.classList.contains('carousel-control--prev') ? -1 : 1;
  currentIndex += direction;
  if (currentIndex < 0) {
    currentIndex = carouselItems.length - 1;
  } else if (currentIndex > carouselItems.length - 1) {
    currentIndex = 0;
  }
  slideCarousel();
}

setItemWidth();
slideCarousel();

carouselControls.forEach(control => {
  control.addEventListener('click', handleControlClick);
});