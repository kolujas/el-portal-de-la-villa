$('.carousel').carousel({
    interval: 3000,
    touch: true
});

if(document.querySelector('.load_gallery')){
    document.querySelector('.load_gallery').addEventListener('click', function(e){
        e.preventDefault();
        let lightboxes = document.querySelectorAll('.lightbox');
        lightboxes[6].click();
    });
}

let = FormDate = {
    /** @var {HTMLElement[]} inputs - The form date inputs */
    inputs: null,
    /** The FormDate loader. */
    load(){
        this.inputs = document.querySelectorAll('.form-date');
    },
    /**
     * CHange a date.
     * @param {HTMLElement} input - THe input.
     */
    change(input){
        let day = input.value.split('-')[0];
        let month = input.value.split('-')[1];
        let year = input.value.split('-')[2];
        let label = input.previousElementSibling.children;
        for(let i = 0; i < label.length; i++){
            if(label[i].classList.contains('day')){
                label[i].innerHTML = day;
            }else if(label[i].classList.contains('text')){
                for(let j = 0; j < label[i].children.length; j++){
                    if(label[i].children[j].classList.contains('month')){
                        this.setMonth(label[i].children[j], month);
                    }else{
                        label[i].children[j].innerHTML = year;
                    }
                }
            }
        }
    },
    /**
     * Change the span month.
     * @param {HTMLElement} span - The span.
     * @param {string} month - The selected month.
     */
    setMonth(span, month){
        switch(month){
            case '01':
                span.innerHTML = 'Enero';
            break;
            case '02':
                span.innerHTML = 'Febrero';
            break;
            case '03':
                span.innerHTML = 'Marzo';
            break;
            case '04':
                span.innerHTML = 'Abril';
            break;
            case '05':
                span.innerHTML = 'Mayo';
            break;
            case '06':
                span.innerHTML = 'Junio';
            break;
            case '07':
                span.innerHTML = 'Julio';
            break;
            case '08':
                span.innerHTML = 'Agosto';
            break;
            case '09':
                span.innerHTML = 'Septiembre';
            break;
            case '10':
                span.innerHTML = 'Octubre';
            break;
            case '11':
                span.innerHTML = 'Noviembre';
            break;
            case '12':
                span.innerHTML = 'Diciembre';
            break;
        }
    },
};

document.addEventListener('DOMContentLoaded', function(){
    FormDate.load();
});

var d = document;

d.getScroll = function(){
    if(window.pageYOffset != undefined){
        return [pageXOffset, pageYOffset];
    }else{
        var sx, sy, d = document,
            r = d.documentElement,
            b = d.body;
        sx = r.scrollLeft || b.scrollLeft || 0;
        sy = r.scrollTop || b.scrollTop || 0;
        return [sx, sy];
    }
}

document.addEventListener('DOMContentLoaded', function(){
    let header = d.getElementsByTagName('header');
    header = header[0];
    window.addEventListener('scroll', function (event){
        let scroll = this.scrollY;
        if(scroll <= 80){
            header.classList.add('top-top-menu');
            header.classList.remove('top-menu');
            header.classList.remove('bottom-menu');
        }else if(scroll <= 600){
            header.classList.remove('top-top-menu');
            header.classList.add('top-menu');
            header.classList.remove('bottom-menu');
        }else{
            header.classList.remove('top-top-menu');
            header.classList.remove('top-menu');
            header.classList.add('bottom-menu');
        }
    });
});


// headroom

$(function(){
    var header = document.getElementById('header');
    var headroom = new Headroom(header);
    headroom.init();

    var width = $(window).width(),
      enlaces = $('#enlaces'),
      btnMenu = $('#btn-menu'),
      icono = $('#btn-menu .icono');

      if(width < 768){
        enlaces.hide();
        icono.addClass('ion-navicon-round');
      }

      btnMenu.on('click', function(e){
        enlaces.slideToggle();
        icono.toggleClass('ion-navicon-round');
        icono.toggleClass('ion-close-round');
      });

      $(window).on('resize', function(){
        if($(this).width > 768){
          enlaces.show();
          icono.addClass('ion-close-round');
          icono.removeClass('ion-navicon-round');
        }else{
          enlaces.hide();
          icono.removeClass('ion-close-round');
        }
      });
});