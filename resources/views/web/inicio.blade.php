@extends('layout.index')

@section('css')
    <link href="{{asset('css/web/inicio.css')}}" rel="stylesheet">
    <link href="{{asset('css/galeria/baguetteBox.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/galeria/grid/gallery-grid.css')}}" rel="stylesheet">

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
                <div class="carousel-item active">
                    <img src="{{asset('img/banner/1.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-block d-md-flex justify-content-center flex-wrap">
                        <h5 class="text-white slider-heading">First slide label</h5>
                        <p class="slider-text">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/banner/2.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-block d-md-flex justify-content-center flex-wrap">
                        <h5 class="text-white slider-heading">Second slide label</h5>
                        <p class="slider-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/banner/1.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-block d-md-flex justify-content-center flex-wrap">
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
            <div class="carousel-footer d-flex justify-content-center">
                <!-- <a href="#" type="submit" class="btn btn-primary redirigirBtn">Reservar</a> -->
                <a href="#contacto" class="btn btn-primary redirigirBtn">Reservar</a>
            </div>
        </div>
    </div>
@endsection

@section('main')
    <!-- contenido -->
    <div class="informacion-inicial">
        <div class="row">
            <div class="col-12 text-center mt-5 div-informacion-inicial">
                <span class="lead mini-encabezado">Viví Córdoba</span>
                <h2 class="py-3">Hotel el Portal de la villa 31</h2>
                <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
                <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
                <p class="px-5 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?</p>
            </div>

            <div class="col-lg-12 text-center mt-5 mb-xl-5 presentacion-div flex-wrap">
                <div class="card mb-lg-0 position-lg-relative">
                    <img src="{{asset('/img/construction.jpg')}}" class="card-img-top col-lg-6 px-0" alt="...">
                    <div class="card-body position-lg-absolute col-lg-6">
                        <h5 class="card-title mb-5">Habitaciones</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card mb-lg-0 position-lg-relative">
                    <img src="{{asset('/img/construction.jpg')}}" class="card-img-top col-lg-6 position-lg-absolute px-0" alt="...">
                    <div class="card-body position-lg-absolute col-lg-6 card-2-body ">
                        <h5 class="card-title mb-5">Y mucho más</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-5 separador-iconos px-5">
                <div class="row">
                    <div class="d-flex justify-content-between justify-content-md-center flex-wrap px-md-5 px-xl-0 m-auto">
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                        <div class="mb-5 col-4 col-xl-2 icon-text">
                            <i class="fas fa-ship"></i>
                            <p class="mt-4 font-weight-bold">Paseos en lancha</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-container">
                <div class="tz-gallery galeria pt-xl-0">
                    <h2 class="text-center my-5">Galeria de fotos</h2>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/park.jpg')}}">
                                <img src="{{asset('/img/galeria/park.jpg')}}" alt="Park">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/bridge.jpg')}}">
                                <img src="{{asset('/img/galeria/bridge.jpg')}}" alt="Bridge">
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/tunnel.jpg')}}">
                                <img src="{{asset('/img/galeria/tunnel.jpg')}}" alt="Tunnel">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/coast.jpg')}}">
                                <img src="{{asset('/img/galeria/coast.jpg')}}" alt="Coast">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/rails.jpg')}}">
                                <img src="{{asset('/img/galeria/rails.jpg')}}" alt="Rails">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/traffic.jpg')}}">
                                <img src="{{asset('/img/galeria/traffic.jpg')}}" alt="Traffic">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/rocks.jpg')}}">
                                <img src="{{asset('/img/galeria/rocks.jpg')}}" alt="Rocks">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/benches.jpg')}}">
                                <img src="{{asset('/img/galeria/benches.jpg')}}" alt="Benches">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="{{asset('/img/galeria/sky.jpg')}}">
                                <img src="{{asset('/img/galeria/sky.jpg')}}" alt="Sky">
                            </a>
                        </div>
                    </div>
                </div>

                <div id="contacto" class="col-12 col-md-9 col-lg-6 text-center mt-5 mx-md-auto px-5">
                    <h3>Contactanos</h3>
                    <form>
                        <div class="form-group text-left text-uppercase">
                            <label class="font-weight-bold" for="nombre">Nombre</label>
                            <input type="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group text-left text-uppercase">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group text-left text-uppercase">
                            <label class="font-weight-bold" for="email">Teléfono</label>
                            <input type="number" class="form-control" id="email" placeholder="Teléfono">
                        </div>
                        <button type="submit" class="btn btn-primary enviar-contacto text-uppercase">Enviar</button>
                    </form>
                </div>

                <div class="col-12 text-center mt-5 gmaps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13508.42240002282!2d-64.451797!3d-32.174427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcb83237eb8a7521b!2sHotel%20El%20Portal%20de%20la%20Villa!5e0!3m2!1ses!2sar!4v1572380101216!5m2!1ses!2sar" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>   
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center position-fixed redes-sociales py-2">
        <a class="facebook-icon" target="_blank" href="https://www.facebook.com">
            <i class="fab fa-facebook"></i>
        </a>
        <a class="instagram-icon" target="_blank" href="https://www.facebook.com">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/galeria/baguetteBox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/web/inicio.js')}}"></script>    
    <script>
        baguetteBox.run('.tz-gallery', {
            buttons: true,
        });
    </script>
@endsection