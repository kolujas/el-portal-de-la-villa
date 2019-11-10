let Database = {
    /**
     * Send by fetch and POST method something.
     * @param {string} URL - The URL.
     * @param {array} BODY - The body.
     * @param {object} executor - The executor.
     */
    async create(URL, BODY, executor){
        return await fetch(URL, {
            method: 'POST',
            body: BODY,
        }).then(respuesta => {
            respuesta.json().then(async json => {
                executor.finish(json);
            });
        }).catch(error => {
            // PENDIENTE
        })
    },
    /**
     * Send by fetch and PUT method something.
     * @param {string} URL - The URL.
     * @param {array} BODY - The body.
     * @param {object} executor - The executor.
     */
    async update(URL, BODY, executor){
        return await fetch(URL, {
            method: 'PUT',
            body: BODY,
        }).then(respuesta => {
            respuesta.json().then(async json => {
                executor.finish(json);
            });
        }).catch(error => {
            // PENDIENTE
        })
    },
};