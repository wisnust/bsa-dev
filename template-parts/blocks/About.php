<?php
/**
 * About
 */
if( isset( $block['data']['about_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['about_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Main Content
$aboutSubtitle = get_field('about_subtitle');
$aboutTitle = get_field('about_title');
$aboutFeatured = get_field('about_featured');
$aboutContentText = get_field('about_content_text');
$aboutButton = get_field('about_button');

// Images
$aboutImageMain = get_field('about_image_main');
$aboutImageTop = get_field('about_image_top');
$aboutImageSide = get_field('about_image_side');

// Advanced
$decorationNumber = get_field('decoration_number');
$decorationLabel1 = get_field('decoration_label_1');
$decorationLabel2 = get_field('decoration_label_2');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  
  <!-- Decoration -->
  <div class="about__decoration about-decoration" aria-hidden="true">
    <?php if ( $decorationLabel1 ): ?>
      <div class="about-decoration__label">
        <span class="about-decoration__label-inner">
          <?php echo $decorationLabel1; ?>
        </span>
      </div>
    <?php endif; ?>
    <?php if ( $decorationLabel2 ): ?>
      <div class="about-decoration__label">
        <span class="about-decoration__label-inner">
          <?php echo $decorationLabel2; ?>
        </span>
      </div>
    <?php endif; ?>
    <?php if ( $decorationNumber ): ?>
      <span class="about-decoration__number">
        <?php echo $decorationNumber; ?>
      </span>
    <?php endif; ?>
  </div>

  <!-- Content -->
	<div class="about__content about-content">
    <?php 
      if( !empty( $aboutImageMain ) ): ?>
      <picture class="about-content__picture">
        <img src="<?php echo esc_url($aboutImageMain['url']); ?>" alt="<?php echo esc_attr($aboutImageMain['alt']); ?>" class="about-content__image" />
      </picture>
    <?php endif; ?>
		<header class="about__header about-header">
      <?php if ( $aboutSubtitle ): ?>
        <span class="about-header__subtitle">
          <?php echo $aboutSubtitle; ?>
        </span>
      <?php endif; ?>
      <?php if ( $aboutTitle ): ?>
        <h2 class="about-header__title">
          <?php echo $aboutTitle; ?>
        </h2>
      <?php endif; ?>
		</header>
    <?php if ( $aboutFeatured ): ?>
      <strong class="about-content__featured">
        <?php echo $aboutFeatured; ?>
      </strong>
    <?php endif; ?>
    <?php if ( $aboutContentText ): ?>
      <div class="about-content__text">
        <?php echo $aboutContentText; ?>
      </div>
    <?php endif; ?>
	</div>

  <!-- Items -->
  <?php
  if( have_rows( 'about_items' ) ): ?>
    <div class="about__cards about-cards">
      <?php 
      $count = 1;
      while( have_rows( 'about_items' ) ):  the_row();
        $itemIcon = get_sub_field('icon');
        $itemTitle = get_sub_field('item_title');
        $itemContent = get_sub_field('item_content');
        ?>
        <article class="card-item">
          <div class="card-item__decoration card-item-decoration" aria-hidden="true">
            <span class="card-item-decoration__text">00<?php echo $count; ?></span>
          </div>
          <?php 
            if( !empty( $itemIcon ) ): ?>
            <img class="card-item__icon" src="<?php echo esc_url($itemIcon['url']); ?>" alt="<?php echo esc_attr($itemIcon['alt']); ?>" />
          <?php endif; ?>
          <?php if ( $itemTitle ): ?>
            <h3 class="card-item__title">
              <?php echo $itemTitle; ?>
            </h3>
          <?php endif; ?>
          <?php if ( $itemContent ): ?>
            <p class="card-item__content">
              <?php echo $itemContent; ?>
          </p>
          <?php endif; ?>
        </article>
      <?php $count++; endwhile; ?>
    </div>
  <?php endif; ?>
  
</section>
<?php
endif;
?>