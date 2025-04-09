<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden" id="services">
    <div class="container">
            <div class="text-center mx-auto" data-aos="fade-down" data-aos-delay="0" style="max-width: 600px; padding-top: 5rem; padding-bottom: px;">
                <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">MENU</h1>
            </div>
      <!-- MENU Tab Section -->
      <div class="container my-5">
        <nav>
          <!-- Tab Buttons -->
          <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
            <?php
            $isFirst = true;
            $menu_query = new WP_Query(array(
              'post_type' => 'menu',
              'posts_per_page' => -1,
            ));

            if ($menu_query->have_posts()): 
              $tab_index = 1;
              while ($menu_query->have_posts()): $menu_query->the_post(); 
                $button_text = get_field("button_text"); ?>
                <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>" 
                  id="nav-menu<?php echo $tab_index; ?>-tab" 
                  data-bs-toggle="tab" 
                  data-bs-target="#nav-menu<?php echo $tab_index; ?>" 
                  type="button" 
                  aria-controls="nav-menu<?php echo $tab_index; ?>" 
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
          $menu_query = new WP_Query(array(
            'post_type' => 'menu',
            'posts_per_page' => -1,
          ));

          if ($menu_query->have_posts()): 
            $tab_index = 1;
            while ($menu_query->have_posts()): $menu_query->the_post(); 
              $menu_description = get_field("menu_description");
              $card_image = get_field("card_image");
              $menu_type = get_field("menu_type");
              $man_btn = get_field("man_btn"); // Fetch button text
              ?>
              <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" 
                id="nav-menu<?php echo $tab_index; ?>" 
                role="tabpanel" 
                aria-labelledby="nav-menu<?php echo $tab_index; ?>-tab">
                <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <h4 class="py-4"><?php echo $menu_type; ?></h4>
                    <p><?php echo $menu_description; ?></p>
                    
                    <!-- Button Below Text -->
                    <button type="button" class="btn btn-lg man-btn" data-toggle="modal" data-target="#bookAppointmentModal">
                      <?php echo $man_btn ? $man_btn : ''; ?>
                    </button>
                  </div>
                  <div class="col-md-6" style="padding-top: 3rem;">
                    <img src="<?php echo $card_image["sizes"]["large"]; ?>" class="d-block w-100 menu-img" alt="<?php echo $menu_type; ?>">
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
