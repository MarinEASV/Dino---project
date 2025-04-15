<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden" id="services">
    <div class="container">
      <div class="text-center mx-auto" data-aos="fade-down" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">MENU</h1>
      </div>

      <div class="container my-5">
        <!-- Tab Buttons -->
        <nav>
          <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
            <?php
            $isFirst = true;
            $tab_index = 1;
            $menu_query = new WP_Query(array('post_type' => 'menu', 'posts_per_page' => -1));
            if ($menu_query->have_posts()):
              while ($menu_query->have_posts()): $menu_query->the_post();
                $button_text = get_field("button_text");
            ?>
              <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                id="nav-menu<?php echo $tab_index; ?>-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-menu<?php echo $tab_index; ?>"
                type="button"
                role="tab"
                aria-controls="nav-menu<?php echo $tab_index; ?>"
                aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
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
          $menu_query = new WP_Query(array('post_type' => 'menu', 'posts_per_page' => -1));
          if ($menu_query->have_posts()):
            while ($menu_query->have_posts()): $menu_query->the_post();
            $card_image_1 = get_field("card_image_1");
            $card_image_2 = get_field("card_image_2");
            $dishes_group = get_field("dish_1_group");
          ?>
          <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" 
            id="nav-menu<?php echo $tab_index; ?>" 
            role="tabpanel" 
            aria-labelledby="nav-menu<?php echo $tab_index; ?>-tab">
            <div class="row">
              <div class="col-lg-8">
                <div class="menu-items">
                  <ul class="list-unstyled">
                    <?php 
                    for ($i = 1; $i <= 15; $i++):
                      $name = $dishes_group["dish_{$i}_name"];
                      $desc = $dishes_group["dish_{$i}_description"];
                      $price = $dishes_group["dish_{$i}_price"];

                      if (!$name) continue;
                    ?>
                    <li class="d-flex justify-content-between align-items-start mb-4 menu-item">
                      <div class="menu-text">
                        <h5 class="menu-dish"><?php echo esc_html($name); ?></h5>
                        <p class="menu-desc mb-1"><?php echo esc_html($desc); ?></p>
                      </div>
                      <div class="menu-price text-end fw-bold pe-lg-5"><?php echo esc_html($price); ?>,-</div>
                    </li>
                    <?php endfor; ?>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 text-center d-none d-lg-block">
              <div class="d-flex flex-column align-items-center gap-4 ps-4">
                <?php if ($card_image_1): ?>
                  <img src="<?php echo esc_url($card_image_1['sizes']['medium_large']); ?>" 
                    alt="Menu Image 1" 
                    class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
                <?php endif; ?>
                <?php if ($card_image_2): ?>
                  <img src="<?php echo esc_url($card_image_2['sizes']['medium_large']); ?>" 
                    alt="Menu Image 2" 
                    class="img-fluid rounded shadow-sm" style="max-width: 100%; height: auto;">
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
</section>
