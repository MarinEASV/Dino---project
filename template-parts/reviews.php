<?php
/**
 * Template Part: Google Reviews Section
 * Usage: <?php get_template_part( 'template-parts/section', 'reviews' ); ?>
 */
?>

<section id="reviews-section" class="reviews-section">
  <div class="container">
    <h2 class="reviews-section__title">What Our Customers Are Saying</h2>

    <div class="trustindex-widget-container">
      <?php
        // Render your Trustindex widget by its real ID:
        echo do_shortcode( '[trustindex data-widget-id="ede1d6245a9a52887346390af8b"]' );
      ?>
    </div>
  </div>
</section>
