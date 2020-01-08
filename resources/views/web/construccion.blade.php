<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        
        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

        <!-- Bootstrap 4.3.1-->
        <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Mi CSS -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">       
        <link href="{{ asset('css/web/construccion.css') }}" rel="stylesheet">       

        <title>El Portal de la Villa - En construcción</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="background-construction">
                <h1>El portal de la villa</h1>
                    <div class="text-div card mt-4 m-auto text-center">
                        <div class="card-body frase">
                            <p class="card-text">El sitio estará listo pronto</p>
                        </div>
                        <div class="card-body contacto">
                            <p class="card-text">reservas@villadelparque.com.ar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mi JS -->
        <script type="text/javascript" src="{{ asset('js/jquery-popper/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-popper/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/web/construccion.js') }}"></script>
    </body>
</html>