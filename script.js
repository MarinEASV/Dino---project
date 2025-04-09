
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 1200
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const mobileMenu = document.getElementById("mobileMenu");
    const menuToggle = document.getElementById("menuToggle");
    const closeMenu = document.getElementById("closeMenu");

    menuToggle.addEventListener("click", function () {
        mobileMenu.classList.add("show");
    });

    closeMenu.addEventListener("click", function () {
        mobileMenu.classList.remove("show");
    });

    document.addEventListener("click", function (event) {
        if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
            mobileMenu.classList.remove("show");
        }
    });

   
});


document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
  
    function handleScroll() {
      if (window.scrollY > 0) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    }
  
    // Trigger it on load and on scroll
    handleScroll();
    window.addEventListener("scroll", handleScroll);
  });
  