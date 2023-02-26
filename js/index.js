$(function () {
    $(document).scroll(function () {
      var $nav = $("nav");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });




window.addEventListener("load", () => {
  const loader = document.querySelector(".preloader");

  setTimeout(() => {
    loader.classList.add("loader-hidden");
    loader.addEventListener("transitioned", () => {
      loader.remove();
    });
  }, 1000);
});