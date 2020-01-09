<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="">
        <meta SameSite=None>
        

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- Bootstrap Ukit -->
        <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Mi CSS -->
        <link href="{{asset('css/WhatsApp.css')}}" rel="stylesheet">
        <link href="{{asset('css/PopUpNotification.css')}}" rel="stylesheet">
        <link href="{{ asset('css/Navmenu.css') }}" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">       
        @yield('css')

        <title>@yield('titulo')</title>
    </head>

    <body>
        <header id="header">
            @yield('nav')
        </header>

        @if(Session::has('status'))
            <aside class="popup-notification">
                <p class="popup-notification-text m-0">{{Session::get('status')}}</p>
                <i class="popup-notification-closer" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </i>
            </aside>
        @endif
            
        <main>
            @yield('banner')
            
            <div class="container-fluid p-3">
                <div class="row">
                    @yield('main')
                </div>
            </div>

            @component('components.whatsapp')
            @endcomponent
        </main>

        <footer> 
            @yield('footer')
        </footer>

        <!-- Bootstrap Ukit -->
        <script type="text/javascript" src="{{ asset('js/jquery-popper/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-popper/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

        <!-- Mi JS -->
        <script type="text/javascript" src="{{ asset('js/PopUpNotification.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Navmenu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
        @yield('js')
    </body>
</html>