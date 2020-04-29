<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Class_Medical
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<h1 class="page-title"><?php esc_html_e( '404', 'med' ); ?>
				</h1>
				<h2>Page not Found</h2>
				<div class="cont">
					<div class="txt">
						<a class='btn primary' href="<?php echo get_home_url(); ?>">Home</a>
						<a  class='btn secondary' href="javascript:history.back()">Continue With Previous Page</a>
					</div>
				</div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
