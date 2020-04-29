<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: Services template
 */
get_header();?>
  
</div>
	
	<!-- Services -->
	<div class="container">
	<section class="services">
		<h1 class="entry-title">Services</h1>
			<div class="d_grid col3">
			<?php
	        $the_query = new WP_Query(array(
	            'category_name' => 'service',
	            'post_status' => 'publish',
	            'order' => 'ASC',
	            'posts_per_page' => 50,
	        ));
	        ?>
	        <?php if ($the_query->have_posts()) : ?>
	            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	            	<div class="service">
			            <a href="<?php the_permalink() ?>">
			            	<?php the_post_thumbnail(); ?>
				            <h5><?php the_title(); ?></h5>
				            <p><?php the_excerpt(); ?></p>
			        	</a>
		        	</div>
	            <?php endwhile; ?>
	            <?php wp_reset_postdata(); ?>
	        <?php else : ?>
	            <p><?php __('No News'); ?></p> 
	        <?php endif; ?>

	        <div class="services">
		        <?php
		        echo paginate_links( array(
	                'base'    => get_pagenum_link( 1 ) . '%_%',
	                'format'  => ( ( get_option( 'permalink_structure' ) && ! $wp_query->is_search ) || ( is_home() && get_option( 'show_on_front' ) !== 'page' && ! get_option( 'page_on_front' ) ) ) ? '?paged=%#%' : '&paged=%#%',
	                'currennext' => get_query_var('pages'),
	                'total'   => $the_query->max_num_pages,
	                'prev_t'=>true,
	                'prev_text'=> __('Prev'),
	                'next_text'=> __('Next'),
	            ));
		        ?>
		    </div>
	    	</div>
	</section>
</div>  	
<?php get_footer();?>
