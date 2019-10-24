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
        <!-- slider -->
            <div class="banner-div">
                    <div id="carouselCaptions" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators d-none">
                        <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/construction.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-block">
                                <h5 class="text-white slider-heading">First slide label</h5>
                                <p class="slider-text">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/test-slider.png" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-block">
                                <h5 class="text-white slider-heading">Second slide label</h5>
                                <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/img/construction.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-block">
                                <h5 class="text-white slider-heading">Third slide label</h5>
                                <p class="slider-text">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev indicators" href="#carouselCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next indicators" href="#carouselCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                        <div class="d-flex justify-content-center">
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
    </div>

    <!-- contenido -->

    <div class="container-fluid informacion-inicial">
  <div class="row">
    <div class="col-12 text-center mt-5 div-informacion-inicial">
       <span class="lead mini-encabezado">Viví Córdoba</span>
       <h2 class="py-3">Hotel el Portal de la villa 31</h2>
      <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
      <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
      <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
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