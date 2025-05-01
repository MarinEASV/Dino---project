<?php 
$hero_video = get_field("hero_video"); // ACF video file (mp4)
?>

<!-- Hero Section -->
<section id="hero" class="hero-section position-relative vh-100 overflow-hidden">

  <!-- Video Background -->
  <?php if ( $hero_video ): ?>
    <video autoplay muted loop playsinline 
           class="hero-video w-100 h-100 position-absolute top-0 start-0 object-fit-cover">
      <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  <?php endif; ?>

  <!-- Overlay Filter -->
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>

  

  <!-- Dash and Subtext -->
  <div class="hero-subtext text-center text-light">
    <div class="dash"></div>
    <p class="subtext">Authentic Balkan & Danish Cuisine on Fanø</p>
  </div>

  <!-- Play ➔ scroll to #video -->
  <a href="#video" class="scroll-to-video" aria-label="Watch Video">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <polygon points="9,7 9,17 17,12"/>
    </svg>
  </a>

</section>
