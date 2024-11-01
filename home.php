<?php
/**
 * The template for home page
 *
 * This is the template that displays home by default.
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 * @since nathalie-mota 1.0
 */

get_header(); 

// Inclure le fichier avec les données photo
include('template_parts/template/infos_photos.php');
?>



<div class="main-container">
    <?php
    // Récupérer l'URL de la photo aléatoire
    $random_photo_url = get_random_photo();
    ?>
    <section class="hero_header" style="background-image: url('<?php echo $random_photo_url; ?>');">
        <h1>Photograph Event</h1>
    </section>

    <section class="homePhotos">
        <div class="photoContainer">
            <?php
            // Appel de la fonction pour obtenir les URLs des photos
            $home_photos = get_home_photo();
            if (!empty($home_photos)) : ?>
            <?php foreach ($home_photos as $photo_url) : ?>
                <div class="homePhoto-item">
                    <img src="<?php echo esc_url($photo_url); ?>" alt="Photos de la page d'accueil">
                </div>         
            <?php endforeach; ?>
        
            <?php else : ?>
                <p>Aucune photo n'est disponible pour l'instant.</p>
            <?php endif; ?>
        </div>
    </section>





</div>

<?php get_footer(); ?>

