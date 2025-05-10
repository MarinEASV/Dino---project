<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden">
    <div class="container">
      <div class="text-start" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 fw-medium" style="color: var(--c-dark);">Vores menu</h1>
        <p class="lead mb-5" style="font-family: var(--p-font);">Traditionelle danske retter &amp; Balkan favoritter</p>
      </div>

      <div class="container my-5">
        <?php
        // build menu array once
        $menu_tabs = [];
        $menu_q = new WP_Query([
          'post_type'      => 'menu',
          'posts_per_page' => -1,
          'page-attributes'
        ]);
        if ( $menu_q->have_posts() ) {
          while ( $menu_q->have_posts() ) {
            $menu_q->the_post();
            $menu_tabs[] = [
              'button_text'      => get_field('button_text'),
              'menu_description' => get_field('menu_description'),
              'menu_type'        => get_field('menu_type'),
              'card_image_1'     => get_field('card_image_1'),
              'card_image_2'     => get_field('card_image_2'),
              'dishes_group'     => get_field('dish_1_group'),
            ];
          }
          wp_reset_postdata();
        }
        ?>

        <?php if ( ! empty( $menu_tabs ) ): ?>

          <!-- DESKTOP TABS (hidden on mobile) -->
          <div class="d-none d-md-block">
            <nav>
              <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
                <?php $first = true; ?>
                <?php foreach ( $menu_tabs as $i => $tab ): ?>
                  <button
                    class="nav-link <?php echo $first ? 'active' : ''; ?>"
                    id="nav-menu<?php echo $i+1; ?>-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#nav-menu<?php echo $i+1; ?>"
                    type="button"
                    role="tab"
                    aria-controls="nav-menu<?php echo $i+1; ?>"
                    aria-selected="<?php echo $first ? 'true' : 'false'; ?>"
                  >
                    <?php echo esc_html( $tab['button_text'] ); ?>
                  </button>
                  <?php $first = false; ?>
                <?php endforeach; ?>
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent" data-aos="fade-in">
              <?php $first = true; ?>
              <?php foreach ( $menu_tabs as $i => $tab ): ?>
                <div
                  class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>"
                  id="nav-menu<?php echo $i+1; ?>"
                  role="tabpanel"
                  aria-labelledby="nav-menu<?php echo $i+1; ?>-tab"
                >
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="menu-items">
                        <h4 class="py-3"><?php echo esc_html( $tab['menu_type'] ); ?></h4>
                        <p><?php echo esc_html( $tab['menu_description'] ); ?></p>
                        <ul class="list-unstyled">
                          <?php for ( $j = 1; $j <= 15; $j++ ):
                            $name  = $tab['dishes_group']["dish_{$j}_name"];
                            if ( ! $name ) continue;
                            $desc  = $tab['dishes_group']["dish_{$j}_description"];
                            $price = $tab['dishes_group']["dish_{$j}_price"];
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
                <?php $first = false; ?>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- /DESKTOP -->

          <!-- MOBILE ACCORDION (hidden on md+) -->
          <div class="d-block d-md-none">
            <div class="accordion" id="mobileMenuAccordion">
              <?php foreach ( $menu_tabs as $i => $tab ):
                $head = "heading-{$i}";
                $col  = "collapse-{$i}";
                $open = $i === 0;
              ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="<?php echo $head; ?>">
                    <button
                      class="accordion-button <?php echo $open ? '' : 'collapsed'; ?>"
                      type="button"
                      aria-expanded="<?php echo $open ? 'true' : 'false'; ?>"
                      aria-controls="<?php echo $col; ?>"
                      data-target="#<?php echo $col; ?>"
                    >
                      <?php echo esc_html( $tab['button_text'] ); ?>
                    </button>
                  </h2>
                  <div
                    id="<?php echo $col; ?>"
                    class="accordion-body"
                    style="max-height: <?php echo $open ? 'none' : '0'; ?>; overflow:hidden;"
                  >
                    <div class="row">
                      <div class="col-12">
                        <div class="menu-items">
                          <h4 class="py-3"><?php echo esc_html( $tab['menu_type'] ); ?></h4>
                          <p><?php echo esc_html( $tab['menu_description'] ); ?></p>
                          <ul class="list-unstyled">
                            <?php for ( $j = 1; $j <= 15; $j++ ):
                              $name  = $tab['dishes_group']["dish_{$j}_name"];
                              if ( ! $name ) continue;
                              $desc  = $tab['dishes_group']["dish_{$j}_description"];
                              $price = $tab['dishes_group']["dish_{$j}_price"];
                            ?>
                              <li class="d-flex justify-content-between align-items-start mb-4 menu-item">
                                <div class="menu-text">
                                  <h5 class="menu-dish"><?php echo esc_html( $name ); ?></h5>
                                  <p class="menu-desc mb-1"><?php echo esc_html( $desc ); ?></p>
                                </div>
                                <div class="menu-price text-end fw-bold"><?php echo esc_html( $price ); ?>,-</div>
                              </li>
                            <?php endfor; ?>
                          </ul>
                        </div>
                      </div>
                      <?php if ( $tab['card_image_1'] || $tab['card_image_2'] ): ?>
                        <div class="col-12 mt-3 text-center">
                          <?php if ( $tab['card_image_1'] ): ?>
                            <div class="menu-photo-wrapper mb-3">
                              <img src="<?php echo esc_url( $tab['card_image_1']['sizes']['medium_large'] ); ?>"
                                   class="menu-photo img-fluid" alt="">
                            </div>
                          <?php endif; ?>
                          <?php if ( $tab['card_image_2'] ): ?>
                            <div class="menu-photo-wrapper">
                              <img src="<?php echo esc_url( $tab['card_image_2']['sizes']['medium_large'] ); ?>"
                                   class="menu-photo img-fluid" alt="">
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
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
