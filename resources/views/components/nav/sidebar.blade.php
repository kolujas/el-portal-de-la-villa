<div class="sidebar closed">
    <div class="sidebar-header">
        <a href="#" class="sidebar-button">
            <i class="sidebar-icon fas fa-times text-white"></i>
        </a>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-menu">
            <li><a href="/demo" class="nav-link text-white">
                Inicio
            </a></li>
            <li><a href="/demo#informacion" class="nav-link text-white">
                El Hotel
            </a></li>
            <li><a href="/habitaciones" class="nav-link text-white">
                Habitaciones
            </a></li>
            <li><a href="/instalaciones" class="nav-link text-white">
                Instalaciones
            </a></li>
            <li><a href="/demo#galeria" class="nav-link text-white">
                Galeria
            </a></li>
            <li><a href="/demo#contacto" class="nav-link text-white">
                Contacto
            </a></li>
            @if(Auth::check())
            <li><a href="/panel" class="nav-link text-white">
                Panel
            </a></li>
            <li><a href="/salir" class="nav-link text-white">
                Cerrar Sesion
            </a></li>
            @endif
        </ul>
    </div>
</div>