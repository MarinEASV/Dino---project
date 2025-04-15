<?php 
$hero_video = get_field("hero_video"); // ACF video file (mp4)
?>

<!-- Hero Section -->
<section id="hero" class="hero-section position-relative vh-100 overflow-hidden">

  <!-- Video Background -->
  <?php if ($hero_video): ?>
    <video autoplay muted loop playsinline class="hero-video w-100 h-100 position-absolute top-0 start-0 object-fit-cover">
      <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  <?php endif; ?>

  <!-- Overlay Filter -->
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>

   <!-- Infinite Scroll Keywords -->
   <div class="scrolling-text-container position-absolute w-100">
    <div class="scrolling-text">
      <span>Balkan · Italian · Authentic · Cozy · Family · Rustic · Local · Balkan · Italian · Authentic · Cozy · Family · Rustic · Local · Balkan · Italian · Authentic · Cozy · Family · Rustic · Local · Balkan · Italian · Authentic · Cozy · Family · Rustic · Local ·&nbsp;</span>
      <span>Balkan · Italian · Authentic · Cozy · Family · Rustic · Local · Balkan · Italian · Authentic · Cozy · Family · Rustic · Local ·&nbsp;</span>
    </div>
  </div>
  
</section>
