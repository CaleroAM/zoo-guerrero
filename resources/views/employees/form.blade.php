<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_employee" class="form-control @error('id_employee') is-invalid @enderror" value="{{ old('id_employee', $employee?->id_employee) }}" id="id_employee" placeholder="Id Employee">
            {!! $errors->first('id_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="second_name" class="form-label">{{ __('Segundo nombre') }}</label>
            <input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name', $employee?->second_name) }}" id="second_name" placeholder="Segundo Nombre">
            {!! $errors->first('second_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Apellido') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $employee?->last_name) }}" id="last_name" placeholder="Apellido">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="second_last_name" class="form-label">{{ __('Segundo Apellido') }}</label>
            <input type="text" name="second_last_name" class="form-control @error('second_last_name') is-invalid @enderror" value="{{ old('second_last_name', $employee?->second_last_name) }}" id="second_last_name" placeholder="Apellido">
            {!! $errors->first('second_last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="age" class="form-label">{{ __('Edad') }}</label>
            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $employee?->age) }}" id="age" placeholder="Edad">
            {!! $errors->first('age', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label class="form-label d-block">{{ __('Sexo') }}</label>
            <div class="form-check form-check-inline">
                
                <input class="form-check-input" type="radio" name="Sex" id="sexo_m" value="Masculino" 
                    {{ old('Sex', $employee?->Sex) == 'Masculino' ? 'checked' : '' }}>
                <label class="form-check-label" for="sexo_m">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Sex" id="sexo_f" value="Femenino" 
                    {{ old('Sex', $employee?->Sex) == 'Femenino' ? 'checked' : '' }}>
                <label class="form-check-label" for="sexo_f">Femenino</label>
            </div>
            {!! $errors->first('Sex', '<div class="invalid-feedback d-block" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="type_empl" class="form-label">{{ __('Tipo de empleado') }}</label>
            <select name="type_empl" id="type_empl" class="form-select @error('type_empl') is-invalid @enderror">
                <option value="">-- Selecciona un tipo --</option>
                <option value="Gerente General" {{ old('type_empl', $employee?->type_empl) == 'Gerente General' ? 'selected' : '' }}>Gerente General</option>
                <option value="Jefe de limpieza" {{ old('type_empl', $employee?->type_empl) == 'Jefe de limpieza' ? 'selected' : '' }}>Jefe de limpieza</option>
                <option value="Jefe de cuidadores" {{ old('type_empl', $employee?->type_empl) == 'Jefe de cuidadores' ? 'selected' : '' }}>Jefe de cuidadores</option>
                <option value="Jefe administrativo" {{ old('type_empl', $employee?->type_empl) == 'Jefe administrativo' ? 'selected' : '' }}>Jefe administrativo</option>
                <option value="Empleado" {{ old('type_empl', $employee?->type_empl) == 'Empleado' ? 'selected' : '' }}>Empleado</option>
            </select>
            {!! $errors->first('type_empl', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20" id="employee-select-group">
            <label for="id_boss" class="form-label">{{ __('Jefe') }}</label>
            <select name="id_boss" id="id_boss" class="form-select @error('id_boss') is-invalid @enderror">
                <option value="">-- Seleccionar jefe --</option>
                @foreach($bosses as $boss)
                    <option value="{{ $boss->id_employee }}" {{ old('id_boss', $employee?->id_boss) == $boss->id_employee ? 'selected' : '' }}>
                        {{ $boss->name }} {{ $boss->last_name }} - {{ $boss->type_empl }}
                    </option>
                @endforeach
            </select>
            <div id="id_boss-error" class="invalid-feedback" role="alert"></div>
            {!! $errors->first('id_boss', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <label for="fk_shift">Seleccionar turno:</label>
            <select name="fk_shift" id="fk_shift" class="form-select">
                <option value="">-- Selecciona un turno --</option>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id_shift }}" {{ old('fk_shift', $employee?->fk_shift) == $shift->id_shift ? 'selected' : '' }}>{{ $shift->description }}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            <div class="invalid-feedback" id="fk_shift-error"></div>

        </div>

    </div>
<!-- Botón para mostrar/ocultar datos personales -->
    <div class="form-group mb-3">
        <button type="button" class="btn btn-outline-info" id="toggle-personal-data-btn">
            <i class="fas fa-id-card"></i> Datos personales (opcional)
        </button>
    </div>

    <!-- Contenedor oculto del formulario de dates -->
    <div id="personal-data-form" class="mt-3" style="display: none;">
        @include('dates.form')
    </div>
</div>