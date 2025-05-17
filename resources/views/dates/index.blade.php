@extends('layouts.app')

@section('template_title')
    Dates
    <link href="{{ asset('../css/custom.css') }}" rel="stylesheet">
    <!-- Incluir CSS de Toastr -->
    <link href="{{ asset('node_modules/toastr/build/toastr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Tarjeta principal -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">     
                            <span id="card_title">
                                {{ __('Datos') }}
                                <i class="fa-solid fa-circle-info"></i>
                            </span>
                            <button id="add-dates-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir datos
                            </button>
                    </div>
                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar datos...Ej. id_date, empleado, telefono, email, calle, colonia, código postal, estado">
                        </div>      
                    </div>

                    <!-- Formulario para crear/editar alimentos -->
                    <div id="datesFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="dates-form" action="{{ route('dates.store') }}" method="POST" 
                              data-store-route="{{ route('dates.store') }}"
                              data-update-route="{{ route('dates.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_date" id="id_date" value="">
                            @include('dates.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4" style ="display: none">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th >Id Dato</th>
                                        <th >Empleado</th>
                                        <th >Telefono</th>
                                        <th >Email</th>
                                        <th >Calle</th>
                                        <th >Colonia</th>
                                        <th >Código postal</th>
                                        <th >Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="dates-table-body">
                                    @foreach ($dates as $date)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $date->id_date }}</td>
                                        <td >
                                            <div class="date-info">
                                                {{ $date->employee ? $date->employee->name : 'No disponible' }}
                                            </div>
                                        </td>
										<td >{{ $date->phone }}</td>
										<td >{{ $date->email }}</td>
										<td >{{ $date->street }}</td>
										<td >{{ $date->cologne }}</td>
										<td >{{ $date->cp }}</td>
										<td >{{ $date->state }}</td>

                                        <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dates.show', $date->id_date) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-dates-btn" 
                                                            data-id_date="{{ $date->id_date }}"
                                                            data-fk_employee="{{ $date->fk_employee }}"
                                                            data-phone="{{ $date->phone }}"
                                                            data-email="{{ $date->email }}"
                                                            data-street="{{ $date->street }}"
                                                            data-cologne="{{ $date->cologne }}"
                                                            data-cp="{{ $date->cp }}"
                                                            data-state="{{ $date->state }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('dates.destroy', $date->id_date)"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dates->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @vite(['resources/js/dates.js'])
@endsection
