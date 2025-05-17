@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row align-items-center mb-4">
        <!-- Texto (Bienvenida + Descripción) -->
        <div class="col-md-8">
            <!-- Encabezado Bienvenida -->
            <div class="p-4 rounded shadow-sm mb-3" style="background-color: #916540; color: white;">
                <h1 class="fw-bold">Bienvenido al Sistema de Zoochilpan</h1>
                <p>Gestión integral de nuestro zoológico</p>
            </div>

            <!-- Descripción del zoológico -->
            <div class="p-4 rounded shadow-sm" style="background-color: #ecbd37;">
                <h4 class="fw-semibold">Nuestro Zoológico</h4>
                <p>
                    Somos una institución comprometida con la conservación animal y la educación ambiental. 
                    Nuestro zoológico alberga más de 500 especies y es líder en programas de reproducción de especies en peligro.
                </p>
            </div>
        </div>

        <!-- Imagen lateral -->
        <div class="col-md-4 text-center">
            <img src="{{ asset('images/tigreblanco.jpg') }}" class="img-fluid rounded shadow-sm" alt="Imagen del zoológico">
        </div>
    </div>

    <!-- Tarjetas -->
    <div class="row g-4">
        <!-- Especies -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('species.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/especies.png') }}" class="card-img-top p-3" alt="Especies">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Especies</h5>
                    <p class="card-text">Registro de especies y su estado de conservación</p>
                </div>
            </div>
        </div>
        <!-- Zonas -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('zones.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/zonas.png') }}" class="card-img-top p-3" alt="Zonas">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Zonas</h5>
                    <p class="card-text">Distribución de especies en el zoológico</p>
                </div>
            </div>
        </div>
        <!-- Proveedores -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('suppliers.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/proveedores.png') }}" class="card-img-top p-3" alt="Proveedores">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Proveedores</h5>
                    <p class="card-text">Gestión de proveedores y suministros</p>
                </div>
            </div>
        </div>
        <!-- Turnos -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('shifts.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/turnos.png') }}" class="card-img-top p-3" alt="Turnos">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Turnos</h5>
                    <p class="card-text">Control de horarios y turnos del personal</p>
                </div>
            </div>
        </div>
        <!-- Alimento -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('foods.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/alimento.png') }}" class="card-img-top p-3" alt="Alimento">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Alimento</h5>
                    <p class="card-text">Registro de alimentos y su distribución</p>
                </div>
            </div>
        </div>
        <!-- Lotes -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('lots.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/lotes.png') }}" class="card-img-top p-3" alt="Lotes">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Lotes</h5>
                    <p class="card-text">Control de lotes de alimentos y su gestión</p>
                </div>
            </div>
        </div>
        <!-- Datos -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('dates.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/datos.png') }}" class="card-img-top p-3" alt="Datos">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Datos</h5>
                    <p class="card-text">Registro de datos de los empleados</p>
                </div>    
            </div>
        </div>
        <!-- Empleados --> 
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('employees.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/empleados.png') }}" class="card-img-top p-3" alt="Empleados">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Empleados</h5>
                    <p class="card-text">Gestión de empleados y su información</p>
                </div>
            </div>
        </div>
        <!-- Horas trabajadas -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('empshifts.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/horas.png') }}" class="card-img-top p-3" alt="Horas trabajadas">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Horas trabajadas</h5>
                    <p class="card-text">Control de horas trabajadas por empleado</p>
                </div>
            </div>
        </div>       
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
        <!-- Cuidados -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center shadow-sm">
                <a href="{{ route('carefuls.index') }}" class="stretched-link"></a>
                <img src="{{ asset('images/cuidados.png') }}" class="card-img-top p-3" alt="Cuidados">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Cuidados</h5>
                    <p class="card-text">Registro de cuidados y tratamientos</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
