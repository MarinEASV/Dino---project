
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


document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".rakija-container");
    const bottles = document.querySelectorAll(".rakija-bottle");
    const customCursor = document.querySelector(".custom-cursor");
  
    if (!container || bottles.length === 0 || !customCursor) {
      console.warn("Missing required elements.");
      return;
    }
  
    // Ensure custom cursor is directly within <body>
    if (!document.body.contains(customCursor)) {
      document.body.appendChild(customCursor);
    }
  
    // Custom cursor follows the mouse pointer
    document.addEventListener("mousemove", function(e) {
      customCursor.style.left = e.pageX + "px";
      customCursor.style.top = e.pageY + "px";
    });
  
    // Helper to set cursor text
    function setCursorText(text) {
      customCursor.textContent = text;
    }
  
    // Add event listeners for bottles
    bottles.forEach(function(bottle) {
      const side = bottle.dataset.bottle;
      
      bottle.addEventListener("mouseenter", function() {
        // Show "Close" if any side is active, otherwise show "Discover"
        if (container.classList.contains("left-active") || container.classList.contains("right-active")) {
          setCursorText("Close");
        } else {
          setCursorText("Discover");
        }
        customCursor.style.opacity = 1;
      });
      
      bottle.addEventListener("mouseleave", function() {
        customCursor.style.opacity = 0;
      });
      
      bottle.addEventListener("click", function() {
        const currentActive = container.dataset.activeSide;
        if (currentActive === side) {
          // If the same bottle is active, toggle off the state
          container.classList.remove("left-active", "right-active");
          container.dataset.activeSide = "";
          setCursorText("Discover");
        } else {
          // Remove previous state and activate new one
          container.classList.remove("left-active", "right-active");
          container.dataset.activeSide = side;
          if (side === "left") {
            container.classList.add("left-active");
          } else if (side === "right") {
            container.classList.add("right-active");
          }
          setCursorText("Close");
        }
      });
    });
  });
  
