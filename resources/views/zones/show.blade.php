@extends('layouts.app')

@section('template_title')
    {{ $zone->name ?? __('Show') . " " . __('Zone') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Zona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('zones.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Zona:</strong>
                                    {{ $zone->id_zone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre</strong>
                                    {{ $zone->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ubicación</strong>
                                    {{ $zone->location }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Capacidad</strong>
                                    {{ $zone->capacity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo:</strong>
                                    {{ $zone->type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clima:</strong>
                                    {{ $zone->weather }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
