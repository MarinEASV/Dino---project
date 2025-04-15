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


  // --- CUSTOM CURSOR LOGIC ---
  if (!isMobile) {
    document.addEventListener("mousemove", (e) => {
      customCursor.style.top = `${e.clientY}px`;
      customCursor.style.left = `${e.clientX}px`;
    });

    const bottles = document.querySelectorAll(".bottle");
    let hideCursorTimeout;

    bottles.forEach((bottle) => {
      bottle.addEventListener("mouseenter", () => {
        clearTimeout(hideCursorTimeout);
        customCursor.style.opacity = "1";
        customCursor.style.visibility = "visible";
      });

      bottle.addEventListener("mouseleave", () => {
        hideCursorTimeout = setTimeout(() => {
          customCursor.style.opacity = "0";
          customCursor.style.visibility = "hidden";
        }, 200); // smooth delay
      });
    });
  }

  // --- AOS ---
  AOS.init({ duration: 1200 });

  // --- MOBILE MENU LOGIC ---
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu = document.getElementById("closeMenu");

  menuToggle?.addEventListener("click", function () {
    mobileMenu?.classList.add("show");
  });

  closeMenu?.addEventListener("click", function () {
    mobileMenu?.classList.remove("show");
  });

  document.addEventListener("click", function (event) {
    if (
      mobileMenu &&
      !mobileMenu.contains(event.target) &&
      !menuToggle.contains(event.target)
    ) {
      mobileMenu.classList.remove("show");
    }
  });

  // --- NAVBAR SCROLL ---
  const navbar = document.querySelector(".navbar");
  window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
      navbar?.classList.add("scrolled");
    } else {
      navbar?.classList.remove("scrolled");
    }
  });
});
