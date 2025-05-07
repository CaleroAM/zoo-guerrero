@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <!-- Sección Principal -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <h2 class="display-4 text-success">Bienvenido al equipo del Zoológico</h2>
            <p class="lead text-success">Somos un equipo dedicado a la conservación y cuidado de la vida silvestre. Nuestra misión es proteger y educar, creando un futuro mejor para todas las especies.</p>

            <div class="mt-4">
                <a href="#gestion-animales" class="btn btn-success btn-lg mx-2">Gestión de Animales</a>
                <a href="#programacion-turnos" class="btn btn-success btn-lg mx-2">Programación de Turnos</a>
                <a href="#inventario" class="btn btn-success btn-lg mx-2">Inventario</a>
            </div>
        </div>
    </section>

    <!-- Sección de Imágenes -->
    <section class="container py-5">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm hover-zoom">
                    <img src="https://images.unsplash.com/photo-1625228086268-e1a6c173ad42?crop=entropy&cs=tinysrgb&fit=max&fm=jpg" class="card-img-top" alt="Cuidado de Animales">
                    <div class="card-body">
                        <h5 class="card-title text-success">Cuidado de Animales</h5>
                        <p class="card-text">Responsabilidad Principal</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm hover-zoom">
                    <img src="https://images.unsplash.com/photo-1706509445316-5e106096817f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg" class="card-img-top" alt="Atención Veterinaria">
                    <div class="card-body">
                        <h5 class="card-title text-success">Atención Veterinaria</h5>
                        <p class="card-text">Salud Animal</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm hover-zoom">
                    <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg" class="card-img-top" alt="Educación al Público">
                    <div class="card-body">
                        <h5 class="card-title text-success">Educación al Público</h5>
                        <p class="card-text">Divulgación</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm hover-zoom">
                    <img src="https://images.unsplash.com/photo-1728719651740-3e262a2ab521?crop=entropy&cs=tinysrgb&fit=max&fm=jpg" class="card-img-top" alt="Mantenimiento de Hábitats">
                    <div class="card-body">
                        <h5 class="card-title text-success">Mantenimiento de Hábitats</h5>
                        <p class="card-text">Instalaciones</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Gestión de Animales -->
    <section class="container py-5" id="gestion-animales">
        <h3 class="text-center text-success section-title">Gestión de Animales</h3>
        <!-- Aquí agregas contenido de gestión de animales -->
    </section>

    <!-- Sección de Programación de Turnos -->
    <section class="container py-5" id="programacion-turnos">
        <h3 class="text-center text-success section-title">Programación de Turnos</h3>
        <!-- Aquí agregas contenido de programación de turnos -->
    </section>

    <!-- Sección de Inventario -->
    <section class="container py-5" id="inventario">
        <h3 class="text-center text-success section-title">Inventario</h3>
        <!-- Aquí agregas contenido de inventario -->
    </section>
</div>
@endsection
