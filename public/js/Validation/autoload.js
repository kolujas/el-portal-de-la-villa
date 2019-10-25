let autoload = {
    src: null,
    parent: null,
    files: {
        Invalidator: false,
        Validator: false,
        Requirements: false,
        Messages: false,
        Rules: false,
        Validation: 'load',
    },
    /** El loader del autoload. */
    load(){
        if(document.querySelector('#validation_autoload')){
            this.src = document.querySelector('#validation_autoload').src;
            this.parent = document.querySelector('#validation_autoload').parentNode;
        }else{
            console.log('No se encontró el ID del archivo autoload "validation_autoload"');
        }
        for(let file in this.files){
            this.putFiles(this.src.replace('autoload', file), {fileName: file, functionName: this.files[file]});
        }
    },
    /**
     * Incluye un archivo script.
     * 
     * @param {string} url - La url del script.
     * @param {object} callback - La función a ejecutar.
     */
    putFiles(url, callback){
        let script = document.createElement("script")
        script.type = "text/javascript";
        if(script.readyState){
            script.onreadystatechange = function(){
                if(script.readyState == "loaded" || script.readyState == "complete"){
                    script.onreadystatechange = null;
                    if(callback.functionName){
                        Validation.load();
                    }
                }
            };
        }else{
            script.onload = function(){
                if(callback.functionName){
                    Validation.load();
                }
            };
        }
        script.src = url;
        this.parent.appendChild(script);
    },
};

document.addEventListener('DOMContentLoaded', function(){
    autoload.load();
});