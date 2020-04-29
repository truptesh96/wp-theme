<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: FAQ template
 */
get_header();?>
  
</div>
	
    <!-- FAQs -->
    <div class="container">
    <section class="faqs">
    <h1>FQAs</h1>
        <?php if(get_field('faq')): ?>
        <?php while(has_sub_field('faq')): ?>
        <article class="faq">
            <h4 class="que"><?php the_sub_field('que'); ?></h4>
            <div class="ans"><?php the_sub_field('ans'); ?></div>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </section>
    </div>
    <!-- FAQs -->

<script>
	jQuery(function($) {
        $('p:empty').remove();
	});
</script>
<?php get_footer();?>