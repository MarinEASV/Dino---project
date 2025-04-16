<?php
/**
 * Template part: Bottles Section
 */
$left_bottle_img         = get_field('left_bottle_img');
$left_bottle_title       = get_field('left_bottle_title');
$left_bottle_description = get_field('left_bottle_description');
$right_bottle_img        = get_field('right_bottle_img');
$right_bottle_title      = get_field('right_bottle_title');
$right_bottle_description= get_field('right_bottle_description');
?>

<section class="bottle-section">

  <?php if ( wp_is_mobile() ) : ?>
    <div class="mobile-tabs">
      <button class="tab-btn active" data-target="left">
        <?php echo esc_html( $left_bottle_title ); ?>
      </button>
      <button class="tab-btn" data-target="right">
        <?php echo esc_html( $right_bottle_title ); ?>
      </button>
    </div>
  <?php endif; ?>

  <div class="bottle-container" <?php if ( wp_is_mobile() ) echo 'data-active="left"'; ?>>

    <div class="bottle left-bottle" data-side="left">
      <img
        src="<?php echo esc_url( $left_bottle_img['url'] ); ?>"
        alt="<?php echo esc_attr( $left_bottle_img['alt'] ); ?>"
      >
    </div>

    <div class="bottle right-bottle" data-side="right">
      <img
        src="<?php echo esc_url( $right_bottle_img['url'] ); ?>"
        alt="<?php echo esc_attr( $right_bottle_img['alt'] ); ?>"
      >
    </div>

    <div class="bottle-text left-text">
      <h2><?php echo esc_html( $left_bottle_title ); ?></h2>
      <p><?php echo esc_html( $left_bottle_description ); ?></p>
    </div>

    <div class="bottle-text right-text">
      <h2><?php echo esc_html( $right_bottle_title ); ?></h2>
      <p><?php echo esc_html( $right_bottle_description ); ?></p>
    </div>

  </div>
</section>

<div class="custom-cursor">
  <span class="cursor-text">Click to see more</span>
</div>
