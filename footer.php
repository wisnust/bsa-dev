<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BSA_Dev_Test
 */

 $footerLogo = get_field('footer_logo', 'option');
 $footerCopyright = get_field('footer_copyright', 'option');
 $footerInfo = get_field('footer_info', 'option');
 $footerButton = get_field('footer_button', 'option');
 $footerSocialLinks = get_field('footer_social_links', 'option');
 $footerServices = get_field('footer_services', 'option');
 $footerBrands = get_field('footer_brands', 'option');
 $footerBGImage = get_field('footer_background_image', 'option');

?>

<footer class="footer">
	<?php 
	if( !empty( $footerBGImage ) ): ?>
		<img src="<?php echo esc_url($footerBGImage['url']); ?>" alt="<?php echo esc_attr($footerBGImage['alt']); ?>" class="footer-bg" />
	<?php endif; ?>
	<div class="footer__inner">
		<div class="footer__main">
			<div class="footer__main-company footer-company">
				<a href="/" class="footer-company__link">
					<?php 
					if( !empty( $footerLogo ) ): ?>
						<img src="<?php echo esc_url($footerLogo['url']); ?>" alt="<?php echo esc_attr($footerLogo['alt']); ?>" class="footer-company__logo" />
					<?php endif; ?>
				</a>
				<?php if ( $footerCopyright ): ?>
					<span class="footer-company__copyright">
						<?php echo $footerCopyright; ?>
					</span>
				<?php endif; ?>
				<?php if ( $footerInfo ): ?>
					<p class="footer-company__info">
						<?php echo $footerInfo; ?>
				</p>
				<?php endif; ?>
				<?php if ( $footerButton ): ?>
					<a class="footer-company__cta" href="<?php echo esc_url($footerButton['url']); ?>" target="<?php echo esc_attr($footerButton['target'] ?: '_self'); ?>"> <?php echo esc_html($footerButton['title']); ?></a>
				<?php endif; ?>
			</div>
			<div class="footer__main-links">
				<div class="footer-services">
					<div class="footer-services__header">
						<span class="footer-services__header-title">Services</span>
						<a href="#" class="footer-services__header-link" aria-hidden="true">View All Services</a>
					</div>
					<!-- Services -->
					<?php
					if( have_rows( 'footer_services', 'option' ) ): ?>
						<ul class="footer-services__list">
							<?php 
							while( have_rows( 'footer_services', 'option' ) ):  the_row();
								$itemLink = get_sub_field('item_link');
								$itemIcon = get_sub_field('item_icon');
								?>
								<?php if ( $itemLink ): ?>
									<li class="footer-services__list-item">
										<a class="footer-services__list-link" href="<?php echo esc_url($itemLink['url']); ?>" target="<?php echo esc_attr($itemLink['target'] ?: '_self'); ?>"> 
											<?php 
											if( !empty( $itemIcon ) ): ?>
												<img src="<?php echo esc_url($itemIcon['url']); ?>" alt="<?php echo esc_attr($itemIcon['alt']); ?>" class="footer-services__list-icon" />
											<?php endif; ?>
											<span class="footer-services__list-label"><?php echo esc_html($itemLink['title']); ?></span>
										</a>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
											</ul>
					<?php endif; ?>
					<a href="#" class="footer-services__cta">View All Services</a>
				</div>
				<div class="footer-brands">
					<div class="footer-brands__header">
						<span class="footer-brands__header-title">Our Brands</span>
					</div>
					<!-- Brands -->
					<?php
					if( have_rows( 'footer_brands', 'option' ) ): ?>
						<ul class="footer-brands__list">
							<?php 
							while( have_rows( 'footer_brands', 'option' ) ):  the_row();
								$itemLink = get_sub_field('item_link');
								$itemIcon = get_sub_field('item_icon');
								?>
								<?php if ( $itemLink ): ?>
									<li class="footer-brands__list-item">
										<a class="footer-brands__list-link" href="<?php echo esc_url($itemLink['url']); ?>" target="<?php echo esc_attr($itemLink['target'] ?: '_self'); ?>"> 
											<?php 
											if( !empty( $itemIcon ) ): ?>
												<img src="<?php echo esc_url($itemIcon['url']); ?>" alt="<?php echo esc_attr($itemIcon['alt']); ?>" class="footer-brands__list-logo" />
											<?php endif; ?>
										</a>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="footer__navigation footer-navigation">
		<?php
		$menu_args = array(
			'menu' => 'Menu Footer',
			'container' => 'nav',
			'container_class' => 'footer-navigation__main',
			'menu_class' => 'footer-navigation__list',
			'walker'         => new Footer_Nav_Walker(), 
		);

		wp_nav_menu($menu_args);
		?>
			<!-- Social Links -->
			<?php
			if( have_rows( 'footer_social_links', 'option' ) ): ?>
				<div class="social-links">
					<?php 
					while( have_rows( 'footer_social_links', 'option' ) ):  the_row();
						$itemLink = get_sub_field('item_link');
						$itemIcon = get_sub_field('item_icon');
						?>
						<?php if ( $itemLink ): ?>
							<a class="social-links__item social-links__twitter" target="_blank" href="<?php echo esc_url( $itemLink ); ?>"> 
								<?php 
								if( !empty( $itemIcon ) ): ?>
										<img src="<?php echo esc_url($itemIcon['url']); ?>" alt="<?php echo esc_attr($itemIcon['alt']); ?>" class="social-links__image" />
								<?php endif; ?>
							</a>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<a href="#footer-scroll-top" class="footer-navigation__to-top">To Top</a>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
