(function () {
  
  const anchorLinks = document.querySelectorAll('a[href*="#"]:not([href="#"]):not([href="#0"])');
  
  anchorLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
  
      const targetId = link.getAttribute('href').substring(1);
  
      const targetSection = document.getElementById(targetId);
  
      if (targetSection) {
        const offsetTop = targetSection.getBoundingClientRect().top + window.scrollY;
  
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth',
        });
      }
    });
  });
  
  
})();