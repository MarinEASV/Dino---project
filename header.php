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
  <div class="container d-flex align-items-center">
    <!-- Logo -->
    <a class="navbar-brand me-4" href="<?php echo home_url(); ?>">
      <img src="<?php echo esc_url($logo['url']); ?>" alt="Logo" class="logo">
    </a>

    <!-- Main nav: single row, no wrap -->
    <?php // force no wrapping so everything stays on one line ?>
    <nav class="nav-links d-flex align-items-center w-100" style="flex-wrap: nowrap;">

      <!-- Left links -->
      <a href="#menu" class="me-4">Menu</a>
      <a href="#about" class="me-4">Om os</a>
      <a href="#footer" class="me-4">Kontakt</a>

      <!-- Reserve button -->
      <button 
        type="button" 
        class="btn custom-reserve-btn rounded-0 me-4" 
        data-bs-toggle="modal" 
        data-bs-target="#reservationModal"
      >Reserve</button>

      <!-- Spacer pushes dropdown to the far right -->
      <div class="ms-auto"></div>

      <?php if ( function_exists('pll_get_the_languages') ): 
        $langs = pll_get_the_languages(['raw'=>1]);
        if ( $langs ):
          $current = reset( array_filter($langs, fn($l)=> $l['current_lang']) );
          $others  = array_filter($langs, fn($l)=> ! $l['current_lang'] );
      ?>
        <!-- Language dropdown -->
        <div class="nav-item dropdown">
          <a 
            class="nav-link dropdown-toggle d-flex align-items-center" 
            href="#" 
            id="langDropdown" 
            role="button" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
          >
            <img src="<?php echo esc_url($current['flag']); ?>" width="20" class="me-1">
            <?php echo esc_html($current['slug']); ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
            <?php foreach( $others as $lang ): ?>
              <li>
                <a 
                  class="dropdown-item d-flex align-items-center" 
                  href="<?php echo esc_url($lang['url']); ?>"
                >
                  <img src="<?php echo esc_url($lang['flag']); ?>" width="20" class="me-2">
                  <?php echo esc_html($lang['slug']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php 
        endif;
      endif; ?>
    </nav>

    <!-- Mobile menu toggle (stays on right) -->
    <button id="menuToggle" class="menu-btn ms-3">☰</button>
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

  <?php if ( function_exists('pll_get_the_languages') ): 
  $langs = pll_get_the_languages(['raw'=>1]);
  if( $langs ): ?>
    <div class="mobile-lang mt-4">
      <?php foreach($langs as $lang): ?>
        <a href="<?php echo esc_url($lang['url']); ?>" 
           class="d-flex align-items-center mb-2 text-dark text-decoration-none">
          <img src="<?php echo esc_url($lang['flag']); ?>" width="24" class="me-2">
          <?php echo esc_html($lang['name']); ?>
        </a>
      <?php endforeach; ?>
    </div>
<?php endif; endif; ?>


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
