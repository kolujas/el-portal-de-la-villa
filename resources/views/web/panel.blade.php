@extends('layout.index')

@section('css')
    <link href="{{asset('css/web/panel.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El portal de la Villa - Panel de administración
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div id="categorias" class="categorias col-12 p-0">
        <h2 class="h1-responsive mt-4 mb-0 text-center">Todo lo que buscas</h2>

        <div>
            <div class="cards multiple row d-flex justify-content-center m-0 pt-4">
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/construccion" class="card text-center">
                    <div class="card-body">
                        <h3 class="h5 card-title m-0">Construcción</h3>

                        <img class="card-img-top"
                            src="{{asset('img/categorias/construccion.jpg')}}"
                            alt="icono de construccion">
                    </div>
                </a>
                <a href="/categoria/gastronomia" class="card text-center">
                    <div class="card-body">
                        <img class="card-img-top"
                            src="{{asset('img/categorias/gastronomia.jpg')}}"
                            alt="icono de gastronomia">
                            
                        <h3 class="h5 card-title m-0">Gastronomia</h3>
                    </div>
                </a>
                <a href="/categoria/gastronomia" class="card text-center">
                    <div class="card-body">
                        <img class="card-img-top"
                            src="{{asset('img/categorias/gastronomia.jpg')}}"
                            alt="icono de gastronomia">
                            
                        <h3 class="h5 card-title m-0">Gastronomia</h3>
                    </div>
                </a>
                <a href="/categoria/gastronomia" class="card text-center">
                    <div class="card-body">
                        <img class="card-img-top"
                            src="{{asset('img/categorias/gastronomia.jpg')}}"
                            alt="icono de gastronomia">
                            
                        <h3 class="h5 card-title m-0">Gastronomia</h3>
                    </div>
                </a>
                <a href="/categoria/gastronomia" class="card text-center">
                    <div class="card-body">
                        <img class="card-img-top"
                            src="{{asset('img/categorias/gastronomia.jpg')}}"
                            alt="icono de gastronomia">
                            
                        <h3 class="h5 card-title m-0">Gastronomia</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- <div id="avisos" class="avisos col-12 col-md-12 col-xl-10 p-0">
        <h2 class="h1-responsive mt-4 mb-0 text-center">Basado en tu historial</h2>

        <div class="cards">
            <div class="card">
                <div class="card-body">
                    <img class="body-image" src="{{asset('img/banner.jpg')}}" alt="Imagen del aviso">
                </div>
                <div class="card-footer">
                    <h3>Carlitos el de la esquina</h3>
                </div>
            </div>
        </div>
        
        <h2 class="h1-responsive mt-4 mb-0 text-center">También te puede gustar</h2>

        <div class="cards">
            <div class="card">
                <div class="card-body">
                    <img class="body-image" src="{{asset('img/banner.jpg')}}" alt="Imagen del aviso">
                </div>
                <div class="card-footer">
                    <h3>Carlitos el de la esquina</h3>
                </div>
            </div>
        </div>
    </div> -->
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/Banner.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/web/inicio.js')}}"></script>
@endsection