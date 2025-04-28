<?php
/**
 * Template part: Bottles Section
 */

// helper to render one side
function render_bottle_side( $side ) {
    // prefix = "left" or "right"
    $img        = get_field("{$side}_bottle_img");
    $title      = get_field("{$side}_bottle_title");
    $description= get_field("{$side}_bottle_description");
    $features   = get_field("{$side}_bottle_features"); // repeater
    $buy_link   = get_field("{$side}_bottle_link");     // URL field
    $buy_label  = get_field("{$side}_bottle_link_label") ?: 'Buy Now';
    $price      = get_field("{$side}_bottle_price");    // text

    // bottle image container
    ?>
    <div class="bottle <?php echo esc_attr($side); ?>-bottle" data-side="<?php echo esc_attr($side); ?>">
      <img src="<?php echo esc_url( $img['url'] ); ?>"
           alt="<?php echo esc_attr( $img['alt'] ); ?>">
    </div>

    <div class="bottle-text <?php echo esc_attr($side); ?>-text">
      <?php if ( $title ): ?>
        <h2><?php echo esc_html( $title ); ?></h2>
      <?php endif; ?>

      <?php if ( $description ): ?>
        <p><?php echo esc_html( $description ); ?></p>
      <?php endif; ?>

      <?php if ( $features ): ?>
        <ul class="bottle-features">
          <?php foreach ( $features as $feat ): 
            // assume 'icon' = CSS class or SVG markup, 'text' = label
            $icon = $feat['icon'];
            $txt  = $feat['text'];
          ?>
            <li>
              <?php if ( $icon ): ?>
                <span class="feature-icon"><?php echo $icon; ?></span>
              <?php endif; ?>
              <span class="feature-text"><?php echo esc_html( $txt ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if ( $price ): ?>
        <div class="bottle-price"><?php echo esc_html( $price ); ?></div>
      <?php endif; ?>

      <?php if ( $buy_link ): ?>
        <a class="bottle-buy-button"
           href="<?php echo esc_url( $buy_link ); ?>"
           target="_blank"
           rel="noopener">
          <?php echo esc_html( $buy_label ); ?>
        </a>
      <?php endif; ?>
    </div>
    <?php
}
?>

<section class="bottle-section">
  <div class="bottle-container" data-aos="zoom-in">
    <?php
      render_bottle_side( 'left' );
      render_bottle_side( 'right' );
    ?>
  </div>
</section>

<div class="custom-cursor">
  <span class="cursor-text">Click to see more</span>
</div>
