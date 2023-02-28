// FOR NAVBAR
$(function () {
    $(document).scroll(function () {
      var $nav = $("nav");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });



// FOR THE LOADER
window.addEventListener("load", () => {
  const loader = document.querySelector(".preloader");

  setTimeout(() => {
    loader.classList.add("loader-hidden");
    loader.addEventListener("transitioned", () => {
      loader.remove();
    });
  }, 1000);
});

//FOR MA STYLE
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});



