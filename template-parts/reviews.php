<?php
/**
 * Template Part: Google Reviews Section
 * Usage: <?php get_template_part( 'template-parts/section', 'reviews' ); ?>
 */
?>

<section id="reviews-section" class="reviews-section">
  <div class="container">
    <h2 class="reviews-section__title">Hvad vores kunder siger</h2>

    
<?php
echo do_shortcode(
        '[trustindex no-registration=google]'
      );
?>
  </div>
</section>