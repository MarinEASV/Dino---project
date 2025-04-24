<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">MENU</h1>
      </div>

      <div class="container my-5">
        <!-- Tab Buttons -->
        <nav>
          <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
            <?php
            $menu_tabs = array();
            $menu_query = new WP_Query(array('post_type' => 'menu', 'posts_per_page' => -1));
            if ($menu_query->have_posts()):
              $tab_index = 1;
              while ($menu_query->have_posts()): $menu_query->the_post();
                $menu_tabs[] = array(
                  'button_text' => get_field("button_text"),
                  'menu_description' => get_field("menu_description"),
                  'menu_type' => get_field("menu_type"),
                  'card_image_1' => get_field("card_image_1"),
                  'card_image_2' => get_field("card_image_2"),
                  'dishes_group' => get_field("dish_1_group")
                );
                $tab_index++;
              endwhile;
              wp_reset_postdata();
            endif;

            $isFirst = true;
            foreach ($menu_tabs as $index => $tab):
            ?>
              <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                      id="nav-menu<?php echo $index + 1; ?>-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#nav-menu<?php echo $index + 1; ?>"
                      type="button"
                      role="tab"
                      aria-controls="nav-menu<?php echo $index + 1; ?>"
                      aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
                <?php echo esc_html($tab['button_text']); ?>
              </button>
            <?php
              $isFirst = false;
            endforeach;
            ?>
          </div>
        </nav>

        <!-- Tab Content -->
        <div class="tab-content" id="nav-tabContent" data-aos="fade-in">
          <?php
          $isFirst = true;
          foreach ($menu_tabs as $index => $tab):
          ?>
            <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>"
                 id="nav-menu<?php echo $index + 1; ?>"
                 role="tabpanel"
                 aria-labelledby="nav-menu<?php echo $index + 1; ?>-tab">
              <div class="row">
                <div class="col-lg-8">
                  <div class="menu-items">
                    <h4 class="py-3"><?php echo esc_html($tab['menu_type']); ?></h4>
                    <p><?php echo esc_html($tab['menu_description']); ?></p>

                    <ul class="list-unstyled">
                      <?php 
                      for ($i = 1; $i <= 15; $i++):
                        $name = $tab['dishes_group']["dish_{$i}_name"];
                        $desc = $tab['dishes_group']["dish_{$i}_description"];
                        $price = $tab['dishes_group']["dish_{$i}_price"];
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
                  <?php if ($tab['card_image_1']): ?>
                    <div class="menu-photo-wrapper menu-photo-rotate-left mb-4">
                      <img src="<?php echo esc_url($tab['card_image_1']['sizes']['medium_large']); ?>" 
                           alt="Image 1 of <?php echo esc_attr($tab['menu_type']); ?>" 
                           class="menu-photo img-fluid">
                    </div>
                  <?php endif; ?>

                  <?php if ($tab['card_image_2']): ?>
                    <div class="menu-photo-wrapper menu-photo-rotate-right">
                      <img src="<?php echo esc_url($tab['card_image_2']['sizes']['medium_large']); ?>" 
                           alt="Image 2 of <?php echo esc_attr($tab['menu_type']); ?>" 
                           class="menu-photo img-fluid">
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php
            $isFirst = false;
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
