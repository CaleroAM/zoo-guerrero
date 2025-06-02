<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="id_animal" class="form-control @error('id_animal') is-invalid @enderror" value="{{ old('id_animal', $animal?->id_animal) }}" id="id_animal" placeholder="Id Animal">
            {!! $errors->first('id_animal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $animal?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="age" class="form-label">{{ __('Edad') }}</label>
            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $animal?->age) }}" id="age" placeholder="Edad">
            {!! $errors->first('age', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="height" class="form-label">{{ __('Altura') }}</label>
            <input type="number" name="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height', $animal?->height) }}" id="height" placeholder="Altura en cm">
            {!! $errors->first('height', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="weigh" class="form-label">{{ __('Peso') }}</label>
            <input type="number" name="weigh" class="form-control @error('weigh') is-invalid @enderror" value="{{ old('weigh', $animal?->weigh) }}" id="weigh" placeholder="Peso">
            {!! $errors->first('weigh', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label class="form-label d-block">{{ __('Sexo') }}</label>
            <div class="form-check form-check-inline">
                
                <input class="form-check-input" type="radio" name="sex" id="sexo_m" value="Macho" 
                    {{ old('sex', $animal?->sex) == 'Macho' ? 'checked' : '' }}>
                <label class="form-check-label" for="sexo_m">Macho</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sexo_h" value="Hembra" 
                    {{ old('sex', $animal?->sex) == 'Hembra' ? 'checked' : '' }}>
                <label class="form-check-label" for="sexo_f">Hembra</label>
            </div>
            {!! $errors->first('sex', '<div class="invalid-feedback d-block" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_nac" class="form-label">{{ __('Fecha de nacimiento') }}</label>
            <input type="date" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror" value="{{ old('fecha_nac', $animal?->fecha_nac) }}" id="fecha_nac" placeholder="Fecha de nacimiento">
            {!! $errors->first('fecha_nac', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripción') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $animal?->descripcion) }}" id="descripcion" placeholder="Descripción">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fk_specie" class="form-label">Seleccionar especie</label>
            <select name="fk_specie" id="fk_specie" class="form-select @error('fk_specie') is-invalid @enderror">
                <option value="">-- Seleccionar especie --</option>
                @foreach($species as $specie)
                    <option value="{{ $specie->id_specie }}" {{ old('fk_specie', $animal?->fk_specie) == $specie->id_specie ? 'selected' : '' }}>
                        {{ $specie->name_scientific }} {{ $specie->family }}
                    </option>
                @endforeach
            </select>
            <div id="fk_specie-error" class="invalid-feedback" role="alert"></div>
            {!! $errors->first('fk_specie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20">
            <label for="fk_zone">Seleccionar zona:</label>
            <select name="fk_zone" id="fk_zone" class="form-select">
                <option value="">-- Selecciona un zona--</option>
                @foreach ($zones as $zone)
                    <option value="{{ $zone->id_zone }}" {{ old('fk_zone', $animal?->fk_zone) == $zone->id_zone ? 'selected' : '' }}>{{ $zone->name}} - {{$zone->location}}</option>
                @endforeach
            </select>
            {!! $errors->first('fk_zone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            <div class="invalid-feedback" id="fk_zone-error"></div>
        </div>

    </div>
</div>