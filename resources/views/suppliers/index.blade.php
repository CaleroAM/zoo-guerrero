@extends('layouts.app')

@section('template_title')
    Suppliers
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
                            {{ __('Proveedores') }}
                            <i class="fas fa-truck ms-1 system-ico"></i>
                        </span>
                        <button id="add-suppliers-btn" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Añadir proveedor
                        </button>
                    </div>
                    <!-- Buscador -->
                    <div class="card-body p-4">
                        <div class="input-group mb-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Buscar Proveedores...Ej. RFC, Nombre, Teléfono, Correo, Dirección, Tipo de proveedor">
                        </div>
                    </div>

                    <!-- Formulario para crear/editar especies -->
                    <div id="suppliersFormContainer" style="display: none;" class="card-body bg-light">
                        <form id="suppliers-form" action="{{ route('suppliers.store') }}" method="POST" 
                              data-store-route="{{ route('suppliers.store') }}" 
                              data-update-route="{{ url('suppliers') }}/:id">
                            @csrf
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <input type="hidden" name="id_zone" id="id_zone" value="">
    
                            @include('suppliers.form')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" id="cancel-form-btn" class="btn btn-secondary">Cancelar</button>
                        
                        </form>
                    </div>
              
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4" style="display: none;">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >RFC</th>
									<th >Nombre</th>
									<th >Teléfono</th>
									<th >Correo</th>
									<th >Dirección</th>
									<th >Tipo de proveedor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id='suppliers-table-body'>
                                    @foreach ($suppliers as $supplier)
                                        <tr>

                                            <td>{{ ++$i }}</td>    
                                            <td >{{ $supplier->rfc }}</td>
                                            <td >{{ $supplier->name }}</td>
                                            <td >{{ $supplier->phone }}</td>
                                            <td >{{ $supplier->mail }}</td>
                                            <td >{{ $supplier->addres }}</td>
                                            <td >{{ $supplier->type_sup }}</td>

                                            <td>
                                                <div class="action-buttons d-flex gap-1">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('suppliers.show', $supplier->rfc) }}">
                                                        <i class="fa fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <button class="btn btn-sm btn-success edit-suppliers-btn" 
                                                            data-rfc="{{ $supplier->rfc }}"
                                                            data-name="{{ $supplier->name }}"
                                                            data-phone="{{ $supplier->phone }}"
                                                            data-mail="{{ $supplier->mail }}"
                                                            data-addres="{{ $supplier->addres }}"
                                                            data-type_sup="{{ $supplier->type_sup }}">
                                                        <i class="fa fa-edit"></i> {{ __('Editar') }}
                                                    </button>
                                                    <x-delete-button :action="route('suppliers.destroy', $supplier->rfc)" />
                                                </div>
                                            </td>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $suppliers->withQueryString()->links() !!}
            </div>
        </div>
    </div>

@vite(['resources/js/suppliers.js'])
@endsection
