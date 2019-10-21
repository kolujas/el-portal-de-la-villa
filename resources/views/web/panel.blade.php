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
    <div class="accesos">
        <ul>
            <li><a href="/panel/personalizar">Personalizar Web</a></li>
            <li><a href="/panel/eventos">Eventos</a></li>
        </ul>
    </div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('js/web/panel.js')}}"></script>
@endsection