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


/* headroom */

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

window.addEventListener('load', function(){
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var form = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(form, function(form){
        form.addEventListener('submit', function(event){
            if(form.checkValidity() === false){
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);

// headroom

// $ grab an element
var myElement = document.querySelector("#header");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement);
// initialise
headroom.init(); 