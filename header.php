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
        <nav class="nav-links d-flex align-items-center gap-3 w-100">
            <a href="#menu">Menu</a>
            <a href="#about">Om os</a>
            <a href="#footer">Kontakt</a>
            <button type="button" class="btn custom-reserve-btn rounded-0" data-bs-toggle="modal" data-bs-target="#reservationModal">Reserve</button>

            <!-- Language Picker - Inline List -->
            <?php if ( function_exists('pll_the_languages') ) : ?>
  <div class="navbar-lang-wrapper ms-auto">
  <?php if ( function_exists('pll_get_the_languages') ) : 
  $langs = pll_get_the_languages(['raw'=>1]);
  if( $langs ): 

    // find the current language entry
    $current = array_filter($langs, fn($l)=> $l['current_lang']);
    $current = reset($current);
    $others  = array_filter($langs, fn($l)=> ! $l['current_lang'] );
?>
  <div class="nav-item dropdown ms-3">
    <a 
      class="nav-link dropdown-toggle d-flex align-items-center" 
      href="#" 
      id="langDropdown" 
      role="button" 
      data-bs-toggle="dropdown" 
      aria-expanded="false"
    >
      <img src="<?php echo esc_url($current['flag']); ?>" width="20" class="me-1">
      <?php echo esc_html($current['slug']); // or $current['name'] ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
      <?php foreach($others as $lang): ?>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?php echo esc_url($lang['url']); ?>">
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
      <a href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5" t