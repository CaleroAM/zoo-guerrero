<div class="row p-1">
    <div class="col-md-12">
        <input type="hidden" name="id_lot" id="id_lot" value="{{ old('id_lot', $lot?->id_lot) }}">

        <div class="form-group mb-3"><label for="date_cad" class="form-label">{{ __('Fecha de caducidad') }}</label>
            <input type="date" name="date_cad" id="date_cad" class="form-control @error('date_cad') is-invalid @enderror" value="{{ old('date_cad', $lot?->date_cad) }}">
            @error('date_cad')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group mb-3"><label for="portion" class="form-label">{{ __('Porción') }}</label>
            <input type="text" name="portion" id="portion" class="form-control @error('portion') is-invalid @enderror" value="{{ old('portion', $lot?->portion) }}" placeholder="Porción">
            @error('portion')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="form-group mb-3"><label for="date_start" class="form-label">{{ __('Fecha de inicio') }}</label>
            <input type="date" name="date_start" id="date_start" class="form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start', $lot?->date_start) }}">
            @error('date_start')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    </div>
</div>
