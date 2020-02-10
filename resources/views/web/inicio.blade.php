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
    <link href="{{asset('css/Headroom.css')}}" rel="stylesheet">
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
                                <a href="#contacto" class="btn btn-primary redirigirBtn">Reservar</a>
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

            <div class="presentacion-div col-lg-12 col-md-10 px-3 mx-md-auto px-lg-0 mt-3 text-center flex-wrap">
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
                            <p class="m-0 mt-3 font-weight-bold">Desayuno completo</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-parking"></i>
                            <p class="m-0 mt-3 font-weight-bold">Cochera cubierta</p>
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
                            <i class="separador-icon fas fa-child"></i>
                            <!-- <i class="separador-icon fas fa-baby-carriage"></i> -->
                            <p class="m-0 mt-3 font-weight-bold">Juegos para niños</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-swimmer"></i>
                            <p class="m-0 mt-3 font-weight-bold">Pileta con solarium</p>
                        </div>
                        <div class="icon-text col-4 col-xl-3 mb-5 mb-xl-5">
                            <i class="separador-icon fas fa-swimming-pool"></i>
                            <!-- <i class="separador-icon fas fa-tshirt"></i> -->
                            <p class="m-0 mt-3 font-weight-bold">Pileta interior climatizada</p>
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

            <div id="galeria" class="gallery-container col-12 col-lg-10 p-0 mt-3 pt-3 mx-md-auto">
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
                            <a href="{{$evento->url}}" target="_blank" class="card card-event col-12 col-md-5 col-lg-4 px-0 mb-4">
                                <div class="card-body p-0">
                                    <img src="{{asset('storage/' . $evento->imagen)}}" class="card-img" alt="foto">
                                    <div class="date text-center p-3">
                                        <div class="day text">{{$evento->date->day}}</div>
                                        <div class="text">
                                            <span class="month text-uppercase mr-2">{{$evento->date->month}}</span>
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
                    @endif
                </div>
            </div>

            <div id="contacto" class="contacto col-12 mx-md-auto mt-3 pt-4">
                <form class="form-validate row text-right pt-3"
                    action="/contactar"
                    method="post"
                    data-validation="{{$validation}}">
                    @csrf

                    <div class="col-12">
                        <span class="section-title-border mx-auto"></span>
                        <h3 class="text-center text-white pb-4 mt-4 pt-2 px-5">Contactanos</h3>
                    </div>

                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <div class="form col-12 col-md-7 col-lg-6 px-5 px-md-0 pb-3">
                                <div class="row">
                                    <div class="form-group text-left text-uppercase col-12 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                                        <div @if($errors->has('nombre'))
                                            class="nombre invalid-tooltip showed"
                                        @else
                                            class="nombre invalid-tooltip"
                                        @endif>
                                            @if($errors->has('nombre'))
                                                <small>{{$errors->first('nombre')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-left text-uppercase col-12 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="email">Email *</label>
                                        <input type="email" name="correo" class="form-control" value="{{old('correo')}}" id="email" placeholder="Email">
                                        <div @if($errors->has('correo'))
                                            class="correo invalid-tooltip showed"
                                        @else
                                            class="correo invalid-tooltip"
                                        @endif>
                                            @if($errors->has('correo'))
                                                <small>{{$errors->first('correo')}}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group text-left text-uppercase col-12 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="telefono">Teléfono *</label>
                                        <input type="number" name="telefono" class="form-control" value="{{old('telefono')}}" id="telefono" placeholder="Teléfono">
                                        <div @if($errors->has('telefono'))
                                            class="telefono invalid-tooltip showed"
                                        @else
                                            class="telefono invalid-tooltip"
                                        @endif>
                                            @if($errors->has('telefono'))
                                                <small>{{$errors->first('telefono')}}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="personas form-group text-left text-uppercase col-12 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="huespedes">Huespedes</label>
                                        <div class="huespedes">
                                            <select class="form-control huespedes custom-select" name="huespedes" id="huespedes">
                                                @switch(old('huespedes'))
                                                    @case('1')
                                                        <option disabled>Huespedes</option>
                                                        <option selected value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                    @break
                                                    @case('2')
                                                        <option disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option selected value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                    @break
                                                    @case('3')
                                                        <option disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option selected value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                    @break
                                                    @case('4')
                                                        <option disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option selected value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                    @break
                                                    @case('5')
                                                        <option disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option selected value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                    @break
                                                    @case('6')
                                                        <option disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option selected value="6">6 o más</option>
                                                    @break
                                                    @default
                                                        <option selected disabled>Huespedes</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6 o más</option>
                                                @endswitch
                                            </select>
                                            <label class="input-group-text px-0" for="huespedes">
                                                <span class="input-group-addon"><i class="label-icon fas fa-user-plus"></i></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group text-left text-uppercase col-12 mb-3 mx-auto">
                                        <label class="font-weight-bold" for="mensaje">Mensaje</label>
                                        <textarea name="mensaje" class="form-control" value="{{old('mensaje')}}" id="mensaje" placeholder="Mensaje"></textarea>
                                        <div @if($errors->has('mensaje'))
                                            class="mensaje invalid-tooltip showed"
                                        @else
                                            class="mensaje invalid-tooltip"
                                        @endif>
                                            @if($errors->has('mensaje'))
                                                <small>{{$errors->first('mensaje')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fechas col-12 col-md-3 col-lg-2 p-0 px-lg-3">
                                <div class="row m-auto d-flex justify-content-center text-center text-white checkins">
                                    <div class="fecha-col col-4 col-md-12 col-lg-10 pb-3 py-md-0">
                                        <label class="row mb-0 px-lg-3" for="checkin">
                                            <div class="col-12 d-flex justify-content-center">Checkin</div>
                                            <div class="col-12 day text d-flex justify-content-center"></div>
                                            <div class="col-12 text d-flex justify-content-center">
                                                <span class="month text-uppercase mr-2"></span>
                                                <span class="year text-uppercase"></span>
                                            </div>
                                        </label>
                                        <input class="form-date form-control p-0" value="{{old('checkin')}}" id="checkin" name="checkin" type="text" readonly />
                                        <div @if($errors->has('checkin'))
                                            class="checkin invalid-tooltip showed"
                                        @else
                                            class="checkin invalid-tooltip"
                                        @endif>
                                            @if($errors->has('checkin'))
                                                <small>{{$errors->first('checkin')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-1 col-md-12 d-flex align-items-center my-3">
                                        <span class="section-addon-border mx-auto"></span>
                                    </div>
                                    <div class="fecha-col col-4 col-md-12 col-lg-10 pb-3 py-md-0">
                                        <label class="row mb-0 px-lg-3" for="checkout">
                                            <div class="col-12 d-flex justify-content-center">Checkout</div>
                                            <div class="col-12 day text d-flex justify-content-center"></div>
                                            <div class="col-12 text d-flex justify-content-center">
                                                <span class="month text-uppercase mr-2"></span>
                                                <span class="year text-uppercase"></span>
                                            </div>
                                        </label>
                                        <input class="form-date form-control p-0" value="{{old('checkout')}}" id="checkout" name="checkout" type="text" readonly />
                                        <div @if($errors->has('checkout'))
                                            class="checkout invalid-tooltip showed"
                                        @else
                                            class="checkout invalid-tooltip"
                                        @endif>
                                            @if($errors->has('checkout'))
                                                <small>{{$errors->first('checkout')}}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-3 mb-3 mx-auto d-flex justify-content-center flex-wrap">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        <div @if($errors->has('g-recaptcha-response'))
                            class="col-12 g-recaptcha-response invalid-tooltip showed"
                        @else
                            class="col-12 g-recaptcha-response invalid-tooltip"
                        @endif>
                            @if($errors->has('g-recaptcha-response'))
                                <small>{{$errors->first('g-recaptcha-response')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-right text-uppercase col-12 mb-4 mt-md-3 d-flex justify-content-center">
                        <button type="submit" class="form-submit btn btn-primary enviar-contacto text-uppercase">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-12 text-center gmaps px-0 px-0">
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

@section('extras')
    @component('components.whatsapp')
    @endcomponent
@endsection



@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script src="{{asset('ValidationJS/js/Validation.js')}}"></script>
    <script src="{{asset('ValidationJS/js/Rules.js')}}"></script>
    <script src="{{asset('ValidationJS/js/Messages.js')}}"></script>
    <script src="{{asset('ValidationJS/js/Requirements.js')}}"></script>
    <script src="{{asset('ValidationJS/js/Validator.js')}}"></script>
    <script src="{{asset('ValidationJS/js/Invalidator.js')}}"></script>
    <script src="{{asset('js/datepicker/datepicker.js')}}"></script>     
    <script src="{{asset('js/datepicker/locales/ES-es.js')}}"></script>     
    <script src="{{asset('js/galeria/baguetteBox.min.js')}}"></script>
    <script src="{{asset('js/headroom.js')}}"></script>
    <script src="{{asset('https://unpkg.com/scrollreveal')}}"></script>
    <script src="{{asset('js/scrollReveal.js')}}"></script>
    <script src="{{asset('js/web/inicio.js')}}"></script>
    
    <script>
        baguetteBox.run('.tz-gallery', {
            buttons: true,
        });

        let dat, month, year;
        @if(old('checkin'))
            let checkin = "{{old('checkin')}}";
            day = checkin.split('-')[2];
            month = checkin.split('-')[1] - 1;
            year = checkin.split('-')[0];
            checkin = new Date(year,month,day);
        @else
            let checkin = new Date();
        @endif

        @if(old('checkout'))
            let checkout = "{{old('checkout')}}";
            day = checkout.split('-')[2];
            month = checkout.split('-')[1] - 1;
            year = checkout.split('-')[0];
            checkout = new Date(year,month,day);
        @else
            let checkout = new Date();
            checkout.setDate(checkout.getDate() + 1);
        @endif

        $(function () {
            $("#checkin").datepicker({ 
                    format: "yyyy-mm-dd",
                    language: "es",
                    autoclose: true, 
                    todayHighlight: true                    
            }).datepicker('update', new Date(checkin));
        });

        $(function () {
            $("#checkout").datepicker({ 
                   format: "yyyy-mm-dd",
                    language: "es",
                    autoclose: true, 
                    todayHighlight: true
            }).datepicker('update', new Date(checkout));
        });

        $(".form-date").on('change', function(e){
            e.preventDefault();
            FormDate.change(this);
        });
    </script>
@endsection