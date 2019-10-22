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
            <div id="personalizar" class="tab-content">
                <div class="title">
                    <h2>Banner principal</h2>
                </div>
                <div class="content">
                    <div class="titulo">
                        <h3>Título</h3>
                    </div>
                    <div class="descripcion">
                        <p>Descripción</p>
                    </div>
                    <div class="imagen">
                        <img src="{{asset('/img/construccion.jpg')}}" alt="Imagen por defecto">
                    </div>
                    <div class="button">
                        <button class="edit btn" type="submit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>
                <div class="content">
                    <div class="titulo">
                        <h3>Título</h3>
                    </div>
                    <div class="descripcion">
                        <p>Descripción</p>
                    </div>
                    <div class="imagen">
                        <img src="{{asset('/img/construccion.jpg')}}" alt="Imagen por defecto">
                    </div>
                    <div class="button">
                        <button class="edit btn" type="submit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>
                <div class="content">
                    <div class="titulo">
                        <h3>Título</h3>
                    </div>
                    <div class="descripcion">
                        <p>Descripción</p>
                    </div>
                    <div class="imagen">
                        <img src="{{asset('/img/construccion.jpg')}}" alt="Imagen por defecto">
                    </div>
                    <div class="button">
                        <button class="edit btn" type="submit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>
                <div class="title">
                    <h2>Información inicial</h2>
                </div>
                <div class="content">
                    <div class="titulo">
                        <h3>Título</h3>
                    </div>
                    <div class="descripcion">
                        <p>Descripción</p>
                    </div>
                    <div class="button">
                        <button class="edit btn" type="submit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>
                <!-- <form action="#">
                    <div class="input-group">
                        <label for="titulo">Título</label>
                        <input id="titulo" name="titulo" type="text" placeholder="Título">
                        <div @if($errors->has('titulo'))
                                class="invalid-tooltip showed"
                            @else
                                class="invalid-tooltip"
                            @endif>
                            @if($errors->has('titulo'))
                                {{ $errors->first('titulo') }}
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" cols="30" rows="10" placeholder="Descripción"></textarea>
                        <div @if($errors->has('descripcion'))
                                class="invalid-tooltip showed"
                            @else
                                class="invalid-tooltip"
                            @endif>
                            @if($errors->has('descripcion'))
                                {{ $errors->first('descripcion') }}
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <input id="file" type="file" name="imagen">
                        <button class="waves-effect" id="btnFile" type="button">Archivo</button>
                        <span id="texto">No se eligió ningún archivo</span>
                        <div @if($errors->has('imagen'))
                                class="invalid-tooltip showed"
                            @else
                                class="invalid-tooltip"
                            @endif>
                            @if($errors->has('imagen'))
                                {{ $errors->first('imagen') }}
                            @endif
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn" type="submit">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </form> -->
            </div>
            <div id="galerias" class="tab-content">
                <!---->
            </div>
            <div id="eventos" class="tab-content">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Organizador</th>
                            <th>Imagen</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lorem, ipsum</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi quis quasi numquam libero temporibus pariatur, aliquam recusandae praesentium labore cum quos culpa odio? Excepturi, tenetur! Doloribus, corrupti? Quibusdam, excepturi illum!</td>
                            <td>{{now()}}</td>
                            <td><img src="{{asset('/img/construccion.jpg')}}" alt="Imagen por defecto"></td>
                            <td>Nadie</td>
                            <td>https://andatealamierda.com.ar</td>
                        </tr>
                    </tbody>
                </table>
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