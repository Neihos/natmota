<?php

//Déclarer les styles du thème
function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/theme.css'));
}

//Déclarer les fichiers JS
function natmota_scripts() {
    wp_enqueue_script('natmota', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true);
    wp_localize_script('natmota', 'natmota_js', array('ajax_url' => admin_url('admin-ajax.php')));
}

//Récupération du menu nav
function register_natmota_menu(){
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Menu pied de page");
}


add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'natmota_scripts');
add_action('after_setup_theme', 'register_natmota_menu');

?>