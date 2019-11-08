let Database = {
    async update(URL, BODY, executor){
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
    }
};

// async function database(URL, METHOD, BODY, executor){
//     return await fetch(URL, {
//         method: METHOD,
//         body: BODY,
//     }).then(respuesta => {
//         respuesta.json().then(async json => {
//             executor.finish(json);
//         });
//     }).catch(error => {
//         // PENDIENTE
//     })
// };