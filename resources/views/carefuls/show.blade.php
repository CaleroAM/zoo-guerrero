@extends('layouts.app')

@section('template_title')
    {{ $careful->name ?? __('Show') . " " . __('Careful') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} cuidado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('carefuls.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Careful:</strong>
                                    {{ $careful->id_careful }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de entradat:</strong>
                                    {{ $careful->date_start }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horas:</strong>
                                    {{ $careful->hours }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tratamiento:</strong>
                                    {{ $careful->treatment }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad de comida:</strong>
                                    {{ $careful->amount_food }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Comida:</strong>
                                    {{ $careful->fk_food }} <text>-</text>
                                    {{ $careful->food->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Empleado:</strong>
                                    {{ $careful->fk_employee }} <text>-</text>
                                    {{ $careful->employee->name }} 
                                    {{ $careful->employee->last_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Animal:</strong>
                                    {{ $careful->fk_animal }} <text>-</text>
                                    {{ $careful->animal->name }} <text>-</text>
                                    {{ $careful->animal->species->name_common }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
