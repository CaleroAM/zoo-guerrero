@extends('layouts.app')

@section('template_title')
    Food
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
                            {{ __('Alimentos') }}
                            <i class="fas fa-apple-alt ms-1 system-icon"></i>
                        </span>
                        <button id="add-foods-btn" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Añadir Alimento
                        </button>
                    </div>

                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar Alimentos...Ej. nombre, contenido, cantidad total">
                        </div>      
                    </div>
                    <!-- Formulario para crear/editar alimentos -->
                    <div id="foodsFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="foods-form" action="{{ route('foods.store') }}" method="POST" 
                              data-store-route="{{ route('foods.store') }}"
                              data-update-route="{{ route('foods.update', ':id') }}">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_food" id="id_food" value="">
                            @include('foods.form')
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
                                        
                                        <th >Id Alimento</th>
                                        <th >Nombre</th>
                                        <th >Contenido actual</th>
                                        <th >Contenido todal</th>
                                        <th >Costo</th>
                                        <th >Proveedor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="foods-table-body">
                                    @foreach ($foods as $food)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $food->id_food }}</td>
										<td >{{ $food->name }}</td>
										<td >{{ $food->content }}</td>
										<td >{{ $food->total_amount }}</td>
										<td >{{ $food->cost }}</td>
                                        <td>
                                            <div class="supplier-info">
                                                {{ $food->supplier ? $food->supplier->name : 'Sin proveedor' }}
                                                <text>-</text>
                                                {{ $food->supplier ? $food->supplier->rfc : 'Sin proveedor' }}
                                            </div>

                                        </td> 

                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('foods.show', $food->id_food) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-foods-btn" 
                                                            data-id_food="{{ $food->id_food }}"
                                                            data-name="{{ $food->name }}"
                                                            data-content="{{ $food->content }}"
                                                            data-total_amount="{{ $food->total_amount }}"
                                                            data-cost="{{ $food->cost }}"
                                                            data-fk_supplier="{{ $food->fk_supplier }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('foods.destroy', $food->id_food)" />
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
    @vite(['resources/js/foods.js'])
@endsection
