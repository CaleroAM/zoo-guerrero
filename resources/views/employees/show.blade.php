@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? __('Show') . " " . __('Employee') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Employee:</strong>
                                    {{ $employee->id_employee }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $employee->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Second Name:</strong>
                                    {{ $employee->second_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Last Name:</strong>
                                    {{ $employee->last_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Age:</strong>
                                    {{ $employee->age }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sex:</strong>
                                    {{ $employee->Sex }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Type Empl:</strong>
                                    {{ $employee->type_empl }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Boss:</strong>
                                    {{ $employee->id_boss }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fk Shift:</strong>
                                    {{ $employee->fk_shift }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
