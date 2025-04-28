<?php
/**
 * Template Part: Google Reviews Section
 * Usage: <?php get_template_part( 'template-parts/section', 'reviews' ); ?>
 */
?>

<section id="reviews-section" class="reviews-section" data-aos="fade-up">
  <div class="container">
    <h2 class="reviews-section__title">What Our Customers Are Saying</h2>

    <?php
      // WP Google Reviews shortcode.
      // Change place_id / layout / columns as desired.
      echo do_shortcode(
        '[trustindex data-widget-id=9b751f44535237868c561900108]'
      );
      
    ?>
<?php
echo do_shortcode(
        '[trustindex no-registration=google]'
      );
?>
  </div>
</section>
