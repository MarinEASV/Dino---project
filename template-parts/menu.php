<section id="menu">
  <div class="py-vh-5 w-100 overflow-hidden">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 600px; padding-top: 5rem;">
        <h1 class="display-5 mb-5 fw-medium" style="color: var(--c-dark); font-family: var(--h-font);">Our menu</h1>
        <p class="lead mb-5" style="font-family: var(--p-font); justify-content: left;
      ">Traditional Danish Dishes &amp; Balkan Favorites</p>

      </div>

      <div class="container my-5">
        <!-- Tab Buttons (desktop only) -->
<div class="d-none d-lg-block">
  <nav>
    <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
    <?php
// template-parts/menu.php

// 1) Build menu tabs array
$menu_tabs = [];
$menu_query = new WP_Query([
    'post_type'      => 'menu',
    'posts_per_page' => -1,
]);

if ( $menu_query->have_posts() ) {
    while ( $menu_query->have_posts() ) {
        $menu_query->the_post();

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

<section id="menu">
    <div class="py-vh-5 w-100 overflow-hidden">
        <div class="container">

            <!-- Header + Subtitle -->
            <div class="text-center mx-auto" style="max-width: 600px; padding-top: 5rem;">
                <h1 class="display-5 mb-2 fw-medium" style="color: var(--c-dark);">Our menu</h1>
                <p class="lead mb-5">Traditional Danish Dishes &amp; Balkan Favorites</p>
            </div>

            <div class="container my-5">

                <!-- Desktop Tabs -->
                <div class="d-none d-lg-block">
                    <nav>
                        <div class="nav nav-tabs mb-5 justify-content-center" id="nav-tab" role="tablist">
                            <?php if ( ! empty( $menu_tabs ) && is_array( $menu_tabs ) ): ?>
                                <?php $isFirst = true; ?>
                                <?php foreach ( $menu_tabs as $index => $tab ): ?>
                                    <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                                            id="nav-menu<?php echo $index+1; ?>-tab"
                                            data-bs-toggle="tab"
                                            data-bs-target="#nav-menu<?php echo $index+1; ?>"
                                            type="button"
                                            role="tab"
                                            aria-controls="nav-menu<?php echo $index+1; ?>"
                                            aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
                                        <?php echo esc_html( $tab['button_text'] ); ?>
                                    </button>
                                    <?php $isFirst = false; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>

                <!-- Mobile Accordion -->
                <div class="accordion d-lg-none mb-5" id="menuAccordion">
                    <?php if ( ! empty( $menu_tabs ) && is_array( $menu_tabs ) ): ?>
                        <?php foreach ( $menu_tabs as $index => $tab ): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $index+1; ?>">
                                    <button class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo $index+1; ?>"
                                            aria-expanded="false"
                                            aria-controls="collapse<?php echo $index+1; ?>">
                                        <?php echo esc_html( $tab['button_text'] ); ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $index+1; ?>"
                                     class="accordion-collapse collapse"
                                     data-bs-parent="#menuAccordion"
                                     aria-labelledby="heading<?php echo $index+1; ?>">
                                    <div class="accordion-body p-0">
                                        <div class="menu-items pt-3">
                                            <h4><?php echo esc_html( $tab['menu_type'] ); ?></h4>
                                            <p><?php echo esc_html( $tab['menu_description'] ); ?></p>
                                            <ul class="list-unstyled">
                                                <?php for ( $i = 1; $i <= 15; $i++ ): 
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
                                                        <div class="menu-price text-end fw-bold pe-lg-5">
                                                            <?php echo esc_html( $price ); ?>,-
                                                        </div>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Desktop Tab Content -->
                <?php if ( ! empty( $menu_tabs ) && is_array( $menu_tabs ) ): ?>
                    <div class="tab-content d-none d-lg-block" id="nav-tabContent" data-aos="fade-in">
                        <?php $isFirst = true; ?>
                        <?php foreach ( $menu_tabs as $index => $tab ): ?>
                            <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>"
                                 id="nav-menu<?php echo $index+1; ?>"
                                 role="tabpanel"
                                 aria-labelledby="nav-menu<?php echo $index+1; ?>-tab">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="menu-items">
                                            <h4 class="py-3"><?php echo esc_html( $tab['menu_type'] ); ?></h4>
                                            <p><?php echo esc_html( $tab['menu_description'] ); ?></p>
                                            <ul class="list-unstyled">
                                                <?php for ( $i = 1; $i <= 15; $i++ ): 
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
                                                        <div class="menu-price text-end fw-bold pe-lg-5">
                                                            <?php echo esc_html( $price ); ?>,-
                                                        </div>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-center d-none d-lg-block">
                                        <?php if ( $tab['card_image_1'] ): ?>
                                            <div class="menu-photo-wrapper menu-photo-rotate-left mb-4">
                                                <img src="<?php echo esc_url( $tab['card_image_1']['sizes']['medium_large'] ); ?>"
                                                     alt="Image 1 of <?php echo esc_attr( $tab['menu_type'] ); ?>" class="menu-photo img-fluid">
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( $tab['card_image_2'] ): ?>
                                            <div class="menu-photo-wrapper menu-photo-rotate-right">
                                                <img src="<?php echo esc_url( $tab['card_image_2']['sizes']['medium_large'] ); ?>"
                                                     alt="Image 2 of <?php echo esc_attr( $tab['menu_type'] ); ?>" class="menu-photo img-fluid">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $isFirst = false; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
