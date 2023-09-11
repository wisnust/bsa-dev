<?php
/**
 * Openings
 */
if( isset( $block['data']['openings_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['openings_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'openings-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'openings';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Main Content
$openingsSubtitle = get_field('openings_subtitle');
$openingsTitle = get_field('openings_title');
$openingsContentText = get_field('openings_content_text');
$openingsContentFeatured = get_field('openings_content_featured');
$openingsButton = get_field('openings_button');

// Open Roles
$openingsRoles = get_field('open_roles');

// Advanced
$decorationNumber = get_field('decoration_number');
$decorationLabel1 = get_field('decoration_label_1');
$decorationLabel2 = get_field('decoration_label_2');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

  <div class="openings__wrapper">

    <!-- Decorations -->
		<div class="openings__decoration openings-decoration" aria-hidden="true">
      <?php if ( $decorationLabel1 ): ?>
        <div class="openings-decoration__label">
          <span class="openings-decoration__label-inner">
            <?php echo $decorationLabel1; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationLabel2 ): ?>
        <div class="openings-decoration__label">
          <span class="openings-decoration__label-inner">
            <?php echo $decorationLabel2; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationNumber ): ?>
        <span class="openings-decoration__number">
          <?php echo $decorationNumber; ?>
        </span>
      <?php endif; ?>
		</div>

    <!-- Content -->
		<div class="openings__content openings-content ">
			<header class="openings__header openings-header">
        <?php if ( $openingsSubtitle ): ?>
					<span class="openings-header__subtitle">
						<?php echo $openingsSubtitle; ?>
					</span>
				<?php endif; ?>
        <?php if ( $openingsTitle ): ?>
					<h2 class="openings-header__title">
						<?php echo $openingsTitle; ?>
          </h2>
				<?php endif; ?>
			</header>
      <?php if ( $openingsContentFeatured ): ?>
				<strong class="openings-content__featured">
					<?php echo $openingsContentFeatured; ?>
				</strong>
			<?php endif; ?>
			<?php if ( $openingsContentText ): ?>
				<div class="openings-content__text">
					<?php echo $openingsContentText; ?>
				</div>
			<?php endif; ?>
			<?php if ( $openingsButton ): ?>
				<a class="openings-content__button" href="<?php echo esc_url($openingsButton['url']); ?>" target="<?php echo esc_attr($openingsButton['target'] ?: '_self'); ?>"> <?php echo esc_html($openingsButton['title']); ?></a>
			<?php endif; ?>
		</div>

    <!-- Openings Roles -->
		<div class="openings__listings openings-listings">
			<div class="openings__listings-header openings-listings-header">
				<span class="openings-listings-header__title openings-listings-header__title--position">Position</span>
				<span class="openings-listings-header__title openings-listings-header__title--location">Location</span>
				<span class="openings-listings-header__title openings-listings-header__title--duration">Duration</span>
			</div>
      <?php
      if( $openingsRoles ): ?>
        <ul class="openings__list openings-list">
        <?php foreach( $openingsRoles as $openingsRole ): 
          $permalink = get_permalink( $openingsRole->ID );
          $title = get_the_title( $openingsRole->ID );
          $location = get_field( 'location', $openingsRole->ID );
          $duration = get_field( 'duration', $openingsRole->ID );
          ?>
          <li class="openings-list__item">
            <a href="<?php echo esc_url( $permalink ); ?>" class="openings-list__link">
              <span class="openings-list__position"><?php echo $title; ?></span>
              <span class="openings-list__location"><?php echo $location; ?></span>
              <span class="openings-list__duration"><?php echo $duration; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
        </ul>
        <?php 
        wp_reset_postdata(); ?>
      <?php endif; ?>
		</div>
	</div>

</section>
<?php
endif;
?>