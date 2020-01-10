<?php
    /** @var object[] $validation */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/Validation.css')}}" rel="stylesheet">
    <link href="{{asset('css/InputFileMaker.css')}}" rel="stylesheet">
    <link href="{{asset('css/evento/editar.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Editar "Título del evento"
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="editar col-12 col-md-10 col-lg-8">
        <div class="title">
            <h2>Editar Evento</h2>
        </div>
        <form action="/evento/{{$evento->id_evento}}/editar"
            class="form-validate"
            method="post"
            enctype="multipart/form-data"
            data-validation="{{$validation}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group form-group-sm col-12 mb-3">
                    <label for="titulo" class="input-name m-0 p-0">
                        <span class="input-text">Título *</span>
                    </label>
                    <input id="titulo"
                        name="titulo"
                        type="text"
                        class="form-control m-0 p-2"
                        value="{{old('titulo', $evento->titulo)}}"
                        placeholder="Título">
                    <div @if($errors->has('titulo'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('titulo'))
                            <small>{{$errors->first('titulo')}}</small>
                        @endif
                    </div>
                </div>
                
                <div class="form-group form-group-sm col-12 mb-3">
                    <label for="descripcion" class="input-name m-0 p-0">
                        <span class="input-text">Descripción *</span>
                    </label>
                    <textarea id="descripcion" 
                        name="descripcion" 
                        class="form-control m-0 p-2"
                        placeholder="Descripción">{{old('descripcion', $evento->descripcion)}}</textarea>
                    <div @if($errors->has('descripcion'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('descripcion'))
                            <small>{{$errors->first('descripcion')}}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group form-group-sm col-12 mb-3">
                    <label for="organizador" class="input-name m-0 p-0">
                        <span class="input-text">Organizador *</span>
                    </label>
                    <input id="organizador" 
                        name="organizador"
                        type="text" 
                        class="form-control m-0 p-2" 
                        value="{{old('organizador', $evento->organizador)}}"
                        placeholder="Organizador">
                    <div @if($errors->has('organizador'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('organizador'))
                            <small>{{$errors->first('organizador')}}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group form-group-sm col-12 mb-3">
                    <label for="fecha" class="input-name m-0 p-0">
                        <span class="input-text">Fecha *</span>
                    </label>
                    <input id="fecha" 
                        name="fecha"
                        type="date" 
                        class="form-control m-0 p-2" 
                        value="{{old('fecha', $evento->fecha)}}">
                    <div @if($errors->has('fecha'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('fecha'))
                            <small>{{$errors->first('fecha')}}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group form-group-sm col-12 mb-3">
                    <label for="url" class="input-name m-0 p-0">
                        <span class="input-text">URL *</span>
                    </label>
                    <input id="url" 
                        name="url"
                        type="text" 
                        class="form-control m-0 p-2" 
                        value="{{old('url', $evento->url)}}"
                        placeholder="https://ejemplo.com">
                    <div @if($errors->has('url'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('url'))
                            <small>{{$errors->first('url')}}</small>
                        @endif
                    </div>
                </div>
                    
                <div class="form-group form-group-sm col-12 my-2 d-md-flex">
                    <input class="make-a-file make-an-image" type="file" name="imagen" data-text="Imagen" data-notfound='Imagen del evento: "{{$evento->titulo}}"' data-src="{{asset('storage/' . $evento->imagen)}}">
                    <div @if($errors->has('imagen'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('imagen'))
                            <small>{{$errors->first('imagen')}}</small>
                        @endif
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button class="form-submit btn-small waves-effect waves-light grey lighten-5"
                        type="submit"
                        name="action">Editar
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/Validation/Validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Rules.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Messages.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Requirements.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Invalidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/InputFileMaker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/evento/editar.js')}}"></script>
@endsection