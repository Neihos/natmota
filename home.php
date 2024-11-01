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

    <section class="selectBy">
        <div class="allSelect">
            <div class="cat_form">
                <select name="categories" id="categories"><option value="">Catégories</option></select>
                <select name="formats" id="formats"><option value="">Formats</option></select>
            </div>
                <select name="trie" id="trie"><option value="">Trier par</option></select>
        </div>
    </section>

    <section class="homePhotos">
        <div class="photoContainer">        
            
        </div>
    </section>

        <div class="btnload">
            <button id="loadMorePhotos">Charger plus</button>
        </div>




</div>

<?php get_footer(); ?>

