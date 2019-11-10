<?php
/** WebController */
    Route::get('/', 'WebController@construccion')->name('web.construccion');
    Route::get('/demo', 'WebController@inicio')->name('web.inicio');
    Route::get('/panel', 'WebController@panel')->name('web.panel');
    Route::put('/informacion/editar', 'WebController@doEditar')->name('web.doEditar');
    
/** EventoController */
    Route::get('/panel/evento/crear', 'EventoController@showCrear')->name('evento.showCrear');
    Route::post('/evento/crear', 'EventoController@doCrear')->name('evento.doCrear');
    Route::get('/panel/evento/{slug}/editar', 'EventoController@showEditar')->name('evento.showEditar');
    Route::put('/evento/{id_evento}/editar', 'EventoController@doEditar')->name('evento.doEditar');

/** BannerController */
    Route::put('/banner/{id_banner}/editar', 'BannerController@doEditar')->name('banner.doEditar');

/** GaleriaController */
    Route::post('/galeria/{id_tipo}/agregar', 'GaleriaController@doAgregar')->name('galeria.doAgregar');
