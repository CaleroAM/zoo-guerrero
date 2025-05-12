@extends('layouts.app')

@section('template_title')
    {{ $shift->name ?? __('Show') . " " . __('Shift') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Turno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('shifts.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Turno:</strong>
                                    {{ $shift->id_shift }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripción:</strong>
                                    {{ $shift->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hora de inicio:</strong>
                                    {{ $shift->hour_s }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hora de fin:</strong>
                                    {{ $shift->hour_e }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
