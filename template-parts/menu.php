<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden" id="services">
    <div class="container">
      <div class="text-center mx-auto" data-aos="fade-down" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">MENU</h1>
      </div>

      <!-- MENU Tab Section -->
      <div class="container my-5">
        <nav>
          <!-- Tab Buttons -->
          <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
            <?php
            $isFirst = true;
            $tab_index = 1;
            $menu_query = new WP_Query([
              'post_type' => 'menu',
              'posts_per_page' => -1
            ]);

            if ($menu_query->have_posts()):
              while ($menu_query->have_posts()): $menu_query->the_post();
                $button_text = get_field("button_text");
            ?>
              <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>" 
                id="nav-menu<?php echo $tab_index; ?>-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#nav-menu<?php echo $tab_index; ?>" 
                type="button" 
                aria-controls="nav-menu<?php echo $tab_index; ?>" 
                aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>" 
                role="tab">
                <?php echo esc_html($button_text); ?>
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
          $tab_index = 1;
          $menu_query = new WP_Query([
            'post_type' => 'menu',
            'posts_per_page' => -1
          ]);

          if ($menu_query->have_posts()):
            while ($menu_query->have_posts()): $menu_query->the_post();
              $menu_description = get_field("menu_description");
              $card_image = get_field("card_image");
              $menu_type = get_field("menu_type");
              $man_btn = get_field("man_btn");
          ?>
            <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" 
              id="nav-menu<?php echo $tab_index; ?>" 
              role="tabpanel" 
              aria-labelledby="nav-menu<?php echo $tab_index; ?>-tab">
              
              <div class="row">
                <!-- Left Column: Dishes -->
                <div class="col-lg-8">
                  <h4 class="py-4"><?php echo esc_html($menu_type); ?></h4>
                  <p><?php echo esc_html($menu_description); ?></p>

                  <!-- Dish Loop -->
                  <div class="menu-items">
                    <ul class="list-unstyled">
                      <?php 
                      for ($i = 1; $i <= 10; $i++):
                        $dish_name = get_field("dish_{$i}_name");
                        $dish_description = get_field("dish_{$i}_description");
                        $dish_price = get_field("dish_{$i}_price");

                        if (!$dish_name) continue;
                      ?>
                      <li class="d-flex justify-content-between align-items-start mb-4 menu-item">
                        <div class="menu-text">
                          <h5 class="menu-dish"><?php echo esc_html($dish_name); ?></h5>
                          <p class="menu-desc mb-1"><?php echo esc_html($dish_description); ?></p>
                        </div>
                        <div class="menu-price text-end"><?php echo esc_html($dish_price); ?>,-</div>
                      </li>
                      <?php endfor; ?>
                    </ul>
                  </div>

                  <!-- Button -->
                  <?php if ($man_btn): ?>
                    <button type="button" class="btn btn-lg man-btn mt-4" data-toggle="modal" data-target="#bookAppointmentModal">
                      <?php echo esc_html($man_btn); ?>
                    </button>
                  <?php endif; ?>
                </div>

                <!-- Right Column: Image -->
                <div class="col-lg-4 text-center d-none d-lg-block">
                  <?php if ($card_image): ?>
                    <img src="<?php echo esc_url($card_image['sizes']['large']); ?>" 
                        alt="<?php echo esc_attr($menu_type); ?>" 
                        class="menu-photo img-fluid">
                  <?php endif; ?>
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
          <h4 class="modal-title" id="bookAppointmentModalLabel"><?php echo esc_html($title_contact_modal); ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo do_shortcode('[contact-form-7 id="e0e33fa" title="Contact me form"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
