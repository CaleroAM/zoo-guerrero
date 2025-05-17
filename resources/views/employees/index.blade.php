@extends('layouts.app')

@section('template_title')
    Employees
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
                                {{ __('Empleados') }}
                                <i class="fas fa-users ms-1 system-icon"></i>
                            </span>
                            <button id="add-employees-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir empleado
                            </button>
                    </div>
                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar empleados...Ej. id_employee, nombre, segundo nombre, apellido, edad, sexo, tipo de empleado, id jefe, fk turno">
                        </div>      
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <!-- Formulario para crear/editar empleados -->
                    <div id="employeesFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="employees-form" action="{{ route('employees.store') }}" method="POST" 
                              data-store-route="{{ route('employees.store') }}"
                              data-update-route="{{ route('employees.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_employee" id="id_employee" value="">
                            @include('employees.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4" style="display: none">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

                                    <th>No</th>    
									<th >Id empleado</th>
									<th >Nombre</th>
									<th >Segundo nombre</th>
									<th >Apellidos</th>
									<th >Edad</th>
									<th >Sexo</th>
									<th >Tipo de empleado</th>
									<th >Jefe</th>
									<th >Turno</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="employees-table-body">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $employee->id_employee }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->second_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->age }}</td>
                                            <td>{{ $employee->Sex }}</td>
                                            <td>{{ $employee->type_empl }}</td>
                                            <td>
                                                <div class="employee-info">
                                                    {{ $employee->employee?->name ?? 'No disponible' }}
                                                    {{ $employee->employee?->last_name ?? '' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="employee-info">
                                                    {{ $employee->shift?->description ?? 'No disponible' }}
                                                    {{ $employee->shift?->time ?? '' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('employees.show', $employee->id_employee) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-employees-btn"
                                                            data-id_employee="{{ $employee->id_employee }}"
                                                            data-name="{{ $employee->name }}"
                                                            data-second_name="{{ $employee->second_name }}"
                                                            data-last_name="{{ $employee->last_name ?? '' }}"
                                                            data-age="{{ $employee->age }}"
                                                            data-sex="{{ $employee->Sex }}"
                                                            data-type_empl="{{ $employee->type_empl }}"
                                                            data-id_boss="{{ $employee->employee?->id_employee ?? '' }}"
                                                            data-fk_shift="{{ $employee->shift?->id_shift ?? '' }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('employees.destroy', $employee->id_employee)"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $employees->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@vite(['resources/js/employees.js'])
@endsection
