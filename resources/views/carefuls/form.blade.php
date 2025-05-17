<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_careful" class="form-label">{{ __('Id Careful') }}</label>
            <input type="hidden" name="id_careful" class="form-control @error('id_careful') is-invalid @enderror" value="{{ old('id_careful', $careful?->id_careful) }}" id="id_careful" placeholder="Id Careful">
            {!! $errors->first('id_careful', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date_start" class="form-label">{{ __('Fecha de entrada') }}</label>
            <input type="date" name="date_start" class="form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start', $careful?->date_start) }}" id="date_start" placeholder="Fecha de entrada">
            {!! $errors->first('date_start', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hours" class="form-label">{{ __('Horas') }}</label>
            <input type="time" name="hours" class="form-control @error('hours') is-invalid @enderror" value="{{ old('hours', $careful?->hours) }}" id="hours" placeholder="Horas">
            {!! $errors->first('hours', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="treatment" class="form-label">{{ __('Tratamiento') }}</label>
            <input type="text" name="treatment" class="form-control @error('treatment') is-invalid @enderror" value="{{ old('treatment', $careful?->treatment) }}" id="treatment" placeholder="Tratamiento">
            {!! $errors->first('treatment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount_food" class="form-label">{{ __('Cantidad de comida') }}</label>
            <input type="number" name="amount_food" class="form-control @error('amount_food') is-invalid @enderror" value="{{ old('amount_food', $careful?->amount_food) }}" id="amount_food" placeholder="Cantidad de comida">
            {!! $errors->first('amount_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_food">Selecciona un alimento:</label>
            <select name="fk_food" id="fk_food" class="form-select">
                <option value="">-- Selecciona un alimento --</option>
                @foreach ($foods as $food)
                    <option value="{{ $food->id_food }}">{{ $food->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_employee">Selecciona un empleado:</label>
            <select name="fk_employee" id="fk_employee" class="form-select">
                <option value="">-- Selecciona un empleado --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id_employee }}" {{ old('fk_employee', $careful?->fk_employee) == $employee->id_employee ? 'selected' : '' }}>
                        {{ $employee->name }} {{ $employee->last_name }}
                    </option> 
                @endforeach
            </select>
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_animal">Selecciona un animal:</label>
            <select name="fk_animal" id="fk_animal" class="form-select">
                <option value="">-- Selecciona un animal --</option>
                @foreach ($animals as $animal)
                    <option value="{{ $animal->id_animal }}" {{ old('fk_animal', $animal?->fk_animal) == $animal->id_animal ? 'selected' : '' }}>
                        {{ $animal->name }} - {{ $animal->species->name_common }}
                    </option> 
                @endforeach
            </select>
            {!! $errors->first('fk_animal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>