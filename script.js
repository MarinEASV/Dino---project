document.addEventListener("DOMContentLoaded", function () {
  const leftBottle = document.querySelector(".left-bottle");
  const rightBottle = document.querySelector(".right-bottle");
  const leftText = document.querySelector(".left-text");
  const rightText = document.querySelector(".right-text");
  const section = document.querySelector(".bottle-section");

  const customCursor = document.querySelector(".custom-cursor");
  const cursorText = document.querySelector(".cursor-text");

  const isMobile = window.innerWidth <= 768;

  function smoothClose() {
    // Add return animations
    leftBottle.classList.add("returning");
    rightBottle.classList.add("returning");

    // Hide text immediately
    leftText.classList.remove("show");
    rightText.classList.remove("show");

    // Wait for animations to complete
    setTimeout(() => {
      leftBottle.classList.remove("clicked", "hide", "returning");
      rightBottle.classList.remove("clicked", "hide", "returning");
      section.classList.remove("opened", "left-opened", "right-opened");
    }, 800);
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
      smoothClose();
    } else {
      // Instantly apply
      leftBottle.classList.add("clicked");
      rightBottle.classList.add("hide");
      leftText.classList.add("show");
      section.classList.add("opened", "left-opened");

      // Ensure no delay
      leftBottle.classList.remove("returning");
      rightBottle.classList.remove("returning");
    }
    updateCursorText();
  });

  rightBottle.addEventListener("click", function () {
    const isActive = rightBottle.classList.contains("clicked");
    if (isActive) {
      smoothClose();
    } else {
      rightBottle.classList.add("clicked");
      leftBottle.classList.add("hide");
      rightText.classList.add("show");
      section.classList.add("opened", "right-opened");

      leftBottle.classList.remove("returning");
      rightBottle.classList.remove("returning");
    }
    updateCursorText();
  });

  // --- CUSTOM CURSOR ---
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

  // --- MOBILE MENU ---
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
      navbar.classList.toggle("scrolled", window.scrollY > 0);
    });
  }
});
