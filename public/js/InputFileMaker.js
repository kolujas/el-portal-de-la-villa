let InputFileMaker = {
    /** @var {HTMLElement[]} - Array of Inputs type file. */
    inputs: [],
    /** InputFileMaker loader. */
    load(){
        this.inputs = document.querySelectorAll('.make-a-file');
        for(let i = 0; i < this.inputs.length; i++){
            InputFileMaker.make(this.inputs[i]);
            this.inputs[i].addEventListener('change', function(){
                InputFileMaker.update(this);
                if(this.classList.contains('make-an-image')){
                    InputFileMaker.generateImage(this);
                }
            });
        }
    },
    /**
     * Make the file substitute.
     * @param {HTMLElement} input - The input.
     */
    make(input){
        let parent = input.parentNode;
        let div = document.createElement('div');
        div.classList.add('input-file');
        parent.insertBefore(div, input);
            let button = document.createElement('button');
            button.innerHTML = input.dataset.text;
            button.classList.add('file-button');
            div.appendChild(button);
            button.addEventListener('click', function(e){
                e.preventDefault();
                InputFileMaker.execute(input);
            });
            let span = document.createElement('span');
            span.innerHTML = input.dataset.notfound;
            span.classList.add('file-text');
            div.appendChild(span);
            span.addEventListener('click', function(e){
                e.preventDefault();
                InputFileMaker.execute(input);
            });
    },
    /**
     * Execute the correct input.
     * @param {HTMLElement} input - The input.
     */
    execute(input){
        input.click();
    },
    /**
     * Update the text.
     * @param {HTMLElement} input - The input.
     */
    update(input){
        input.previousElementSibling.children[1].innerHTML = input.files[0].name;
    },
    generateImage(input){
        let parent = input.parentNode;
        let img = document.createElement('img');
        img.alt = 'Example image';
        img.classList.add('file-img');
        if(FileReader && input.files && input.files.length){
            let reader = new FileReader();
            reader.onload = function(){
                img.src = reader.result;
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            // PENDIENTE
        }
        parent.insertBefore(img, input);
    },
};
document.addEventListener('DOMContentLoaded', function(){
    InputFileMaker.load();
});