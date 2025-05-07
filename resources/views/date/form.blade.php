<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_date" class="form-label">{{ __('Id Date') }}</label>
            <input type="text" name="id_date" class="form-control @error('id_date') is-invalid @enderror" value="{{ old('id_date', $date?->id_date) }}" id="id_date" placeholder="Id Date">
            {!! $errors->first('id_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_employee" class="form-label">{{ __('Fk Employee') }}</label>
            <input type="text" name="fk_employee" class="form-control @error('fk_employee') is-invalid @enderror" value="{{ old('fk_employee', $date?->fk_employee) }}" id="fk_employee" placeholder="Fk Employee">
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $date?->phone) }}" id="phone" placeholder="Phone">
            {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $date?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="street" class="form-label">{{ __('Street') }}</label>
            <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street', $date?->street) }}" id="street" placeholder="Street">
            {!! $errors->first('street', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cologne" class="form-label">{{ __('Cologne') }}</label>
            <input type="text" name="cologne" class="form-control @error('cologne') is-invalid @enderror" value="{{ old('cologne', $date?->cologne) }}" id="cologne" placeholder="Cologne">
            {!! $errors->first('cologne', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cp" class="form-label">{{ __('Cp') }}</label>
            <input type="text" name="cp" class="form-control @error('cp') is-invalid @enderror" value="{{ old('cp', $date?->cp) }}" id="cp" placeholder="Cp">
            {!! $errors->first('cp', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="state" class="form-label">{{ __('State') }}</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state', $date?->state) }}" id="state" placeholder="State">
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>