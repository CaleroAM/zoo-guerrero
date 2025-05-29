<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_date" class="form-control @error('id_date') is-invalid @enderror" value="{{ old('id_date', $date->id_date ?? '') }}" id="id_date" placeholder="Id Date">
            {!! $errors->first('id_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_employee">Selecciona un empleado:</label>
            <select name="fk_employee" id="fk_employee" class="form-select">
                <option value="">-- Selecciona un empleado --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id_employee }}" {{ old('fk_employee', $date->fk_employee ?? '') == $employee->id_employee ? 'selected' : '' }}>
                        {{ $employee->name }} {{ $employee->last_name }}
                    </option> 
                @endforeach
            </select>
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Celular') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $date->phone ?? '') }}" id="phone" placeholder="Celular">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Correo') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $date->email ?? '') }}" id="email" placeholder="Correo">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="street" class="form-label">{{ __('Calle') }}</label>
            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street', $date->street ?? '') }}" id="street" placeholder="Calle">
            {!! $errors->first('street', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cologne" class="form-label">{{ __('Colonia') }}</label>
            <input type="text" name="cologne" class="form-control @error('cologne') is-invalid @enderror" value="{{ old('cologne', $date->cologne ?? '') }}" id="cologne" placeholder="Colonia">
            {!! $errors->first('cologne', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cp" class="form-label">{{ __('Código postal') }}</label>
            <input type="number" name="cp" class="form-control @error('cp') is-invalid @enderror" value="{{ old('cp', $date->cp ?? '') }}" id="cp" placeholder="Código postal">
            {!! $errors->first('cp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="state" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state', $date->state ?? '') }}" id="state" placeholder="Estado">
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>