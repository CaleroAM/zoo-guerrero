<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_employee" class="form-label">{{ __('Id Employee') }}</label>
            <input type="text" name="id_employee" class="form-control @error('id_employee') is-invalid @enderror" value="{{ old('id_employee', $employees?->id_employee) }}" id="id_employee" placeholder="Id Employee">
            {!! $errors->first('id_employee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employees?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="second_name" class="form-label">{{ __('Second Name') }}</label>
            <input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name', $employees?->second_name) }}" id="second_name" placeholder="Second Name">
            {!! $errors->first('second_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $employees?->last_name) }}" id="last_name" placeholder="Last Name">
            {!! $errors->first('last_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="age" class="form-label">{{ __('Age') }}</label>
            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $employees?->age) }}" id="age" placeholder="Age">
            {!! $errors->first('age', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sex" class="form-label">{{ __('Sex') }}</label>
            <input type="text" name="Sex" class="form-control @error('Sex') is-invalid @enderror" value="{{ old('Sex', $employees?->Sex) }}" id="sex" placeholder="Sex">
            {!! $errors->first('Sex', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="type_empl" class="form-label">{{ __('Type Empl') }}</label>
            <input type="text" name="type_empl" class="form-control @error('type_empl') is-invalid @enderror" value="{{ old('type_empl', $employees?->type_empl) }}" id="type_empl" placeholder="Type Empl">
            {!! $errors->first('type_empl', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_boss" class="form-label">{{ __('Id Boss') }}</label>
            <input type="text" name="id_boss" class="form-control @error('id_boss') is-invalid @enderror" value="{{ old('id_boss', $employees?->id_boss) }}" id="id_boss" placeholder="Id Boss">
            {!! $errors->first('id_boss', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fk_shift" class="form-label">{{ __('Fk Shift') }}</label>
            <input type="text" name="fk_shift" class="form-control @error('fk_shift') is-invalid @enderror" value="{{ old('fk_shift', $employees?->fk_shift) }}" id="fk_shift" placeholder="Fk Shift">
            {!! $errors->first('fk_shift', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>