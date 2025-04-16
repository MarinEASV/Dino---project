document.addEventListener("DOMContentLoaded", function () {
  const isMobile      = window.innerWidth <= 768;
  const leftBottle    = document.querySelector(".left-bottle");
  const rightBottle   = document.querySelector(".right-bottle");
  const leftText      = document.querySelector(".left-text");
  const rightText     = document.querySelector(".right-text");
  const section       = document.querySelector(".bottle-section");
  const customCursor  = document.querySelector(".custom-cursor");
  const cursorText    = document.querySelector(".cursor-text");
  const container     = document.querySelector(".bottle-container");
  const tabs          = document.querySelectorAll(".mobile-tabs .tab-btn");

  function resetAll() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    updateCursorText();
  }

  function updateCursorText() {
    const active = leftBottle.classList.contains("clicked") ||
                   rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  if (isMobile) {
    // ─── MOBILE: tab switching ─────────────────────────────
    // default data-active="left" comes from PHP
    tabs.forEach(btn => {
      btn.addEventListener("click", function () {
        // toggle active button
        tabs.forEach(b => b.classList.remove("active"));
        this.classList.add("active");
        // switch content
        const side = this.getAttribute("data-target");
        container.setAttribute("data-active", side);
      });
    });

  } else {
    // ─── DESKTOP: original bottle-click logic ─────────────
    leftBottle.addEventListener("click", function () {
      const active = leftBottle.classList.contains("clicked");
      resetAll();
      if (!active) {
        leftBottle.classList.add("clicked");
        rightBottle.classList.add("hide");
        leftText.classList.add("show");
        section.classList.add("opened", "left-opened");
      }
      updateCursorText();
    });

    rightBottle.addEventListener("click", function () {
      const active = rightBottle.classList.contains("clicked");
      resetAll();
      if (!active) {
        rightBottle.classList.add("clicked");
        leftBottle.classList.add("hide");
        rightText.classList.add("show");
        section.classList.add("opened", "right-opened");
      }
      updateCursorText();
    });

    // ─── custom cursor on desktop only ────────────────────
    if (customCursor) {
      document.addEventListener("mousemove", e => {
        customCursor.style.top  = `${e.clientY}px`;
        customCursor.style.left = `${e.clientX}px`;
      });
      [leftBottle, rightBottle].forEach(bottle => {
        bottle.addEventListener("mouseenter", () => {
          customCursor.style.opacity    = "1";
          customCursor.style.visibility = "visible";
        });
        bottle.addEventListener("mouseleave", () => {
          customCursor.style.opacity    = "0";
          customCursor.style.visibility = "hidden";
        });
      });
    }

    // ─── AOS init ─────────────────────────────────────────
    if (typeof AOS !== "undefined") {
      AOS.init({ duration: 1200 });
    }
  }

  // ─── MOBILE MENU TOGGLE (unchanged) ───────────────────
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu  = document.getElementById("closeMenu");

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
      mobileMenu.classList.add("show");
    });
    closeMenu?.addEventListener("click", () => {
      mobileMenu.classList.remove("show");
    });
    document.addEventListener("click", event => {
      if (
        !mobileMenu.contains(event.target) &&
        !menuToggle.contains(event.target)
      ) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  // ─── NAVBAR SCROLL EFFECT (unchanged) ─────────────────
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 0) navbar.classList.add("scrolled");
      else navbar.classList.remove("scrolled");
    });
  }
});


window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 2500);
});
