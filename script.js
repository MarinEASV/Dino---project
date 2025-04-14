
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
      console.warn("Missing required elements");
      return;
    }
  
    bottles.forEach(bottle => {
      const side = bottle.dataset.bottle;
  
      // Update custom cursor on hover
      bottle.addEventListener("mouseenter", () => {
        if (cursor) {
          // Update tooltip text based on container active state
          if (container.classList.contains("bottle-clicked-left") || container.classList.contains("bottle-clicked-right")) {
            cursor.textContent = "Close";
          } else {
            cursor.textContent = "Click to see more";
          }
          cursor.style.opacity = 1;
        }
      });
  
      bottle.addEventListener("mouseleave", () => {
        if (cursor) {
          cursor.style.opacity = 0;
        }
      });
  
      bottle.addEventListener("mousemove", e => {
        if (cursor) {
          cursor.style.left = `${e.pageX + 15}px`;
          cursor.style.top = `${e.pageY + 15}px`;
        }
      });
  
      // Click logic with toggling
      bottle.addEventListener("click", () => {
        // If clicking the same active bottle, toggle back to the initial state
        if ((side === "left" && container.classList.contains("bottle-clicked-left")) ||
            (side === "right" && container.classList.contains("bottle-clicked-right"))) {
          container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
          return;
        }
        
        // Remove any previous active classes
        container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
        
        // Add the corresponding class based on which bottle was clicked
        if (side === "left") {
          container.classList.add("bottle-clicked-left");
        } else if (side === "right") {
          container.classList.add("bottle-clicked-right");
        }
      });
    });
  });
  