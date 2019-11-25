$('.carousel').carousel({
    interval: 3000,
    touch: true
})
  
document.querySelector('.load_gallery').addEventListener('click', function(e){
    e.preventDefault();
    let lightboxes = document.querySelectorAll('.lightbox');
    lightboxes[6].click();
});