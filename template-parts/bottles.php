<?php
/**
 * Template part: Bottles Section
 */
$left_bottle_image = get_field('left_bottle_image');
$left_bottle_title = get_field('left_bottle_title');
$left_bottle_description = get_field('left_bottle_description');
$right_bottle_image = get_field('right_bottle_image');
$right_bottle_title = get_field('right_bottle_title');
$right_bottle_description = get_field('right_bottle_description');
?>

<section class="bottle-section">
  <div class="bottle-container">
    <div class="bottle left-bottle" data-side="left">
      <img src="<?php the_field('left_bottle_image'); ?>" alt="Left Bottle">
      <div class="bottle-text left-text">
        <h2><?php the_field('left_bottle_title'); ?></h2>
        <p><?php the_field('left_bottle_description'); ?></p>
      </div>
    </div>

    <div class="bottle right-bottle" data-side="right">
      <img src="<?php the_field('right_bottle_image'); ?>" alt="Right Bottle">
      <div class="bottle-text right-text">
        <h2><?php the_field('right_bottle_title'); ?></h2>
        <p><?php the_field('right_bottle_description'); ?></p>
      </div>
    </div>
  </div>
</section>
