<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
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
        <nav class="nav-links">
            <a href="#menu">Menu</a>
            <a href="#about">About</a>
            <a href="#footer">Contact</a>
            <button class="reserve-btn" id="reserveBtn">Reserve</button>
            <div id="weglot_here"></div> <!-- Weglot button -->
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuToggle" class="menu-btn">☰</button>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-nav">
    <button id="closeMenu" class="close-btn">&times;</button>
    <a href="#manufacturing">Menu</a>
    <a href="#about">About</a>
    <a href="#footer">Contact</a>
    <div id="weglot_here"></div> <!-- Weglot button for mobile -->
</div>

<!-- Reservation Modal -->
<div id="reservationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>We handle table reservations or food orders only via phone calls.</p>
        <a href="tel:+1234567890" class="call-link">📞 +1 (234) 567-890</a>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
