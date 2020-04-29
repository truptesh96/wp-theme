<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: About template
 */
get_header();?>
  
</div>
	
	<section class="about">
		<!-- head text starts -->
		<div class="head_top">
			<?php echo get_site_option( 'med_about_title_text' ); ?>
		</div>
		<!-- head text ends  -->

		<!-- titles starts -->
		<article class="d_grid col2 intro">
			<div class="colm">
				<div class="content">
					<h2>Meditation And Yoga</h2>
					<p>Anything that’s human is mentionable, and anything that is mentionable can be more manageable. When we can talk about our feelings, they become less overwhelming, less upsetting, and less scary.</p>
				</div>
			</div>
			<img src="/eveal/wp-content/uploads/2020/04/woman-meditating-in-lotus-pose-3822583.jpg" alt="">
		</article>
		
		<article class="d_grid col2 intro">
			<img src="/eveal/wp-content/uploads/2020/04/strawberry-smoothie-on-glass-jar-775032.jpg" alt="">
			<div class="colm">
				<div class="content">
					<h2>Healthy Food</h2>
					<p>Anything that’s human is mentionable, and anything that is mentionable can be more manageable. When we can talk about our feelings, they become less overwhelming, less upsetting, and less scary.</p>
				</div>
			</div>
		</article>

		<article class="d_grid col2 intro">
			<div class="colm">
				<div class="content">
					<h2>Start Running Today</h2>
					<p>Anything that’s human is mentionable, and anything that is mentionable can be more manageable. When we can talk about our feelings, they become less overwhelming, less upsetting, and less scary.</p>
				</div>
			</div>
			<img src="/eveal/wp-content/uploads/2020/04/adventure-athlete-athletic-daylight-235922.jpg" alt="">
		</article>
		<!-- titles ends -->
	</section>
  	
<?php get_footer();?>
