<?php
/** WebController */
    // Route::get('/', 'WebController@construccion')->name('web.construccion');
    Route::get('/', 'WebController@inicio')->name('web.inicio');
    Route::get('/habitaciones', 'WebController@habitaciones')->name('web.habitaciones');
    Route::get('/instalaciones', 'WebController@instalaciones')->name('web.instalaciones');

    Route::middleware('auth')->group(function(){
        Route::get('/panel', 'WebController@panel')->name('web.panel');
        Route::put('/informacion/editar', 'WebController@doEditar')->name('web.doEditar');
    });

/** CorreoController */
    Route::post('/contactar', 'CorreoController@contactar')->name('correo.contactar');
    Route::get('/gracias', 'CorreoController@gracias')->name('correo.gracias');

/** AuthController */
    Route::get('/ingresar', 'Auth\LoginController@showIngresar')->name('auth.showIngresar');
    Route::post('/ingresar', 'Auth\LoginController@doIngresar')->name('auth.doIngresar');

    Route::middleware('auth')->group(function(){
        Route::get('/salir', 'Auth\LoginController@doSalir')->name('auth.doSalir');
        
/** EventoController */
        Route::get('/panel/evento/crear', 'EventoController@showCrear')->name('evento.showCrear');
        Route::post('/evento/crear', 'EventoController@doCrear')->name('evento.doCrear');
        Route::get('/panel/evento/{slug}/editar', 'EventoController@showEditar')->name('evento.showEditar');
        Route::put('/evento/{id_evento}/editar', 'EventoController@doEditar')->name('evento.doEditar');
        Route::delete('/evento/{id_evento}/eliminar', 'EventoController@doEliminar')->name('evento.doEliminar');

/** BannerController */
        Route::put('/banner/{id_banner}/editar', 'BannerController@doEditar')->name('banner.doEditar');

/** GaleriaController */
        Route::post('/galeria/{id_tipo}/agregar', 'GaleriaController@doAgregar')->name('galeria.doAgregar');
        Route::delete('/galeria/{id_galeria}/eliminar', 'GaleriaController@doEliminar')->name('galeria.doEliminar');
    });