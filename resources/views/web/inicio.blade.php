<?php
    /** @var object $archivos */
    /** @var Banner[] $banners */
    /** @var array $galerias */
    /** @var array $vaidation */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/galeria/baguetteBox.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker/datepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/galeria/grid/gallery-grid.css')}}" rel="stylesheet">
    <link href="{{asset('css/web/inicio.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Pueblo Hotel
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
                <span class="lead mini-encabezado">Viví Córdoba</span>
                <h2 class="py-3">{{$archivos->titulo}}</h2>
                <p class="m-0 text-dark">{!!nl2br($archivos->descripcion)!!}</p>
            </div>

            <div class="presentacion-div col-lg-12 col-md-10 mt-5 px-3 mx-md-auto px-md-0 text-center flex-wrap">
                <div class="card mb-3 mb-lg-0 position-lg-relative">
                    <img src="{{asset('/img/construction.jpg')}}" class="card-img-top col-lg-6 px-0" alt="...">
                    <div class="card-body position-lg-absolute col-lg-6 pt-3 px-3 pb-0 p-lg-5">
                        <h5 class="card-title mb-3">Habitaciones</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card mb-lg-0 position-lg-relative">
                    <img src="{{asset('/img/construction.jpg')}}" class="card-img-top col-lg-6 position-lg-absolute px-0" alt="...">
                    <div class="card-body position-lg-absolute card-2-body col-lg-6 pt-3 px-3 pb-0 p-lg-5">
                        <h5 class="card-title mb-3">Y mucho más</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="separador-iconos col-12 col-md-10 col-lg-8 mt-5 px-5 mx-md-auto px-md-0 text-center">
                <div class="row">
                    <div class="d-flex justify-content-between justify-content-md-center flex-wrap">
                        <div class="icon-text col-4 col-xl-2 mb-5 mb-xl-0">
                            <i class="separador-icon fas fa-ship"></i>
                            <p class="m-0 mt-3 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="icon-text col-4 col-xl-2 mb-5 mb-xl-0">
                            <i class="separador-icon fas fa-shuttle-van"></i>
                            <p class="m-0 mt-3 font-weight-bold">Transporte</p>
                        </div>
                        <div class="icon-text col-4 col-xl-2 mb-5 mb-xl-0">
                            <i class="fas separador-icon fa-concierge-bell"></i>
                            <p class="m-0 mt-3 font-weight-bold">Check in 24hs</p>
                        </div>
                        <div class="icon-text col-4 col-xl-2">
                            <i class="separador-icon fas fa-coffee"></i>
                            <p class="m-0 mt-3 font-weight-bold">Desayuno hasta las 11am</p>
                        </div>
                        <div class="icon-text col-4 col-xl-2">
                            <i class="separador-icon fas fa-swimming-pool"></i>
                            <p class="m-0 mt-3 font-weight-bold">Pileta exterior y climatizada</p>
                        </div>
                        <div class="icon-text col-4 col-xl-2">
                            <i class="separador-icon fas fa-wifi"></i>
                            <p class="m-0 mt-3 font-weight-bold">WIFI de alta velocidad</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="galeria" class="gallery-container col-12 col-lg-10 p-0 mx-md-auto">
                <h2 class="text-center mt-5 mb-0">Galeria de fotos</h2>
                <div class="tz-gallery galeria px-3 pb-0">
                    <div class="row pt-3 pb-4">
                        @if(count($galeria))
                            @for($i = 0; $i < count($galeria); $i++)
                                @if($i < 6)
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox" href="{{asset('storage/' . $galeria[$i]->imagen)}}">
                                            <img class="mb-0" src="{{asset('storage/' . $galeria[$i]->imagen)}}" alt="Park">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-sm-6 col-md-4 d-none">
                                        <a class="lightbox" href="{{asset('storage/' . $galeria[$i]->imagen)}}"></a>
                                    </div>
                                @endif
                            @endfor
                            <!-- corta este codigo para moverlo -->
                            @if(count($galeria) > 6)
                                <div class="col-sm-6 col-md-4">
                                    <a class="btn btn-primary load_gallery" href="#">Ver más</a>
                                </div>
                            @endif
                            <!-- hasta acá -->
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

            <div id="contacto" class="contacto col-12 col-md-8 col-xl-6 mt-5 mx-md-auto px-5 px-md-0">
                <h3 class="text-center mb-3">Contactanos</h3>
                <form class="row text-right">
                    <div class="form-group text-left text-uppercase col-12 mb-3">
                        <label class="font-weight-bold" for="nombre">Nombre</label>
                        <input type="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre">
                    </div>
                    <div class="form-group text-left text-uppercase col-12 mb-3">
                        <label class="font-weight-bold" for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group text-left text-uppercase col-12 mb-3">
                        <label class="font-weight-bold" for="email">Teléfono</label>
                        <input type="number" class="form-control" id="email" placeholder="Teléfono">
                    </div>

                    <div class="form-group text-left text-uppercase col-12 my-3">
                        <div class="row w-100 m-auto d-flex justify-content-between">
                            <div id="checkin" class="date col-12 col-md-5 col-lg-3 mb-3 px-0">
                                <!-- <label class="font-weight-bold w-100" for="checkin-input">Check in</label> -->
                                <input type="text" class="form-control" id="checkin-input" placeholder="check in">
                                <label for="checkin-input" class="input-group-addon m-0">
                                    <i class="far fa-calendar-alt"></i>
                                </label>
                                <!-- <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span> -->
                            </div>

                            <div id="checkout" class="date col-12 col-md-5 col-lg-3 mb-3 px-0">
                                <!-- <label class="font-weight-bold w-100" for="checkout-input">check out</label> -->
                                <input type="text" class="form-control" id="checkout-input" placeholder="check out">
                                <label for="checkout-input" class="input-group-addon m-0">
                                    <i class="far fa-calendar-check"></i>
                                </label>
                            </div>

                            <!-- <div class="form-group input-group text-center text-uppercase col-6 col-md-3 mb-3 personas">
                                <label class="font-weight-bold" for="personas">Número de personas</label> 
                                <input type="number" class="form-control" id="personas" aria-describedby="nombreHelp" placeholder="Huespedes"><span class="input-group-addon"><i class="fas fa-user-plus"></i></span>
                                </div> 
                            </div> -->

                            <div class="col-12 col-md-5 col-lg-3 px-1 personas position-relative mb-3 m-md-auto mx-lg-0 mt-lg-0">
                            <!-- <label class="font-weight-bold" for="personas">Número de personas</label> -->
                                <select class="huespedes custom-select text-uppercase" id="inputGroupSelect02">
                                    <option selected disabled>Huespedes</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                    <option value="3">5</option>
                                    <option value="3">6</option>
                                    <option value="3">+</option>
                                </select>
                                <label class="input-group-text px-0" for="inputGroupSelect02">
                                    <i class="fas fa-user-plus"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right text-uppercase col-12 mb-3">
                        <button type="submit" class="btn btn-primary enviar-contacto text-uppercase">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-12 text-center mt-5 gmaps px-0 px-md-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13508.42240002282!2d-64.451797!3d-32.174427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb83237eb8a7521b!2sHotel%20El%20Portal%20de%20la%20Villa!5e0!3m2!1ses!2sar!4v1572380101216!5m2!1ses!2sar" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
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
    <script type="text/javascript" src="{{asset('js/web/inicio.js')}}"></script>
    
    
    <script>
    
        baguetteBox.run('.tz-gallery', {
            buttons: true,
        });

        $('#checkin').datepicker({
            format: "dd M",
            language: "es"
        });

        $('#checkout').datepicker({
            format: "dd M",
            language: "es"
        });
        
    </script>
@endsection