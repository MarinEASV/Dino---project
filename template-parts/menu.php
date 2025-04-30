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
      $isFirst = true;
      foreach ($menu_tabs as $index => $tab): ?>
        <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>"
                id="nav-menu<?php echo $index+1; ?>-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-menu<?php echo $index+1; ?>"
                type="button"
                role="tab"
                aria-controls="nav-menu<?php echo $index+1; ?>"
                aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
          <?php echo esc_html($tab['button_text']); ?>
        </button>
      <?php
        $isFirst = false;
      endforeach; ?>
    </div>
  </nav>
</div>

<!-- Accordion (mobile only) -->
<div class="accordion d-lg-none mb-5" id="menuAccordion">
  <?php foreach ($menu_tabs as $index => $tab): ?>
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading<?php echo $index+1; ?>">
        <button class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse<?php echo $index+1; ?>"
                aria-expanded="false"
                aria-controls="collapse<?php echo $index+1; ?>">
          <?php echo esc_html($tab['button_text']); ?>
        </button>
      </h2>
      <div id="collapse<?php echo $index+1; ?>"
           class="accordion-collapse collapse"
           data-bs-parent="#menuAccordion"
           aria-labelledby="heading<?php echo $index+1; ?>">
        <div class="accordion-body p-0">
          <?php // Re‐use your tab‐pane content here. You can even extract it into a small PHP partial to avoid duplication. ?>
          <div class="menu-items pt-3">
            <h4><?php echo esc_html($tab['menu_type']); ?></h4>
            <p><?php echo esc_html($tab['menu_description']); ?></p>
            <ul class="list-unstyled">
              <?php 
              for ($i = 1; $i <= 15; $i++):
                $name  = $tab['dishes_group']["dish_{$i}_name"];
                $desc  = $tab['dishes_group']["dish_{$i}_description"];
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
      </div>
    </div>
  <?php endforeach; ?>
</div>

</section>
