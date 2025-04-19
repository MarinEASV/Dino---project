document.addEventListener("DOMContentLoaded", function () {
  const isMobile     = window.innerWidth <= 768;
  const leftBottle   = document.querySelector(".left-bottle");
  const rightBottle  = document.querySelector(".right-bottle");
  const leftText     = document.querySelector(".left-text");
  const rightText    = document.querySelector(".right-text");
  const section      = document.querySelector(".bottle-section");
  const customCursor = document.querySelector(".custom-cursor");
  const cursorText   = document.querySelector(".cursor-text");

  /* ── Helpers ────────────────────────────────────────── */
  function updateCursorText() {
    const active =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  function resetInstant() {
    // Put everything back to its base state
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    // Restore gradient
    section.style.setProperty("--grad-opacity", 1);
    updateCursorText();
  }

  /* ── Mobile: just stack + show text ─────────────────── */
  if (isMobile) {
    leftText.classList.add("show");
    rightText.classList.add("show");
  } 

  /* ── Desktop: click/toggle logic ───────────────────── */
  else {
    function openSide(side) {
      // fade out the gradient underlay
      section.style.setProperty("--grad-opacity", 0);

      resetInstant(); // clear any previous open

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
      updateCursorText(); // now says “Close”
    }

    function closeSmooth() {
      // pick the bottle that’s coming back
      const slidingBottle = section.classList.contains("left-opened")
        ? rightBottle
        : leftBottle;

      // once the slide‑back (transform) ends, restore everything
      const onEnd = (e) => {
        if (e.propertyName !== "transform") return;
        slidingBottle.removeEventListener("transitionend", onEnd);

        // bring gradient back
        section.style.setProperty("--grad-opacity", 1);
        // clear the open classes
        section.classList.remove("opened", "left-opened", "right-opened");
        updateCursorText(); // back to “Click to see more”
      };
      slidingBottle.addEventListener("transitionend", onEnd);

      // trigger the actual slide‑back
      leftBottle.classList.remove("clicked", "hide");
      rightBottle.classList.remove("clicked", "hide");
      leftText.classList.remove("show");
      rightText.classList.remove("show");
    }

    leftBottle.addEventListener("click", () => {
      if (leftBottle.classList.contains("clicked")) closeSmooth();
      else openSide("left");
    });
    rightBottle.addEventListener("click", () => {
      if (rightBottle.classList.contains("clicked")) closeSmooth();
      else openSide("right");
    });

    /* ── Custom cursor (desktop only) ─────────────────── */
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

  /* ── Mobile menu toggle (unchanged) ───────────────── */
  const mobileMenu = document.getElementById("mobileMenu");
  const menuToggle = document.getElementById("menuToggle");
  const closeMenu  = document.getElementById("closeMenu");
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => mobileMenu.classList.add("show"));
    closeMenu?.addEventListener("click", () => mobileMenu.classList.remove("show"));
    document.addEventListener("click", (evt) => {
      if (!mobileMenu.contains(evt.target) && !menuToggle.contains(evt.target)) {
        mobileMenu.classList.remove("show");
      }
    });
  }

  /* ── Navbar scroll effect (unchanged) ─────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      navbar.classList.toggle("scrolled", window.scrollY > 0);
    });
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
