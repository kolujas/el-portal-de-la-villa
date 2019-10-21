<nav class="nav-menu">
    <a href="#" class="sidebar-button">
        <i class="fas fa-bars"></i>
    </a>

    <div class="nav-row">
        <a href="/" class="nav-title">
            <h1>Hotel EL Portal de la Villa</h1>
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
            <li><a href="/#contecto" class="nav-link">
                El Hotel
            </a></li>
            <li><a href="/#contecto" class="nav-link">
                Galeria
            </a></li>
            <li><a href="/#contecto" class="nav-link">
                Contacto
            </a></li>
        </ul>
    </div>

    @component('components.nav.sidebar')
    @endcomponent
</nav>