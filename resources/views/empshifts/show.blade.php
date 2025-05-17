@extends('layouts.app')

@section('template_title')
    {{ $empshift->name ?? __('Show') . " " . __('Empshift') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} horas trabajadas</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('empshifts.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id:</strong>
                                    {{ $empshift->id_empshift }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horas trabajadas:</strong>
                                    {{ $empshift->hours_worked }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Razón:</strong>
                                    {{ $empshift->reason }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Turno:</strong>
                                    {{ $empshift->fk_shift }}<text>-</text>
                                    {{ $empshift->shift->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empleado:</strong>
                                    {{ $empshift->fk_employee }} <text>-</text>
                                    {{ $empshift->employee->name }} {{ $empshift->employee->last_name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
