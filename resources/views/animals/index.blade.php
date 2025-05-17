
@extends('layouts.app')

@section('template_title')
    Animals
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
                            {{ __('Animals') }}
                            <i class="fa-solid fa-paw ms-1 system-icon"></i>
                        </span>
                        <button id="add-animals-btn" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Añadir animal
                        </button>
                        
                    </div>
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar animales...Ej. id, nombre, edad, peso, altura, especie, zona">
                        </div>      
                    </div>

                    <div id="animalsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="animals-form" action="{{ route('animals.store') }}" method="POST" 
                              data-store-route="{{ route('animals.store') }}"
                              data-update-route="{{ route('animals.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_animal" id="id_animal" value="">
                            @include('animals.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        </form>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4" style = "display: none">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th >Id Animal</th>
                                        <th >Nombre</th>
                                        <th >Edad</th>
                                        <th >Altura</th>
                                        <th >Peso</th>
                                        <th >Sexo</th>
                                        <th >Fecha de nacimiento</th>
                                        <th >Descripción</th>
                                        <th >Especie</th>
                                        <th >Zona</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="animals-table-body">
                                    @foreach ($animals as $animal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td >{{ $animal->id_animal }}</td>
                                            <td >{{ $animal->name }}</td>
                                            <td >{{ $animal->age }}</td>
                                            <td >{{ $animal->height }}</td>
                                            <td >{{ $animal->weigh }}</td>
                                            <td >{{ $animal->sex }}</td>
                                            <td >{{ $animal->fecha_nac }}</td>
                                            <td >{{ $animal->descripcion }}</td>
                                            <td >
                                                <div class="specie-info">
                                                    {{ $animal->species ? $animal->species->name_scientific : 'No disponible' }}
                                                </div>
                                            </td>
                                            <td >
                                                <div class="zone-info">
                                                    {{ $animal->zone ? $animal->zone->name : 'No disponible' }}
                                                    <span>-</span>
                                                    {{ $animal->zone ? $animal->zone->location : '' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('animals.show', $animal->id_animal) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-animals-btn" 
                                                            data-id_animal="{{ $animal->id_animal }}"
                                                            data-name="{{ $animal->name }}"
                                                            data-age="{{ $animal->age }}"
                                                            data-height="{{ $animal->height }}"
                                                            data-weigh="{{ $animal->weigh }}"
                                                            data-sex="{{ $animal->sex }}"
                                                            data-fecha_nac="{{ $animal->fecha_nac }}"
                                                            data-descripcion="{{ $animal->descripcion }}"
                                                            data-fk_specie="{{ $animal->fk_specie }}"
                                                            data-fk_zone="{{ $animal->fk_zone }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('animals.destroy', $animal->id_animal)"/>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $animals->withQueryString()->links() !!}
            </div>
        </div>
    </div>

@vite(['resources/js/animals.js'])
@endsection