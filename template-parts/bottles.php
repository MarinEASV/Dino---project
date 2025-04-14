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
  <div class="rakija-container">
    <!-- Left Bottle -->
    <div class="rakija-bottle left" data-bottle="left">
      <img src="<?php the_field('left_bottle_image'); ?>" alt="Left Bottle">
    </div>
    
    <!-- Right Bottle -->
    <div class="rakija-bottle right" data-bottle="right">
      <img src="<?php the_field('right_bottle_image'); ?>" alt="Right Bottle">
    </div>
    
    <!-- Left Text (for left bottle) -->
    <div class="rakija-text left-text">
      <h2><?php the_field('left_bottle_title'); ?></h2>
      <p><?php the_field('left_bottle_description'); ?></p>
    </div>
    
    <!-- Right Text (for right bottle) -->
    <div class="rakija-text right-text">
      <h2><?php the_field('right_bottle_title'); ?></h2>
      <p><?php the_field('right_bottle_description'); ?></p>
    </div>
    
    <!-- Custom Cursor Tooltip -->
    <div class="rakija-cursor">Click to see more</div>
  </div>
</section>
