<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden">
    <div class="container">
      <div class="text-start" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark);">Our Menu</h1>
        <p class="lead mb-5" style="font-family: var(--p-font);">Traditional Danish Dishes &amp; Balkan Favorites</p>
      </div>

      <div class="container my-5">

        <?php if ( ! empty( $menu_tabs ) ): ?>

          <!-- DESKTOP: Tabs (md and up) -->
          <div class="d-none d-md-block">
            <nav>
              <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
                <?php
                $isFirst = true;
                foreach ( $menu_tabs as $index => $tab ):
                ?>
                  <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                          id="nav-menu<?php echo $index + 1; ?>-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#nav-menu<?php echo $index + 1; ?>"
                          type="button"
                          role="tab"
                          aria-controls="nav-menu<?php echo $index + 1; ?>"
                          aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
                    <?php echo esc_html( $tab['button_text'] ); ?>
                  </button>
                <?php
                  $isFirst = false;
                endforeach;
                ?>
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent" data-aos="fade-in">
              <?php
              $isFirst = true;
              foreach ( $menu_tabs as $index => $tab ):
              ?>
                <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>"
                     id="nav-menu<?php echo $index + 1; ?>"
                     role="tabpanel"
                     aria-labelledby="nav-menu<?php echo $index + 1; ?>-tab">
                  <!-- your existing row/columns/menu-items markup here -->
                </div>
              <?php
                $isFirst = false;
              endforeach;
              ?>
            </div>
          </div>
          <!-- /DESKTOP -->

          <!-- MOBILE: Accordion (smaller than md) -->
          <div class="d-block d-md-none">
            <div class="accordion" id="menuAccordion">
              <?php foreach ( $menu_tabs as $index => $tab ):
                $heading_id  = "heading-{$index}";
                $collapse_id = "collapse-{$index}";
                $is_first    = $index === 0;
              ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="<?php echo $heading_id; ?>">
                    <button
                      class="accordion-button <?php echo $is_first ? '' : 'collapsed'; ?>"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#<?php echo $collapse_id; ?>"
                      aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                      aria-controls="<?php echo $collapse_id; ?>"
                    >
                      <?php echo esc_html( $tab['button_text'] ); ?>
                    </button>
                  </h2>

                  <div
                    id="<?php echo $collapse_id; ?>"
                    class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>"
                    aria-labelledby="<?php echo $heading_id; ?>"
                    data-bs-parent="#menuAccordion"
                  >
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="menu-items">
                            <h4 class="py-3"><?php echo esc_html( $tab['menu_type'] ); ?></h4>
                            <p><?php echo esc_html( $tab['menu_description'] ); ?></p>
                            <ul class="list-unstyled">
                              <?php 
                              for ( $i = 1; $i <= 15; $i++ ):
                                $name  = $tab['dishes_group']["dish_{$i}_name"];
                                $desc  = $tab['dishes_group']["dish_{$i}_description"];
                                $price = $tab['dishes_group']["dish_{$i}_price"];
                                if ( ! $name ) continue;
                              ?>
                                <li class="d-flex justify-content-between align-items-start mb-4 menu-item">
                                  <div class="menu-text">
                                    <h5 class="menu-dish"><?php echo esc_html( $name ); ?></h5>
                                    <p class="menu-desc mb-1"><?php echo esc_html( $desc ); ?></p>
                                  </div>
                                  <div class="menu-price text-end fw-bold pe-lg-5"><?php echo esc_html( $price ); ?>,-</div>
                                </li>
                              <?php endfor; ?>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-4 text-center d-none d-lg-block">
                          <?php if ( $tab['card_image_1'] ): ?>
                            <div class="menu-photo-wrapper menu-photo-rotate-left mb-4">
                              <img src="<?php echo esc_url( $tab['card_image_1']['sizes']['medium_large'] ); ?>"
                                   alt="" class="menu-photo img-fluid">
                            </div>
                          <?php endif; ?>
                          <?php if ( $tab['card_image_2'] ): ?>
                            <div class="menu-photo-wrapper menu-photo-rotate-right">
                              <img src="<?php echo esc_url( $tab['card_image_2']['sizes']['medium_large'] ); ?>"
                                   alt="" class="menu-photo img-fluid">
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- /MOBILE -->

        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
