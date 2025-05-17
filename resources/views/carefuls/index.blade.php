@extends('layouts.app')

@section('template_title')
    Carefuls
    <link href="{{ asset('../css/custom.css') }}" rel="stylesheet">
    <!-- Incluir CSS de Toastr -->
    <link href="{{ asset('node_modules/toastr/build/toastr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                       
                        <span id="card_title">
                            {{ __('Cuidados') }}
                            <i class="fas fa-heartbeat ms-1 system-icon"></i>
                        </span>
                        <button id="add-carefuls-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir cuidado
                        </button>
                    </div>

                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar cuidados...Ej. id, fecha, horas, tratamiento, cantidad de alimento, alimento, empleado, animal">
                        </div>      
                    </div>

                    <div id="carefulsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="carefuls-form" action="{{ route('carefuls.store') }}" method="POST" 
                              data-store-route="{{ route('carefuls.store') }}"
                              data-update-route="{{ route('carefuls.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_careful" id="id_careful" value="">
                            @include('carefuls.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4"  style="display: none">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th >Id de cuidado</th>
                                        <th >Fecha de inicio</th>
                                        <th >Horas</th>
                                        <th >Tratamiento</th>
                                        <th >Cantidad de comidad</th>
                                        <th >Comida</th>
                                        <th >Empleado encargado</th>
                                        <th >Animal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="carefuls-table-body">
                                    @foreach ($carefuls as $careful)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td >{{ $careful->id_careful }}</td>
                                            <td >{{ $careful->date_start }}</td>
                                            <td >{{ $careful->hours }}</td>
                                            <td >{{ $careful->treatment }}</td>
                                            <td >{{ $careful->amount_food }}</td>
                                            <td >
                                                <div class="food-info">
                                                    {{ $careful->food ? $careful->food->name : 'No disponible' }}
                                                </div>
                                            </td>
                                            <td >
                                                <div class="employee-info">
                                                    {{ $careful->employee ? $careful->employee->name : 'No disponible' }}

                                                    {{ $careful->employee ? $careful->employee->last_name : '' }}
                                                </div>
                                            </td>
                                            <td >
                                                <div class="animal-info">
                                                    {{ $careful->animal ? $careful->animal->name : 'No disponible' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('carefuls.show', $careful->id_careful) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-carefuls-btn" 
                                                            data-id_careful="{{ $careful->id_careful }}"
                                                            data-date_start="{{ $careful->date_start }}"
                                                            data-hours="{{ $careful->hours }}"
                                                            data-treatment="{{ $careful->treatment }}"
                                                            data-amount_food="{{ $careful->amount_food }}"
                                                            data-fk_food="{{ $careful->fk_food }}"
                                                            data-fk_employee="{{ $careful->fk_employee }}"
                                                            data-fk_animal="{{ $careful->fk_animal }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('carefuls.destroy', $careful->id_careful)"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $carefuls->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @vite(['resources/js/carefuls.js'])
@endsection
