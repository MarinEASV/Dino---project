
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
    const leftText = document.querySelector(".rakija-text.left-text");
    const rightText = document.querySelector(".rakija-text.right-text");
    const cursor = document.querySelector(".rakija-cursor");
  
    // Attach events to each bottle
    bottles.forEach(bottle => {
      const side = bottle.dataset.bottle; // should be "left" or "right"
  
      // Cursor tooltip interactions
      bottle.addEventListener("mouseenter", () => {
        if (cursor) cursor.style.opacity = "1";
      });
      bottle.addEventListener("mouseleave", () => {
        if (cursor) cursor.style.opacity = "0";
      });
      bottle.addEventListener("mousemove", e => {
        if (cursor) {
          cursor.style.left = e.pageX + 15 + "px";
          cursor.style.top = e.pageY + 15 + "px";
        }
      });
      
      // Click action for bottle
      bottle.addEventListener("click", () => {
        // First, remove any active classes
        container.classList.remove("bottle-active-left", "bottle-active-right");
  
        // Reset both text blocks (in case they were visible)
        if (leftText) leftText.style.opacity = "0";
        if (rightText) rightText.style.opacity = "0";
  
        // Apply active state based on which bottle was clicked
        if (side === "left") {
          container.classList.add("bottle-active-left");
          if (leftText) leftText.style.opacity = "1";
        } else if (side === "right") {
          container.classList.add("bottle-active-right");
          if (rightText) rightText.style.opacity = "1";
        }
        
        // Hide the custom cursor after click
        if (cursor) cursor.style.opacity = "0";
      });
    });
  });
  