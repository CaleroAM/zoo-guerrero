<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_empshift" class="form-control @error('id_empshift') is-invalid @enderror" value="{{ old('id_empshift', $empshift?->id_empshift) }}" id="id_empshift">
            {!! $errors->first('id_empshift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hours_worked" class="form-label">{{ __('Horas trabajadas') }}</label>
            <input type="time" name="hours_worked" class="form-control @error('hours_worked') is-invalid @enderror" value="{{ old('hours_worked', $empshift?->hours_worked) }}" id="hours_worked" placeholder="Horas trabajadas">
            {!! $errors->first('hours_worked', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reason" class="form-label">{{ __('Razón') }}</label>
            <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason', $empshift?->reason) }}" id="reason" placeholder="Razón">
            {!! $errors->first('reason', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_shift">Seleccionar turno:</label>
            <select name="fk_shift" id="fk_shift" class="form-select">
                <option value="">-- Selecciona un turno --</option>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id_shift }}">{{ $shift->description }}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_employee">Seleccionar empleado:</label>
            <select name="fk_employee" id="fk_employee" class="form-select">
                <option value="">-- Selecciona un empleado --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id_employee }}">{{ $employee->name }} {{$employee->last_name}}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
    </div>

</div>