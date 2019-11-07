let Modal = {
    /** Make the modal. */
    make(html){
        html.classList.add('make-a-modal');
        if(!html.classList.contains('make-a-modal')){
            html.addEventListener('click', Modal.close(this));
        }
    },
    close(html){
        if(html.classList.contains('make-a-modal')){
            html.classList.remove('make-a-modal');
        }
    },
};
document.addEventListener('DOMContentLoaded', function(){
    //
});