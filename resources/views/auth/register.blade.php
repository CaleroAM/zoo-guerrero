@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center w-100 align-items-center">

        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/nav-zoo.png') }}" alt="Imagen registro" class="img-fluid rounded shadow" style="max-height: 70vh; object-fit: contain;">
        </div>

        <div class="col-md-6 col-12 d-flex align-items-center">
            <div class="w-100 custom-form-container">

                <div class="text-center mb-4">
                    <h2 class="fw-bold custom-form-title">Registro de Trabajador</h2>
                    <p class="custom-form-text">Completa tus datos para unirte al equipo</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label custom-form-label">Nombre completo</label>
                        <input id="name" type="text" class="form-control form-control-lg custom-form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Juan Pérez">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label custom-form-label">Correo electrónico</label>
                        <input id="email" type="email" class="form-control form-control-lg custom-form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="ejemplo@correo.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label custom-form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control form-control-lg custom-form-input @error('password') is-invalid @enderror" name="password" required placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label custom-form-label">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control form-control-lg custom-form-input" name="password_confirmation" required placeholder="********">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn custom-form-btn btn-lg">
                            <i class="bi bi-person-plus-fill me-2"></i> Registrarse
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none text-success">¿Ya tienes cuenta? Inicia sesión</a>
                </div>

            </div>
        </div>
    </div>
</div>
@vite('resources/css/custom-forms.css')
@endsection
