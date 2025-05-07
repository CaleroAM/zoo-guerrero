<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_animal" class="form-label">{{ __('Id Animal') }}</label>
            <input type="text" name="id_animal" class="form-control @error('id_animal') is-invalid @enderror" value="{{ old('id_animal', $animal?->id_animal) }}" id="id_animal" placeholder="Id Animal">
            {!! $errors->first('id_animal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $animal?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="age" class="form-label">{{ __('Age') }}</label>
            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $animal?->age) }}" id="age" placeholder="Age">
            {!! $errors->first('age', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="height" class="form-label">{{ __('Height') }}</label>
            <input type="text" name="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height', $animal?->height) }}" id="height" placeholder="Height">
            {!! $errors->first('height', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="weigh" class="form-label">{{ __('Weigh') }}</label>
            <input type="text" name="weigh" class="form-control @error('weigh') is-invalid @enderror" value="{{ old('weigh', $animal?->weigh) }}" id="weigh" placeholder="Weigh">
            {!! $errors->first('weigh', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sex" class="form-label">{{ __('Sex') }}</label>
            <input type="text" name="sex" class="form-control @error('sex') is-invalid @enderror" value="{{ old('sex', $animal?->sex) }}" id="sex" placeholder="Sex">
            {!! $errors->first('sex', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nac" class="form-label">{{ __('Fecha Nac') }}</label>
            <input type="text" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror" value="{{ old('fecha_nac', $animal?->fecha_nac) }}" id="fecha_nac" placeholder="Fecha Nac">
            {!! $errors->first('fecha_nac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $animal?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_specie" class="form-label">{{ __('Fk Specie') }}</label>
            <input type="text" name="fk_specie" class="form-control @error('fk_specie') is-invalid @enderror" value="{{ old('fk_specie', $animal?->fk_specie) }}" id="fk_specie" placeholder="Fk Specie">
            {!! $errors->first('fk_specie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_zone" class="form-label">{{ __('Fk Zone') }}</label>
            <input type="text" name="fk_zone" class="form-control @error('fk_zone') is-invalid @enderror" value="{{ old('fk_zone', $animal?->fk_zone) }}" id="fk_zone" placeholder="Fk Zone">
            {!! $errors->first('fk_zone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>