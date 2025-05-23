@extends('layouts.app')

@section('template_title')
    {{ $species->name ?? __('Show') . " " . __('Species') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Especies</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('species.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Especie:</strong>
                                    {{ $species->id_specie }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre científico:</strong>
                                    {{ $species->name_scientific }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre común:</strong>
                                    {{ $species->name_common }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Familia:</strong>
                                    {{ $species->family }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
