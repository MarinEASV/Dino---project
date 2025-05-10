<?php
/**
 * Template part: Bottles Section
 */

// LEFT SIDE
$left_img         = get_field('left_bottle_img');
$left_title       = get_field('left_bottle_title');
$left_description = get_field('left_bottle_description');
$left_price       = get_field('left_bottle_price');
$left_link        = get_field('left_bottle_link');
$left_link_label  = get_field('left_bottle_link_label') ?: 'Buy Now';

// RIGHT SIDE
$right_img         = get_field('right_bottle_img');
$right_title       = get_field('right_bottle_title');
$right_description = get_field('right_bottle_description_2');
$right_price       = get_field('right_bottle_price');
$right_link        = get_field('right_bottle_link');
$right_link_label  = get_field('right_bottle_link_label') ?: 'Buy Now';
?>

<section class="bottle-section" data-aos="zoom-in">
  <div class="bottle-container" >

    <!-- LEFT BOTTLE IMAGE -->
    <div class="bottle left-bottle" data-side="left">
      <?php if ( $left_img ): ?>
        <img src="<?php echo esc_url( $left_img['url'] ); ?>"
             alt="<?php echo esc_attr( $left_img['alt'] ); ?>">
      <?php endif; ?>
    </div>

    <!-- RIGHT BOTTLE IMAGE -->
    <div class="bottle right-bottle" data-side="right">
      <?php if ( $right_img ): ?>
        <img src="<?php echo esc_url( $right_img['url'] ); ?>"
             alt="<?php echo esc_attr( $right_img['alt'] ); ?>">
      <?php endif; ?>
    </div>

    <!-- LEFT TEXT BLOCK -->
    <div class="bottle-text left-text">
      <?php if ( $left_title ): ?>
        <h2><?php echo esc_html( $left_title ); ?></h2>
      <?php endif; ?>

      <?php if ( $left_description ): ?>
        <p><?php echo esc_html( $left_description ); ?></p>
      <?php endif; ?>

      <?php if ( $left_price ): ?>
        <div class="bottle-price"><?php echo esc_html( $left_price ); ?> kr</div>
      <?php endif; ?>

      <?php if ( $left_link ): ?>
        <a class="bottle-buy-button"
           href="<?php echo esc_url( $left_link ); ?>"
           target="_blank"
           rel="noopener">
          <?php echo esc_html( $left_link_label ); ?>
        </a>
      <?php endif; ?>
    </div>

    <!-- RIGHT TEXT BLOCK -->
    <div class="bottle-text right-text">
      <?php if ( $right_title ): ?>
        <h2><?php echo esc_html( $right_title ); ?></h2>
      <?php endif; ?>

      <?php if ( $right_description ): ?>
        <p><?php echo esc_html( $right_description ); ?></p>
      <?php endif; ?>

      <?php if ( $right_price ): ?>
        <div class="bottle-price"><?php echo esc_html( $right_price ); ?> kr</div>
      <?php endif; ?>

      <?php if ( $right_link ): ?>
        <a class="bottle-buy-button"
           href="<?php echo esc_url( $right_link ); ?>"
           target="_blank"
           rel="noopener">
          <?php echo esc_html( $right_link_label ); ?>
        </a>
      <?php endif; ?>
    </div>

  </div>
</section>

<div class="custom-cursor">
  <span class="cursor-text">Click to see more</span>
</div>
