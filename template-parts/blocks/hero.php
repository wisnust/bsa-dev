<?php
/**
 * Hero
 */
if( isset( $block['data']['hero_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['hero_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Main Content
$heroSubtitle = get_field('hero_subtitle');
$heroTitle = get_field('hero_title');
$heroContentText = get_field('hero_content_text');
$heroButton = get_field('hero_button');

// Images
$heroImageMain = get_field('hero_image_main');
$heroImageTop = get_field('hero_image_top');
$heroImageBottom = get_field('hero_image_bottom');

// Advanced
$largeDecorationText = get_field('large_decoration_text');
$backgroundImage = get_field('background_image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image: url(<?php echo $backgroundImage['url']; ?>)">

	<div class="hero__wrapper">

    <!-- Decoration -->
		<?php if ( $largeDecorationText ): ?>
			<div class="hero__large-decoration hero-large-decoration" aria-hidden="true">
				<div class="hero-large-decoration__text"><?php echo $largeDecorationText; ?></div>
			</div>
		<?php endif; ?>

    <!-- Media -->
		<div class="hero__media">
			<?php 
				if( !empty( $heroImageMain ) ): ?>
				<div class="hero__media-main">
					<picture class="hero__picture hero__picture-main">
						<img src="<?php echo esc_url($heroImageMain['url']); ?>" alt="<?php echo esc_attr($heroImageMain['alt']); ?>" class="hero__image" />
					</picture>
				</div>
			<?php endif; ?>
			<?php 
			if( !empty( $heroImageTop ) ): ?>
				<picture class="hero__picture hero__picture-top">
					<img src="<?php echo esc_url($heroImageTop['url']); ?>" alt="<?php echo esc_attr($heroImageTop['alt']); ?>" class="hero__image" />
				</picture>
			<?php endif; ?>
			<?php 
			if( !empty( $heroImageBottom ) ): ?>
				<picture class="hero__picture hero__picture-bottom">
					<img src="<?php echo esc_url($heroImageBottom['url']); ?>" alt="<?php echo esc_attr($heroImageBottom['alt']); ?>" class="hero__image" />
				</picture>
			<?php endif; ?>
		</div>
		
    <!-- Content -->
		<div class="hero__content hero-content">
			<header class="hero__header hero-header">
				<?php if ( $heroSubtitle ): ?>
					<span class="hero-header__subtitle">
						<?php echo $heroSubtitle; ?>
					</span>
				<?php endif; ?>
				<?php if ( $heroTitle ): ?>
					<h1 class="hero-header__title">
						<?php echo $heroTitle; ?>
					</h1>
				<?php endif; ?>
			</header>
			<?php if ( $heroContentText ): ?>
				<div class="hero-content__text">
					<?php echo $heroContentText; ?>
				</div>
			<?php endif; ?>
			<?php if ( $heroButton ): ?>
				<a class="hero-content__button" href="<?php echo esc_url($heroButton['url']); ?>" target="<?php echo esc_attr($heroButton['target'] ?: '_self'); ?>"> <?php echo esc_html($heroButton['title']); ?></a>
			<?php endif; ?>
		</div>
		
	</div>
</section>
<?php
endif;
?>