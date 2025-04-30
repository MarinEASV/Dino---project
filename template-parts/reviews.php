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
        // NOTE the quotes around "google" — Trustindex needs that
        echo do_shortcode( '[trustindex data-widget-id="478dcc2136263f2b3a3726ff"]' );
      ?>
    </div>
  </div>
</section>
