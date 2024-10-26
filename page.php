<?php get_header(); ?>

<div class="main-container" id="<?php echo get_post_field('post_name', get_post()); ?>">
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
