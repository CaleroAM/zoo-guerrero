<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_empshift" class="form-label">{{ __('Id Empshift') }}</label>
            <input type="text" name="id_empshift" class="form-control @error('id_empshift') is-invalid @enderror" value="{{ old('id_empshift', $empshift?->id_empshift) }}" id="id_empshift" placeholder="Id Empshift">
            {!! $errors->first('id_empshift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hours_worked" class="form-label">{{ __('Hours Worked') }}</label>
            <input type="text" name="hours_worked" class="form-control @error('hours_worked') is-invalid @enderror" value="{{ old('hours_worked', $empshift?->hours_worked) }}" id="hours_worked" placeholder="Hours Worked">
            {!! $errors->first('hours_worked', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reason" class="form-label">{{ __('Reason') }}</label>
            <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror" value="{{ old('reason', $empshift?->reason) }}" id="reason" placeholder="Reason">
            {!! $errors->first('reason', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_shift" class="form-label">{{ __('Fk Shift') }}</label>
            <input type="text" name="fk_shift" class="form-control @error('fk_shift') is-invalid @enderror" value="{{ old('fk_shift', $empshift?->fk_shift) }}" id="fk_shift" placeholder="Fk Shift">
            {!! $errors->first('fk_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_employee" class="form-label">{{ __('Fk Employee') }}</label>
            <input type="text" name="fk_employee" class="form-control @error('fk_employee') is-invalid @enderror" value="{{ old('fk_employee', $empshift?->fk_employee) }}" id="fk_employee" placeholder="Fk Employee">
            {!! $errors->first('fk_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>