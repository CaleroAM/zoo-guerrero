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
                            <span class="card-title">{{ __('Show') }} Animal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('animals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Animal:</strong>
                                    {{ $animal->id_animal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $animal->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Age:</strong>
                                    {{ $animal->age }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Height:</strong>
                                    {{ $animal->height }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Weigh:</strong>
                                    {{ $animal->weigh }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sex:</strong>
                                    {{ $animal->sex }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Nac:</strong>
                                    {{ $animal->fecha_nac }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $animal->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Specie:</strong>
                                    {{ $animal->fk_specie }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Zone:</strong>
                                    {{ $animal->fk_zone }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
