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
            <a href="#about">Om os</a>
            <a href="#footer">Kontakt</a>
            <button type="button" class="btn custom-reserve-btn rounded-0" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>

            <!-- Language Picker - Inline List -->
            <ul class="navbar-lang d-flex gap-3 list-unstyled mb-0">
                <?php if (function_exists('pll_get_the_languages')): ?>
                    <?php $languages = pll_get_the_languages(['raw' => 1]); ?>
                    <?php if (!empty($languages)): ?>
                        <?php foreach ($languages as $lang): ?>
                            <li>
                                <a class="d-flex align-items-center gap-2" href="<?php echo esc_url($lang['url']); ?>">
                                    <img src="<?php echo esc_url($lang['flag']); ?>" alt="<?php echo esc_attr($lang['slug']); ?> flag" style="width: 20px;">
                                    <?php echo esc_html($lang['name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menuToggle" class="menu-btn">☰</button>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-nav">
  <button id="closeMenu" class="close-btn">&times;</button>

  <!-- Menu links (aligned left) -->
  <div class="mobile-links">
    <a href="#menu">Menu</a>
    <a href="#about">Om os</a>
    <a href="#footer">Kontakt</a>
  </div>

  <!-- Reserve Button directly under links -->
  <button type="button" class="btn custom-reserve-btn rounded-0 mobile-reserve-btn" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>

  <!-- Social icons at the bottom right -->
  <div class="mobile-bottom">
    <div class="mobile-social">
      <a href="https://www.facebook.com/RestaurantDino" target="_blank" class="me-3">
        <i class="fab fa-facebook fa-2x"></i>
      </a>
      <a href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5" target="_blank">
        <i class="fas fa-map-marker-alt fa-2x"></i>
      </a>
    </div>
  </div>
</div>

<!-- Reservation Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center custom-reservation-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reservationsinfo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Vi håndterer kun bordreservationer og madbestillinger via telefonopkald.</p>
                <a href="tel:+45 75 16 64 64" class="btn custom-call-btn mt-3">📞 +45 75 16 64 64</a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
