
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

document.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('scrolled'); // Add 'scrolled' class after scroll
    } else {
        navbar.classList.remove('scrolled'); // Remove 'scrolled' class when at the top
    }
});


document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".rakija-container");
    const bottles = document.querySelectorAll(".rakija-bottle");
    const cursor = document.querySelector(".rakija-cursor");
  
    // Hover cursor effect
    bottles.forEach(bottle => {
      bottle.addEventListener("mouseenter", () => {
        cursor.style.opacity = 1;
      });
      bottle.addEventListener("mouseleave", () => {
        cursor.style.opacity = 0;
      });
      bottle.addEventListener("mousemove", e => {
        cursor.style.left = e.pageX + 15 + "px";
        cursor.style.top = e.pageY + 15 + "px";
      });
  
      bottle.addEventListener("click", () => {
        const side = bottle.dataset.bottle;
        container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
        container.classList.add("bottle-clicked", `bottle-clicked-${side}`);
    });
    });
  });
  
