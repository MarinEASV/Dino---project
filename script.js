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
    // Add the 'closing' class to trigger reverse transitions
    section.classList.add("closing");

    // Delay full reset to let the transition play out
    setTimeout(() => {
      leftBottle.classList.remove("clicked", "hide");
      rightBottle.classList.remove("clicked", "hide");
      leftText.classList.remove("show");
      rightText.classList.remove("show");
      section.classList.remove("opened", "left-opened", "right-opened", "closing");

      updateCursorText();
    }, 600); // Adjust to match your transition duration
  }

  function updateCursorText() {
    const isActive =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    if (cursorText) {
      cursorText.textContent = isActive ? "Close" : "Click to see more";
    }
  }

  leftBottle.addEventListener("click", function () {
    const isActive = leftBottle.classList.contains("clicked");
    if (isActive) {
      resetAll();
    } else {
      resetAll();
      setTimeout(() => {
        leftBottle.classList.add("clicked");
        rightBottle.classList.add("hide");
        leftText.classList.add("show");
        section.classList.add("opened", "left-opened");
        updateCursorText();
      }, 10);
    }
  });

  rightBottle.addEventListener("click", function () {
    const isActive = rightBottle.classList.contains("clicked");
    if (isActive) {
      resetAll();
    } else {
      resetAll();
      setTimeout(() => {
        rightBottle.classList.add("clicked");
        leftBottle.classList.add("hide");
        rightText.classList.add("show");
        section.classList.add("opened", "right-opened");
        updateCursorText();
      }, 10);
    }
  });

  // --- CUSTOM CURSOR LOGIC ---
  if (!isMobile && customCursor) {
    document.addEventListener("mousemove", (e) => {
      customCursor.style.top = `${e.clientY}px`;
      customCursor.style.left = `${e.clientX}px`;
    });

    const bottles = document.querySelectorAll(".bottle");
    bottles.forEach((bottle) => {
      bottle.addEventListener("mouseenter", () => {
        customCursor.style.opacity = "1";
        customCursor.style.visibility = "visible";
      });
      bottle.addEventListener("mouseleave", () => {
        customCursor.style.opacity = "0";
        customCursor.style.visibility = "hidden";
      });
    });
  }

  // --- AOS INIT ---
  if (typeof AOS !== "undefined") {
    AOS.init({ duration: 1200 });
  }

  // --- MOBILE MENU TOGGLE ---
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu = document.getElementById("closeMenu");

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", function () {
      mobileMenu.classList.add("show");
    });

    closeMenu?.addEventListener("click", function () {
      mobileMenu.classList.remove("show");
    });

    document.addEventListener("click", function (event) {
      if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  // --- NAVBAR SCROLL EFFECT ---
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 0) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });
  }
});
