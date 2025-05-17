@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center" style="height: calc(100vh - 170px);">
    <div class="row justify-content-center w-100 align-items-center">

        <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('images/login_register.png') }}" alt="Imagen login" class="img-fluid rounded" style="max-height: 70vh; object-fit: contain;">
        </div>

        <div class="col-md-6 col-12 d-flex align-items-center">
            <div class="w-100 custom-form-container">

                <div class="text-center mb-4">
                    <h2 class="fw-bold custom-form-title">Acceso Trabajadores</h2>
                    <p class="custom-form-text">Ingresa tus credenciales para acceder al sistema</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label custom-form-label">Correo electrónico</label>
                        <input id="email" type="email" class="form-control form-control-lg custom-form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="ejemplo@correo.com">
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

                    <div class="mb-3 form-check d-flex justify-content-between align-items-center">
                        <div>
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label custom-form-label" for="remember">Recordar sesión</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none custom-link">¿Olvidaste tu contraseña?</a>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn custom-form-btn btn-lg">
                            <i class="bi bi-lock-fill me-2"></i> Iniciar sesión
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('register') }}" class="text-decoration-none custom-link">¿No tienes cuenta? Regístrate aquí</a>
                </div>

            </div>
        </div>
    </div>
</div>
@vite('resources/css/custom-forms.css') 
@endsection
