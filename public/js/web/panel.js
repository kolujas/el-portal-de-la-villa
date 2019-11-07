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
        this.getTarget();
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
    getTarget(){
        let href = location.href;
        let target = href.split('#');
        if(target.length > 1){
            target = target[1];
            for(let i = 0; i < this.contents.length; i++){
                if(this.contents[i].classList.contains(target)){
                    this.open(i);
                }
            }
        }
    },
};

let EventButtons = {
    /** @var {HTMLElement[]} - Array of edit buttons. */
    edit: [],
    /** @var {HTMLElement[]} - Array of delete buttons. */
    delete: [],
    /** EventButtons loader. */
    load(){
        this.edit = document.querySelectorAll('.evento-editar');
        this.delete = document.querySelectorAll('.evento-borrar');
        for(let i = 0; i < this.edit.length; i++){
            this.delete[i].addEventListener('click', function(e){
                e.preventDefault();
                EventButtons.deleteAccion(this);
            });
        }
    },
    /**
     * Execute delete actions.
     * @param {HTMLElement} button - The button clicked.
     */
    deleteAccion(button){
        console.log(button);
    },
};

function observe(element, event, handler){
    element.addEventListener(event, handler);
};

let WebButtons = {
    informacion: {
        banner: [],
        archivos: null,
        load(){
            this.banner = document.querySelectorAll('.web-editar-banner');
            this.archivos = document.querySelector('.web-editar-informacion');
            for(let i = 0; i < this.banner.length; i++){
                this.banner[i].addEventListener('click', function(e){
                    e.preventDefault();
                    WebButtons.informacion.active(this);
                });
            }
            this.archivos.addEventListener('click', function(e){
                e.preventDefault();
                WebButtons.informacion.active(this);
            });
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} button - The button clicked.
         */
        active(button){
            if(button.classList.contains('web-editar-banner')){
                let data = JSON.parse(button.dataset.banner);
                this.form.create('/banner/' + data.id_banner + '/editar', data, button);
            }else{
                let data = JSON.parse(button.dataset.informacion);
                this.form.create('/informacion/editar', data, button);
            }
            button.parentNode.parentNode.parentNode.classList.remove('inactive');
            button.parentNode.parentNode.parentNode.classList.add('active');
            Validation.load();
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} button - The button clicked.
         */
        inactive(button){
            button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove('active');
            button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('inactive');
            this.form.delete(button);
        },
        /** @var {object} - Form actions. */
        form: {
            /**
             * Create an edit form.
             * @param {HTMLElement} button - The button clicked.
             */
            create(action, data, button){
                let content = button.parentNode.parentNode.parentNode;
                let formTag = document.createElement('form');
                content.appendChild(formTag);
                formTag.classList.add('col-12', 'form-validate');
                formTag.dataset.validation = document.querySelector('[name=validation]').content;
                formTag.method = 'post';
                formTag.enctype = 'multipart/form-data';
                formTag.action = action;
                    let method = document.createElement('input');
                    formTag.appendChild(method);
                    method.type = "hidden";
                    method.name = "_method";
                    method.value = "PUT";
                    
                    let csrf = document.createElement('input');
                    formTag.appendChild(csrf);
                    csrf.type = "hidden";
                    csrf.name = "_token";
                    csrf.value = document.querySelector('[name=csrf-token]').content;

                    let row = document.createElement('div');
                    formTag.appendChild(row);
                    row.classList.add('row', 'd-md-flex', 'justify-content-md-end');
                    
                this.createInformacion(row, data, button);
                let suport = document.createElement('div');
                row.appendChild(suport);
                suport.classList.add('suport', 'col-12', 'col-md-6', 'col-lg-4', 'pr-lg-2');
                if(button.classList.contains('web-editar-banner')){
                    this.createImagen(suport, data);
                }
                this.createAccion(suport);
            },
            /**
             * Create the "informacion" part.
             * @param {HTMLElement} row - The parent row.
             * @param {HTMLElement} button - The button clicked.
             */
            createInformacion(row, data, button){
                let informacion = document.createElement('div');
                row.appendChild(informacion);
                informacion.classList.add('informacion', 'col-12', 'pr-lg-2');
                    let titulo = document.createElement('div');
                    informacion.appendChild(titulo);
                    titulo.classList.add('titulo', 'input-group');
                        let input = document.createElement('input');
                        titulo.appendChild(input);
                        input.classList.add('mb-2', 'p-2');
                        input.type = 'text';
                        input.name = 'titulo';
                        input.placeholder = 'Título';
                        input.value = data.titulo;
                        
                        let tooltip = document.createElement('div');
                        titulo.appendChild(tooltip);
                        tooltip.classList.add('invalid-tooltip');


                    let descripcion = document.createElement('div');
                    informacion.appendChild(descripcion);
                    descripcion.classList.add('descripcion', 'input-group');
                        let textarea = document.createElement('textarea');
                        descripcion.appendChild(textarea);
                        textarea.classList.add('mb-2', 'p-2');
                        textarea.name = 'descripcion';
                        textarea.placeholder = 'Descripción';
                        textarea.innerHTML = data.descripcion;
                        
                        let tooltip2 = document.createElement('div');
                        descripcion.appendChild(tooltip2);
                        tooltip2.classList.add('invalid-tooltip');

                if(button.classList.contains('web-editar-banner')){
                    informacion.classList.add('col-md-6', 'col-lg-8');
                }
            },
            /**
             * Create the "imagen" part.
             * @param {HTMLElement} row - The parent row.
             * @param {HTMLElement} button - The button clicked.
             */
            createImagen(row, data){
                let imagen = document.createElement('div');
                row.appendChild(imagen);
                imagen.classList.add('imagen', 'mb-2');
                    let img = document.createElement('img');
                    imagen.appendChild(img);
                    img.src = document.querySelector('[name=asset]').content + 'storage/' + data.imagen;
                    img.alt = 'Imagen del banner llamado: ' + data.titulo;
                    
                    let label = document.createElement('label');
                    imagen.appendChild(label);
                    label.classList.add('imagen-input', 'm-0');
                        let icon = document.createElement('i');
                        label.appendChild(icon);
                        icon.classList.add('input-icon', 'fas', 'fa-pen');

                        let file = document.createElement('input');
                        label.appendChild(file);
                        file.classList.add('d-none');
                        file.type = 'file';
                        file.name = 'imagen';
                        file.addEventListener('change', function(){
                            if(FileReader && this.files && this.files.length){
                                let reader = new FileReader();
                                reader.onload = function(){
                                    img.src = reader.result;
                                }
                                reader.readAsDataURL(this.files[0]);
                            }else{
                                // PENDIENTE
                            }
                        });
                        
                        let tooltip = document.createElement('div');
                        label.appendChild(tooltip);
                        tooltip.classList.add('invalid-tooltip');
            },
            /**
             * Create the "accion" part.
             * @param {HTMLElement} row - The parent row.
             */
            createAccion(row){
                let boton = document.createElement('div');
                row.appendChild(boton);
                boton.classList.add('boton', 'd-flex', 'justify-content-between');
                    let aceptar = document.createElement('button');
                    boton.appendChild(aceptar);
                    aceptar.classList.add('web-aceptar', 'btn', 'p-2', 'form-submit');
                    aceptar.type = "submit";
                    aceptar.dataset.id = "1";
                        let span = document.createElement('span');
                        aceptar.appendChild(span);
                        span.classList.add('button-text', 'mr-2');
                        span.innerHTML = 'Aceptar';

                        let icon = document.createElement('i');
                        aceptar.appendChild(icon);
                        icon.classList.add('button-icon', 'fas', 'fa-check');

                    let cancelar = document.createElement('button');
                    boton.appendChild(cancelar);
                    cancelar.classList.add('web-cancelar', 'btn', 'p-2');
                    cancelar.addEventListener('click', function(e){
                        e.preventDefault();
                        WebButtons.informacion.inactive(this);
                    });
                        let span2 = document.createElement('span');
                        cancelar.appendChild(span2);
                        span2.classList.add('button-text', 'mr-2');
                        span2.innerHTML = 'Cancelar';

                        let icon2 = document.createElement('i');
                        cancelar.appendChild(icon2);
                        icon2.classList.add('button-icon', 'fas', 'fa-times');
            },
            /**
             * Delete an edit form.
             * @param {HTMLElement} button - The button clicked.
             */
            delete(button){
                let content = button.parentNode.parentNode.parentNode.parentNode.parentNode;
                let form = button.parentNode.parentNode.parentNode.parentNode;
                content.removeChild(form);
            },
        },
    },
    eventos: {},
    galerias: {
        images: [],
        load(){
            this.images = document.querySelectorAll('.galerias .image');
            for(let i = 0; i < this.images.length; i++){
                this.images[i].children[0].addEventListener('click', function(e){
                    e.preventDefault();
                    if(this.parentNode.classList.contains('active')){
                        WebButtons.galerias.inactive(this.parentNode);
                    }else{
                        WebButtons.galerias.active(this.parentNode);
                    }
                });
            }
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} image - The image clicked.
         */
        active(image){
            if(!image.classList.contains('inactive')){
                image.children[1].addEventListener('click', function(e){
                    e.stopPropagation();
                    e.preventDefault();
                    WebButtons.galerias.delete(image);
                });
            }
            image.classList.remove('inactive');
            image.classList.add('active');
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} image - The image clicked.
         */
        inactive(image){
            image.classList.remove('active');
            image.classList.add('inactive');
        },
        delete(image){
            WebButtons.galerias.inactive(image);
        },
    },
    /** EventButtons loader. */
    load(){
        this.informacion.load();
        this.galerias.load();
    },
    /**
     * Activate the edition mode.
     * @param {HTMLElement} button - The button clicked.
     */
    activateEdition(button){
        button.parentNode.parentNode.parentNode.classList.remove('inactive');
        button.parentNode.parentNode.parentNode.classList.add('active');
        this.form.create(button);
        Validation.load();
    },
    /**
     * Deactivate the edition mode.
     * @param {HTMLElement} button - The button clicked.
     */
    deactivateEdition(button){
        button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove('active');
        button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('inactive');
        this.form.delete(button);
    },
};

document.addEventListener('DOMContentLoaded', function(){
    Tabs.load();
    EventButtons.load();
    WebButtons.load();
    document.querySelector('.evento-crear').addEventListener("click", function(){
        window.location = "/panel/evento/crear";
    });
});