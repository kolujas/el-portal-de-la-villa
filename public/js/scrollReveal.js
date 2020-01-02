// ScrollReveal

window.sr = ScrollReveal();


sr.reveal('#informacion', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.presentacion-div .card', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.separador-iconos', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.galeria', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});


sr.reveal('.eventos', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.contacto', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.gmaps', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

sr.reveal('.footer', {
    duration: 2000,
    distance: '300px',
    origin: 'left'
});

/* 
sr.reveal('.solucion-familias', {
    duration: 1000,
    easing: 'ease-in',
    origin: 'right'
});

sr.reveal('.el-club figure img', {
    duration: 2000,
    easing: 'ease',
    distance: '300px',
    origin: 'left'
});

sr.reveal('.el-club .lista-solucion', {
    duration: 2000,
    easing: 'ease',
    distance: '300px',
    origin: 'right'
});


sr.reveal('.el-equipo .cartas', {
    duration: 2000,
    delay: 200,
    easing: 'ease',
    distance: '300px',
    origin: 'bottom'
});

sr.reveal('.contacto', {
    duration: 2000,
    delay: 400,
    easing: 'ease',
});
 */
// Smooth Scroll

$(function() {
    // Smooth Scrolling
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });