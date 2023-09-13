<?php
/**
 * Testimonials
 */
if( isset( $block['data']['testimonials_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['testimonials_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


// Main Content
$testimonialsSubtitle = get_field('testimonials_subtitle');
$testimonialsTitle = get_field('testimonials_title');

// Items
$testimonialsItems = get_field('testimonials_items');

// Advanced
$decorationNumber = get_field('decoration_number');
$decorationLabel1 = get_field('decoration_label_1');
$decorationLabel2 = get_field('decoration_label_2');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="testimonials__wrapper">
		<div class="testimonials__large-decoration testimonials-large-decoration" aria-hidden="true">
			<span class="testimonials-large-decoration__text">Testimonials</span>
		</div>

    <!-- Decorations -->
		<div class="testimonials__decoration testimonials-decoration" aria-hidden="true">
      <?php if ( $decorationLabel1 ): ?>
        <div class="testimonials-decoration__label">
          <span class="testimonials-decoration__label-inner">
            <?php echo $decorationLabel1; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationLabel2 ): ?>
        <div class="testimonials-decoration__label">
          <span class="testimonials-decoration__label-inner">
            <?php echo $decorationLabel2; ?>
          </span>
        </div>
      <?php endif; ?>
      <?php if ( $decorationNumber ): ?>
        <span class="testimonials-decoration__number">
          <?php echo $decorationNumber; ?>
        </span>
      <?php endif; ?>
		</div>

    <!-- Main Content -->
		<header class="testimonials__header testimonials-header">
      <?php if ( $testimonialsSubtitle ): ?>
        <span class="testimonials-header__subtitle">
          <?php echo $testimonialsSubtitle; ?>
        </span>
      <?php endif; ?>
      <?php if ( $testimonialsTitle ): ?>
        <h2 class="testimonials-header__title">
          <?php echo $testimonialsTitle; ?>
        </h2>
      <?php endif; ?>
		</header>
    
    <!-- Carousel -->
		<div id="testimonials-carousel" class="testimonials__carousel testimonials-carousel glide">
			<div class="glide__track" data-glide-el="track">
          
          <?php
            if( $testimonialsItems ): ?>
            <ul class="glide__slides">
            <?php $count = 1; foreach( $testimonialsItems as $testimonialsItem ): 
              $signature = get_field( 'signature', $testimonialsItem->ID );
              $authorName = get_field( 'author_name', $testimonialsItem->ID );
              $jobTitle = get_field( 'job_title', $testimonialsItem->ID );
              $theContent = wp_strip_all_tags($testimonialsItem->post_content);
              $featuredImage = get_the_post_thumbnail_url($testimonialsItem->ID, 'thumbnail');
              ?>
              <div class="testimonials-carousel__item glide__slide" data-index="<?php echo $count; ?>">
                <?php if ($featuredImage): ?>
                  <picture class="testimonials-carousel__picture">
                    <img src="<?php echo esc_url($featuredImage); ?>" alt="<?php echo esc_attr($authorName); ?>" class="testimonials-carousel__image">
                  </picture>
                <?php endif; ?>
                <blockquote class="testimonials-carousel__quote"><?php echo $theContent; ?></blockquote>
                <figcaption class="testimonials-carousel__author testimonials-carousel-author">
                  <?php if ( $authorName ): ?>
                    <span class="testimonials-carousel-author__name">
                      <?php echo $authorName; ?>
                    </span>
                  <?php endif; ?>
                  <?php if ( $jobTitle ): ?>
                    <span class="testimonials-carousel-author__job-title">
                      <?php echo $jobTitle; ?>
                    </span>
                  <?php endif; ?>
                  <?php if ($signature): ?>
                    <img src="<?php echo esc_url($signature['url']); ?>" alt="<?php echo esc_attr($signature['alt']); ?>" class="testimonials-carousel-author__signature" />
                  <?php endif; ?>
                </figcaption>
              </div>
            <?php $count++; endforeach; ?>
            </ul>
            <?php 
            wp_reset_postdata(); ?>
          <?php endif; ?>

			</div>
		</div>
		<div id="testimonials-carousel-nav" class="testimonials__carousel-nav testimonials-carousel-nav">
			<div id="testimonials-carousel-nav-buttons" class="testimonials-carousel-nav__buttons" data-glide-el="controls">
        <button id="testimonials-carousel-nav-button-previous" class="testimonials-carousel-nav__buttons--previous">Back</button>
        <button id="testimonials-carousel-nav-button-next" class="testimonials-carousel-nav__buttons--next">Next</button>
      </div>
			<div class="testimonials-carousel-nav__pagination-count">
				<span id="testimonials-carousel-nav-pagination-count-current" class="testimonials-carousel-nav__pagination-count--current">00</span>
				<span id="testimonials-carousel-nav-pagination-count-total" class="testimonials-carousel-nav__pagination-count--total">00</span>
			</div>
		</div>
	</div>
  
</section>
<?php
endif;
?>