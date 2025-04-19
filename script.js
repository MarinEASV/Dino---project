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

  function resetInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    section.style.backgroundImage  = null;
    section.style.backgroundColor  = null;
    updateCursorText();
  }

  /* ── MOBILE: show both texts, no clicks ───────────────── */
  if (isMobile) {
    leftText.classList.add("show");
    rightText.classList.add("show");
  } else {
    /* ── DESKTOP: open/close logic ──────────────────────── */
    function openSide(side) {
      // remove the split gradient immediately
      section.style.backgroundImage = "none";
      // tint solid
      section.style.backgroundColor =
        side === "left" ? "#B64A42" : "#5F120D";

      resetInstant(); // clear old state

      if (side === "left") {
        leftBottle.classList.add("clicked");
        rightBottle.classList.add("hide");
        leftText.classList.add("show");
        section.classList.add("opened", "left-opened");
      } else {
        rightBottle.classList.add("clicked");
        leftBottle.classList.add("hide");
        rightText.classList.add("show");
        section.classList.add("opened", "right-opened");
      }
      updateCursorText();
    }

    function closeSmooth() {
      const slidingBottle = section.classList.contains("left-opened")
        ? rightBottle
        : leftBottle;

      const onEnd = (e) => {
        if (e.propertyName !== "transform") return;
        slidingBottle.removeEventListener("transitionend", onEnd);
        // restore split gradient
        section.style.backgroundImage = "";
        section.style.backgroundColor = "";
        // clear classes
        section.classList.remove("opened", "left-opened", "right-opened");
        updateCursorText();
      };
      slidingBottle.addEventListener("transitionend", onEnd);

      // trigger slide‑back
      leftBottle.classList.remove("clicked", "hide");
      rightBottle.classList.remove("clicked", "hide");
      leftText.classList.remove("show");
      rightText.classList.remove("show");
    }

    leftBottle.addEventListener("click", () => {
      leftBottle.classList.contains("clicked")
        ? closeSmooth()
        : openSide("left");
    });
    rightBottle.addEventListener("click", () => {
      rightBottle.classList.contains("clicked")
        ? closeSmooth()
        : openSide("right");
    });

    /* ── custom cursor ────────────────────────────────── */
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

  /* ── MOBILE MENU TOGGLE (unchanged) ────────────────── */
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

  /* ── NAVBAR SCROLL EFFECT (unchanged) ─────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () =>
      navbar.classList.toggle("scrolled", window.scrollY > 0)
    );
  }
});

/* ── PRELOADER (unchanged) ─────────────────────────── */
window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  const logo      = document.querySelector(".preloader-logo");
  logo.classList.add("animate");
  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 4500);
});
