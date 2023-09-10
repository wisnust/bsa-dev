import Glide from '@glidejs/glide';

(function () {
    /**
	 * Utilities
	 */
	function minTwoDigits (n) {
		return (n < 10 ? '0' : '') + n;
	}

    function initCountValues (totalCount, $currentItemContainer, $totalItemsContainer) {
		$currentItemContainer.innerHTML('01');
		$totalItemsContainer.innerHTML(minTwoDigits(totalCount));
	}

    // Adding Event Listeners to Touch and Click Events
	function customEventListener (element, functionCall) {
		if (typeof window.ontouchstart === 'undefined') {
			element.addEventListener('click', functionCall)
		} else {
			element.addEventListener('touchstart', functionCall)
		}
	}

    /**
	 * Careers Testimonials Carousel
	 */
	const testimonialsCarousel = document.getElementById('testimonials-carousel');
	const testimonialsCurrentItemContainer = document.getElementById('testimonials-carousel-nav-pagination-count-current');
	const testimonialsTotalItemsContainer = document.getElementById('testimonials-carousel-nav-pagination-count-total');
    const totalSlides = document.querySelector('#testimonials-carousel .glide__slides').childElementCount;
    const testimonialsNavButtonPrevious = document.getElementById('testimonials-carousel-nav-button-previous');
    const testimonialsNavButtonNext = document.getElementById('testimonials-carousel-nav-button-next');
	let glideCarousel;


	function onTestimonialsCarouselChange (newIndex) {
		testimonialsCurrentItemContainer.innerHTML = minTwoDigits(newIndex);
	}

	function initCarousel() {
        glideCarousel = new Glide('#testimonials-carousel', {
            perView: 3,
            focusAt: 'center',
            type: 'carousel',
			gap: 60,
			keyboard: false,
			breakpoints: {
				1440: {
					gap: 40
				},
				1200: {
					gap: 30
				},
				1024: {
					gap: 20
				},
				768: {
					gap: 0
				}
			}
        });

        glideCarousel.on('mount.before', function () {
            testimonialsCurrentItemContainer.innerHTML = '01';	testimonialsTotalItemsContainer.innerHTML = minTwoDigits(totalSlides);
        });

		glideCarousel.on('move', function () {
			onTestimonialsCarouselChange(glideCarousel.index + 1)
		})

        glideCarousel.mount();
	}

	function destroyCarousel() {
		if (glideCarousel !== null && typeof(glideCarousel) !== 'undefined') {
			glideCarousel.destroy();
		}
	}

	function handleResize() {
		if (window.innerWidth < 1024) {
			glideCarousel.enable();
		} else {
			glideCarousel.disable();
		}
	}

	if (typeof(testimonialsCarousel) !== 'undefined' && testimonialsCarousel !== null) {
	    customEventListener(testimonialsNavButtonPrevious, function() {
	        glideCarousel.go('<');
	    });

	    customEventListener(testimonialsNavButtonNext, function () {
	        glideCarousel.go('>');
	    });

		initCarousel();
		handleResize();
		window.addEventListener('resize', handleResize)
	}



})();
