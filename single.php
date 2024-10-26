<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Nathalie_Mota
 * @since Nathalie Mota 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				// Affiche le modèle de contenu pour l'article en cours.
				get_template_part( 'content', get_post_format() );

				// Navigation article précédent/suivant.
				the_post_navigation();

				// Chargement du template de commentaires si activés.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				
			endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
