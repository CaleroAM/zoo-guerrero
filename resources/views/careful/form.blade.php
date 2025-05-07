<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_careful" class="form-label">{{ __('Id Careful') }}</label>
            <input type="text" name="id_careful" class="form-control @error('id_careful') is-invalid @enderror" value="{{ old('id_careful', $careful?->id_careful) }}" id="id_careful" placeholder="Id Careful">
            {!! $errors->first('id_careful', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="date_start" class="form-label">{{ __('Date Start') }}</label>
            <input type="text" name="date_start" class="form-control @error('date_start') is-invalid @enderror" value="{{ old('date_start', $careful?->date_start) }}" id="date_start" placeholder="Date Start">
            {!! $errors->first('date_start', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hours" class="form-label">{{ __('Hours') }}</label>
            <input type="text" name="hours" class="form-control @error('hours') is-invalid @enderror" value="{{ old('hours', $careful?->hours) }}" id="hours" placeholder="Hours">
            {!! $errors->first('hours', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="treatment" class="form-label">{{ __('Treatment') }}</label>
            <input type="text" name="treatment" class="form-control @error('treatment') is-invalid @enderror" value="{{ old('treatment', $careful?->treatment) }}" id="treatment" placeholder="Treatment">
            {!! $errors->first('treatment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="amount_food" class="form-label">{{ __('Amount Food') }}</label>
            <input type="text" name="amount_food" class="form-control @error('amount_food') is-invalid @enderror" value="{{ old('amount_food', $careful?->amount_food) }}" id="amount_food" placeholder="Amount Food">
            {!! $errors->first('amount_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_food" class="form-label">{{ __('Fk Food') }}</label>
            <input type="text" name="fk_food" class="form-control @error('fk_food') is-invalid @enderror" value="{{ old('fk_food', $careful?->fk_food) }}" id="fk_food" placeholder="Fk Food">
            {!! $errors->first('fk_food', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_employee" class="form-label">{{ __('Fk Employee') }}</label>
            <input type="text" name="fk_employee" class="form-control @error('fk_employee') is-invalid @enderror" value="{{ old('fk_employee', $careful?->fk_employee) }}" id="fk_employee" placeholder="Fk Employee">
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_animal" class="form-label">{{ __('Fk Animal') }}</label>
            <input type="text" name="fk_animal" class="form-control @error('fk_animal') is-invalid @enderror" value="{{ old('fk_animal', $careful?->fk_animal) }}" id="fk_animal" placeholder="Fk Animal">
            {!! $errors->first('fk_animal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>