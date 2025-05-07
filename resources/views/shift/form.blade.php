<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_shift" class="form-label">{{ __('Id Shift') }}</label>
            <input type="text" name="id_shift" class="form-control @error('id_shift') is-invalid @enderror" value="{{ old('id_shift', $shift?->id_shift) }}" id="id_shift" placeholder="Id Shift">
            {!! $errors->first('id_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $shift?->description) }}" id="description" placeholder="Description">
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hour_s" class="form-label">{{ __('Hour S') }}</label>
            <input type="text" name="hour_s" class="form-control @error('hour_s') is-invalid @enderror" value="{{ old('hour_s', $shift?->hour_s) }}" id="hour_s" placeholder="Hour S">
            {!! $errors->first('hour_s', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hour_e" class="form-label">{{ __('Hour E') }}</label>
            <input type="text" name="hour_e" class="form-control @error('hour_e') is-invalid @enderror" value="{{ old('hour_e', $shift?->hour_e) }}" id="hour_e" placeholder="Hour E">
            {!! $errors->first('hour_e', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>