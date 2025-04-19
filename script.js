/* ── DESKTOP bottle logic ───────────────────────────────── */
if (!isMobile) {
  /* update helper */
  function updateCursorText() {
    const active =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  /** open a side */
  function openSide(side) {
    resetInstant();                    // clear any previous state

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

  /** close with transition‑end listener (no timeout) */
  function closeSmooth() {
    /* Which bottle slides back? */
    const slidingBottle = section.classList.contains("left-opened")
      ? rightBottle        // right slides in from +100%
      : leftBottle;        // left slides in from –100%

    /* when that slide finishes, clear colours & cursor */
    const onEnd = (e) => {
      if (e.propertyName !== "transform") return;
      section.classList.remove("opened", "left-opened", "right-opened");
      slidingBottle.removeEventListener("transitionend", onEnd);
      updateCursorText();                // back to “Click to see more”
    };
    slidingBottle.addEventListener("transitionend", onEnd);

    /* start the slide‑back */
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
  }

  /** instant reset (used before opening the other side) */
  function resetInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText.classList.remove("show");
    rightText.classList.remove("show");
    section.classList.remove("opened", "left-opened", "right-opened");
    updateCursorText();
  }

  /* attach handlers */
  leftBottle.addEventListener("click", () => {
    if (leftBottle.classList.contains("clicked")) closeSmooth();
    else openSide("left");
  });

  rightBottle.addEventListener("click", () => {
    if (rightBottle.classList.contains("clicked")) closeSmooth();
    else openSide("right");
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
