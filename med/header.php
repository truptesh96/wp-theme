<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Class_Medical
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<!-- site loader --><div class='loader'></div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'med' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container">
		<figure class="site_logo">
			<a href="<?php echo get_home_url(); ?>">
				<img alt="log" src="<?php echo get_site_option( 'med_Logo' ); ?>" />
			</a>
		</figure><!-- .site-branding -->
		<nav id="site-navigation" class="site_menu">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'med' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content <?php if(!is_page()){  echo "hv_sidebar";  } ?>">