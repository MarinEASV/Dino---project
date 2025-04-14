<?php
/**
 * Template part: About Section
 */
$about_image = get_field('about_image');
$about_heading = get_field('about_heading');
$about_text = get_field('about_text');
?>

<section class="about-section" id="about">
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
