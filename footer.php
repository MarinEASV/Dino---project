<?php
/**
 * The template for displaying the footer
 */
?>

<!-- Footer Start -->
<section id="footer">
  <div class="container py-3">
    <div class="row align-items-start">
      <!-- 1) LOGO -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="footer-logo d-inline-block">
          <img src="<?php echo get_template_directory_uri() ?>/assets/Dino-logo.svg"
               alt="logo" width="200" height="auto" class="img-fluid">
        </a>
      </div>

      <!-- 2) KONTAKT -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start">
        <h4><?php pll_e( 'Kontakt' ); ?></h4>
        <ul class="list-unstyled">
          <li class="fw-bold"><i class="fas fa-angle-right me-2"></i>Restaurant Dino</li>
          <li><i class="fas fa-angle-right me-2"></i><a href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5" target="_blank" rel="noopener">Strandvejen 8</a></li>
          <li><i class="fas fa-angle-right me-2"></i>6720 Fanø</li>
          <li><i class="fas fa-angle-right me-2"></i>CVR: 25996682</li>
          <li><i class="fas fa-angle-right me-2"></i><a href="tel:+4575166464" rel="noopener">+45 75 16 64 64</a></li>
          <li><i class="fas fa-angle-right me-2"></i><a href="mailto:ekarahusic@msn.com" target="_blank" rel="noopener">ekarahusic@msn.com</a></li>
        </ul>
      </div>

      <!-- 3) ÅBNINGSTIDER -->
      <?php if ( $hours = get_field('opening_hours', 'option') ): ?>
        <div class="col-12 col-md-3 mb-3 text-center text-md-start">
          <h4><?php pll_e( 'Åbningstider' ); ?></h4>
          <ul class="list-unstyled">
            <?php echo wp_kses( $hours, [ 'li'=>[], 'br'=>[], 'strong'=>[], 'em'=>[] ] ); ?>
          </ul>
        </div>
      <?php endif; ?>

      <!-- 4) PRAKTISK -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start">
        <h4><?php pll_e( 'Praktisk' ); ?></h4>
        <ul class="list-unstyled">
          <li><i class="fas fa-angle-right me-2"></i><a href="https://www.findsmiley.dk/74148" target="_blank"><?php pll_e( 'Smiley certificate' ); ?></a></li>
          <li><i class="fas fa-angle-right me-2"></i><a href="<?php echo esc_url( get_template_directory_uri() . '/uploads/2025/04/Vilkaar_for_brug.pdf' ); ?>" target="_blank"><?php pll_e( 'Terms of use' ); ?></a></li>
          <li><i class="fas fa-angle-right me-2"></i><a href="<?php echo esc_url( get_template_directory_uri() . '/uploads/2025/04/Privatlivspolitik.pdf' ); ?>" target="_blank"><?php pll_e( 'Privatlivspolitik' ); ?></a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom text-center py-2">
      <p><?php pll_e( 'Alle rettigheder forbeholdes © 2025 Dino restaurant' ); ?></p>
    </div>
  </div>
</section>
<!-- Footer End -->

<?php wp_footer(); ?>
</body>
</html>
