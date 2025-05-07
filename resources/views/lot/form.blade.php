<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_lot" class="form-label">{{ __('Id Lot') }}</label>
            <input type="text" name="id_lot" class="form-control @error('id_lot') is-invalid @enderror" value="{{ old('id_lot', $lot?->id_lot) }}" id="id_lot" placeholder="Id Lot">
            {!! $errors->first('id_lot', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date_cad" class="form-label">{{ __('Date Cad') }}</label>
            <input type="text" name="date_cad" class="form-control @error('date_cad') is-invalid @enderror" value="{{ old('date_cad', $lot?->date_cad) }}" id="date_cad" placeholder="Date Cad">
            {!! $errors->first('date_cad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="portion" class="form-label">{{ __('Portion') }}</label>
            <input type="text" name="portion" class="form-control @error('portion') is-invalid @enderror" value="{{ old('portion', $lot?->portion) }}" id="portion" placeholder="Portion">
            {!! $errors->first('portion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date_start" class="form-label">{{ __('Date Start') }}</label>
            <input type="text" name="date_start" class="form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start', $lot?->date_start) }}" id="date_start" placeholder="Date Start">
            {!! $errors->first('date_start', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_food" class="form-label">{{ __('Fk Food') }}</label>
            <input type="text" name="fk_food" class="form-control @error('fk_food') is-invalid @enderror" value="{{ old('fk_food', $lot?->fk_food) }}" id="fk_food" placeholder="Fk Food">
            {!! $errors->first('fk_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>