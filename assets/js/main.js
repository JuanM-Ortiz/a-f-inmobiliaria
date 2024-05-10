
window.onload = function() {
    var navbar = document.querySelector('nav');
    navbar.classList.add('nav-visible');
};


new Glider(document.querySelector('.glider'), {
    slidesToShow: 1,
    dots: '#dots',
    draggable: true,
    arrows: {
      prev: '.glider-prev',
      next: '.glider-next'
    }
  });
