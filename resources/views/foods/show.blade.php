@extends('layouts.app')

@section('template_title')
    {{ $foods->name ?? __('Show') . " " . __('Food') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Food</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('foods.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Alimento:</strong>
                                    {{ $foods->id_food }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $foods->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contenido:</strong>
                                    {{ $foods->content }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contenido total:</strong>
                                    {{ $foods->total_amount }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Costo:</strong>
                                    {{ $foods->cost }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Proveedor:</strong>
                                    {{ $foods->fk_supplier }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
