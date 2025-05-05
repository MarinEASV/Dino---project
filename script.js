document.addEventListener("DOMContentLoaded", function () {
  const isMobile     = window.innerWidth <= 768;
  const leftBottle   = document.querySelector(".left-bottle");
  const rightBottle  = document.querySelector(".right-bottle");
  const leftText     = document.querySelector(".left-text");
  const rightText    = document.querySelector(".right-text");
  const section      = document.querySelector(".bottle-section");
  const customCursor = document.querySelector(".custom-cursor");
  const cursorText   = document.querySelector(".cursor-text");

  /* ── BOTTLE INTERACTIONS ───────────────────────────────── */
  function updateCursorText() {
    const active =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }
  updateCursorText();

  function resetAllInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    updateCursorText();
  }

  const SLIDE_DURATION = 1000000; // match your CSS transition if you ever change it
  let closeTimerID = null;
  function closeBottlesSmooth() {
    clearTimeout(closeTimerID);
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    updateCursorText();
    closeTimerID = setTimeout(() => {
      section.classList.remove("opened", "left-opened", "right-opened");
      updateCursorText();
    }, SLIDE_DURATION);
  }

  /* ── MOBILE ACCORDION (only <768px) ─────────────────── */
if (isMobile) {
  const headers = document.querySelectorAll('#mobileMenuAccordion .accordion-button');
  headers.forEach(header => {
    // figure out which panel goes with this header
    let selector =
      header.dataset.target ||
      header.dataset.bsTarget ||
      `#${header.getAttribute('aria-controls')}`;
    const panel = document.querySelector(selector);
    if (!panel) return;

    // ensure overflow hidden
    panel.style.overflow = 'hidden';
    // set initial open/closed state
    panel.style.maxHeight = header.classList.contains('collapsed')
      ? '0'
      : panel.scrollHeight + 'px';

    header.addEventListener('click', () => {
      const wasClosed = header.classList.contains('collapsed');

      // close _all_ first
      headers.forEach(h => {
        h.classList.add('collapsed');
        let sel =
          h.dataset.target ||
          h.dataset.bsTarget ||
          `#${h.getAttribute('aria-controls')}`;
        const p = document.querySelector(sel);
        if (p) p.style.maxHeight = '0';
      });

      // if we were closed, open _this_ one
      if (wasClosed) {
        header.classList.remove('collapsed');
        panel.style.maxHeight = panel.scrollHeight + 'px';
        // scroll it into view so shorter panels don't leave blank space
        header.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}


  /* ── CUSTOM CURSOR ────────────────────────────────────── */
  if (customCursor) {
    document.addEventListener("mousemove", (e) => {
      customCursor.style.top  = `${e.clientY}px`;
      customCursor.style.left = `${e.clientX}px`;
    });
    [leftBottle, rightBottle].forEach((bottle) => {
      bottle.addEventListener("mouseenter", () => {
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

  /* ── AOS INIT ────────────────────────────────────────── */
  if (typeof AOS !== "undefined") {
    AOS.init({ duration: 1200 });
  }

  /* ── MOBILE ACCORDION (only <768px) ─────────────────── */
  if (isMobile) {
    const headers = document.querySelectorAll('#mobileMenuAccordion .accordion-button');
    headers.forEach(header => {
      const panel = document.querySelector(header.dataset.target);
      // set initial max-height
      if (!header.classList.contains('collapsed')) {
        panel.style.maxHeight = panel.scrollHeight + 'px';
      } else {
        panel.style.maxHeight = '0';
      }
      header.addEventListener('click', () => {
        const willOpen = header.classList.contains('collapsed');
        // close all
        headers.forEach(h => {
          h.classList.add('collapsed');
          const p = document.querySelector(h.dataset.target);
          p.style.maxHeight = '0';
        });
        if (!willOpen) return; // clicking open header closed it
        // open this one
        header.classList.remove('collapsed');
        panel.style.maxHeight = panel.scrollHeight + 'px';
      });
    });
  }

  /* ── MOBILE MENU TOGGLE ──────────────────────────────── */
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu  = document.getElementById("closeMenu");
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => mobileMenu.classList.add("show"));
    closeMenu?.addEventListener("click", () => mobileMenu.classList.remove("show"));
    document.addEventListener("click", (e) => {
      if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  /* ── NAVBAR SCROLL EFFECT ───────────────────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      navbar.classList.toggle("scrolled", window.scrollY > 0);
    });
  }
}); // end DOMContentLoaded

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

/* ── RESERVATION MODAL CLEANUP ───────────────────────── */
document.addEventListener('DOMContentLoaded', function () {
  const modalEl = document.getElementById('reservationModal');
  if (!modalEl) return;
  modalEl.addEventListener('hide.bs.modal', function () {
    modalEl.classList.add('showing-out');
    setTimeout(() => modalEl.classList.remove('showing-out'), 300);
  });
});

/* ── SMOOTH SCROLL TO VIDEO ───────────────────────────── */
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.querySelector('.scroll-to-video');
  if (!btn) return;
  btn.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('#video').scrollIntoView({ behavior: 'smooth' });
  });
});
