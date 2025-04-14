
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
  
    if (!container || bottles.length === 0) {
      console.log("Bottles section not found.");
      return;
    }
  
    bottles.forEach(bottle => {
      const side = bottle.dataset.bottle;
  
      // Hover effect for cursor
      bottle.addEventListener("mouseenter", () => {
        if (cursor) cursor.style.opacity = 1;
      });
  
      bottle.addEventListener("mouseleave", () => {
        if (cursor) cursor.style.opacity = 0;
      });
  
      bottle.addEventListener("mousemove", e => {
        if (cursor) {
          cursor.style.left = e.pageX + 15 + "px";
          cursor.style.top = e.pageY + 15 + "px";
        }
      });
  
      // Click to animate
      bottle.addEventListener("click", () => {
        console.log(`Clicked bottle: ${side}`);
  
        container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
  
        if (side === "left") {
          container.classList.add("bottle-clicked-left");
        } else if (side === "right") {
          container.classList.add("bottle-clicked-right");
        }
      });
    });
  });
  