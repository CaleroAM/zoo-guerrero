@extends('layouts.app')

@section('template_title')
    {{ $zone->name ?? __('Show') . " " . __('Zone') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Zone</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('zones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Zone:</strong>
                                    {{ $zone->id_zone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $zone->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Location:</strong>
                                    {{ $zone->location }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Capacity:</strong>
                                    {{ $zone->capacity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type:</strong>
                                    {{ $zone->type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Weather:</strong>
                                    {{ $zone->weather }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
