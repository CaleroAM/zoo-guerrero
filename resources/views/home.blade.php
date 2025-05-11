@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row align-items-center mb-4">
        <!-- Texto (Bienvenida + Descripción) -->
        <div class="col-md-8">
            <!-- Encabezado Bienvenida -->
            <div class="bg-success text-white p-4 rounded shadow-sm mb-3">
                <h1 class="fw-bold">Bienvenido al Sistema ZooManager</h1>
                <p>Gestión integral de nuestro zoológico</p>
            </div>

            <!-- Descripción del zoológico -->
            <div class="bg-warning-subtle p-4 rounded shadow-sm">
                <h4 class="fw-semibold">Nuestro Zoológico</h4>
                <p>
                    Somos una institución comprometida con la conservación animal y la educación ambiental. 
                    Nuestro zoológico alberga más de 500 especies y es líder en programas de reproducción de especies en peligro.
                </p>
            </div>
        </div>

        <!-- Imagen lateral -->
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/zoo_banner.png') }}" class="img-fluid rounded shadow-sm" alt="Imagen del zoológico">
        </div>
    </div>

    <!-- Tarjetas -->
    <div class="row g-4">
        <!-- Animales -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm position-relative">
                <a href="{{ route('animals.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/animales.png') }}" class="card-img-top p-3" alt="Animales">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Animales</h5>
                    <p class="card-text">Gestión de especies y ejemplares</p>
                </div>
            </div>
        </div>
        <!-- Hábitats -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <img src="{{ asset('images/habitats.png') }}" class="card-img-top p-3" alt="Hábitats">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Hábitats</h5>
                    <p class="card-text">Control de instalaciones y ambientes</p>
                </div>
            </div>
        </div>

        <!-- Personal -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <img src="{{ asset('images/personal.png') }}" class="card-img-top p-3" alt="Personal">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Personal</h5>
                    <p class="card-text">Administración del equipo de trabajo</p>
                </div>
            </div>
        </div>

        <!-- Eventos -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <img src="{{ asset('images/eventos.png') }}" class="card-img-top p-3" alt="Eventos">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Eventos</h5>
                    <p class="card-text">Programación de actividades educativas</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
