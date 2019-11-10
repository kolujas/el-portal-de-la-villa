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
    /** Get if the URL has an #. */
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
        /** The WebButtons 'informacion' loader */
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
        prev_arrows: [],
        next_arrows: [],
        waiting: false,
        new_image: {
            imageInputs: [],
            waiting: false,
            /** The WebButtons 'galerias' 'new_image' loader. */
            load(){
                this.imageInputs = document.querySelectorAll('.image-input');
                for(let i = 0; i < this.imageInputs.length; i++){
                    this.addActions(this.imageInputs[i]);
                }
            },
            /**
             * Add actions in the childs of the container.
             * @param {HTMLElement} container - A container.
             */
            addActions(container){
                let input = container.children[0].children[0].children[0];
                input.addEventListener('change', function(){
                    WebButtons.galerias.new_image.confirm(this.parentNode.parentNode.parentNode);
                });
                let accept = container.children[1].children[0].children[0];
                    cancel = container.children[1].children[1].children[0];
                accept.addEventListener('click', function(){
                    WebButtons.galerias.new_image.accept(this.parentNode.parentNode.parentNode);
                });
                cancel.addEventListener('click', function(){
                    WebButtons.galerias.new_image.cancel(this.parentNode.parentNode.parentNode);
                });
            },
            /**
             * Enable the confirmation.
             * @param {HTMLTlement} container - A container.
             */
            confirm(container){
                if(!WebButtons.galerias.waiting){
                    container.classList.remove('checked');
                    container.classList.add('confirm');
                    this.example(container.parentNode, container);
                }
            },
            /**
             * 
             * @param {HTMLElement} content - A content.
             * @param {HTMLElement} container - A container.
             */
            example(content, container){
                let input = container.children[0].children[0].children[0];
                let habitacion = document.createElement('div');
                habitacion.classList.add('habitacion', 'example-image', 'col-10', 'mr-2', 'p-0', 'mr-2');
                content.insertBefore(habitacion, container.nextElementSibling);
                    let imagen = document.createElement('img');
                    imagen.alt = 'Example image';
                    habitacion.appendChild(imagen);
                    if(FileReader && input.files && input.files.length){
                        let reader = new FileReader();
                        reader.onload = function(){
                            imagen.src = reader.result;
                        }
                        reader.readAsDataURL(input.files[0]);
                    }else{
                        // PENDIENTE
                    }

                    let p = document.createElement('p');
                    p.classList.add('example-text');
                    if(input.files[0].type != 'image/jpeg' && input.files[0].type != 'image/png'){
                        p.classList.add('show');
                        p.innerHTML = 'Formato invalido, debe ser JPEG/JPG o PNG';
                    }else{
                        p.innerHTML = 'Ejemplo';
                    }
                    habitacion.appendChild(p);
                    p.addEventListener('click', function(){
                        WebButtons.galerias.new_image.show(this);
                    });
            },
            /**
             * Show or hide the parraph.
             * @param {HTMLElement} p - The parraph.
             */
            show(p){
                if(!p.classList.contains('show')){
                    p.classList.add('show');
                }else{
                    p.classList.remove('show');
                }
            },
            /**
             * Accept the confirmation.
             * @param {HTMLElement} container - A container.
             */
            accept(container){
                if(!WebButtons.galerias.waiting){
                    container.classList.remove('confirm');
                    container.classList.add('checked');
                    this.loading(document.querySelector('.example-image'));
                    this.submit(container);
                }
            },
            /**
             * Deny the confirmation.
             * @param {HTMLElement} container - A container.
             */
            cancel(container){
                if(!WebButtons.galerias.waiting){
                    container.classList.remove('confirm');
                    let input = container.children[0].children[0].children[0];
                    input.value = "";
                    let example = document.querySelector('.example-image');
                    example.parentNode.removeChild(example);
                }
            },
            /**
             * Submit a form.
             * @param {HTMLElement} container - A container.
             */
            submit(container){
                let imagen = container.children[0].children[0].children[0];
                let id_tipo = container.children[0].children[1];
                let form = document.createElement('form');
                form.action = '/galeria/' + id_tipo.value + '/agregar';
                form.method = 'post';
                form.enctype = 'multipart/form-data';
                container.appendChild(form);
                    let method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'POST';
                    form.appendChild(method);

                    let csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = document.querySelector('[name=csrf-token]').content;
                    form.appendChild(csrf);
                    
                    form.appendChild(imagen);
                    form.appendChild(id_tipo);

                form.submit();
            },
            /**
             * Put the page in pause.
             * @param {HTMLElement} image - An image.
             */
            loading(image){
                WebButtons.galerias.waiting = true;
                let loading = document.createElement('div');
                loading.classList.add('loading');
                image.appendChild(loading);
                    let icon = document.createElement('i');
                    icon.classList.add('loading-icon', 'fas', 'fa-spinner');
                    loading.appendChild(icon);
            },
        },
        /** The WebButtons 'galerias' loader. */
        load(){
            this.images = document.querySelectorAll('.galerias .image');
            this.prev_arrows = document.querySelectorAll('.galerias .image .prev button');
            this.next_arrows = document.querySelectorAll('.galerias .image .next button');
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
            for(let i = 0; i < this.prev_arrows.length; i++){
                this.prev_arrows[i].addEventListener('click', function(e){
                    e.preventDefault();
                    WebButtons.galerias.move(this.parentNode.parentNode, JSON.parse(this.parentNode.parentNode.dataset.habitacion).posicion - 1);
                });
            }
            for(let i = 0; i < this.next_arrows.length; i++){
                this.next_arrows[i].addEventListener('click', function(e){
                    e.preventDefault();
                    WebButtons.galerias.move(this.parentNode.parentNode, JSON.parse(this.parentNode.parentNode.dataset.habitacion).posicion + 1);
                });
            }
            this.new_image.load();
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} image - The image clicked.
         */
        active(image){
            if(!WebButtons.galerias.waiting){
                let images = document.querySelectorAll('.image.active');
                for(let i = 0; i < images.length; i++){
                    this.inactive(images[i]);
                }
                if(!image.classList.contains('inactive')){
                    image.children[1].addEventListener('click', function(e){
                        e.stopPropagation();
                        e.preventDefault();
                        WebButtons.galerias.delete(image);
                    });
                }
                image.classList.remove('inactive');
                image.classList.add('active');
            }
        },
        /**
         * Activate the edition mode.
         * @param {HTMLElement} image - The image clicked.
         */
        inactive(image){
            image.classList.remove('active');
            image.classList.add('inactive');
        },
        /**
         * Delete an image.
         * @param {HTMLElement} image - The image.
         */
        delete(image){
            WebButtons.galerias.inactive(image);
        },
        /**
         * Change the image position.
         * @param {HTMLElemenT} image - The image.
         * @param {nummeric} position - The position.
         */
        move(image, position){
            if(position < 1){
                position = habitaciones.length;
            }else if(position >= habitaciones.length){
                position = 1;
            }

            let showeds = document.querySelectorAll('.image.habitacion.showed');
            let found = false;
            let habitacion, newHabitacion;
            for(let i = 0; i < showeds.length; i++){
                habitacion = JSON.parse(image.dataset.habitacion);
                newHabitacion = JSON.parse(showeds[i].dataset.habitacion);
                if(newHabitacion.posicion == position){
                    this.replace(image, showeds[i], position);
                    found = true;
                    break;
                }
            }
            if(!found){
                for(let i = 0; i < habitaciones.length; i++){
                    if(habitaciones[i].posicion == position){
                        let newImage = this.substitute(habitaciones[i]);
                        this.replace(image, newImage, position);
                        break;
                    }
                }
            }
        },
        /**
         * Change two imagen position.
         * @param {HTMLElement} image - The image.
         * @param {HTMLElement} newImage - Another image.
         * @param {numeric} position - The position.
         */
        async replace(image, newImage, position){
            let habitacion = image.dataset.habitacion;
            let newHabitacion = newImage.dataset.habitacion;
            habitacion = JSON.parse(habitacion);
            newHabitacion = JSON.parse(newHabitacion);
            newHabitacion.posicion = habitacion.posicion;
            habitacion.posicion = position;
            this.inactive(image);
            this.loading(image);
            await this.update(habitacion.id_galeria, position);
            image.dataset.habitacion = JSON.stringify(newHabitacion);
            newImage.dataset.habitacion = JSON.stringify(habitacion);
            image.children[0].src = document.querySelector('[name=asset]').content + 'storage/' + newHabitacion.imagen;
            newImage.children[0].src = document.querySelector('[name=asset]').content + 'storage/' + habitacion.imagen;
            for(let i = 0; i < habitaciones.length; i++){
                if(habitaciones[i].id_galeria == habitacion.id_galeria){
                    habitaciones[i].posicion = habitacion.posicion;
                }else if(habitaciones[i].id_galeria == newHabitacion.id_galeria){
                    habitaciones[i].posicion = newHabitacion.posicion;
                }
            }
        },
        /**
         * Make an substitute for one Galeria.
         * @param {Galeria} habitacion - A Galeria object.
         */
        substitute(habitacion){
            let image = document.createElement('div');
            image.dataset.habitacion = JSON.stringify(habitacion);
                let img = document.createElement('img');
                img.src = document.querySelector('[name=asset]').content + habitacion.imagen;
                image.appendChild(img);
            return image;
        },
        /**
         * Change the Galeria position.
         * @param {numeric} id_galeria - The Galeria id.
         * @param {numeric} posicion - The position.
         */
        async update(id_galeria, posicion){
            let formData = new FormData();
            formData.append("posicion", posicion);
            formData.append("_method", 'PUT');
            formData.append("_token", document.querySelector('[name=csrf-token]').content);
            await Database.update('/api/galeria/' + id_galeria + '/mover', formData, this);
        },
        /** Finish the sending action. */
        finish(json){
            this.stop();
        },
        /**
         * Put the page on pause.
         * @param {HTMLElement} image - An image.
         */
        loading(image){
            this.waiting = true;
            let loading = document.createElement('div');
            loading.classList.add('loading');
            image.appendChild(loading);
                let icon = document.createElement('i');
                icon.classList.add('loading-icon', 'fas', 'fa-spinner');
                loading.appendChild(icon);
        },
        /** Stop the loading function. */
        stop(){
            let loading = document.querySelector('.loading');
            let parent = loading.parentNode;
            parent.removeChild(loading);
            this.waiting = false;
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