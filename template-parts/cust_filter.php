<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package base
 *
 * Template Name: News template
 */
get_header();?>
  
</div>
	
    <!-- FAQs -->
    <div class="container">
    <? php $args = $args=array(
      'cat' => $cat_id,
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'DATE', 
       'order' => 'ASC' // or DESC
    );
    ?>

    <form action="<? bloginfo('url'); ?>" method="get">
     <select name="page_id" id="page_id">
     <?php
     global $post;
     $args = array( 'numberposts' => -1);
     $posts = get_posts($args);
     foreach( $posts as $post ) : setup_postdata($post); ?>
                    <option value="<? echo $post->ID; ?>"><?php the_title(); ?></option>
     <?php endforeach; ?>
     </select>
     <input type="submit" name="submit" value="view" />
     </form>
    </div>
    <!-- FAQs -->

<script>
</script>
<?php get_footer();?>