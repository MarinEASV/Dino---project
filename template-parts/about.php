<?php
/**
 * Template part: About Section
 */
$about_image = get_field('about_image');
$about_heading = get_field('about_heading');
$about_text = get_field('about_text');
?>

<!-- Infinite Scroll Section -->
<section class="scrolling-section">
  <div class="scrolling-text-container">
    <div class="scrolling-text">
      <span>Balkan · Italian · Authentic · Cozy · Family · Rustic · Local ·&nbsp;</span>
      <span>Balkan · Italian · Authentic · Cozy · Family · Rustic · Local ·&nbsp;</span>
    </div>
  </div>
</section>


<section class="about-section" id="about" data-aos="fade-in" >
  <hr class="section-divider">
  <div class="about-container">
    <?php if ($about_image): ?>
      <div class="about-image">
        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>">
      </div>
    <?php endif; ?>

    <div class="about-content">
      <?php if ($about_heading): ?>
        <h2 class="about-title"><?php echo esc_html($about_heading); ?></h2>
      <?php endif; ?>

      <?php if ($about_text): ?>
        <div class="about-text">
          <?php echo wp_kses_post($about_text); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
