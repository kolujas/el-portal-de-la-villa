<?php
    /** @var Banner[] $banners */
    /** @var habitaciones[] $habitaciones */
    /** @var array $vaidation */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/galeria/baguetteBox.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker/datepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/galeria/grid/gallery-grid.css')}}" rel="stylesheet">
    <link href="{{asset('css/web/habitaciones.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Habitaciones
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('banner')
    <div class="banner-div">
        <div id="carouselCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators d-none">
                <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselCaptions" data-slide-to="1"></li>
                <li data-target="#carouselCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($banners as $banner)
                    @if($banner->id_banner == 1)
                    <div class="carousel-item active d-flex justify-content-center align-items-center">
                    @else
                    <div class="carousel-item d-flex justify-content-center align-items-center">
                    @endif
                        <img src="{{asset('storage/' . $banner->imagen)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-block d-md-flex justify-content-center flex-wrap">
                            <h5 class="text-white slider-heading">{{$banner->titulo}}</h5>
                            <p class="slider-text">{!!nl2br($banner->descripcion)!!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev indicators" href="#carouselCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next indicators" href="#carouselCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <div class="carousel-footer d-flex justify-content-center">
                <!-- <a href="#" type="submit" class="btn btn-primary redirigirBtn">Reservar</a> -->
                <a href="#contacto" class="btn btn-primary redirigirBtn">Reservar</a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <!-- contenido -->
    <div class="informacion-inicial col-12">
        <div class="row">
            <div id="informacion" class="informacion div-informacion-inicial col-12 col-md-10 col-lg-8 col-xl-6 mt-5 px-5 mx-md-auto px-md-0 text-center">
                <span class="lead mini-encabezado">Habitaciones</span>
                <h2 class="py-3">Título</h2>
                <p class="m-0 text-dark">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis vero obcaecati debitis, eligendi dolore culpa deleniti, consequuntur et temporibus quaerat corporis. Praesentium quos nobis error suscipit architecto aliquam cupiditate atque.</p>
            </div>
            
            <div id="habitaciones" class="galeria gallery-container col-12 col-lg-10 p-0 mx-md-auto">
                <h2 class="text-center mt-5 mb-0">Galería de fotos</h2>
                <div class="tz-gallery habitaciones px-3 pb-0">
                    <div class="row pt-3 pb-4">
                        @if(count($habitaciones))
                            @for($i = 0; $i < count($habitaciones); $i++)
                                @if($i < 6)
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox" href="{{asset('storage/' . $habitaciones[$i]->imagen)}}">
                                            <img class="mb-0" src="{{asset('storage/' . $habitaciones[$i]->imagen)}}" alt="Park">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-sm-6 col-md-4 d-none">
                                        <a class="lightbox" href="{{asset('storage/' . $habitaciones[$i]->imagen)}}"></a>
                                    </div>
                                @endif
                            @endfor
                        @else
                            <div class="col-sm-6 col-md-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div> 
            </div>

            @if(count($habitaciones) > 6)
                <div class="row col-12 d-flex justify-content-center">
                    <a class="btn btn-primary load_gallery" href="#">Ver más</a>
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center position-fixed redes-sociales py-2">
        <a class="icon facebook-icon mb-2" target="_blank" href="https://www.facebook.com">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="icon instagram-icon" target="_blank" href="https://www.facebook.com">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/datepicker/datepicker.js')}}"></script>     
    <script type="text/javascript" src="{{asset('js/datepicker/locales/ES-es.js')}}"></script>     
    <script type="text/javascript" src="{{asset('js/galeria/baguetteBox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/web/habitaciones.js')}}"></script>
@endsection