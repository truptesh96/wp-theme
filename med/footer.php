<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Class_Medical
 */
?>
	</div><!-- #content -->
	<footer id="colophon" class="site_footer">
		<div class="container">
			<div class="d_grid col4">
				<article class="footer_col">
					<?php dynamic_sidebar('latest_news'); ?>
				</article>
				<article class="footer_col">
					<h4>Navigation</h4>
					<?php
					wp_nav_menu( array(
						'menu_id' => 'Footer-menu',
					) );
					?>
				</article>
				<article class="footer_col">
					<h4>Social Links </h4>
					<ul class='social_links'>
						<li class='fb'><a class='icon-fb' href="<?php echo get_site_option( 'med_fb_link' ); ?>">Facebook</a></li>
						<li class='insta'>
						<a class='icon-insta' href="<?php echo get_site_option( 'med_ytb_link' ); ?>">Instagram</a></li>
						<li class='twitter'><a class='icon-twitter' href="<?php echo get_site_option( 'med_twitter_link' ); ?>">Twitter</a></li>
					</ul>
				</article>
				<article class="footer_col">
					<h4>Contact Us</h4>
					<ul>
						<li class='email'><a class='icon-email' href="<?php echo get_site_option( 'med_email' ); ?>">
							<?php echo get_site_option( 'med_email' ); ?></a></li>
						<li class='call'><a class='icon-call' href="<?php echo get_site_option( 'med_call' ); ?>">
							<?php echo get_site_option( 'med_call' ); ?></a></li>
						<li class='fax'><a class='icon-call' href="<?php echo get_site_option( 'med_fax' ); ?>">
							<?php echo get_site_option( 'med_fax' ); ?>
						</a></li>
					</ul>
				</article>
			</div>

			<p><?php echo get_site_option( 'med_copyright_text' ); ?></p>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slick.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
	<script>
		jQuery(function($) {
		var getJSfile = function(src) {
		var jsfile = $("<script type='text/javascript' src="+src+">");
		$("head").append(jsfile);
		};
		if($(window).width() > 1023){
		getJSfile ("<?php bloginfo('template_url'); ?>/js/desktop.js");
		}else{ 
		getJSfile ("<?php bloginfo('template_url'); ?>/js/mobile.js");
		}
	});
	</script>
</body>
</html>
