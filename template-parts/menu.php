<div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" 
  id="nav-menu<?php echo $tab_index; ?>" 
  role="tabpanel" 
  aria-labelledby="nav-menu<?php echo $tab_index; ?>-tab">
  <div class="row">
    <div class="col-lg-8">
      <div class="menu-items">
        <ul class="list-unstyled">
          <?php 
          for ($i = 1; $i <= 10; $i++):
            $dish_name = get_field("dish_{$i}_name");
            $dish_description = get_field("dish_{$i}_description");
            $dish_price = get_field("dish_{$i}_price");

            if (!$dish_name) continue; // Skip empty dishes
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
    </div>
    <div class="col-lg-4 text-center d-none d-lg-block">
      <?php if ($card_image): ?>
        <img src="<?php echo esc_url($card_image['sizes']['large']); ?>" 
             alt="<?php echo esc_attr($menu_type); ?>" 
             class="menu-photo img-fluid">
      <?php endif; ?>
    </div>
  </div>
</div>
