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

  // ① initialize on load
  updateCursorText();

  // used when we open the opposite side (instant reset, no delay)
  function resetAllInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    updateCursorText();
  }

  /* ── new “smooth close” logic ────────────────────────── */
  // Adjust SLIDE_DURATION (ms) to match your CSS transition duration (e.g. 1000 for 1s)
  const SLIDE_DURATION = 1000000;
  let   closeTimerID   = null;

  function closeBottlesSmooth() {
    clearTimeout(closeTimerID);

    /* 1️⃣ start slide‑back immediately */
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");

    // ② update cursor text immediately
    updateCursorText();

    /* 2️⃣ after the slide ends, remove the “opened” classes */
    closeTimerID = setTimeout(() => {
      section.classList.remove("opened", "left-opened", "right-opened");
      updateCursorText();
    }, SLIDE_DURATION);
  }

  /* ── MOBILE (simple stack, no clicks) ────────────────── */
  if (isMobile) {
    leftText.classList.add("show");
    rightText.classList.add("show");
    return; // no further JS on mobile
  }

  /* ── DESKTOP behaviour ───────────────────────────────── */

  /* LEFT bottle click */
  leftBottle.addEventListener("click", () => {
    if (leftBottle.classList.contains("clicked")) {
      // it’s already open → this click means “close”
      closeBottlesSmooth();
    } else {
      clearTimeout(closeTimerID);
      resetAllInstant();
      leftBottle.classList.add("clicked");
      rightBottle.classList.add("hide");
      leftText.classList.add("show");
      section.classList.add("opened", "left-opened");
      updateCursorText();
    }
  });

  /* RIGHT bottle click */
  rightBottle.addEventListener("click", () => {
    if (rightBottle.classList.contains("clicked")) {
      closeBottlesSmooth();
    } else {
      clearTimeout(closeTimerID);
      resetAllInstant();
      rightBottle.classList.add("clicked");
      leftBottle.classList.add("hide");
      rightText.classList.add("show");
      section.classList.add("opened", "right-opened");
      updateCursorText();
    }
  });

  /* custom cursor */
  if (customCursor) {
    document.addEventListener("mousemove", (e) => {
      customCursor.style.top  = `${e.clientY}px`;
      customCursor.style.left = `${e.clientX}px`;
    });

    [leftBottle, rightBottle].forEach((bottle) => {
      bottle.addEventListener("mouseenter", () => {
        // ③ ensure text is fresh on hover
        updateCursorText();
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

  /* ── MOBILE MENU TOGGLE ──────────────────────────────── */
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

  /* ── NAVBAR SCROLL EFFECT ─────────────────────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 0) navbar.classList.add("scrolled");
      else navbar.classList.remove("scrolled");
    });
  }
});

/* ── PRELOADER ─────────────────────────────────────────── */
window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  const logo      = document.querySelector(".preloader-logo");

  logo.classList.add("animate");

  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 4500);
});


document.addEventListener('DOMContentLoaded', function () {
  const modalEl = document.getElementById('reservationModal');

  modalEl.addEventListener('hide.bs.modal', function () {
      const dialog = modalEl.querySelector('.modal-dialog');
      modalEl.classList.add('showing-out');

      setTimeout(() => {
          modalEl.classList.remove('showing-out');
      }, 300); // should match the slideFadeOut duration
  });
});



document.addEventListener('DOMContentLoaded', function() {
  var btn = document.querySelector('.scroll-to-video');
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    document
      .querySelector('#video')
      .scrollIntoView({ behavior: 'smooth' });
  });
});

