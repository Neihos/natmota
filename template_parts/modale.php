<section class="popup-overlay hiddenPopup">
	<div class="popup-contact">
		<div class="popup-title">
			<img class="popup-img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/contact-header.svg'?>" alt="Page contact">
		</div>
		<div class="popup-informations">	
			
            <div id="contact-form-container" data-refs-photo="<?php echo esc_attr( implode(',', (array) $refPhotos ) ); ?>">
                <?php echo do_shortcode('[contact-form-7 id="1ac3fea" title="contact"]'); ?>
            </div>		
	</div>
</section>