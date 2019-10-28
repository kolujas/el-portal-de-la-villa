let Rules = {
    /**
     * Obtiene las reglas de validación.
     * 
     * @param {html} form - El formulario.
     * @return {array}
     */
    get(form){
        if(form.dataset.validation){
            let validation = JSON.parse(form.dataset.validation);
            return this.parse(validation.rules);
        }else{
            console.log('Formulario llamado: "' + form.className + '", no contiene reglas de validación.');
        }
    },
    /**
     * Analiza y separa las reglas de validación.
     * 
     * @param {string} rules - Las reglas de validación.
     * @return {array}
     */
    parse(rules){
        let aux = [];
        for(let name in rules){
            if(rules[name].search("|") >= 0){
                aux[name] = rules[name].split("|");
            }else{
                aux[name] = rules[name];
            }
            aux[name] = this.getParams(aux[name]);
        }
        return aux;
    },
    /**
     * Obtiene los parámetros de las reglas de validación.
     * 
     * @param {string} rules - Las reglas de validación.
     * @return {array}
     */
    getParams(rules){
        let aux = [];
        for(let position = 0; position < rules.length; position ++){
            if(rules[position].search(":") >= 0){
                aux[rules[position].split(":")[0]] = rules[position].split(":")[1];
            }else{
                aux[rules[position]] = false;
            }
        }
        return aux;
    },
};