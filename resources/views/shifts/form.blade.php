<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            {!! $errors->first('id_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $shift?->description) }}" id="description" placeholder="Descripción">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hour_s" class="form-label">{{ __('Horacia') }}</label>
            <input type="time" name="hour_s" class="form-control @error('hour_s') is-invalid @enderror" value="{{ old('hour_s', $shift?->hour_s) }}" id="hour_s" placeholder="Hora inicial">
            {!! $errors->first('hour_s', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hour_e" class="form-label">{{ __('Hora de terminación') }}</label>
            <input type="time" name="hour_e" class="form-control @error('hour_e') is-invalid @enderror" value="{{ old('hour_e', $shift?->hour_e) }}" id="hour_e" placeholder="Hora de terminación">
            {!! $errors->first('hour_e', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>