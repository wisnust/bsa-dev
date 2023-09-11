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
						
						<!-- Logo -->
						<?php if (has_custom_logo()) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<a href="/" class="navigation-header__company-link">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/general/logo.png'); ?>" alt="Company Logo" class="navigation-header__company-logo">
							</a>
						<?php endif; ?>
						<button id="navigation-header-mobile-toggle" class="navigation-header__mobile-toggle">
							<span id="navigation-header-mobile-toggle-title" class="navigation-header__mobile-toggle-title">Menu</span>
						</button>

					</div>
				</div>
				<div class="navigation__main">
					<div class="navigation__main-inner">

						<!-- Main Menu -->
						<?php
						$menu_args = array(
							'menu' => 'Menu Header',
							'container'      => 'nav',
							'container_class' => 'navigation__menu navigation-menu', 
							'menu_class'      => 'navigation-menu__list',
							'walker'         => new Custom_Nav_Walker(), 
						);
						wp_nav_menu($menu_args);
						?>

						<?php
						$headerCompanyName = get_field('header_company_name', 'option');
						$headerCompanyAddress = get_field('header_company_address', 'option');
						$headerCompanyPhone = get_field('header_company_phone', 'option');
						$headerContactLink = get_field('header_contact_link', 'option');
						?>
						
						<!-- Company (mobile only) -->
						<div class="navigation__company-info navigation-company-info">
							<?php if ( $headerCompanyName ): ?>
								<span class="navigation-company-info__title">
									<?php echo $headerCompanyName; ?>
								</span>
							<?php endif; ?>
							<address class="navigation-company-info__address">
								<a href="#" class="navigation-company-info__address-link" target="_blank" ref="nofollow noopener noreferrer">
									<?php if ( $headerCompanyAddress ): ?>
										<span class="navigation-company-info__address-street">
											<?php echo $headerCompanyAddress; ?>
										</span>
									<?php endif; ?>
								</a>
							</address>
							<?php 
							if ( $headerCompanyPhone ): ?>
								<a class="navigation-company-info__phone" href="<?php echo esc_url($headerCompanyPhone['url']); ?>" target="<?php echo esc_attr($headerCompanyPhone['target'] ?: '_self'); ?>"> 
									<?php echo esc_html($headerCompanyPhone['title']); ?>
								</a>
							<?php endif; ?>
						</div>
						
						<!-- Contact Link -->
						<?php 
						if ( $headerContactLink ): ?>
							<a class="navigation__cta navigation-cta" href="<?php echo esc_url($headerContactLink['url']); ?>" target="<?php echo esc_attr($headerContactLink['target'] ?: '_self'); ?>"> 
								<span class="navigation-cta__text"><?php echo esc_html($headerContactLink['title']); ?></span>
							</a>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="footer-scroll-top"></div>