document.addEventListener("DOMContentLoaded", function () {
  const isMobile     = window.innerWidth <= 768;
  const section      = document.querySelector(".bottle-section");
  const overlay      = document.querySelector(".gradient-overlay");
  const leftBottle   = document.querySelector(".left-bottle");
  const rightBottle  = document.querySelector(".right-bottle");
  const leftText     = document.querySelector(".left-text");
  const rightText    = document.querySelector(".right-text");
  const customCursor = document.querySelector(".custom-cursor");
  const cursorText   = document.querySelector(".cursor-text");

  // Helper to update the inner cursor text
  function updateCursor() {
    const active = leftBottle.classList.contains("clicked") ||
                   rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  // Reset everything to the closed state
  function resetAll() {
    section.classList.remove("open-left", "open-right");
    overlay.style.opacity = "1";             // show gradient
    section.style.backgroundColor = "";      // clear tint

    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    updateCursor();
  }

  if (isMobile) {
    // Mobile: always show texts, no click logic
    leftText.classList.add("show");
    rightText.classList.add("show");
  } else {
    // Desktop: click handlers
    function openSide(side) {
      resetAll();                           // clear any previous state
      overlay.style.opacity = "0";          // hide gradient immediately
      section.classList.add(side === "left" ? "open-left" : "open-right");
      section.style.backgroundColor = side === "left"
        ? "#B64A42"
        : "#5F120D";
      if (side === "left") {
        leftBottle.classList.add("clicked");
        rightBottle.classList.add("hide");
        leftText.classList.add("show");
      } else {
        rightBottle.classList.add("clicked");
        leftBottle.classList.add("hide");
        rightText.classList.add("show");
      }
      updateCursor();
    }

    function closeSide() {
      // Wait for the bottle to slide back (0.8s), then reset
      const sliding = section.classList.contains("open-left")
        ? rightBottle : leftBottle;
      sliding.addEventListener("transitionend", function handler(e) {
        if (e.propertyName !== "transform") return;
        sliding.removeEventListener("transitionend", handler);
        resetAll();
      });
      // trigger the slide‑back
      leftBottle.classList.remove("clicked", "hide");
      rightBottle.classList.remove("clicked", "hide");
      leftText.classList.remove("show");
      rightText.classList.remove("show");
    }

    leftBottle.addEventListener("click", () => {
      leftBottle.classList.contains("clicked")
        ? closeSide()
        : openSide("left");
    });
    rightBottle.addEventListener("click", () => {
      rightBottle.classList.contains("clicked")
        ? closeSide()
        : openSide("right");
    });

    // Custom cursor logic (unchanged)
    if (customCursor) {
      document.addEventListener("mousemove", (e) => {
        customCursor.style.top  = `${e.clientY}px`;
        customCursor.style.left = `${e.clientX}px`;
      });
      [leftBottle, rightBottle].forEach((btl) => {
        btl.addEventListener("mouseenter", () => {
          customCursor.style.opacity    = "1";
          customCursor.style.visibility = "visible";
        });
        btl.addEventListener("mouseleave", () => {
          customCursor.style.opacity    = "0";
          customCursor.style.visibility = "hidden";
        });
      });
    }

    /* ── AOS init ─────────────────────────────────────── */
    if (typeof AOS !== "undefined") {
      AOS.init({ duration: 1200 });
    }
  }

  /* ── Mobile menu toggle etc. (unchanged) ───────────── */
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu  = document.getElementById("closeMenu");
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () =>
      mobileMenu.classList.add("show")
    );
    closeMenu?.addEventListener("click", () =>
      mobileMenu.classList.remove("show")
    );
    document.addEventListener("click", (e) => {
      if (
        !mobileMenu.contains(e.target) &&
        !menuToggle.contains(e.target)
      ) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  /* ── Navbar scroll effect (unchanged) ─────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () =>
      navbar.classList.toggle("scrolled", window.scrollY > 0)
    );
  }
});

/* ── Preloader (unchanged) ─────────────────────────── */
window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  const logo      = document.querySelector(".preloader-logo");
  logo.classList.add("animate");
  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 4500);
});
