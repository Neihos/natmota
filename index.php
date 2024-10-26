<?php
/**
 * The main template file for the Nathalie Mota theme
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 * @since nathalie-mota 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				// Affiche le modèle de contenu standard pour chaque post.
				get_template_part( 'content', get_post_format() );

			endwhile;

			// Navigation entre les articles.
			the_posts_navigation();

		else :
			// Si aucun contenu n'est trouvé, inclure le modèle "Aucun article trouvé".
			get_template_part( 'content', 'none' );

		endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
