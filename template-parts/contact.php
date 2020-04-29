<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: Contact Page
 */
get_header();?>
  
</div>
	
	<div class="container">
		<h1 class="page-title screen-reader-text">Contact Us</h1>
		<div class="c_form">
			<?php echo do_shortcode('[contact-form-7 id="125" title="Contact"]'); ?>
		</div>
		<div class="info">
			<div class="map">
				<img src="https://www.advancedcustomfields.com/wp-content/uploads/2013/11/acf-google-map-field-input.png" alt="">
			</div>
		</div>
	</div>
  	
<?php get_footer();?>
