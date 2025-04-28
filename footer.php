<!-- Footer Start -->
<section id="footer">
  <div class="container py-5">
    <div class="row align-items-start">

      <!-- 1) LOGO -->
      <div class="col-12 col-md-3 mb-4 text-center text-md-start">
        <a href="/" class="footer-logo d-inline-block">
          <!-- note the slash before /assets -->
          <img
            src="<?php echo get_template_directory_uri(); ?>/assets/Dino-logo.svg"
            alt="Dino logo"
            class="img-fluid"
            style="max-width: 200px;"
          >
        </a>
      </div>

      <!-- 2) KONTAKT -->
      <div class="col-12 col-md-3 mb-4 text-center text-md-start">
        <h4>Kontakt</h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-map-pin me-2"></i>
            Restaurant Dino
          </li>
          <li>
            <i class="fas fa-map-marker-alt me-2"></i>
            <a
              href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5"
              target="_blank"
              class="text-break"
            >Strandvejen 8</a>
          </li>
          <li>6720 Fanø</li>
          <li>CVR 12 34 56 78</li>
          <li>
            <i class="fas fa-phone me-2"></i>
            <a href="tel:+4575166464">+45 75 16 64 64</a>
          </li>
          <li>
            <i class="fas fa-envelope me-2"></i>
            <a href="mailto:kristijan.kiki13@gmail.com"
               class="text-break"
            >kristijan.kiki13@gmail.com</a>
          </li>
        </ul>
      </div>

      <!-- 3) ÅBNINGSTIDER -->
      <div class="col-12 col-md-3 mb-4 text-center text-md-start">
        <h4>Åbningstider</h4>
        <ul class="list-unstyled">
          <li>Mandag: 17:00 – 21:00</li>
          <li>Tirsdag: 17:00 – 21:00</li>
          <li>Onsdag: 17:00 – 21:00</li>
          <li>Torsdag: 17:00 – 21:00</li>
          <li>Fredag: 17:00 – 21:00</li>
          <li>Lørdag: 17:00 – 21:00</li>
          <li>Søndag: 17:00 – 21:00</li>
        </ul>
      </div>

      <!-- 4) PRAKTISK -->
      <div class="col-12 col-md-3 mb-4 text-center text-md-start">
        <h4>Praktisk</h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="#" class="text-break">Smiley certificate</a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="#" class="text-break">Terms of use</a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="#" class="text-break">Privacy policy</a>
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

<?php wp_footer(); ?>
</body>
</html>
