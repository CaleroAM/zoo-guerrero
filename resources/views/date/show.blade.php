@extends('layouts.app')

@section('template_title')
    {{ $date->name ?? __('Show') . " " . __('Date') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Date</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Date:</strong>
                                    {{ $date->id_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Employee:</strong>
                                    {{ $date->fk_employee }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone:</strong>
                                    {{ $date->phone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $date->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Street:</strong>
                                    {{ $date->street }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cologne:</strong>
                                    {{ $date->cologne }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cp:</strong>
                                    {{ $date->cp }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>State:</strong>
                                    {{ $date->state }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
