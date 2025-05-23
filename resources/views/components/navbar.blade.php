<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle main navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="ms-2">Menú Principal</span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('home') }}">
                        <i class="fas fa-home d-block mb-1"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('species.index') }}">
                        <i class="fas fa-dna d-block mb-1"></i>
                        <span>Especies</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('zones.index') }}">
                        <i class="fas fa-map-marked-alt d-block mb-1"></i>
                        <span>Zonas</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('suppliers.index') }}">
                        <i class="fas fa-truck d-block mb-1"></i>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('shifts.index') }}">
                        <i class="fas fa-clock d-block mb-1"></i>
                        <span>Turnos</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('foods.index') }}">
                        <i class="fas fa-apple-alt d-block mb-1"></i>
                        <span>Alimentos</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('lots.index') }}">
                        <i class="fas fa-box-open d-block mb-1"></i>
                        <span>Lotes</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('employees.index') }}">
                        <i class="fas fa-users d-block mb-1"></i>
                        <span>Personal</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('dates.index') }}">
                        <i class="fa-solid fa-circle-info d-block mb-1"></i>
                        <span>Datos</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('empshifts.index') }}">
                        <i class="fa-solid fa-hourglass-half d-block mb-1"></i>
                        <span>Horas trabajadas</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('animals.index') }}">
                        <i class="fas fa-paw d-block mb-1"></i>
                        <span>Animales</span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-center" href="{{ route('carefuls.index') }}">
                        <i class="fas fa-heartbeat d-block mb-1"></i>
                        <span>Cuidados</span>
                    </a>
                
            </ul>
        </div>
    </div>
</nav>
