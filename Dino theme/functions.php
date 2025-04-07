<?php
function dino_theme_enqueue_assets() {
    // === Styles ===
    wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css");
    wp_enqueue_style("fontawesome", "https://use.fontawesome.com/releases/v5.15.4/css/all.css");
    wp_enqueue_style("google-fonts", "https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    wp_enqueue_style("aos", "https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css");
    wp_enqueue_style("dino-style", get_template_directory_uri() . "/style.css");

    // === Scripts ===
    wp_enqueue_script("jquery");
    wp_enqueue_script("popper", "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js", array(), null, true);
    wp_enqueue_script("bootstrap-bundle", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js", array("jquery", "popper"), null, true);
    wp_enqueue_script("aos", "https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js", array(), null, true);
    wp_add_inline_script("aos", "AOS.init();");

    wp_enqueue_script("wow", "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js", array(), null, true);
    wp_add_inline_script("wow", "new WOW().init();");

    wp_enqueue_script("dino-custom", get_template_directory_uri() . "/js/script.js", array("jquery"), null, true);
}
add_action("wp_enqueue_scripts", "dino_theme_enqueue_assets");


// === Disable Gutenberg Editor ===
function dino_theme_disable_gutenberg() {
    remove_post_type_support("post", "editor");
    remove_post_type_support("page", "editor");
}
add_action("init", "dino_theme_disable_gutenberg");

add_filter("use_block_editor_for_post", "__return_false");
add_filter("use_block_editor_for_page", "__return_false");


// === Counter-Up & Waypoints Scripts ===
function dino_theme_enqueue_counterup() {
    wp_enqueue_script('waypoints', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', array('jquery'), null, true);
    wp_enqueue_script('counter-up', get_template_directory_uri() . '/js/counter-up.js', array('jquery', 'waypoints'), null, true);
}
add_action('wp_enqueue_scripts', 'dino_theme_enqueue_counterup');


// === Customizer Settings: Facts Section ===
function dino_customize_register_facts($wp_customize) {
    $wp_customize->add_section('facts_section', array(
        'title' => __('Facts Section', 'dino-theme'),
        'priority' => 30,
    ));

    $facts = [
        'facts_experience' => __('Years of Experience', 'dino-theme'),
        'facts_team_members' => __('Team Members', 'dino-theme'),
        'facts_happy_clients' => __('Happy Clients', 'dino-theme'),
        'facts_projects_done' => __('Projects Done', 'dino-theme')
    ];

    foreach ($facts as $key => $label) {
        $wp_customize->add_setting($key, array('default' => 0));
        $wp_customize->add_control($key, array(
            'label' => $label,
            'section' => 'facts_section',
            'type' => 'number',
        ));
    }
}
add_action('customize_register', 'dino_customize_register_facts');
