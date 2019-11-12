<nav class="nav-menu">
    <a href="#" class="sidebar-button">
        <i class="sidebar-icon fas fa-bars"></i>
    </a>

    <div class="nav-row">
        <a href="/demo" class="nav-title">
            <h1 class="text-md-center">Hotel EL Portal de la Villa</h1>
        </a>
    </div>

    <div class="nav-row">
        <ul class="menu-list">
            <li><a href="/demo#informacion" class="nav-link">
                El Hotel
            </a></li>
            <li><a href="/demo#galeria" class="nav-link">
                Galeria
            </a></li>
            <li><a href="/demo#contacto" class="nav-link">
                Contacto
            </a></li>
            @if(Auth::check())
            <li class="collapsable closed">
                <a href="#" class="collapsable-button">Panel<i class="fas fa-sort-down"></i></a>
                <ul class="collapsable-menu">
                    <li><a href="/panel#personalizar" class="collapsable-link text-white">Personalizar Web</a></li>
                    <li><a href="/panel#galerias" class="collapsable-link text-white">Galerias</a></li>
                    <li><a href="/panel#eventos" class="collapsable-link text-white">Eventos</a></li>
                </ul>
            </li>
            <li><a href="/salir" class="nav-link">
                Cerrar Sesión
            </a></li>
            @endif
        </ul>
    </div>

    @component('components.nav.sidebar')
    @endcomponent
</nav>