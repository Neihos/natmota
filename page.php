<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 * @since nathalie-mota 1.0
 */

get_header(); ?>

<div class="main-container" >
    <?php 
    // Vérifie s'il y a des posts/pages à afficher
    if ( have_posts() ) :
        // Boucle à travers les pages et affiche leur contenu
        while ( have_posts() ) : the_post(); 
    ?>

        <div class="page-content">
            <?php the_content(); ?> 
         </div>

    <?php
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
