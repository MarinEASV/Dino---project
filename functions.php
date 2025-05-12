<?php
add_action( 'init', function() {
    if ( function_exists( 'pll_register_string' ) ) {

        pll_register_string( 'Cursor open label',  'Click to see more' );
        pll_register_string( 'Cursor close label', 'Close' );
        pll_register_string( 'Menu link',    'Menu' );
        pll_register_string( 'About link',   'Om os' );
        pll_register_string( 'Contact link', 'Kontakt' );
        pll_register_string( 'Reserve btn',  'Reserve' );
        pll_register_string( 'Phone', '📞 +45 75 16 64 64' );
        pll_register_string( 'Reservation info', 'Reservationsinfo' );
        pll_register_string( 'Reservation info text', 'Vi håndterer kun bordreservationer og madbestillinger via telefonopkald.' );
        pll_register_string( 'Taste of Fanø', 'D I N   S M A G   A F   F A N Ø' );
        pll_register_string( 'Authentic Balkan & Danish Cuisine', 'Autentisk Balkan & Dansk Køkken' );
        pll_register_string( 'Our menu', 'Vores menu' );
        pll_register_string( 'Menu description', 'Traditionelle danske retter & Balkan favoritter' );
        pll_register_string( 'Review', 'Hvad vores kunder siger' );
        pll_register_string( 'Video', 'Tag et kig og find ud af mere i vores video' );
        pll_register_string( 'Opening hours', 'Åbningstider' );
        pll_register_string( 'Links', 'Praktisk' );
        pll_register_string( 'Smiley certificate', 'Smiley certificate' );
        pll_register_string( 'Terms of use', 'Terms of use' );
        pll_register_string( 'Privatlivspolitik', 'Privatlivspolitik' );
        pll_register_string( 'Copyright', 'Alle rettigheder forbeholdes © 2025 Dino restaurant' );
         }
    });


function dino_theme_enqueue_assets() {
    // Styles
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marck+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false);
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Scripts
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/script.js', array(), null, true);

    // Inline script to initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');
}
add_action('wp_enqueue_scripts', 'dino_theme_enqueue_assets');


// Optional: Disable Gutenberg
function dino_theme_remove_gutenberg() {
    remove_post_type_support("post", "editor");
    remove_post_type_support("page", "editor");
}
add_action("init", "dino_theme_remove_gutenberg");
add_filter("use_block_editor_for_post", "__return_false");
add_filter("use_block_editor_for_page", "__return_false");
