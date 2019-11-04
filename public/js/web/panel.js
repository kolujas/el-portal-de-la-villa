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
    /** @var {HTMLElement[]} - Array of edit buttons. */
    editBanner: [],
    /** @var {object} - Form actions. */
    form: {
        /**
         * Create an edit form.
         * @param {HTMLElement} button - The button clicked.
         */
        create(button){
            let content = button.parentNode.parentNode.parentNode;
            let formTag = document.createElement('form');
            content.appendChild(formTag);
            formTag.classList.add('col-12');
            formTag.classList.add('form-validate');
            formTag.dataset.validation = document.querySelector('[name=validation]').content;
            formTag.method = 'post';
            formTag.enctype = 'multipart/form-data';
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
                row.classList.add('row');
                row.classList.add('d-md-flex');
                row.classList.add('justify-content-md-end');

            if(button.classList.contains('web-editar-banner')){
                let banner = JSON.parse(button.dataset.banner);
                formTag.action = '/banner/' + banner.id_banner + '/editar';

                this.createInformacion(row, button);
                this.createImagen(row, button);
                this.createAccion(row);
            }else{
                formTag.action = '/informacion/editar';

                this.createInformacion(row, button);
                this.createAccion(row);
            }
        },
        /**
         * Create the "informacion" part.
         * @param {HTMLElement} row - The parent row.
         * @param {HTMLElement} button - The button clicked.
         */
        createInformacion(row, button){
            let informacion = document.createElement('div');
            row.appendChild(informacion);
            informacion.classList.add('informacion');
            informacion.classList.add('col-12');
                let titulo = document.createElement('div');
                informacion.appendChild(titulo);
                titulo.classList.add('titulo');
                titulo.classList.add('input-group');
                    let input = document.createElement('input');
                    titulo.appendChild(input);
                    input.classList.add('mb-2');
                    input.classList.add('p-2');
                    input.type = 'text';
                    input.name = 'titulo';
                    input.placeholder = 'Título';
                    
                    let tooltip = document.createElement('div');
                    titulo.appendChild(tooltip);
                    tooltip.classList.add('invalid-tooltip');


                let descripcion = document.createElement('div');
                informacion.appendChild(descripcion);
                descripcion.classList.add('descripcion');
                descripcion.classList.add('input-group');
                    let textarea = document.createElement('textarea');
                    descripcion.appendChild(textarea);
                    textarea.classList.add('mb-2');
                    textarea.classList.add('p-2');
                    textarea.name = 'descripcion';
                    textarea.placeholder = 'Descripción';
                    
                    let tooltip2 = document.createElement('div');
                    descripcion.appendChild(tooltip2);
                    tooltip2.classList.add('invalid-tooltip');

            if(button.classList.contains('web-editar-banner')){
            let banner = JSON.parse(button.dataset.banner);
            informacion.classList.add('col-md-6');
            informacion.classList.add('col-lg-8');
                    input.value = banner.titulo;
                    textarea.innerHTML = banner.descripcion;
            }else{
            let informacion = JSON.parse(button.dataset.informacion);
                input.value = informacion.titulo;
                textarea.innerHTML = informacion.descripcion;
            }
        },
        /**
         * Create the "imagen" part.
         * @param {HTMLElement} row - The parent row.
         * @param {HTMLElement} button - The button clicked.
         */
        createImagen(row, button){
            let banner = JSON.parse(button.dataset.banner);
            let imagen = document.createElement('div');
            row.appendChild(imagen);
            imagen.classList.add('imagen');
            imagen.classList.add('col-12');
            imagen.classList.add('pr-lg-2');
                let imagenDiv = document.createElement('div');
                imagen.appendChild(imagenDiv);
                imagenDiv.classList.add('imagen');
                imagenDiv.classList.add('mb-2');
                imagen.classList.add('col-md-6');
                imagen.classList.add('col-lg-4');
                    let img = document.createElement('img');
                    imagenDiv.appendChild(img);
                    img.src = document.querySelector('[name=asset]').content + 'storage/' + banner.imagen;
                    img.alt = 'Imagen del banner llamado: ' + banner.titulo;
                    
                    let label = document.createElement('label');
                    imagenDiv.appendChild(label);
                    label.classList.add('imagen-input');
                    label.classList.add('m-0');
                        let icon = document.createElement('i');
                        label.appendChild(icon);
                        icon.classList.add('input-icon');
                        icon.classList.add('fas');
                        icon.classList.add('fa-pen');

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
            let accion = document.createElement('div');
            row.appendChild(accion);
            accion.classList.add('accion');
            accion.classList.add('col-12');
            accion.classList.add('col-md-6');
            accion.classList.add('col-lg-4');
            accion.classList.add('pr-lg-2');
                let boton = document.createElement('div');
                accion.appendChild(boton);
                boton.classList.add('boton');
                boton.classList.add('d-flex');
                boton.classList.add('justify-content-between');
                    let aceptar = document.createElement('button');
                    boton.appendChild(aceptar);
                    aceptar.classList.add('web-aceptar');
                    aceptar.classList.add('btn');
                    aceptar.classList.add('p-2');
                    aceptar.classList.add('form-submit');
                    aceptar.type = "submit";
                    aceptar.dataset.id = "1";
                        let span = document.createElement('span');
                        aceptar.appendChild(span);
                        span.classList.add('button-text');
                        span.classList.add('mr-2');
                        span.innerHTML = 'Aceptar';

                        let icon = document.createElement('i');
                        aceptar.appendChild(icon);
                        icon.classList.add('button-icon');
                        icon.classList.add('fas');
                        icon.classList.add('fa-check');

                    let cancelar = document.createElement('button');
                    boton.appendChild(cancelar);
                    cancelar.classList.add('web-cancelar');
                    cancelar.classList.add('btn');
                    cancelar.classList.add('p-2');
                    cancelar.addEventListener('click', function(e){
                        e.preventDefault();
                        WebButtons.deactivateEdition(this);
                    });
                        let span2 = document.createElement('span');
                        cancelar.appendChild(span2);
                        span2.classList.add('button-text');
                        span2.classList.add('mr-2');
                        span2.innerHTML = 'Cancelar';

                        let icon2 = document.createElement('i');
                        cancelar.appendChild(icon2);
                        icon2.classList.add('button-icon');
                        icon2.classList.add('fas');
                        icon2.classList.add('fa-times');
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
    /** EventButtons loader. */
    load(){
        this.editBanner = document.querySelectorAll('.web-editar-banner');
        this.editInformacion = document.querySelector('.web-editar-informacion');
        for(let i = 0; i < this.editBanner.length; i++){
            this.editBanner[i].addEventListener('click', function(e){
                e.preventDefault();
                WebButtons.activateEdition(this);
            });
        }
        this.editInformacion.addEventListener('click', function(e){
            e.preventDefault();
            WebButtons.activateEdition(this);
        });
    },
    /**
     * Activate the edition mode.
     * @param {HTMLElement} button - The button clicked.
     */
    activateEdition(button){
        button.parentNode.parentNode.parentNode.classList.remove('edition-deactivated');
        button.parentNode.parentNode.parentNode.classList.add('edition-activated');
        this.form.create(button);
        Validation.load();
    },
    /**
     * Deactivate the edition mode.
     * @param {HTMLElement} button - The button clicked.
     */
    deactivateEdition(button){
        button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove('edition-activated');
        button.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add('edition-deactivated');
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