@extends('layouts.app')

@section('template_title')
    Zones
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
                            {{ __('Zonas') }}
                            <i class="fas fa-map-marked-alt ms-1 system-ico"></i>
                        </span>
                        <button id="add-zones-btn" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Añadir Zona
                        </button>
                    </div>

                <!-- Buscador -->
                <div class="card-body p-4">
                    <div class="input-group mb-3">
                        <input type="text" id="search-input" class="form-control" placeholder="Buscar Zonas...Ej. id_Zona, Nombre, Ubicación, Capacidad, Tipo, Clima">
                    </div>
                </div>

                <!-- Formulario para crear/editar especies -->
                <div id="zonesFormContainer" style="display: none;" class="card-body bg-light">
                    <form id="zones-form" action="{{ route('zones.store') }}" method="POST" 
                          data-store-route="{{ route('zones.store') }}" 
                          data-update-route="{{ route('zones.update', ':id') }}">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="id_zone" id="id_zone" value="">
                        @include('zones.form')
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                    
                    </form>
                </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Id Zona</th>
									<th >Nombre</th>
									<th >Ubicación</th>
									<th >Capacidad</th>
									<th >Tipo</th>
									<th >Clima</th>
                                    <th >Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id='zones-table-body'>
                                    @foreach ($zones as $zone)
                                        <tr>
                                            <td>{{ ++$i }}</td>    
                                            <td >{{ $zone->id_zone }}</td>
                                            <td >{{ $zone->name }}</td>
                                            <td >{{ $zone->location }}</td>
                                            <td >{{ $zone->capacity }}</td>
                                            <td >{{ $zone->type }}</td>
                                            <td >{{ $zone->weather }}</td>
                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('zones.show', $zone->id_zone) }}">
                                                        <i class="fa fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-zones-btn" 
                                                            data-id_zone="{{ $zone->id_zone }}"
                                                            data-name="{{ $zone->name }}"
                                                            data-location="{{ $zone->location }}"
                                                            data-capacity="{{ $zone->capacity }}"
                                                            data-type="{{ $zone->type }}"
                                                            data-weather="{{ $zone->weather }}">
                                                        <i class="fa fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('zones.destroy', $zone->id_zone)" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $zones->withQueryString()->links() !!}
            </div>
        </div>
    </div>

@vite(['resources/js/zones.js'])
@endsection
