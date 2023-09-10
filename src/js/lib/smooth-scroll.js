(function () {
  
  document.querySelectorAll('a[href*="#"]:not([href="#"]):not([href="#0"])').forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();
  
      const targetId = link.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
  
      if (targetElement) {
        event.preventDefault();
        const duration = 1000; 
  
        const targetOffset = targetElement.getBoundingClientRect().top + window.scrollY;
  
        const startTime = performance.now();
        function scrollAnimation(currentTime) {
          const elapsedTime = currentTime - startTime;
          const progress = Math.min(elapsedTime / duration, 1);
          window.scrollTo(0, window.scrollY + (targetOffset - window.scrollY) * progress);
          if (progress < 1) {
            requestAnimationFrame(scrollAnimation);
          }
        }
        requestAnimationFrame(scrollAnimation);
  
        const handleAnimationEnd = () => {
          targetElement.focus();
          if (document.activeElement !== targetElement) {
            targetElement.setAttribute('tabindex', '-1');
            targetElement.focus();
          }
        };
  
        setTimeout(handleAnimationEnd, duration);
      }
    });
  });
  
})();