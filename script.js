document.addEventListener("DOMContentLoaded", function () {
  const isMobile     = window.innerWidth <= 768;
  const leftBottle   = document.querySelector(".left-bottle");
  const rightBottle  = document.querySelector(".right-bottle");
  const leftText     = document.querySelector(".left-text");
  const rightText    = document.querySelector(".right-text");
  const section      = document.querySelector(".bottle-section");
  const customCursor = document.querySelector(".custom-cursor");
  const cursorText   = document.querySelector(".cursor-text");

  /* ── Helpers ─────────────────────────────────────────── */
  function updateCursorText() {
    const active =
      leftBottle.classList.contains("clicked") ||
      rightBottle.classList.contains("clicked");
    cursorText.textContent = active ? "Close" : "Click to see more";
  }

  function resetInstant() {
    leftBottle.classList.remove("clicked", "hide");
    rightBottle.classList.remove("clicked", "hide");
    leftText .classList.remove("show");
    rightText.classList.remove("show");
    section .classList.remove("opened", "left-opened", "right-opened");
    // restore split‑gradient & clear tint
    section.style.backgroundImage = "";
    section.style.backgroundColor = "";
    updateCursorText();
  }

  /* ── Mobile: show both texts, no clicks ───────────────── */
  if (isMobile) {
    leftText.classList.add("show");
    rightText.classList.add("show");
  } else {
    /* ── Desktop: open/close logic ──────────────────────── */
    function openSide(side) {
      // 1) remove split‑gradient
      section.style.backgroundImage  = "none";
      // 2) tint solid
      section.style.backgroundColor  = side === "left" ? "#B64A42" : "#5F120D";

      resetInstant(); // clear any previous state

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
      // pick the bottle that slides back
      const slidingBottle = section.classList.contains("left-opened")
        ? rightBottle
        : leftBottle;

      // after its transform ends, restore the gradient
      const onEnd = (e) => {
        if (e.propertyName !== "transform") return;
        slidingBottle.removeEventListener("transitionend", onEnd);
        section.style.backgroundImage = "";
        section.style.backgroundColor = "";
        section.classList.remove("opened", "left-opened", "right-opened");
        updateCursorText();
      };
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

    /* ── Custom cursor (desktop) ───────────────────────── */
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
