let Validation = {
    /** @var {HTMLElements[]} - Array of form HTML Element. */
    forms: [],
    /** Validation loader. */
    load(){
        this.getElements();
    },
    /** Get all the form HTML Elements. */
    getElements(){
        let forms = document.querySelectorAll('.form-validate');
        for(let i = 0; i < forms.length; i++){
            forms[i].classList.add('form-validation-' + i);
            this.forms[i] = {};
            this.forms[i].element = forms[i];
            // this.getButton(i);
            // this.getInputs(i);
            this.forms[i].rules = Rules.get(forms[i]);
            // console.log('INICIO :D');
            this.forms[i].messages = Messages.get(forms[i]);
        }
    },
    /**
     * Obtiene el botón de submit.
     * 
     * @param {number} number - La forma de obtener el formulario correctamente.
     */
    getButton(number){
        this.forms[number].button = document.querySelector('.form-validation-' + number + ' .form-submit');
        this.forms[number].button.addEventListener('click', function(e){
            e.preventDefault();
            Validation.validate(number);
        });
    },
    /**
     * Obtiene los inputs y textareas.
     * 
     * @param {number} number - La forma de obtener el formulario correctamente.
     */
    getInputs(number){
        this.forms[number].inputs = document.querySelectorAll('.form-validation-' + number + ' input, .form-validation-' + number + ' textarea');
        for(let i = 0; i < this.forms[number].inputs.length; i++){
            this.forms[number].inputs[i].addEventListener('blur', function(e){
                e.preventDefault();
                Validation.validate(number, this);
            });
        }
    },
    /**
     * Valida el formulario.
     * 
     * @param {number} number - La forma de obtener el formulario correctamente.
     * @param {html} input - El input a validar.
     */
    validate(number, input = null){
        let valid = true;
        for(let name in this.forms[number].rules){
            let aux = {
                required: true,
                valid: true,
            };
            for(let requirement in this.forms[number].rules[name]){
                if(input !== null && name == input.name){
                    aux = this.callRequirement(aux, requirement, number, name);
                }else if(input === null){
                    aux = this.callRequirement(aux, requirement, number, name);
                }
            }
            if(!aux.valid){
                valid = false;
            }
        }
        if(valid && input === null){
            this.forms[number].element.submit();
        } 
    },
    /**
     * Ejecuta el Requirement y valida, o no, el input.
     * 
     * @param {object} aux - El auxiliar de validación.
     * @param {string} requirement - El Requirement.
     * @param {number} number - La forma de obtener el formulario correctamente.
     * @param {string} name - El nombre del input.
     */
    callRequirement(aux, requirement, number, name){
        if(aux.valid && aux.required){
            aux = Requirements[requirement].validate(this.getInput(number, name), aux, this.forms[number].rules[name][requirement]);
            if(aux.valid){
                Validator.set(this.getInput(number, name), this.getTooltip(number, name));
            }else{
                Invalidator.set(this.getInput(number, name), this.getTooltip(number, name), Messages.getOne(this.forms[number].messages[name], requirement, this.forms[number].rules[name][requirement]));
            }
        }
        return aux;
    },
    /**
     * Obtiene un input.
     * 
     * @param {number} number - La forma de obtener el formulario correctamente.
     * @param {strinf} name - El nombre del input.
     * @return {html}
     */
    getInput(number, name){
        return document.querySelector('.form-validation-' + number + ' [name=' + name + ']');
    },
    /**
     * Obtiene un tooltip.
     * 
     * @param {number} number - La forma de obtener el formulario correctamente.
     * @param {strinf} name - El nombre del input hermano.
     * @return {html}
     */
    getTooltip(number, name){
        return document.querySelector('.form-validation-' + number + ' [name=' + name + '] ~ .invalid-tooltip');
    },
};

document.addEventListener('DOMContentLoaded', function(){
    Validation.load();
});