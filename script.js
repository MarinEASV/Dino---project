/* ── DESKTOP bottle logic ───────────────────────── */
if (!isMobile) {
  function openSide(side) {
    // 1) immediately hide the gradient layer
    section.style.setProperty("--grad-opacity", 0);

    // 2) clear any prior state classes
    resetInstant();

    // 3) apply your clicked/hide/show logic
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
    updateCursorText();  // shows “Close”
  }

  function closeSmooth() {
    // pick the bottle that will slide back
    const slidingBottle = section.classList.contains("left-opened")
      ? rightBottle
      : leftBottle;

    function onEnd(e) {
      if (e.propertyName !== "transform") return;
      slidingBottle.removeEventListener("transitionend", onEnd);

      // 1) restore the gradient layer
      section.style.setProperty("--grad-opacity", 1);
      // 2) clear all open/side classes
      section.classList.remove("opened", "left-opened", "right-opened");
      updateCursorText();  // back to “Click to see more”
    }
    slidingBottle.addEventListener("transitionend", onEnd);

    // trigger the slide‑back
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



    /* ── custom cursor (unchanged) ─────────────────────── */
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

    /* ── AOS (desktop only) ────────────────────────────── */
    if (typeof AOS !== "undefined") {
      AOS.init({ duration: 1200 });
    }
  }

  /* ── MOBILE MENU TOGGLE (unchanged) ──────────────────── */
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

  /* ── NAVBAR SCROLL EFFECT (unchanged) ────────────────── */
  const navbar = document.querySelector(".navbar");
  if (navbar) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 0) navbar.classList.add("scrolled");
      else navbar.classList.remove("scrolled");
    });
  }


/* ── PRELOADER (unchanged) ─────────────────────────────── */
window.addEventListener("load", () => {
  const preloader = document.getElementById("preloader");
  const logo      = document.querySelector(".preloader-logo");

  logo.classList.add("animate");

  setTimeout(() => {
    preloader.style.opacity    = "0";
    preloader.style.visibility = "hidden";
  }, 4500);
});
