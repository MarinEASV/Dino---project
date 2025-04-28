<!-- Footer Start -->
<section id="footer">
  <div class="container py-5">
    <div class="row justify-content-between align-items-start">
      
      <!-- Logo column -->
      <div class="col-12 col-md-3 mb-4">
        <a href="/" class="footer-logo d-block text-center">
          <img
            src="<?php echo get_template_directory_uri() ?>/assets/Dino-logo.svg"
            alt="Dino logo"
            class="img-fluid"
            style="max-width: 200px"
          >
        </a>
      </div>

      <!-- Kontakt -->
      <div class="col-12 col-md-3 mb-4">
        <h4>Kontakt</h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-envelope me-2"></i>
            <a href="mailto:leon@valmar-metal.ba">leon@valmar-metal.ba</a>
          </li>
          <li>
            <i class="fas fa-phone me-2"></i>
            <a href="tel:+4575166464">+45 75 16 64 64</a>
          </li>
          <li>
            <i class="fas fa-map-marker-alt me-2"></i>
            <a
              href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5"
              target="_blank"
            >Strandvejen 8, 6720 Fanø</a>
          </li>
          <li>
            <i class="fas fa-globe me-2"></i>
            <a href="http://www.restaurantdino.dk/" target="_blank">
              www.restaurantdino.dk
            </a>
          </li>
        </ul>
      </div>

      <!-- Åbningstider -->
      <div class="col-12 col-md-3 mb-4">
        <h4>Åbningstider</h4>
        <ul class="list-unstyled">
          <li>Mandag–Fredag: 11:00 – 22:00</li>
          <li>Lørdag–Søndag: 12:00 – 23:00</li>
        </ul>
      </div>

      <!-- Praktisk -->
      <div class="col-12 col-md-3 mb-4">
        <h4>Praktisk</h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="#about">Om os</a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="#menu">Se menu</a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="<?php echo get_template_directory_uri()?>/assets/Valmar-Metal-Politika-Privatnosti.pdf" target="_blank">
              Privatlivspolitik
            </a>
          </li>
        </ul>
      </div>

    </div><!-- /.row -->

    <div class="footer-bottom text-center py-3">
      <p>All rights reserved © 2025 Dino restaurant</p>
    </div>
  </div><!-- /.container -->
</section>
<!-- Footer End -->

<?php wp_footer() ?>
</body>
</html>
