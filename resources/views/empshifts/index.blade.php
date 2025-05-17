@extends('layouts.app')

@section('template_title')
    Empshifts
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
                                {{ __('Horas trabajadas') }}
                                <i class="fa-solid fa-hourglass-half ms-1 system-icon"></i>
                            </span>
                            <button id="add-empshifts-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir horas
                            </button>
                    </div>

                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar horas trabajadas...Ej. id, horas trabajadas, razón, turno, empleado">
                        </div>      
                    </div>

                    <div id="empshiftsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="empshifts-form" action="{{ route('empshifts.store') }}" method="POST" 
                              data-store-route="{{ route('empshifts.store') }}"
                              data-update-route="{{ route('empshifts.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_empshift" id="id_empshift" value="">
                            @include('empshifts.form')
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
                                        <th >Id</th>
                                        <th >Horas trabajas</th>
                                        <th >Razón</th>
                                        <th >Turno</th>
                                        <th >Empleado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="empshifts-table-body">
                                    @foreach ($empshifts as $empshift)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $empshift->id_empshift }}</td>
										<td >{{ $empshift->hours_worked }}</td>
										<td >{{ $empshift->reason }}</td>
                                        <td >
                                            <div class="shift-info">
                                                {{ $empshift->shift ? $empshift->shift->description : 'No disponible' }}
                                                <span>-</span>
                                                {{ $empshift->shift ? $empshift->shift->hour_s : '' }}
                                            </div>
                                        </td>
                                        <td >
                                            <div class="employee-info">
                                                {{ $empshift->employee ? $empshift->employee->name : 'No disponible' }}
                                                {{ $empshift->employee ? $empshift->employee->last_name : '' }}
                                            </div>
                                        </td>
                                        <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empshifts.show', $empshift->id_empshift) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-empshifts-btn" 
                                                            data-id_empshift="{{ $empshift->id_empshift }}"
                                                            data-hours_worked="{{ $empshift->hours_worked }}"
                                                            data-reason="{{ $empshift->reason }}"
                                                            data-fk_shift="{{ $empshift->fk_shift }}"
                                                            data-fk_employee="{{ $empshift->fk_employee }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('empshifts.destroy', $empshift->id_empshift)"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empshifts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@vite(['resources/js/empshifts.js'])
@endsection
