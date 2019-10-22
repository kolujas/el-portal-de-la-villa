@extends('layout.index')

@section('css')
    <link href="{{asset('css/web/inicio.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Pueblo Hotel
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="container-fluid">
        <div class="banner-div">
        <div class="black-background bg-dark"></div>
        <div class="jumbotron-banner bg-transparent text-white d-flex justify-content-center">
            <p class="text-center">Lorem ipsum dolor sit.</p>
            <a class="btn btn-primary btn-md redirigirBtn" href="#" role="button">Consultar</a>
            <a class="facebook-icon" href="https://www.facebook.com">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="facebook-icon" href="https://www.facebook.com">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="instagram-icon" href="https://www.facebook.com">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/web/inicio.js')}}"></script>
@endsection