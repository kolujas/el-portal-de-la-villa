<?php
    /** @var object $archivos */
    /** @var Banner[] $banners */
    /** @var Galeria[] $galeria */
    /** @var Evento[] $eventos */
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
                        <img src="{{asset('storage/' . $banner->imagen)}}" class="d-block w-100" alt="foto">
                        <div class="carousel-caption d-block d-md-flex justify-content-center flex-wrap">
                            <h5 class="text-white slider-heading">{{$banner->titulo}}</h5>
                            <p class="slider-text">{!!nl2br($banner->descripcion)!!}</p>
                            <div class="carousel-footer d-flex justify-content-center">
                                <a href="#contacto" class="btn btn-primary redirigirBtn">Contactar</a>
                            </div>
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
        </div>
    </div>
@endsection

@section('main')
    <!-- contenido -->
    <div class="informacion-inicial col-12">
        <div class="row">
            <div id="informacion" class="informacion div-informacion-inicial col-12 col-md-10 col-lg-8 col-xl-6 px-5 mx-md-auto px-0 my-4 text-center">
                <span class="section-title-border mx-auto"></span>
                <span class="lead mini-encabezado d-block pt-4 mt-2">Viví Córdoba</span>
                <h2 class="py-3">{{$archivos->titulo}}</h2>
                <p class="m-0 text-dark">{!!nl2br($archivos->descripcion)!!}</p>
            </div>

            <div class="presentacion-div col-lg-12 col-md-10 px-3 mx-md-auto px-lg-0 my-4 text-center flex-wrap">
                <div class="card mb-3 mb-lg-0 position-lg-relative">
                    <img src="{{asset('img/recursos/banner-habitaciones.JPG')}}" class="card-img-top col-lg-6 px-0" alt="foto">
                    <div class="card-body position-lg-absolute pt-3 px-3 pb-0 p-lg-5">
                        <h5 class="card-title mb-3">Habitaciones</h5>
                        <p class="card-text">Ofrecemos desde nuestras habitaciones comodidad, servicio, simpleza y contacto con la Naturaleza. Nos encanta conectarnos con nuestros huéspedes que vienen desde muchos lugares todo el año. Nuestra premisa la hospitalidad.</p>
                        <a href="/habitaciones" class="more btn btn-primary mb-4">Ver más</a>
                    </div>
                </div>
                <div class="card mb-3 mb-lg-0 position-lg-relative">
                    <img src="{{asset('img/recursos/banner-instalaciones.JPG')}}" class="card-img-top position-lg-absolute col-lg-6 px-0" alt="foto">
                    <div class="card-body position-lg-absolute card-2-body pt-3 px-3 pb-0 p-lg-5">
                        <h5 class="card-title mb-3">Instalaciones</h5>
                        <p class="card-text">Cada vez que visite Villa del Dique nos encargaremos de hacerlo sentir tan cómodo como en su propia casa. El Portal de la Villa cuenta con la calidez de un staff comprometido que hará con detalles simples que experimente la comodidad.</p>
                        <a href="/instalaciones" class="more btn btn-primary mb-4">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="separador-iconos col-12 py-5 text-center">
                <div class="row">
                    <div class="d-flex justify-content-center justify-content-md-center flex-wrap">
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-coffee"></i>
                            <p class="m-0 mt-3 font-weight-bold">Desayuno gratuito</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-parking"></i>
                            <p class="m-0 mt-3 font-weight-bold">Parking gratuito</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-snowflake"></i>
                            <p class="m-0 mt-3 font-weight-bold">Aire acondicionado</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-utensils"></i>
                            <p class="m-0 mt-3 font-weight-bold">Restaurante</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-baby-carriage"></i>
                            <p class="m-0 mt-3 font-weight-bold">Apto para niños</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-swimmer"></i>
                            <p class="m-0 mt-3 font-weight-bold">Pileta exterior y climatizada</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-tshirt"></i>
                            <p class="m-0 mt-3 font-weight-bold">Servicio completo de lavandería</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-glass-martini-alt"></i>
                            <p class="m-0 mt-3 font-weight-bold">Bar</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-wifi"></i>
                            <p class="m-0 mt-3 font-weight-bold">WIFI de alta velocidad</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-xl-5">
                            <i class="separador-icon fas fa-spa"></i>
                            <p class="m-0 mt-3 font-weight-bold">SPA</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-xl-5">
                            <i class="separador-icon fas fa-anchor"></i>
                            <p class="m-0 mt-3 font-weight-bold">Club de costa</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-xl-5">
                            <i class="separador-icon fas fa-thermometer-full"></i>
                            <p class="m-0 mt-3 font-weight-bold">Calefacción central</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="galeria" class="gallery-container col-12 col-lg-10 p-0 mt-3 pt-4 mx-md-auto">
                <span class="section-title-border mx-auto"></span>
                <h2 class="text-center mb-0 mt-4 pt-2">Galería de fotos</h2>
                <div class="tz-gallery galeria px-3 pt-4 pb-0">
                    <div class="row">
                        @if(count($galeria))
                            @for($i = 0; $i < count($galeria); $i++)
                                @if($i < 6)
                                    <div class="col-sm-6 col-md-4 my-4">
                                        <a class="lightbox" href="{{asset('storage/' . $galeria[$i]->imagen)}}">
                                            <img class="mb-0" src="{{asset('storage/' . $galeria[$i]->imagen)}}" alt="Park">
                                        </a>
                                    </div>
                                @else
                                    <div class="col-sm-6 col-md-4 my-4 d-none">
                                        <a class="lightbox" href="{{asset('storage/' . $galeria[$i]->imagen)}}"></a>
                                    </div>
                                @endif
                            @endfor
                        @else
                            <div class="col-sm-6 col-md-4 my-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 my-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 my-4">
                                <div class="empty-image p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div> 
            </div>

            @if(count($galeria) > 6)
                <div class="col-12 d-flex justify-content-center">
                    <a class="btn btn-primary load_gallery" href="#">Ver más</a>
                </div>
            @endif

            <div class="card-group mt-3 pt-4 eventos col-12">
                <div class="row d-flex justify-content-around px-3 ml-0">
                    <span class="section-title-border mx-auto"></span>
                    <h2 class="pb-4 my-4 pt-2 col-12 text-center">Últimos eventos</h2>
                    @if(count($eventos))
                        @foreach($eventos as $evento)
                            <a href="{{$evento->url}}" target="_blank" class="card card-event col-12 col-md-5 col-lg-4 px-0 mb-5">
                                <div class="card-body p-0">
                                    <img src="{{asset('storage/' . $evento->imagen)}}" class="card-img" alt="foto">
                                    <div class="date text-center p-3">
                                        <div class="day">{{$evento->date->day}}</div>
                                        <div class="text">
                                            <span class="month text-uppercase">{{$evento->date->month}}</span>
                                            <span class="year text-uppercase">{{$evento->date->year}}</span>
                                        </div>
                                    </div>
                                    <div class="card-title px-3">
                                        <span class="section-title-border my-4"></span>
                                        <h5 class="card-title text-dark">{{$evento->titulo}}</h5>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="card empty-card col-12 col-md-5 col-lg-4 px-0 mb-4">
                            <div class="empty-image"></div>
                            <div class="card-body empty-body">
                                <div class="empty-content"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div id="contacto" class="contacto col-12 mx-md-auto mt-3 pt-5">
                <form class="form-validate row text-right"
                    data-validation="{{$validation}}">
                    <div class="col-12">
                        <span class="section-title-border mx-auto"></span>
                        <h3 class="text-center text-white pb-4 mt-4 pt-2 px-5">Contactanos</h3>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="form col-12 col-md-7 px-5 pb-3">
                                <div class="row">
                                    <div class="form-group text-left text-uppercase col-12 col-md-10 col-lg-10 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre">
                                    </div>
                                    
                                    <div class="form-group text-left text-uppercase col-12 col-md-10 col-lg-10 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                    </div>

                                    <div class="form-group text-left text-uppercase col-12 col-md-10 col-lg-10 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="telefono">Teléfono</label>
                                        <input type="number" class="form-control" id="telefono" placeholder="Teléfono">
                                    </div>

                                    <div class="personas form-group text-left text-uppercase col-12 col-md-10 col-lg-10 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="huespedes">Huespedes</label>
                                        <div class="huespedes">
                                            <select class="form-control huespedes custom-select" id="huespedes">
                                                <option selected disabled>Huespedes</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3">4</option>
                                                <option value="3">5</option>
                                                <option value="3">6 o más</option>
                                            </select>
                                            <label class="input-group-text px-0" for="huespedes">
                                                <span class="input-group-addon"><i class="label-icon fas fa-user-plus"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fechas col-12 col-md-5 p-0 d-md-flex align-items-center">
                                <div class="row m-auto d-flex justify-content-around text-center text-white">
                                    <div class="col-5 col-md-12 pt-5 pb-3 py-md-0">
                                        <label class="row" for="checkin">
                                            <div class="col-12">Checkin</div>
                                            <div class="col-12 day">12</div>
                                            <div class="col-12 text">
                                                <span class="month text-uppercase">Diciembre</span>
                                                <span class="year text-uppercase">2019</span>
                                            </div>
                                        </label>
                                        <input class="form-date form-control p-0" id="checkin" type="text" readonly />
                                    </div>
                                    <div class="col-1 col-md-12 d-flex align-items-center my-3">
                                        <span class="section-addon-border mx-auto"></span>
                                    </div>
                                    <div class="col-5 col-md-12 pt-5 pb-3 py-md-0">
                                        <label class="row" for="checkout">
                                            <div class="col-12">Checkout</div>
                                            <div class="col-12 day">05</div>
                                            <div class="col-12 text">
                                                <span class="month text-uppercase">Enero</span>
                                                <span class="year text-uppercase">2020</span>
                                            </div>
                                        </label>
                                        <input class="form-date form-control p-0" id="checkout" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right text-uppercase col-12 mb-5 mt-md-3 d-flex justify-content-center">
                        <button type="submit" class="form-submit btn btn-primary enviar-contacto text-uppercase">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-12 text-center mt-5 gmaps px-0 px-0 mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13508.42240002282!2d-64.451797!3d-32.174427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb83237eb8a7521b!2sHotel%20El%20Portal%20de%20la%20Villa!5e0!3m2!1ses!2sar!4v1572380101216!5m2!1ses!2sar" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center position-fixed redes-sociales py-2">
        <a class="icon facebook-icon mb-2" target="_blank" href="https://www.facebook.com/ElPortalDeLaVillaHotel/">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="icon instagram-icon" target="_blank" href="https://www.instagram.com/elportaldelavillahotel/">
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

        $(function () {
            $("#checkin").datepicker({ 
                    format: "dd-mm-yyyy",
                    language: "es",
                    autoclose: true, 
                    todayHighlight: true                    
            }).datepicker('update', new Date());
        });

        $(function () {
            $("#checkout").datepicker({ 
                   format: "dd-mm-yyyy",
                    language: "es",
                    autoclose: true, 
                    todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(".form-date").on('change', function(e){
            e.preventDefault();
            FormDate.change(this);
        });
        
    </script>
@endsection