<!-- Footer Start -->
<section id="footer">
  <div class="container py-3">  <!-- ↓ was py-5 -->
    <div class="row align-items-start">

      <!-- 1) LOGO -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start"> <!-- ↓ was mb-4 -->
        <a href="/" class="footer-logo d-inline-block">
          <img
          src="<?php echo get_template_directory_uri()  ?>/assets/Dino-logo.svg" alt="logo" width="200" height="auto"
            alt="Dino logo"
            class="img-fluid"
            style=""
          >
        </a>
      </div>

      <!-- 2) KONTAKT -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start"> <!-- ↓ was mb-4 -->
        <h4><?php pll_e( 'Kontakt' ); ?></h4>
        <ul class="list-unstyled">
          <li class="fw-bold">
            <i class="fas fa-angle-right me-2"></i>
            Restaurant Dino
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5"
               target="_blank" rel="noopener noreferrer">
              Strandvejen 8
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            6720 Fanø
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            CVR: 25996682
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="tel:+4575166464" rel="noopener noreferrer">
              +45 75 16 64 64
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="mailto:kristijan.kiki13@gmail.com"
               target="_blank" rel="noopener noreferrer">
              ekarahusic@msn.com
            </a>
          </li>
        </ul>
      </div>

      <!-- 3) ÅBNINGSTIDER -->
      <?php
if( $hours = get_field('opening_hours') ): ?>
  <div class="col-12 col-md-3 mb-3 text-center text-md-start">
    <h4><?php pll_e( 'Åbningstider' ); ?></h4>
    <ul class="list-unstyled">
      <?php
      // If you want to allow <li> tags in your ACF textarea:
      echo wp_kses( $hours, [ 'li'=>[], 'br'=>[], 'strong'=>[], 'em'=>[] ] );
      ?>
    </ul>
  </div>
<?php endif; ?>

      <!-- 4) PRAKTISK -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start"> <!-- ↓ was mb-4 -->
        <h4><?php pll_e( 'Praktisk' ); ?></h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="https://www.findsmiley.dk/74148" target="_blank">
              <?php pll_e( 'Smiley certificate' ); ?>
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="…/Vilkaar_for_brug.pdf" target="_blank">
              <?php pll_e( 'Terms of use' ); ?>
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="…/Privatlivspolitik.pdf" target="_blank">
             <?php pll_e( 'Privatlivspolitik' ); ?>
            </a>
          </li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom text-center py-2">  <!-- ↓ was py-3 -->
      <p> <?php pll_e( 'Alle rettigheder forbeholdes © 2025 Dino restaurant' ); ?></p>
    </div>
  </div>
</section>
<!-- Footer End -->



<?php wp_footer(); ?>
</body>
</html>