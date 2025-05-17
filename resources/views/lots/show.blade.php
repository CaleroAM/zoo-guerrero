@extends('layouts.app')

@section('template_title')
    {{ $lot->name ?? __('Show') . " " . __('Lot') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Lote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('lots.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Lote:</strong>
                                    {{ $lot->id_lot }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de caducidad:</strong>
                                    {{ $lot->date_cad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Porción:</strong>
                                    {{ $lot->portion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de inicio:</strong>
                                    {{ $lot->date_start }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alimento:</strong>
                                     {{ $lot->food ? $lot->food->name : 'No disponible' }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
