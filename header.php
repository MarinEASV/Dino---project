<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?> <?php bloginfo('description'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $logo = get_field("logo"); ?>

<!-- Preloader -->
<div id="preloader" class="logo-only">
    <img src="<?php echo esc_url($logo['url']); ?>" alt="Loading..." class="preloader-logo">
</div>

<!-- Navbar -->
<header class="navbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo esc_url($logo['url']); ?>" alt="Logo" class="logo">
        </a>

        <!-- Desktop Menu -->
        <nav class="nav-links d-flex align-items-center gap-3">
            <a href="#menu">Menu</a>
            <a href="#about">About</a>
            <a href="#footer">Contact</a>
            <button type="button" class="btn custom-reserve-btn rounded-0" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>
            <div id="weglot_here"></div>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuToggle" class="menu-btn">☰</button>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-nav">
    <button id="closeMenu" class="close-btn">&times;</button>
    
    <!-- Mobile Nav Links -->
    <a href="#menu">Menu</a>
    <a href="#about">About</a>
    <a href="#footer">Contact</a>
    
    <!-- Reserve Button (added) -->
    <button type="button" class="btn custom-reserve-btn rounded-0" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>
    
    <!-- Weglot Switcher (unchanged) -->
    <div id="weglot_here"></div>

    <!-- Social Links (added) -->
    <div class="mobile-social mt-4 d-flex align-items-center gap-4">
        <a href="https://facebook.com" target="_blank" class="text-dark">
            <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="https://maps.google.com/?q=Your+Business+Address" target="_blank" class="text-dark">
            <i class="fas fa-map-marker-alt fa-2x"></i>
        </a>
    </div>
</div>


<!-- Reservation Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center custom-reservation-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reservation Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>We handle table reservations and food orders only via phone calls.</p>
                <a href="tel:+45 75 16 64 64" class="btn custom-call-btn mt-3">📞 +45 75 16 64 64</a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
