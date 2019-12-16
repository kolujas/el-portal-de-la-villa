<?php
    /** @var object $archivos */
    /** @var Banner[] $banners */
    /** @var Galeria[] $habitaciones */
    /** @var Galeria[] $instalaciones */
    /** @var array $galerias */
    /** @var Evento[] $eventos */
    /** @var array $vaidation */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/Validation.css')}}" rel="stylesheet">
    <link href="{{asset('css/Modal.css')}}" rel="stylesheet">
    <link href="{{asset('css/web/panel.css')}}" rel="stylesheet">
    <link href="{{asset('css/modal.css')}}" rel="stylesheet">
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
    <div class="panel tabs col-12 d-flex justify-content-center">
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
        <div class="tab-body pl-md-3">
            <div id="personalizar" class="personalizar tab-content opened mt-3 mt-md-0">
                <section>
                    <div class="title">
                        <h2 class="mb-0 p-3">Banner principal</h2>
                    </div>
                    @foreach($banners as $banner)
                        <div class="content row d-md-flex justify-content-md-end">
                            <div class="informacion col-12 col-md-6 col-lg-8 px-3">
                                <div class="titulo">
                                    <h3 class="mb-3 mt-5">{{$banner->titulo}}</h3>
                                </div>
                                <div class="descripcion">
                                    <p class="mb-3">{!!nl2br($banner->descripcion)!!}</p>
                                </div>
                            </div>
                            <div class="imagen col-12 col-md-6 col-lg-4 px-3">
                                <div class="imagen mb-3 mt-md-5">
                                    <img src="{{asset('storage/' . $banner->imagen)}}" alt="Imagen por defecto">
                                </div>
                            </div>
                            <div class="accion col-12 col-md-6 col-lg-4 px-3 mb-5">
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
                    <div class="title">
                        <h2 class="mb-0 p-3">Información inicial</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end">
                        <div class="informacion col-12 px-3">
                            <div class="titulo">
                                <h3 class="mt-5 mb-3">{{$archivos->titulo}}</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-3">{!!nl2br($archivos->descripcion)!!}</p>
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4 px-3 mb-5">
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
            <div id="galerias" class="galerias tab-content mt-3 mt-md-0">
                <section class="habitaciones mb-5">
                    <div class="title">
                        <h2 class="mb-5 p-3">Habitaciones</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-left py-2 mx-2 mx-lg-0 p-lg-0">
                        <div class="image-input col-10 mr-3 p-0">
                            <div class="form">
                                <label class="input-file">
                                    <input type="file" name="imagen">
                                    <span class="input-text mr-2">Agregar</span>
                                    <i class="input-icon fas fa-plus"></i>
                                </label>
                                <input type="hidden" name="id_tipo" value="1">
                            </div>
                            <div class="form-accions d-flex justify-content-between">
                                <label class="accept-file m-0">
                                    <button class="accept-button btn p-0">
                                        <span class="input-text mr-2">Aceptar</span>
                                        <i class="input-icon fas fa-check"></i>
                                    </button>
                                </label>
                                <label class="cancel-file m-0">
                                    <button class="cancel-button btn p-0">
                                        <span class="input-text mr-2">Cancelar</span>
                                        <i class="input-icon fas fa-times"></i>
                                    </button>
                                </label>
                            </div>
                        </div>
                        @if(count($habitaciones))
                            @foreach($habitaciones as $habitacion)
                                <div class="galeria image col-10 mr-3 p-0 showed" data-galeria="{{$habitacion}}">
                                    <img src="{{asset('storage/' . $habitacion->imagen)}}" alt="Example image">
                                    <label class="arrow prev m-0">
                                        <button class="prev-button btn p-0">
                                            <i class="button-icon fas fa-chevron-left"></i>
                                        </button>
                                    </label>
                                    <label class="arrow next m-0">
                                        <button class="next-button btn p-0">
                                            <i class="button-icon fas fa-chevron-right"></i>
                                        </button>
                                    </label>
                                    <label class="trash m-0">
                                        <button class="dalete-button btn p-0" data-toggle="modal" data-target="#exampleModal">
                                            <i class="button-icon fas fa-trash"></i>
                                        </button>
                                    </label>
                                </div>
                            @endforeach
                            @if((count($habitaciones) + 1) % 3 != 0)
                                @for($i = 0; $i < (count($habitaciones) % 3); $i++)
                                    <div class="substitute col-10 mr-0 p-0"></div>
                                @endfor
                            @endif
                        @else
                            <div class="empty-image mr-3 p-1">
                                <div class="empty-content"></div>
                            </div>
                            <div class="empty-image mr-3 p-1">
                                <div class="empty-content"></div>
                            </div>
                        @endif
                    </div>
                    {{ $habitaciones->fragment('galerias')->appends(['instalaciones' => $instalaciones->currentPage()])->links() }}
                </section>
                <section class="instalaciones">
                    <div class="title">
                        <h2 class="mb-5 p-3">Instalaciones</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-left py-2 mx-2 mx-lg-0 p-lg-0">
                        <div class="image-input col-10 mr-3 p-0">
                            <div class="form">
                                <label class="input-file">
                                    <input type="file" name="imagen">
                                    <span class="input-text mr-2">Agregar</span>
                                    <i class="input-icon fas fa-plus"></i>
                                </label>
                                <input type="hidden" name="id_tipo" value="2">
                            </div>
                            <div class="form-accions d-flex justify-content-between">
                                <label class="accept-file m-0">
                                    <button class="accept-button btn p-0">
                                    <span class="input-text mr-2">Aceptar</span>
                                    <i class="input-icon fas fa-check"></i>
                                    </button>
                                </label>
                                <label class="cancel-file m-0">
                                    <button class="cancel-button btn p-0">
                                    <span class="input-text mr-2">Cancelar</span>
                                    <i class="input-icon fas fa-times"></i>
                                    </button>
                                </label>
                            </div>
                        </div>
                        @if(count($instalaciones))
                            @foreach($instalaciones as $instalacion)
                                <div class="galeria image col-10 mr-3 p-0 showed" data-galeria="{{$instalacion}}">
                                    <img src="{{asset('storage/' . $instalacion->imagen)}}" alt="Example image">
                                    <label class="arrow prev m-0">
                                        <button class="prev-button btn p-0">
                                            <i class="button-icon fas fa-chevron-left"></i>
                                        </button>
                                    </label>
                                    <label class="arrow next m-0">
                                        <button class="next-button btn p-0">
                                            <i class="button-icon fas fa-chevron-right"></i>
                                        </button>
                                    </label>
                                    <label class="trash m-0">
                                        <button class="dalete-button btn p-0" data-toggle="modal" data-target="#exampleModal">
                                            <i class="button-icon fas fa-trash"></i>
                                        </button>
                                    </label>
                                </div>
                            @endforeach
                            @if((count($instalaciones) + 1) % 3 != 0)
                                @for($i = 0; $i < (count($instalaciones) % 3); $i++)
                                    <div class="substitute col-10 mr-0 p-0"></div>
                                @endfor
                            @endif
                        @else
                            <div class="empty-image mr-3 p-1">
                                <div class="empty-content"></div>
                            </div>
                            <div class="empty-image mr-3 p-1">
                                <div class="empty-content"></div>
                            </div>
                        @endif
                    </div>
                    {{ $instalaciones->fragment('galerias')->appends(['habitaciones' => $habitaciones->currentPage()])->links() }}
                </section>
            </div>
            <div id="eventos" class="eventos tab-content mt-3 mt-md-0">
                <section>
                    <div class="title">
                        <h2 class="mb-3 p-3">Eventos creados</h2>
                    </div>
                    <div class="button">
                        <button class="evento-crear btn p-2" type="submit">
                            <span class="button-text mr-2">Agregar</span>
                            <i class="button-icon fas fa-plus"></i>
                        </button>
                    </div>
                    @if(count($eventos))
                        @foreach($eventos as $evento)
                            <div class="event content row d-md-flex justify-content-md-end py-5">
                                <div class="informacion col-12 col-md-6 col-lg-8 px-3">
                                    <div class="titulo">
                                        <h3 class="mb-3">{{$evento->titulo}}</h3>
                                        <h4 class="mb-3">{{$evento->organizador}}</h4>
                                    </div>
                                    <div class="descripcion">
                                        <p class="mb-3">{!!nl2br($evento->descripcion)!!}</p>
                                    </div>
                                    <div class="datos">
                                        <p class="mb-3">{{date("d/m/Y", strtotime($evento->fecha))}}</p>
                                        <p class="mb-3"><a target="_blank" href="{{$evento->url}}">{{$evento->url}}</a></p>
                                    </div>
                                </div>
                                <div class="imagen col-12 col-md-6 col-lg-4 px-3">
                                    <div class="imagen mb-3">
                                        <img src="{{asset('storage/' . $evento->imagen)}}" alt="Imagen del evento: {{$evento->titulo}}">
                                    </div>
                                    <div data-url="/panel/evento/{{$evento->id_evento}}" class="acciones d-flex justify-content-between">
                                        <a href="/panel/evento/{{$evento->slug}}/editar" class="evento-editar btn mr-2 p-2">
                                            <span class="button-text mr-2">Editar</span>
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button type="button" data-titulo="{{$evento->titulo}}" data-id_evento="{{$evento->id_evento}}" class="btn btn-primary evento-borrar btn p-2" data-toggle="modal" data-target="#exampleModal">
                                            <span class="button-text mr-2">Borrar</span>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-event content row d-md-flex justify-content-md-end py-5">
                            <div class="informacion col-12 col-md-6 col-lg-8 px-3">
                                <div class="empty-titulo mb-3"></div>
                                <div class="empty-subtitulo mb-3"></div>
                                <div class="empty-descripcion mb-3"></div>
                                <div class="empty-date mb-3"></div>
                                <div class="empty-url mb-3"></div>
                            </div>
                            <div class="image col-12 col-md-6 col-lg-4 px-3">
                                <div class="empty-image mb-3 p-1">
                                    <div class="empty-content"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>

    @component('components.modal')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/Database.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Rules.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Messages.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Requirements.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Validation/Invalidator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Modal.js')}}"></script>
    <script>
        let galerias = @json($galerias);
    </script>
    <script type="text/javascript" src="{{asset('js/web/panel.js')}}"></script>
@endsection