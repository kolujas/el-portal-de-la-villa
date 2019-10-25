let Validator = {
    /**
     * Establece un input como valido.
     * 
     * @param {html} input - El input.
     * @param {html} tooltip - El tooltip.
     */
    set(input, tooltip){
        input.classList.add('valid');
        input.classList.remove('invalid');
        tooltip.classList.remove('showed');
    },
};