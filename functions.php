<?php
function dino_theme() {
    // Enqueue Styles
    wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css");
    wp_enqueue_style("theme-style", get_template_directory_uri() . "/style.css");
    wp_enqueue_style("icons", "https://use.fontawesome.com/releases/v5.15.4/css/all.css");
    wp_enqueue_style("https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marck+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    // Enqueue Scripts
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.6.0.min.js", array(), null, true);
    wp_enqueue_script("popper", "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js", array(), null, true);
    wp_enqueue_script("modal", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", array(), null, true);
    wp_enqueue_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js", array("jquery", "popper"), null, true);

    // Enqueue AOS Library
    wp_enqueue_style("aos-css", "https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css");
    wp_enqueue_script("aos-js", "https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js", array(), null, true);

    // Initialize AOS
    wp_add_inline_script("aos-js", "AOS.init();");
  

    
    
    wp_enqueue_script("local-script", get_template_directory_uri() . "/script.js", array("jquery"), null, true);

}
add_action("wp_enqueue_scripts", "dino_theme");

 function enqueue_aos_scripts() {
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4');
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts'); 


function dino_theme_remove_gutenberg() {
    remove_post_type_support("post", "editor");
    remove_post_type_support("page", "editor");
}
add_action("init", "dino_theme_remove_gutenberg");

add_filter("use_block_editor_for_post", "__return_false");
add_filter("use_block_editor_for_page", "__return_false");





function custom_theme_scripts() {
    // Enqueue Bootstrap (if needed)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Enqueue WOW.js
    wp_enqueue_script('wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), null, true);
    wp_add_inline_script('wow-js', 'new WOW().init();');

    // Enqueue Custom Script
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');
