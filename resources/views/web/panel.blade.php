@extends('layout.index')

@section('css')
    <link href="{{asset('css/web/panel.css')}}" rel="stylesheet">
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
            <div id="personalizar" class="personalizar tab-content opened p-2 pt-md-0">
                <section>
                    <div class="title">
                        <h2 class="mb-2 p-2">Banner principal</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end mb-2 p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-end">
                                <button class="edit btn p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end mb-2 p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-end">
                                <button class="edit btn p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end mb-2 p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-end">
                                <button class="edit btn p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="title">
                        <h2 class="my-2 p-2">Información inicial</h2>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end mb-2 p-2">
                        <div class="informacion col-12">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-end">
                                <button class="edit btn p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="galerias" class="galerias tab-content">
                <!---->
            </div>
            <div id="eventos" class="eventos tab-content px-2 pb-2">
                <section>
                    <div class="title">
                        <h2 class="my-2 p-2 mt-md-0">Eventos creados</h2>
                    </div>
                    <div class="button">
                        <button class="create btn p-2" type="submit">
                            <span class="button-text mr-2">Agregar</span>
                            <i class="button-icon fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                                <h4 class="mb-2">Organizador</h4>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                            <div class="datos pt-2">
                                <p class="mb-2">{{now()}}</p>
                                <p class="mb-2"><a target="_blank" href="https://google.com.ar">https://google.com.ar</a></p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-between">
                                <button class="edit btn mr-2 p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="trash btn p-2" type="submit">
                                    <span class="button-text mr-2">Borrar</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                                <h4 class="mb-2">Organizador</h4>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                            <div class="datos pt-2">
                                <p class="mb-2">{{now()}}</p>
                                <p class="mb-2"><a target="_blank" href="https://google.com.ar">https://google.com.ar</a></p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-between">
                                <button class="edit btn mr-2 p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="trash btn p-2" type="submit">
                                    <span class="button-text mr-2">Borrar</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content row d-md-flex justify-content-md-end p-2">
                        <div class="informacion col-12 col-md-6 col-lg-8">
                            <div class="titulo">
                                <h3 class="mb-2">Título</h3>
                                <h4 class="mb-2">Organizador</h4>
                            </div>
                            <div class="descripcion">
                                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?</p>
                            </div>
                            <div class="datos pt-2">
                                <p class="mb-2">{{now()}}</p>
                                <p class="mb-2"><a target="_blank" href="https://google.com.ar">https://google.com.ar</a></p>
                            </div>
                        </div>
                        <div class="imagen col-12 col-md-6 col-lg-4">
                            <div class="imagen mb-2">
                                <img src="{{asset('/img/construction.jpg')}}" alt="Imagen por defecto">
                            </div>
                        </div>
                        <div class="accion col-12 col-md-6 col-lg-4">
                            <div class="boton d-flex justify-content-between">
                                <button class="edit btn mr-2 p-2" type="submit">
                                    <span class="button-text mr-2">Editar</span>
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="trash btn p-2" type="submit">
                                    <span class="button-text mr-2">Borrar</span>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/web/panel.js')}}"></script>
@endsection