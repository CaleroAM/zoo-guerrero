<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_zone" class="form-control @error('id_zone') is-invalid @enderror" value="{{ old('id_zone', $zone?->id_zone) }}" id="id_zone" placeholder="Id Zone">
            {!! $errors->first('id_zone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $zone?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="location" class="form-label">{{ __('Location') }}</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $zone?->location) }}" id="location" placeholder="Location">
            {!! $errors->first('location', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
            <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $zone?->capacity) }}" id="capacity" placeholder="Capacity">
            {!! $errors->first('capacity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type" class="form-label">{{ __('Type') }}</label>
            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type', $zone?->type) }}" id="type" placeholder="Type">
            {!! $errors->first('type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="weather" class="form-label">{{ __('Weather') }}</label>
            <input type="text" name="weather" class="form-control @error('weather') is-invalid @enderror" value="{{ old('weather', $zone?->weather) }}" id="weather" placeholder="Weather">
            {!! $errors->first('weather', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
</div>