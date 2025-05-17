@extends('layouts.app')

@section('template_title')
    {{ $date->name ?? __('Show') . " " . __('Date') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} datos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dates.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Dato:</strong>
                                    {{ $date->id_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empleado:</strong>
                                    {{ $date->fk_employee }} <text>-</text>
                                    {{ $date->fk_employee ? $date->employee->name : 'No disponible' }}
                                    {{ $date->fk_employee ? $date->employee->last_name : 'No disponible' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Celular:</strong>
                                    {{ $date->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $date->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Calle:</strong>
                                    {{ $date->street }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Colonia:</strong>
                                    {{ $date->cologne }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Código postal:</strong>
                                    {{ $date->cp }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $date->state }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
