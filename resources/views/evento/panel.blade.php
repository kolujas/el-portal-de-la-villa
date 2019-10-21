<?php
    /** @param Evento[] $eventos */
?>
@extends('layout.index')

@section('css')
    <link href="{{asset('css/evento/panel.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    El Portal de la Villa - Listado de eventos
@endsection

@section('nav')
    @component('components.nav.global')
    @endcomponent
@endsection

@section('main')
    <div class="eventos">
        <table>
            <thead>
                <tr>
                    <th>id_evento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                    <tr>
                        <td>{{evento->id_evento}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/evento/panel.js')}}"></script>
@endsection