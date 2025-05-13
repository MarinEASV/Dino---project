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
          <div class="col-12 col-md-3 mb-3 text-center text-md-start">
            <h4>Kontakt</h4>
            <ul class="list-unstyled">

              <!-- Address -->
              <li>
                <i class="fas fa-location-dot me-2"></i>
                <a href="https://maps.app.goo.gl/oUaruKVvpiQsCJir5" target="_blank" rel="noopener noreferrer">
                  Strandvejen 8, 6720 Fanø
                </a>
              </li>

              <!-- Phone -->
              <li>
                <i class="fas fa-phone me-2"></i>
                <a href="tel:+4575166464" rel="noopener noreferrer">
                  +45 75 16 64 64
                </a>
              </li>

              <!-- Email -->
              <li>
                <i class="fas fa-envelope me-2"></i>
                <a href="mailto:ekarahusic@msn.com" target="_blank" rel="noopener noreferrer">
                  ekarahusic@msn.com
                </a>
              </li>

              <!-- Spacer (optional for separation) -->
              <li class="mt-3 fw-bold">
                Restaurant Dino
              </li>

              <li>
                CVR: 25996682
              </li>

            </ul>
          </div>


      <!-- 3) ÅBNINGSTIDER -->
      <div class="col-12 col-md-3 mb-3 text-center text-md-start"> <!-- ↓ was mb-4 -->
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
      <div class="col-12 col-md-3 mb-3 text-center text-md-start"> <!-- ↓ was mb-4 -->
        <h4>Praktisk</h4>
        <ul class="list-unstyled">
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="https://www.findsmiley.dk/74148" target="_blank">
              Smiley certificate
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="…/Vilkaar_for_brug.pdf" target="_blank">
              Terms of use
            </a>
          </li>
          <li>
            <i class="fas fa-angle-right me-2"></i>
            <a href="…/Privatlivspolitik.pdf" target="_blank">
             Privatlivspolitik
            </a>
          </li>
        </ul>
      </div>

    </div><!-- /.row -->

    <div class="footer-bottom text-center py-2">  
      <p>Alle rettigheder forbeholdes © 2025 Dino restaurant</p>
    </div>
  </div><!-- /.container -->
</section>
<!-- Footer End -->

<?php wp_footer(); ?>
</body>
</html>