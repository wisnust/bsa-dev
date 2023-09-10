<?php
/**
 * Culture
 */
if( isset( $block['data']['culture_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['culture_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'culture-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'culture';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Main Content
$cultureSubtitle = get_field('culture_subtitle');
$cultureTitle = get_field('culture_title');
$cultureContentText = get_field('culture_content_text');
$cultureButton = get_field('culture_button');

// Images
$cultureImageMain = get_field('culture_image_main');
$cultureImageTop = get_field('culture_image_top');
$cultureImageSide = get_field('culture_image_side');

// Advanced
$decorationNumber = get_field('decoration_number');
$decorationLabel1 = get_field('decoration_label_1');
$decorationLabel2 = get_field('decoration_label_2');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

  <div class="culture__wrapper">

    <!-- Decoration -->
    <div class="culture__decoration culture-decoration" aria-hidden="true">
      <?php if ( $decorationLabel1 ): ?>
        <div class="culture-decoration__label">
          <span class="culture-decoration__label-inner">
            <?php echo $decorationLabel1; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationLabel2 ): ?>
        <div class="culture-decoration__label">
          <span class="culture-decoration__label-inner">
            <?php echo $decorationLabel2; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationNumber ): ?>
        <span class="culture-decoration__number">
          <?php echo $decorationNumber; ?>
        </span>
      <?php endif; ?>
		</div>

    <!-- Media -->
    <div class="culture__media">
      <?php 
				if( !empty( $cultureImageMain ) ): ?>
        <div class="culture__media-main">
          <picture class="culture__picture culture__picture-main">
						<img src="<?php echo esc_url($cultureImageMain['url']); ?>" alt="<?php echo esc_attr($cultureImageMain['alt']); ?>" class="culture__image" />
					</picture>
				</div>
			<?php endif; ?>
      <?php 
				if( !empty( $cultureImageTop ) ): ?>
          <picture class="culture__picture culture__picture-top culture__picture-top-mobile-only">
						<img src="<?php echo esc_url($cultureImageTop['url']); ?>" alt="<?php echo esc_attr($cultureImageTop['alt']); ?>" class="culture__image" />
					</picture>
			<?php endif; ?>
		</div>
    
    <div class="culture__content culture-content ">

      <!-- Content -->
			<header class="culture__header culture-header">
				<?php if ( $cultureSubtitle ): ?>
					<span class="culture-header__subtitle">
						<?php echo $cultureSubtitle; ?>
					</span>
				<?php endif; ?>
				<?php if ( $cultureTitle ): ?>
					<h2 class="culture-header__title">
						<?php echo $cultureTitle; ?>
          </h2>
				<?php endif; ?>
			</header>
			<?php if ( $cultureContentText ): ?>
				<div class="culture-content__text">
					<?php echo $cultureContentText; ?>
				</div>
			<?php endif; ?>

      <!-- Media -->
      <?php 
				if( !empty( $cultureImageSide ) ): ?>
          <picture class="culture__picture culture__picture-side">
						<img src="<?php echo esc_url($cultureImageSide['url']); ?>" alt="<?php echo esc_attr($cultureImageSide['alt']); ?>" class="culture__image" />
					</picture>
			<?php endif; ?>
      <?php 
				if( !empty( $cultureImageTop ) ): ?>
          <picture class="culture__picture culture__picture-top culture__picture-top-desktop-only">
						<img src="<?php echo esc_url($cultureImageTop['url']); ?>" alt="<?php echo esc_attr($cultureImageTop['alt']); ?>" class="culture__image" />
					</picture>
			<?php endif; ?>
		</div>
	</div>
  
</section>
<?php
endif;
?>