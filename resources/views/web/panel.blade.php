<?php
    /** @var object $archivos */
    /** @var Banner[] $banners */
    /** @var Evento[] $eventos */
    /** @var array $vaidation */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/Validation.css')}}" rel="stylesheet">
    <link href="{{asset('css/Modal.css')}}" rel="stylesheet">
    <link href="{{asset('css/web/panel.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="asset" content="{{asset('/')}}">
    <meta name="validation" content="{{$validation}}">
@endsection

@section('titulo')
    El Portal de la Villa - Panel de administración
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="panel tabs col-12 d-flex justify-content-between">
        <div class="tab-menu p-2">
            <ul class="d-flex justify-content-around m-0 p-0">
                <li class="mb-2"><a class="tab-button opened" href="#personalizar">
                    <i class="tab-icon fas fa-edit"></i>
                    <span class="tab-text p-2">Personalizar Web</span>
                </a></li>
                <li class="mb-2"><a class="tab-button" href="#galerias">
                    <i class="tab-icon fas fa-images"></i>
                    <span class="tab-text p-2">Galerias</span>
                </a></li>
                <li><a class="tab-button" href="#eventos">
                    <i class="tab-icon far fa-calendar"></i>
                    <span class="tab-text p-2">Eventos</span>
                </a></li>
            </ul>
        </div>
        <div class="tab-body">
            <div id="personalizar" class="personalizar tab-content opened p-2 pt-md-0 pr-md-0 pb-md-0">
                <section>
                    <div class="title ml-lg-2">
                        <h2 class="mb-0 p-2">Banner principal</h2>
                    </div>
                    @foreach($banners as $banner)
                        <div class="content row d-md-flex justify-content-md-end p-2">
                            <div class="informacion col-12 col-md-6 col-lg-8">
                                <div class="titulo">
                                    <h3 class="mb-2">{{$banner->titulo}}</h3>
                                </div>
                                <div class="descripcion">
                                    <p class="mb-2">{{$banner->descripcion}}</p>
                                </div>
                            </div>
                            <div class="imagen col-12 col-md-6 col-lg-4 pr-lg-2">
                                <div class="imagen mb-2">
                                    <img src="{{asset('storage/' . $banner->imagen)}}" alt="Imagen por defecto">
                                </div>
                            </div>
                            <div class="accion col-12 col-md-6 col-lg-4 pr-lg-2">
                                <div class="boton d-flex justify-content-end">
                                    <button data-banner="{{$banner}}" class="web-editar-banner btn p-2" type="submit">
                                        <span class="button-text mr-2">Editar</span>
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
                <section>
                    <div class="title ml-lg-2">
                        <h2 class="mb-0 p-2">Información inicial</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end p-2">
                        <div class="informacion col-12">
                            <div class="titulo">
                                <h3 class="mb-2">{{$archivos->titulo}}</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">{{$archivos->descripcion}}</p>
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4 pr-lg-2">
                            <div class="boton d-flex justify-content-end">
                                <button data-informacion="{{json_encode($archivos)}}" class="web-editar-informacion btn p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="galerias" class="galerias tab-content p-2 pt-md-0 pr-md-0 pb-md-0">
                <section>
                    <div class="title ml-lg-2">
                        <h2 class="mb-0 p-2">Habitaciones</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-between py-2 mx-2 mr-lg-0">
                        <div class="image-input col-10 mr-2 mr-lg-0 p-0">
                            <label class="input-file">
                                <input type="file">
                                <span class="input-text mr-2">Agregar</span>
                                <i class="input-icon fas fa-plus"></i>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="title ml-lg-2">
                        <h2 class="mb-0 p-2">Instalaciones</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-between py-2 mx-2 mr-lg-0 pb-0">
                        <div class="image-input col-10 mr-2 mr-lg-0 p-0">
                            <label class="input-file">
                                <input type="file">
                                <span class="input-text mr-2">Agregar</span>
                                <i class="input-icon fas fa-plus"></i>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                        <div class="image col-10 mr-2 mr-lg-0 p-0">
                            <img src="{{asset('img/construction.jpg')}}" alt="Example image">
                            <label class="trash m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-trash"></i>
                                </button>
                            </label>
                            <label class="arrow prev m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-left"></i>
                                </button>
                            </label>
                            <label class="arrow next m-0">
                                <button class="galeria-borrar btn p-2" type="submit">
                                    <i class="button-icon fas fa-chevron-right"></i>
                                </button>
                            </label>
                        </div>
                    </div>
                </section>
            </div>
            <div id="eventos" class="eventos tab-content p-2 pt-md-0 pr-md-0 pb-md-0">
                <section>
                    <div class="title ml-lg-2">
                        <h2 class="mb-2 p-2 mt-md-0">Eventos creados</h2>
                    </div>
                    <div class="button">
                        <button class="evento-crear btn p-2" type="submit">
                            <span class="button-text mr-2">Agregar</span>
                            <i class="button-icon fas fa-plus"></i>
                        </button>
                    </div>
                    @foreach($eventos as $evento)
                        <div class="content row d-md-flex justify-content-md-end p-2">
                            <div class="informacion col-12 col-md-6 col-lg-8">
                                <div class="titulo">
                                    <h3 class="mb-2">{{$evento->titulo}}</h3>
                                    <h4 class="mb-2">{{$evento->organizador}}</h4>
                                </div>
                                <div class="descripcion">
                                    <p class="mb-2">{{$evento->descripcion}}</p>
                                </div>
                                <div class="datos">
                                    <p class="mb-2">{{date("d/m/Y", strtotime($evento->fecha))}}</p>
                                    <p class="mb-2"><a target="_blank" href="{{$evento->url}}">{{$evento->url}}</a></p>
                                </div>
                            </div>
                            <div class="imagen col-12 col-md-6 col-lg-4 pr-lg-2">
                                <div class="imagen mb-2">
                                    <img src="{{asset('storage/' . $evento->imagen)}}" alt="Imagen del evento: {{$evento->titulo}}">
                                </div>
                                <div data-url="/panel/evento/{{$evento->id_evento}}" class="acciones d-flex justify-content-between">
                                    <a href="/panel/evento/{{$evento->slug}}/editar" class="evento-editar btn mr-2 p-2">
                                        <span class="button-text mr-2">Editar</span>
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button class="evento-borrar btn p-2">
                                        <span class="button-text mr-2">Borrar</span>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
        
    <form class="delete-form d-none" action="#" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="seccion" value="panel">
    </form>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/Validation/Validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Rules.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Messages.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Requirements.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Invalidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Modal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/web/panel.js')}}"></script>
@endsection