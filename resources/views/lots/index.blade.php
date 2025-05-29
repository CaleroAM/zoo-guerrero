@extends('layouts.app')

@section('template_title')
    Lots
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
                                {{ __('Lotes') }}
                                <i class="fas fa-box-open ms-1 system-icon"></i>
                            </span>
                            <button id="add-lots-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir lote
                            </button>
                    </div>
                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar Lotes...Ej. id_lote, Nombre, Fecha de inicio, Fecha de fin, Cantidad, Alimento">
                        </div>      
                    </div>
                    <!-- Formulario para crear/editar alimentos -->
                    <div id="lotsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="lots-form" action="{{ route('lots.store') }}" method="POST" 
                              data-store-route="{{ route('lots.store') }}"
                              data-update-route="{{ route('lots.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_lot" id="id_lot" value="">
                            @include('lots.form')
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
                                        <th >Id Lote</th>
                                        <th >Fecha de caducidad</th>
                                        <th >Porción</th>
                                        <th >Fecha de inicio</th>
                                        <th >Alimento</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody id="lots-table-body">
                                    @foreach ($lots as $lot)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $lot->id_lot }}</td>
										<td >{{ $lot->date_cad }}</td>
										<td >{{ $lot->portion }}</td>
										<td >{{ $lot->date_start }}</td>
										<td >
                                            <div class="food-info">
                                                {{ $lot->food ? $lot->food->name : 'No disponible' }}
                                                <span>-</span>
                                                {{ $lot->food ? $lot->food->content : '' }}
                                            </div>
                                        </td>

                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lots.show', $lot->id_lot) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-lots-btn" 
                                                            data-id_lot="{{ $lot->id_lot }}"
                                                            data-date_cad="{{ $lot->date_cad }}"
                                                            data-portion="{{ $lot->portion }}"
                                                            data-date_start="{{ $lot->date_start }}"
                                                            data-fk_food="{{ $lot->fk_food }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('lots.destroy', $lot->id_lot)"/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lots->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    @vite(['resources/js/lots.js'])
@endsection
