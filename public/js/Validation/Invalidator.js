let Invalidator = {
    /**
     * Establece un input como invalido.
     * 
     * @param {html} input - El input.
     * @param {html} tooltip - El tooltip.
     * @param {string} message - El mensaje de error.
     */
    set(input, tooltip, message){
        input.classList.add('invalid');
        tooltip.innerHTML = message;
        tooltip.classList.add('showed');
        input.classList.remove('valid');
    },
};