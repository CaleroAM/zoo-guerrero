@extends('layouts.app')

@section('template_title')
    {{ $supplier->name ?? __('Show') . " " . __('Supplier') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('suppliers.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>RFC:</strong>
                                    {{ $supplier->rfc }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $supplier->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Teléfono:</strong>
                                    {{ $supplier->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Correo:</strong>
                                    {{ $supplier->mail }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dirección:</strong>
                                    {{ $supplier->addres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de proveedor:</strong>
                                    {{ $supplier->type_sup }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
