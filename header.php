<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BSA_Dev_Test
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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bsa-dev-test' ); ?></a>

	<header id="masthead" class="site-header">
		<div id="navigation" class="navigation">
			<div class="navigation__inner">
					<div class="navigation__header navigation-header">
							<div id="navigation-header" class="navigation-header__company">
									<a href="/" class="navigation-header__company-link">
											<?php
											if (has_custom_logo()) {
													the_custom_logo(); // Display the custom logo if it's set
											} else {
													// Display a fallback image or text if no custom logo is set
													echo '<img src="' . get_template_directory_uri() . '/dist/images/general/logo.png" alt="Company Logo" class="navigation-header__company-logo">';
											}
											?>
									</a>
									<button id="navigation-header-mobile-toggle" class="navigation-header__mobile-toggle">
											<span id="navigation-header-mobile-toggle-title" class="navigation-header__mobile-toggle-title">Menu</span>
									</button>
							</div>
					</div>
					<div class="navigation__main">
							<div class="navigation__main-inner">
								
									<?php
									$menu_args = array(
										'menu' => 'Menu Header', // Replace with your menu location name
										'container'      => 'nav',
										'container_class' => 'navigation__menu navigation-menu', // Add your custom classes
										'menu_class'      => 'navigation-menu__list', // Add your custom classes
										'walker'         => new Custom_Nav_Walker(), // Use the custom walker
									);

									wp_nav_menu($menu_args);

									?>

									<div class="navigation__company-info navigation-company-info">
											<span class="navigation-company-info__title">Company Name</span>
											<address class="navigation-company-info__address">
													<a href="#" class="navigation-company-info__address-link" target="_blank" ref="nofollow noopener noreferrer">
															<span class="navigation-company-info__address-street">123 Company Address</span>
															<span class="navigation-company-info__address-city">City, State 55555</span>
													</a>
											</address>
											<a href="tel:5555555555" class="navigation-company-info__phone">(555) 555-5555</a>
									</div>

									<a href="#" class="navigation__cta navigation-cta">
											<span class="navigation-cta__text">Contact Us</span>
									</a>
									<?php //include('social-links.php'); ?>
							</div>
					</div>
			</div>
	</div>

	</header><!-- #masthead -->
