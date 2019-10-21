<?php
/** WebController */
    Route::get('/', 'WebController@inicio')->name('web.inicio');
    Route::get('/panel', 'WebController@panel')->name('web.panel');