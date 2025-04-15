document.addEventListener("DOMContentLoaded", function () {
  // --- BOTTLE LOGIC ---
  const leftBottle = document.querySelector(".left-bottle");
  const rightBottle = document.querySelector(".right-bottle");
  const leftText = document.querySelector(".left-text");
  const rightText = document.querySelector(".right-text");
  const section = document.querySelector(".bottle-section");

  const customCursor = document.querySelector(".custom-cursor");
  const cursorText = document.querySelector(".cursor-text");

  const isMobile = window.innerWidth <= 768;

  function resetAll() {
  leftBottle.classList.remove("clicked", "hide");
  rightBottle.classList.remove("clicked", "hide");
  leftText.classList.remove("show");
  rightText.classList.remove("show");
  section.classList.remove("opened", "left-opened", "right-opened");
  updateCursorText();
}

leftBottle.addEventListener("click", function () {
  const isActive = leftBottle.classList.contains("clicked");
  resetAll();

  if (!isActive) {
    leftBottle.classList.add("clicked");
    rightBottle.classList.add("hide");
    leftText.classList.add("show");
    section.classList.add("opened", "left-opened");
  }

  updateCursorText();
});

rightBottle.addEventListener("click", function () {
  const isActive = rightBottle.classList.contains("clicked");
  resetAll();

  if (!isActive) {
    rightBottle.classList.add("clicked");
    leftBottle.classList.add("hide");
    rightText.classList.add("show");
    section.classList.add("opened", "right-opened");
  }

  updateCursorText();
});

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
    var bottleLeft = document.getElementById("bottle-left");
    var bottleRight = document.getElementById("bottle-right");
    var expandedBottle = null; // tracks which bottle is expanded: "left" or "right"
  
    function resetBottles() {
      bottleLeft.classList.remove("slide-left-out", "show-text");
      bottleRight.classList.remove("slide-right-out", "show-text");
      expandedBottle = null;
    }
  
    bottleLeft.addEventListener("click", function() {
      // If this bottle is already expanded, reset the state
      if (expandedBottle === "left") {
        resetBottles();
      } else {
        resetBottles(); // reset any previous state
        bottleRight.classList.add("slide-right-out");
        bottleLeft.classList.add("show-text");
        expandedBottle = "left";
      }
    });
    
    bottleRight.addEventListener("click", function() {
      if (expandedBottle === "right") {
        resetBottles();
      } else {
        resetBottles();
        bottleLeft.classList.add("slide-left-out");
        bottleRight.classList.add("show-text");
        expandedBottle = "right";
      }
    });
  
    // Update the cursor on hover
    var bottles = document.querySelectorAll(".bottle");
    bottles.forEach(function(bottle) {
      bottle.addEventListener("mouseenter", function() {
        // If this bottle is the one that is expanded, use the "close" cursor
        if (expandedBottle === bottle.id.replace("bottle-", "")) {
          bottle.style.cursor = "url('close-icon.png'), pointer"; // replace with your close icon file
        } else {
          bottle.style.cursor = "pointer";
        }
      });
      bottle.addEventListener("mouseleave", function() {
        bottle.style.cursor = "default";
      });
    });
  }
);
  
