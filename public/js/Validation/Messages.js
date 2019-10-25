let Messages = {
    /**
     * Obtiene los mensajes de la validación.
     * 
     * @param {html} form - El formulario.
     * @return {array}
     */
    get(form){
        if(form.dataset.messages){
            let messages = JSON.parse(form.dataset.messages);
            return this.parse(messages);
        }else{
            console.log('Formulario llamado: "' + form.className + '", no contiene reglas de validación.');
        }
    },
    /**
     * Analiza y separa los mensajes de validación.
     * 
     * @param {array} messages - Los mensajes de validación.
     * @return {array}
     */
    parse(messages){
        let aux = {};
        for(let rule in messages){
            let helper = this.parseRule(rule);
            for(let name in helper){
                if(typeof aux[name] === "undefined"){
                    aux[name] = {};
                }
                for(let fName in helper[name]){
                    aux[name][fName] = messages[rule];
                }
            }
        }
        return aux;
    },
    /**
     * Analiza y separa la regla de validación.
     * 
     * @param {string} rule - La regla de validación.
     * @return {array}
     */
    parseRule(rule){
        let aux = {};
        if(rule.search(":") >= 0){
            aux[rule.split(":")[0]] = {};
            aux[rule.split(":")[0]][rule.split(":")[1]] = {};
        }else{
            console.log("La regla " + rule + " no contiene separador.");
        }
        return aux;
    },
    getOne(messages, rule, param){
        if(Requirements[rule].params){
            for(let position = 0; position < Requirements[rule].params.length; position++){
                return messages[rule].replace(Requirements[rule].params[position], param);
            };
        }else{
            return messages[rule];
        }
    },
};