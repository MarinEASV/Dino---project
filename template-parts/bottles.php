<?php
/**
 * Template part: Bottles Section
 */

$left_image = get_field('left_bottle_image');
$left_title = get_field('left_bottle_title');
$left_text = get_field('left_bottle_description');

$right_image = get_field('right_bottle_image');
$right_title = get_field('right_bottle_title');
$right_text = get_field('right_bottle_description');
?>

<section class="rakija-section">
  <hr class="section-divider">
  <div class="rakija-container">

    <!-- Left Bottle -->
    <?php if ($left_image): ?>
      <div class="rakija-bottle left" data-bottle="left">
        <img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>">
      </div>
    <?php endif; ?>

    <!-- Right Bottle -->
    <?php if ($right_image): ?>
      <div class="rakija-bottle right" data-bottle="right">
        <img src="<?php echo esc_url($right_image['url']); ?>" alt="<?php echo esc_attr($right_image['alt']); ?>">
      </div>
    <?php endif; ?>

    <!-- Left Text -->
    <div class="rakija-text left-text">
      <h2><?php echo esc_html($left_title); ?></h2>
      <?php echo wp_kses_post($left_text); ?>
    </div>

    <!-- Right Text -->
    <div class="rakija-text right-text">
      <h2><?php echo esc_html($right_title); ?></h2>
      <?php echo wp_kses_post($right_text); ?>
    </div>

    <div class="rakija-cursor">Click to see more</div>
  </div>
</section>
