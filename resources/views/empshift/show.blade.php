@extends('layouts.app')

@section('template_title')
    {{ $empshift->name ?? __('Show') . " " . __('Empshift') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empshift</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('empshifts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Empshift:</strong>
                                    {{ $empshift->id_empshift }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hours Worked:</strong>
                                    {{ $empshift->hours_worked }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Reason:</strong>
                                    {{ $empshift->reason }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Shift:</strong>
                                    {{ $empshift->fk_shift }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Employee:</strong>
                                    {{ $empshift->fk_employee }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
