<?php
/** WebController */
    Route::get('/', 'WebController@construccion')->name('web.construccion');
    Route::get('/demo', 'WebController@inicio')->name('web.inicio');
    Route::get('/panel', 'WebController@panel')->name('web.panel');
    
/** EventoController */
    Route::get('/panel/evento/crear', 'EventoController@showCrear')->name('evento.showCrear');
    Route::get('/panel/evento/{slug}/editar', 'EventoController@showEditar')->name('evento.showEditar');
