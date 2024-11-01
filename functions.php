<?php

// Déclarer les styles du thème
function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/theme.css'));
}

// Déclarer les fichiers JS
function natmota_scripts() {
    wp_enqueue_script('natmota', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', true);
    
    // Localiser le script et ajouter l'URL de l'API REST
    wp_localize_script('natmota', 'natmota_js', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'rest_url' => esc_url(rest_url('wp/v2/photo')) // Ajout de l'URL de l'API REST
    ));
}

// Ajout des images à Rest Api

function post_photo_images( $data, $post, $context ) {
    // Récupérer tous les médias attachés au post
    $media = get_attached_media( 'image', $post->ID );
    $images = array();

    if ( $media ) {
        foreach ( $media as $image ) {
            // Récupérer l'URL de l'image dans différents formats
            $image_url = wp_get_attachment_image_src( $image->ID, 'medium_large' );

            if ( $image_url ) {
                // Ajouter l'URL à notre tableau d'images
                $images[] = array(
                    'id' => $image->ID,
                    'url' => $image_url[0],
                    'thumbnail' => wp_get_attachment_image_src( $image->ID, 'thumbnail' )[0],
                    'large' => wp_get_attachment_image_src( $image->ID, 'large' )[0],
                    'full' => wp_get_attachment_image_src( $image->ID, 'full' )[0],
                );
            }
        }
    }

    // Ajouter les images au tableau de données de la réponse
    $data->data['photo_images'] = $images;

    return $data;
}

add_filter( 'rest_prepare_photo', 'post_photo_images', 10, 3 );

// Récupération du menu nav
function register_natmota_menu() {
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Menu pied de page");
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'natmota_scripts');
add_action('after_setup_theme', 'register_natmota_menu');

?>
