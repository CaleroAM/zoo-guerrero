@extends('layouts.app')

@section('template_title')
    Shifts
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
                                {{ __('Turnos') }}
                                <i class="fas fa-clock ms-1 system-icon"></i>
                            </span>
                            <button id="add-shifts-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir Turno
                            </button>
                    </div>

                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar Turnos...Ej. id_turno, Descripción, Hora de inicio, Hora de fin">
                        </div>
                    </div>
                    <!-- Formulario para crear/editar turnos -->
                    <div id="shiftsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="shifts-form" action="{{ route('shifts.store') }}" method="POST" 
                              data-store-route="{{ route('shifts.store') }}"
                                data-update-route="{{route('shifts.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_shift" id="id_shift" value="">
                            @include('shifts.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4 " style="display: none;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Id Turno</th>
                                        <th>Descripción</th>
                                        <th>Hora de inicio</th>
                                        <th>Hora de fin</th>
                                        <th>Acciones </th>
                                    </tr>
                                </thead>
                                <tbody id="shifts-table-body">
                                    @foreach ($shifts as $shift)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                                
                                            <td >{{ $shift->id_shift }}</td>
                                            <td >{{ $shift->description }}</td>
                                            <td >{{ $shift->hour_s }}</td>
                                            <td >{{ $shift->hour_e }}</td>

                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('shifts.show', $shift->id_shift) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                <button class="btn btn-sm btn-success edit-shifts-btn" 
                                                        data-id_shift="{{ $shift->id_shift }}"
                                                        data-description="{{ $shift->description }}"
                                                        data-hour_s="{{ $shift->hour_s }}"
                                                        data-hour_e="{{ $shift->hour_e }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </button>
                                                <x-delete-button :action="route('shifts.destroy', $shift->id_shift)" />
                                                </div>    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $shifts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@vite(['resources/js/shifts.js'])
@endsection
