@extends('layouts.app')

@section('template_title')
    {{ $careful->name ?? __('Show') . " " . __('Careful') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Careful</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('carefuls.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Careful:</strong>
                                    {{ $careful->id_careful }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date Start:</strong>
                                    {{ $careful->date_start }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hours:</strong>
                                    {{ $careful->hours }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Treatment:</strong>
                                    {{ $careful->treatment }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Amount Food:</strong>
                                    {{ $careful->amount_food }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Food:</strong>
                                    {{ $careful->fk_food }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Employee:</strong>
                                    {{ $careful->fk_employee }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Animal:</strong>
                                    {{ $careful->fk_animal }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
