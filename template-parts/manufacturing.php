<section id="manufacturing">
  <div class="py-vh-5 w-100 overflow-hidden" id="services">
    <div class="container">
            <div class="text-center mx-auto" data-aos="fade-down" data-aos-delay="0" style="max-width: 600px; padding-top: 5rem; padding-bottom: px;">
                <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">Zašto odabrati nas?</h1>
            </div>
      <!-- Manufacturing Tab Section -->
      <div class="container my-5">
        <nav>
          <!-- Tab Buttons -->
          <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
            <?php
            $isFirst = true;
            $manufacturing_query = new WP_Query(array(
              'post_type' => 'manufacturing',
              'posts_per_page' => -1,
            ));

            if ($manufacturing_query->have_posts()): 
              $tab_index = 1;
              while ($manufacturing_query->have_posts()): $manufacturing_query->the_post(); 
                $button_text = get_field("button_text"); ?>
                <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>" 
                  id="nav-manufacturing<?php echo $tab_index; ?>-tab" 
                  data-bs-toggle="tab" 
                  data-bs-target="#nav-manufacturing<?php echo $tab_index; ?>" 
                  type="button" 
                  aria-controls="nav-manufacturing<?php echo $tab_index; ?>" 
                  aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>" 
                  role="tab">
                  <?php echo $button_text; ?>
                </button>
                <?php 
                $isFirst = false; 
                $tab_index++; 
              endwhile; 
              wp_reset_postdata(); 
            endif; 
            ?>
          </div>
        </nav>

        <!-- Tab Content -->
        <div class="tab-content" id="nav-tabContent">
          <?php
          $isFirst = true;
          $manufacturing_query = new WP_Query(array(
            'post_type' => 'manufacturing',
            'posts_per_page' => -1,
          ));

          if ($manufacturing_query->have_posts()): 
            $tab_index = 1;
            while ($manufacturing_query->have_posts()): $manufacturing_query->the_post(); 
              $manufacturing_description = get_field("manufacturing_description");
              $card_image = get_field("card_image");
              $manufacturing_type = get_field("manufacturing_type");
              $man_btn = get_field("man_btn"); // Fetch button text
              ?>
              <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" 
                id="nav-manufacturing<?php echo $tab_index; ?>" 
                role="tabpanel" 
                aria-labelledby="nav-manufacturing<?php echo $tab_index; ?>-tab">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <h4 class="py-4"><?php echo $manufacturing_type; ?></h4>
                    <p><?php echo $manufacturing_description; ?></p>
                    
                    <!-- Button Below Text -->
                    <button type="button" class="btn btn-lg btn-primary man-btn" data-toggle="modal" data-target="#bookAppointmentModal">
                      <?php echo $man_btn ? $man_btn : ''; ?>
                    </button>
                  </div>
                  <div class="col-md-6" style="padding-top: 3rem;">
                    <img src="<?php echo $card_image["sizes"]["large"]; ?>" class="d-block w-100 manufacturing-img" alt="<?php echo $manufacturing_type; ?>">
                  </div>
                </div>
              </div>
              <?php 
              $isFirst = false; 
              $tab_index++; 
            endwhile; 
            wp_reset_postdata(); 
          endif; 
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="bookAppointmentModal" tabindex="-1" role="dialog" 
    aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="bookAppointmentModalLabel"><?php echo $title_contact_modal; ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contact Form -->
          <?php echo do_shortcode('[contact-form-7 id="e0e33fa" title="Contact me form"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
