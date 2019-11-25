@extends('layout.index')

@section('css')
    <link href="{{ asset('css/correo/gracias.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Muchas Gracias
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="jumbotron card card-image d-lg-block m-0 p-5 px-0"
    style="background: url(/img/recursos/banner-thanks.jpg) no-repeat center center;">
        <div class="text-white text-center py-5 p-0">
            <div class="py-md-5">
                <h2 class="card-title h1-responsive p-0 mb-4 mt-lg-4 font-weight-bold text-white">
                    <strong>¡Muchas Gracias!</strong>
                </h2>
                <p class="mb-4">Te responderemos en la brevedad.</p>
                <a class="btn btn-lg mt-lg-4" href="/">Regresar al Inicio</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection