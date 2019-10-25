let Requirements = {
    required: {
        /**
         * Valida el input como requerido.
         * 
         * @param {html} input - El input.
         * @return {object}
         */
        validate(input){
            if(input.value){
                return aux = {
                    required: true,
                    valid: true,
                };
            }else{
                return aux = {
                    required: true,
                    valid: false,
                };
            }
        },
    }, nullable: {
        /**
         * Valida el input como no obligatorio.
         * 
         * @param {html} input - El input.
         * @return {object}
         */
        validate(input){
            if(!input.value){
                return aux = {
                    required: false,
                    valid: true,
                };
            }else{
                return aux = {
                    required: true,
                    valid: true,
                };
            }
        }
    }, min: {
        /**
         * Valida el input con un mínimo de caracteres.
         * 
         * @param {html} input - El input.
         * @param {object} aux - El auxiliar de validación.
         * @param {number} length - La cantidad de caracteres.
         * @return {object}
         */
        validate(input, aux, length){
            if(input.value.length >= parseInt(length)){
                aux.valid = true;
                return aux;
            }else{
                aux.valid = false;
                return aux;
            }
        }, params: [
            ":min"
        ],
    }, max: {
        /**
         * Valida el input con un máximo de caracteres.
         * 
         * @param {html} input - El input.
         * @param {object} aux - El auxiliar de validación.
         * @param {number} length - La cantidad de caracteres.
         * @return {object}
         */
        validate(input, aux, length){
            if(input.value.length <= parseInt(length)){
                aux.valid = true;
                return aux;
            }else{
                aux.valid = true;
                return aux;
            }
        }, params: [
            ":max"
        ],
    }, numeric: {
        /**
         * Valida un input como número.
         * 
         * @param {html} input - El input.
         * @param {object} aux - El auxiliar de validación.
         * @return {object}
         */
        validate(input, aux){
            if(!isNaN(input.value)){
                aux.valid = true;
                return aux;
            }else{
                aux.valid = false;
                return aux;
            }
        }
    }, email: {
        /**
         * Valida el input como email.
         * 
         * @param {html} input - El input.
         * @param {object} aux - El auxiliar de validación.
         * @return {object}
         */
        validate(input, aux){
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(re.test(input.value)){
                aux.valid = true;
                return aux;
            }else{
                aux.valid = false;
                return aux;
            }
        }
    },
};