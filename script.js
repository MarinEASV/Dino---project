document.addEventListener("DOMContentLoaded", function () {
  const isMobile     = window.innerWidth <= 768;
  const leftBottle   = document.querySelector(".left-bottle");
  const rightBottle  = document.querySelector(".right-bottle");
  const leftText     = document.querySelector(".left-text");
  const rightText    = document.querySelector(".right-text");
  const section      = document.querySelector(".bottle-section");
  const customCursor = document.querySelector(".custom-cursor");
  const cursorText   = document.querySelector(".cursor-text");

  /* ── helpers ─────────────────────────────────────────── */
  function updateCursorText() {
    const active =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  /** Wait for the active bottle’s slide‑back to finish, then clear colours */
  function waitAndResetColour() {
    // decide which bottle will fire the transitionend (whichever is visible)
    const bottle = leftBottle.classList.contains("clicked") ? leftBottle : rightBottle;

    function handler(e) {
      if (e.propertyName !== "transform") return;   // ignore opacity etc.
      section.classList.remove("opened", "left-opened", "right-opened");
      bottle.removeEventListener("transitionend", handler);
      updateCursorText();
    }

    bottle.addEventListener("transitionend", handler);
  }

  /** Close routine without any timeouts */
  function closeBottlesSmooth() {
    leftBottle.classList.remove("clicked");
    rightBottle.classList.remove("clicked");

    leftBottle.classList.remove("hide");
    rightBottle.classList.remove("hide");

    leftText.classList.remove("show");
    rightText.classList.remove("show");

    waitAndResetColour();          // will fire when slide finishes
  }

  /** Reset instantly (used before opening the other side) */
  function resetAllInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    updateCursorText();
  }

  /* ── MOBILE (simple stack) ─────────────────────────── */
  if (isMobile) {
    leftText.classList.add("show");
    rightText.classList.add("show");
  }

  /* ── DESKTOP behaviour ─────────────────────────────── */
  if (!isMobile) {

    leftBottle.addEventListener("click", () => {
      if (leftBottle.classList.contains("clicked")) {
        closeBottlesSmooth();                      // user is closing
      } else {
        resetAllInstant();
        leftBottle.classList.add("clicked");
        rightBottle.classList.add("hide");
        leftText.classList.add("show");
        section.classList.add("opened", "left-opened");
        updateCursorText();
      }
    });

    rightBottle.addEventListener("click", () => {
      if (rightBottle.classList.contains("clicked")) {
        closeBottlesSmooth();
      } else {
        resetAllInstant();
        rightBottle.classList.add("clicked");
        leftBottle.classList.add("hide");
        rightText.classList.add("show");
        section.classList.add("opened", "right-opened");
        updateCursorText();
      }
    });

    /* custom cursor (unchanged) */
    if (customCursor) {
      document.addEventListener("mousemove", (e) => {
        customCursor.style.top  = `${e.clientY}px`;
        customCursor.style.left = `${e.clientX}px`;
      });
      [leftBottle, rightBottle].forEach((bottle) => {
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

    /* AOS (desktop only) */
    if (typeof AOS !== "undefined") {
      AOS.init({ duration: 1200 });
    }
  }

  /* ── MOBILE MENU TOGGLE (unchanged) ────────────────── */
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
    document.addEventListener("click", (event) => {
      if (
        !mobileMenu.contains(event.target) &&
        !menuToggle.contains(event.target)
      ) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  /* ── NAVBAR SCROLL EFFECT (unchanged) ──────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 0) navbar.classList.add("scrolled");
      else navbar.classList.remove("scrolled");
    });
  }
});

/* ── PRELOADER (unchanged) ───────────────────────────── */
window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  const logo      = document.querySelector(".preloader-logo");

  logo.classList.add("animate");

  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 4500);
});
