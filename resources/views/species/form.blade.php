<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_specie" class="form-label">{{ __('Id Specie') }}</label>
            <input type="text" name="id_specie" class="form-control @error('id_specie') is-invalid @enderror" value="{{ old('id_specie', $species?->id_specie) }}" id="id_specie" placeholder="Id Specie">
            {!! $errors->first('id_specie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name_scientific" class="form-label">{{ __('Name Scientific') }}</label>
            <input type="text" name="name_scientific" class="form-control @error('name_scientific') is-invalid @enderror" value="{{ old('name_scientific', $species?->name_scientific) }}" id="name_scientific" placeholder="Name Scientific">
            {!! $errors->first('name_scientific', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name_common" class="form-label">{{ __('Name Common') }}</label>
            <input type="text" name="name_common" class="form-control @error('name_common') is-invalid @enderror" value="{{ old('name_common', $species?->name_common) }}" id="name_common" placeholder="Name Common">
            {!! $errors->first('name_common', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="family" class="form-label">{{ __('Family') }}</label>
            <input type="text" name="family" class="form-control @error('family') is-invalid @enderror" value="{{ old('family', $species?->family) }}" id="family" placeholder="Family">
            {!! $errors->first('family', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>