@extends('layouts.app')

@section('template_title')
    {{ $animal->name ?? __('Show') . " " . __('Animal') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar ') }} animal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('animals.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Animal:</strong>
                                    {{ $animal->id_animal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $animal->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Edad:</strong>
                                    {{ $animal->age }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Altura:</strong>
                                    {{ $animal->height }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Peso:</strong>
                                    {{ $animal->weigh }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sexo:</strong>
                                    {{ $animal->sex }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de nacimiento:</strong>
                                    {{ $animal->fecha_nac }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $animal->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Especie:</strong>
                                    {{ $animal->fk_specie }} <text>-</text>
                                    {{ $animal->species ? $animal->species->name_scientific : 'No disponible' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Zona:</strong>
                                    {{ $animal->fk_zone }} <text>-</text>
                                    
                                    {{ $animal->zone ? $animal->zone->location : '' }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
