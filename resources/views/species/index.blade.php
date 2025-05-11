@extends('layouts.app')

@section('template_title')
    
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
                        {{ __('Especies') }}
                        <i class="fas fa-otter ms-1 system-icon"></i>
                    </span>
                    <button id="add-species-btn" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Añadir Especie
                    </button>
                </div>

                <!-- Buscador -->
                <div class="card-body p-4">
                    <div class="input-group mb-3">
                        <input type="text" id="search-input" class="form-control" placeholder="Buscar Especies...Ej. nombre científico, nombre común, familia">
                    </div>
                </div>

                <!-- Formulario para crear/editar especies -->
                <div id="speciesFormContainer" style="display: none;" class="card-body bg-light">
                    <form id="species-form" action="{{ route('species.store') }}" method="POST" 
                          data-store-route="{{ route('species.store') }}" 
                          data-update-route="{{ url('species') }}/:id">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="id_specie" id="id_specie" value="">

                        <div class="form-group mb-2 mb20">
                            <label for="name_scientific" class="form-label">{{ __('Name Scientific') }}</label>
                            <input type="text" name="name_scientific" class="form-control" id="name_scientific" placeholder="Nombre científico">
                            {!! $errors->first('name_scientific', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <label for="name_common" class="form-label">{{ __('Name Common') }}</label>
                            <input type="text" name="name_common" class="form-control" id="name_common" placeholder="Nombre común">
                            {!! $errors->first('name_common', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <label for="family" class="form-label">{{ __('Family') }}</label>
                            <input type="text" name="family" class="form-control" id="family" placeholder="Familia">
                            {!! $errors->first('family', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                    </form>
                </div>

                <!-- Los mensajes de flash session se manejarán por JS -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4" style="display: none;">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <!-- Tabla -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Id Especie</th>
                                    <th>Nombre científico</th>
                                    <th>Nombre común</th>
                                    <th>Familia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="species-table-body">
                                @foreach ($species as $index => $species)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $species->id_specie }}</td>
                                        <td>{{ $species->name_scientific }}</td>
                                        <td>{{ $species->name_common }}</td>
                                        <td>{{ $species->family }}</td>
                                        <td>
                                            <div class="action-buttons d-flex gap-1">
                                                <a class="btn btn-sm btn-primary" href="{{ route('species.show', $species->id_specie) }}">
                                                    <i class="fa fa-eye"></i> {{ __('Mostrar') }}
                                                </a>
                                                <button class="btn btn-sm btn-success edit-species-btn" 
                                                        data-id="{{ $species->id_specie }}"
                                                        data-scientific="{{ $species->name_scientific }}"
                                                        data-common="{{ $species->name_common }}"
                                                        data-family="{{ $species->family }}">
                                                    <i class="fa fa-edit"></i> {{ __('Editar') }}
                                                </button>
                                                <x-delete-button :action="route('species.destroy', $species->id_specie)" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/species.js'])
@endsection
