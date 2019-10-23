let Tabs = {
    /** @var {HTMLElement[]} - Array of tab-button HTML Elements. */
    buttons: [],
    /** @var {HTMLElement[]} - Array of tab-content HTML Elements. */
    contents: [],
    /** Tabs loader */
    load(){
        this.buttons = document.querySelectorAll('.tabs .tab-menu .tab-button');
        this.contents = document.querySelectorAll('.tabs .tab-body .tab-content');
        for(let i = 0; i < this.buttons.length; i++){
            this.buttons[i].addEventListener('click', function(e){
                e.preventDefault();
                Tabs.switch(i);
            });
        }
    },
    /**
     * Switch between open and close elements.
     * @param {numeric} number - Tab-button position in the array of this.buttons.
     */
    switch(number){
        for(let i = 0; i < this.buttons.length; i++){
            if(this.buttons[i].classList.contains('opened')){
                this.close(number);
            }else if(i == number){
                this.open(number);
            }
        }
    },
    /**
     * Open a new content.
     * @param {numeric} number - Tab-button position in the array of this.buttons.
     */
    open(number){
        for(let i = 0; i < this.buttons.length; i++){
            if(this.buttons[i].classList.contains('opened') && i != number){
                this.close(i);
            }
        }
        this.buttons[number].classList.remove('closed');
        this.buttons[number].classList.add('opened');
        let href = this.buttons[number].href.split("#").pop();
        for(let i = 0; i < this.contents.length; i++){
            if(this.contents[i].id == href){
                this.contents[i].classList.remove('closed');
                this.contents[i].classList.add('opened');
            }
        }
    },
    /**
     * Close the current content opened.
     * @param {numeric} number - Tab-button position in the array of this.buttons.
     */
    close(number){
        this.buttons[number].classList.remove('opened');
        this.buttons[number].classList.add('closed');
        let href = this.buttons[number].href.split("#").pop();
        for(let i = 0; i < this.contents.length; i++){
            if(this.contents[i].id == href){
                this.contents[i].classList.remove('opened');
                this.contents[i].classList.add('closed');
            }
        }
    },
};

document.addEventListener('DOMContentLoaded', function(){
    Tabs.load()
});