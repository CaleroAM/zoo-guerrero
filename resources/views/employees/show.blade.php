@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? __('Show') . " " . __('Employee') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Empleado:</strong>
                                    {{ $employee->id_employee }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $employee->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Segundo nombre:</strong>
                                    {{ $employee->second_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido:</strong>
                                    {{ $employee->last_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Edad:</strong>
                                    {{ $employee->age }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sexo:</strong>
                                    {{ $employee->Sex }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de empleado:</strong>
                                    {{ $employee->type_empl }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jefe:</strong>
                                    {{ $employee->id_boss }}<text>-</text>
                                    {{ $employee->employee?->name ?? 'No disponible' }}
                                    {{ $employee->employee?->last_name ?? '' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Turno:</strong>
                                    {{ $employee->fk_shift }}<text>-</text>
                                    {{ $employee->shift?->description ?? 'No disponible' }}
                                    {{ $employee->shift?->time ?? '' }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
