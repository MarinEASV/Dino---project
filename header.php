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
  <a href="#menu"><?php pll_e( 'Menu' ); ?></a>
  <a href="#about"><?php pll_e( 'Om os' ); ?></a>
  <a href="#footer"><?php pll_e( 'Kontakt' ); ?></a>
  <button type="button" class="btn custom-reserve-btn rounded-0" data-bs-toggle="modal" data-bs-target="#reservationModal">
  <?php pll_e( 'Reserve' ); ?>
  </button>

  <?php 
if ( function_exists( 'pll_the_languages' ) ) :
    $langs    = pll_the_languages( [
        'raw'           => 1,
        'hide_if_empty' => 0,
    ] );
    $current  = pll_current_language();

    if ( ! empty( $langs ) ) : ?>
  <div class="dropdown language-dropdown">
    <button 
      class="btn dropdown-toggle p-0 border-0" 
      type="button" 
      id="languageDropdown" 
      data-bs-toggle="dropdown" 
      aria-expanded="false"
    >
      <img 
        src="<?php echo esc_url( $langs[ $current ]['flag'] ); ?>" 
        alt="<?php echo esc_attr( $langs[ $current ]['name'] ); ?>" 
        class="current-flag"
        width="24"
        height="auto"
      >
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
      <?php foreach ( $langs as $slug => $lang ) : 
          // Skip current language
          if ( $slug === $current ) {
              continue;
          }
      ?>
        <li>
          <a 
            class="dropdown-item p-1 text-center" 
            href="<?php echo esc_url( $lang['url'] ); ?>"
          >
            <img 
              src="<?php echo esc_url( $lang['flag'] ); ?>" 
              alt="<?php echo esc_attr( $lang['name'] ); ?>" 
              width="20" 
              height="auto"
            >
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php 
    endif;
endif;
?>
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
    <a href="#menu"><?php pll_e( 'Menu' ); ?></a>
    <a href="#about"><?php pll_e( 'Om os' ); ?></a>
    <a href="#footer"><?php pll_e( 'Kontakt' ); ?></a>
  </div>

  <!-- Reserve Button directly under links -->
  <button 
    type="button" 
    class="btn custom-reserve-btn rounded-0 mobile-reserve-btn" 
    data-bs-toggle="modal" 
    data-bs-target="#reservationModal"
  >
  <?php pll_e( 'Reserve' ); ?>
  </button>

  <?php if ( function_exists( 'pll_the_languages' ) ) :
    $langs   = pll_the_languages( [
        'raw'           => 1,
        'hide_if_empty' => 0,
    ] );
    $current = pll_current_language();

    if ( ! empty( $langs ) ) : ?>
  <div class="dropdown language-dropdown">
    <button 
      class="btn dropdown-toggle p-0 border-0" 
      type="button" 
      id="languageDropdown" 
      data-bs-toggle="dropdown" 
      aria-expanded="false"
    >
      <?php 
        // CURRENT flag at 24px wide
        $code    = strtolower( $current );     // “en”, “da”, “de”…
        $w_curr  = 24;
        $h_curr  = intval( $w_curr * 0.75 );    // 4:3 ratio → 18px
        $f1x_c   = "https://flagcdn.com/{$w_curr}x{$h_curr}/{$code}.png";
        $f2x_c   = "https://flagcdn.com/".( $w_curr*2 )."x".( $h_curr*2 )."/{$code}.png";
      ?>
      <img
        srcset="<?php echo esc_url( $f2x_c ); ?> 2x"
        src="<?php echo esc_url( $f1x_c ); ?>"
        width="<?php echo $w_curr; ?>"
        height="<?php echo $h_curr; ?>"
        alt="<?php echo esc_attr( $langs[ $current ]['name'] ); ?>"
      >
    </button>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
      <?php foreach ( $langs as $slug => $lang ) :
          if ( $slug === $current ) {
            continue;
          }
          // build flag URLs for each other language
          $code   = strtolower( $slug );
          $w      = 20;                      // display width
          $h      = intval( $w * 0.75 );    // 15px height
          $f1x    = "https://flagcdn.com/{$w}x{$h}/{$code}.png";
          $f2x    = "https://flagcdn.com/".( $w*2 )."x".( $h*2 )."/{$code}.png";
      ?>
        <li>
          <a class="dropdown-item p-1 text-center" href="<?php echo esc_url( $lang['url'] ); ?>">
            <img
              srcset="<?php echo esc_url( $f2x ); ?> 2x"
              src="<?php echo esc_url( $f1x ); ?>"
              width="<?php echo $w; ?>"
              height="<?php echo $h; ?>"
              alt="<?php echo esc_attr( $lang['name'] ); ?>"
            >
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
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
                <h5 class="modal-title" id="reservationModalLabel"><?php pll_e( 'Reservationsinfo' ); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php pll_e( 'Vi håndterer kun bordreservationer og madbestillinger via telefonopkald.' ); ?></p>
                <a href="tel:+45 75 16 64 64" class="btn custom-call-btn mt-3"><?php pll_e( '📞 +45 75 16 64 64' ); ?></a>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
