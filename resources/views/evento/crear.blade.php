@extends('layout.index')

@section('css')
    <link href="{{asset('css/evento/crear.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Crear evento
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="crear col-12">
        <div class="title">
            <h2>Crear Evento</h2>
        </div>
        <form action="/evento/crear" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-group input-group-sm col-12 mb-3">
                    <label for="titulo" class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Título</span>
                    </label>
                    <input id="titulo" type="text" class="form-control" value="{{ old('titulo') }}">
                    <div @if($errors->has('titulo'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('titulo'))
                            {{ $errors->first('titulo') }}
                        @endif
                    </div>
                </div>

                <div class="input-group col-12">
                    <i class="material-icons prefix">description</i>
                    <textarea name="descripcion" id="description" class="materialize-textarea" data-length="120">{{ old('descripcion') }}</textarea>
                    <label for="description">Descripción</label>
                    <div @if($errors->has('descripcion'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('descripcion'))
                            {{ $errors->first('descripcion') }}
                        @endif
                    </div>
                </div>

                <div class="input-group col-12 dateDiv">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" name="fecha" id="fecha" class="datepicker" value="{{ old('fecha') }}">
                    <label for="fecha">Fecha</label>
                    <div @if($errors->has('fecha'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('fecha'))
                            {{ $errors->first('fecha') }}
                        @endif
                    </div>
                </div>

                <div class="input-group col-12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="account_circle" type="text" name="organizador" value="{{ old('organizador') }}">
                    <label for="account_circle">Organizador</label>
                    <div @if($errors->has('organizador'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('organizador'))
                            {{ $errors->first('organizador') }}
                        @endif
                    </div>
                </div>
                    
                <div class="input-group col-12 file">
                    <input type="file" id="file" size="50" name="pdf">
                    <button class="waves-effect" id="btnFile" type="button">Archivo</button>
                    <span id="texto">No se eligió ningún archivo</span>
                    <div @if($errors->has('pdf'))
                        class="invalid-tooltip showed"
                    @else
                        class="invalid-tooltip"
                    @endif>
                        @if($errors->has('pdf'))
                            {{ $errors->first('pdf') }}
                        @endif
                    </div>
                </div>

                <div class="col-12 divSubmit">
                    <button class="btn-small waves-effect waves-light grey lighten-5" type="submit" name="action">Crear evento
                        <i class="material-icons right">send</i>
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
    <script type="text/javascript" src="{{asset('js/Validation/Invalidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Requirements.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Messages.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Rules.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/evento/crear.js')}}"></script>
@endsection