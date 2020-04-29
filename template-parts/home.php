<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: Homepage template
 */
get_header();?>
  
</div>
	
	<!-- Banner Slider -->
	<section class="hero slider">
        <?php if(get_field('hero_slider')): ?>
        <?php while(has_sub_field('hero_slider')): ?>
		<article class="slide">
			<img src="<?php the_sub_field('banner'); ?>" alt=''>
			<div class="content">
				<h3><?php the_sub_field('title'); ?></h3>
				<p><?php the_sub_field('summary'); ?></p>
				<a href="<?php the_sub_field('link'); ?>">Read More</a>
			</div>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
	</section>
	<!-- Banner Slider Ends -->

	<div class="container">
		<ul class="features d_grid col4">
		<li>
			<img src="https://d2dnk653l9i5f9.cloudfront.net/newHome/13.svg">
			<h4>PRIVATE &amp; CONFIDENTIAL</h4>
		</li>
		<li>
			<img src="https://d2dnk653l9i5f9.cloudfront.net/newHome/14.svg">
			<h4>ANONYMOUS DISCUSSIONS</h4>	
		</li>
		<li>
			<img src="https://d2dnk653l9i5f9.cloudfront.net/newHome/15.svg">
			<h4>24X7 ROUND THE CLOCK SUPPORT</h4>
		</li>
		<li>
			<img src="https://d2dnk653l9i5f9.cloudfront.net/newHome/16.svg">
			<h4>CONDUCTED OVER 25 LAKHS+ SESSIONS</h4>
		</li>
	</div>
	<!-- Banner Slider Ends -->

	<div class="f_txt" style="background-image: url('/eveal/wp-content/uploads/2020/04/home_page.jpg');" >
		<div class="container">
			<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
		</div>
	</div>

	<!-- Call Section -->
	<section class="intro">
		<div class="container">
			<div class="left">
				<h2>Who <span>we are?</span></h2>
			</div>
			<div class="right">
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<div class="call_sec">
				<h3>Call us on: </h3>
				<a href="tel:<?php echo get_site_option( 'med_call' ); ?>"><?php echo get_site_option( 'med_call' ); ?></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Call Section Ends -->

	<!-- Our Team -->
	<section class="team">
		<h2>Our Team</h2>
		<div class="members" style="background-image: url('/eveal/wp-content/uploads/2020/04/bg2.jpg');">
			<div class="container d_grid col3">
                <?php if(get_field('team')): ?>
                <?php while(has_sub_field('team')): ?>
				<article class="member">
					<figure>
                        <img src="<?php the_sub_field('pimg'); ?>" alt=''>
					</figure>
					<h4><?php the_sub_field('name'); ?></h4>
					<span><?php the_sub_field('designation'); ?></span>
				</article>
                <?php endwhile; ?>
                <?php endif; ?>
			</div>
		</div>
	</section>
	<!-- Our Team Ends -->

	<!-- Testimonials -->
	<section class="reviews">
		<h2>What do people say?</h2>
		<div class="container">
		<div class="review_slider">
		<article class="review">
			<figure>
				<img src="/eveal/wp-content/uploads/2020/04/team2.jpg" alt="">
			</figure>
			<div class="cont">
				<h4>Member Name</h4>
				<p>Testimonial Text.</p>
			</div>
		</article>
		<article class="review">
			<figure>
				<img src="/eveal/wp-content/uploads/2020/04/team3.jpg" alt="">
			</figure>
			<div class="cont">
				<h4>Member Name</h4>
				<p>Testimonial Text. Testimonial Text. Testimonial Text. Testimonial Text.</p>
			</div>
		</article>
		<article class="review">
			<figure>
				<img src="/eveal/wp-content/uploads/2020/04/team2.jpg" alt="">
			</figure>
			<div class="cont">
				<h4>Member Name</h4>
				<p>Testimonial Text.</p>
			</div>
		</article>
		<article class="review">
			<figure>
				<img src="/eveal/wp-content/uploads/2020/04/team2.jpg" alt="">
			</figure>
			<div class="cont">
				<h4>Member Name</h4>
				<p>Testimonial Text. Testimonial Text. Testimonial Text.</p>
			</div>
		</article>
		</div>
		</div>
	</section>
	<!-- Testimonials Ends-->

<script>
	jQuery(function($) {
		if($(window).width() > 1023){
			$('.slider').slick({
			  infinite: true,
			  dots: false
			});

			$('.review_slider').slick({
			  infinite: true,
			  dots: false,
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 2000,
			});
		}else{
			$('.slider').slick({
			  infinite: true,
			  dots: false,
			  arrows: false
			});

			$('.review_slider').slick({
			  infinite: true,
			  dots: true,
			  slidesToShow: 1,
			  autoplay: true,
			  arrows: false,
			  autoplaySpeed: 2000,
			});
		}
	});
</script>
<?php get_footer();?>