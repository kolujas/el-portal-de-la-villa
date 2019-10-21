<nav class="nav-menu">
    <a href="#" class="sidebar-button">
        <i class="fas fa-bars"></i>
    </a>

    <div class="nav-row">
        <a href="/" class="nav-title">
            <h1>AVcla!</h1>
        </a>
    </div>

    <div class="nav-row">
        <div class="nav-search-bar">
            <label for="nav-search-bar" class="nav-search-label">
                <i class="fas fa-search"></i>
            </label>
            <input id="nav-search-bar" class="nav-search-input" type="text" placeholder="Search...">
        </div>

        <ul class="menu-list">
            <li class="collapsable closed">
                <a href="#" class="collapsable-button">Categorias<i class="fas fa-sort-down"></i></a>
                <ul class="collapsable-menu">
                    <li><a href="#" class="collapsable-link collapsable-subcollapse text-white">Contrucción</a></li>
                    <li><a href="#" class="collapsable-link collapsable-subcollapse text-white">Gastronomia</a></li>
                </ul>
            </li>
            <li><a href="/#contecto" class="nav-link">
                Contacto
            </a></li>
            <li><a href="/ayuda" class="nav-link">
                Ayuda
            </a></li>
        </ul>
    </div>

    @component('components.nav.sidebar')
    @endcomponent
</nav>