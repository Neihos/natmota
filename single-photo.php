<?php
/**
 *
 * The Template for displaying all single-photo posts
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 * @since nathalie-mota 1.0
 */

get_header(); ?>

<main class="single-container">

    <?php 
         // Vérifie s'il y a des posts/pages à afficher
        if ( have_posts() ) :
         // Boucle à travers les pages et affiche leur contenu
            while ( have_posts() ) : the_post(); 
    ?>

    <?php if ( 'photo' === get_post_type() ): ?>


    <Article class="preview-photo">

        <section class="single-content">            
            
            <div class="post-title"><?php the_title(); ?></div>
            <div class="reference">Référence : <?php the_field( 'reference' ); ?></div>        
            <div class="catégorie">
                <?php 
             // Récupérer les catégories associées
                $categories = get_the_terms( get_the_ID(), 'categorie' ); 
                if ( !empty($categories) && !is_wp_error($categories) ) {
                    $cat_names = wp_list_pluck( $categories, 'name' ); // Extraire seulement les noms
                    echo 'Catégorie : ' . implode(', ', $cat_names); // Convertir en chaîne
                } else {
                    echo 'Catégorie : Aucune'; // Gérer le cas où il n'y a pas de catégorie
                }
                ?>  
            </div>     
            <div class="format">
                <?php 
             // Récupérer les formats associés
                $formats = get_the_terms( get_the_ID(), 'format' ); 
                if ( !empty($formats) && !is_wp_error($formats) ) {
                    $format_names = wp_list_pluck( $formats, 'name' ); // Extraire seulement les noms
                    echo 'Format : ' . implode(', ', $format_names); // Convertir en chaîne
                } else {
                    echo 'Format : Aucun'; // Gérer le cas où il n'y a pas de format
                }
                ?>
            </div>
            <div class="post-type">Type : <?php echo esc_html( get_field('type') ); ?></div>
            <div class="publication-year">Année : <?php echo get_the_date('Y'); ?></div>
            
        </section>

        <?php 
         // Récupérer le tableau complet de l'image depuis le champ ACF 'photographie'
            $photographie = get_field( 'photographie' );
        
         // Vérifier que l'image existe
            if( !empty($photographie) ) : 
         // Priorité à la taille "full", sinon on utilise 'large', puis 'medium'
            $image_url = $photographie['sizes']['full'] ?? $photographie['sizes']['large'] ?? $photographie['sizes']['medium'] ?? $photographie['url'];
        ?>

        <section class="preview__picture">
            <img 
                src="<?php echo esc_url( $image_url ); ?>" 
                alt="<?php echo esc_attr( $photographie['alt'] ); ?>"
            >
        </section>

        
        <div class="btnPhotoInteress">
            <p>Cette photo vous intéresse ?</p>
            <button class="contactPhoto">Contact</button>
        </div>
        
        
        <div class="sliderContainer">
            <div class="slider">
                <div class="imgCarrousel"></div>
                <div class="changeImg">                
                    <img class="arrow_left" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_left.png"
			        alt="Icone vers l'image précédente" title="Voir image précédente">
                    <img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_right.png"
			        alt="Icone vers l'image suivante" title="Voir image suivante">
                </div>
            </div>
        </div>
                <?php endif; ?>
    </Article>

                <?php endif; ?>
    <?php
            endwhile;
        endif;
    ?>



</main>
<?php get_footer(); ?>