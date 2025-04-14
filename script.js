
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
    let cursor = document.querySelector(".rakija-cursor");
  
    console.log("JS Loaded ✅");
    if (!container || bottles.length === 0 || !cursor) {
      console.warn("Missing one or more required elements");
      return;
    }
  
    // Append cursor to body if not already a direct child
    if (!document.body.contains(cursor)) {
      document.body.appendChild(cursor);
      console.log("Cursor moved to body for visibility");
    }
  
    bottles.forEach(bottle => {
      const side = bottle.dataset.bottle;
  
      // Hover: update custom cursor tooltip text and visibility
      bottle.addEventListener("mouseenter", () => {
        if (container.classList.contains("bottle-clicked-left") || container.classList.contains("bottle-clicked-right")) {
          cursor.textContent = "Close";
        } else {
          cursor.textContent = "Click to see more";
        }
        cursor.style.opacity = 1;
        console.log(`Mouse entered ${side} bottle`);
      });
  
      bottle.addEventListener("mouseleave", () => {
        cursor.style.opacity = 0;
        console.log(`Mouse left ${side} bottle`);
      });
  
      bottle.addEventListener("mousemove", e => {
        cursor.style.left = `${e.pageX + 15}px`;
        cursor.style.top = `${e.pageY + 15}px`;
      });
  
      // Click logic: toggle states and debug logs
      bottle.addEventListener("click", () => {
        console.log("Bottle clicked:", side);
  
        // Toggle: if this bottle’s state is already active, remove active states
        if ((side === "left" && container.classList.contains("bottle-clicked-left")) ||
            (side === "right" && container.classList.contains("bottle-clicked-right"))) {
          container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
          console.log("Toggled off active state");
          return;
        }
  
        // Remove both active states then add the new one
        container.classList.remove("bottle-clicked-left", "bottle-clicked-right");
        if (side === "left") {
          container.classList.add("bottle-clicked-left");
          console.log("Activated left state");
        } else if (side === "right") {
          container.classList.add("bottle-clicked-right");
          console.log("Activated right state");
        }
      });
    });
  });
  