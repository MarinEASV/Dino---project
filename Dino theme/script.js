
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 1200
    });
});

jQuery(document).ready(function ($) {
    if (typeof $.fn.counterUp !== 'undefined') {
        $('[data-toggle="counter-up"]').counterUp({
            delay: 10,
            time: 2000
        });
    } else {
        console.error("Counter-Up plugin is not loaded.");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        duration: 1000,  // Animation duration in milliseconds
        once: true       // Animate only once
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const heroWords = document.querySelectorAll(".hero-word");
    const heroText = document.querySelector(".hero-text");
  

    // Apply fade-up effect to words with delay
    heroWords.forEach((word, index) => {
        setTimeout(() => {
            word.style.opacity = "1";
            word.style.transform = "translateY(0)";
        }, 200 * index);
    });

    // Show text after title animation finishes
    setTimeout(() => {
        heroText.classList.add("fade-in");
    }, 800);

   
});


document.addEventListener("DOMContentLoaded", function () {
    const heroButton = document.querySelector(".hero-btn");

    setTimeout(() => {
        heroButton.classList.add("fade-in");
    }, 1700);  
});

document.addEventListener("DOMContentLoaded", function () {
    const mobileMenu = document.getElementById("mobileMenu");
    const menuToggle = document.getElementById("menuToggle");
    const closeMenu = document.getElementById("closeMenu");

    menuToggle.addEventListener("click", function () {
        mobileMenu.classList.add("show");
    });

    closeMenu.addEventListener("click", function () {
        mobileMenu.classList.remove("show");
    });

    document.addEventListener("click", function (event) {
        if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
            mobileMenu.classList.remove("show");
        }
    });

    // Duplicate Weglot Button for Mobile
    const weglotDesktop = document.getElementById("weglot_here");
    const weglotMobile = document.getElementById("weglot_here_mobile");
    if (weglotDesktop && weglotMobile) {
        weglotMobile.innerHTML = weglotDesktop.innerHTML;
    }
});


