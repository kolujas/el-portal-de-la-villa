<?php
    use Illuminate\Http\Request;

    Route::middleware('api')->group(function(){
/** TipoController */
        Route::put('/galeria/{id_galeria}/mover', 'API\GaleriaController@doMover');
    });