<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota</title>
    <?php wp_head(); ?>
</head>
    
<header>
  
    <a href="<?php echo home_url( '/' ); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-mota.png" alt="logo">
    </a>
  <nav>  
    <?php
    // menu main déclaré dans functions.php
			wp_nav_menu(array('theme_location' => 'main')); 
		?>
  </nav>
</header>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>